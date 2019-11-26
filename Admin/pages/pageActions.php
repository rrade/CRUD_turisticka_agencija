<?php
$root = $_SERVER['DOCUMENT_ROOT']."/turisticka_agencija";
include "$root/include/connect.php";

if(isset($_GET['action']) && $_GET['action']=='delete'){
    $id = $_GET['id'];

    $query = $connect->prepare("DELETE FROM text_page WHERE id = :id");
    $deleted = $query->execute(array(":id" => $id));
    if ($deleted) {
        header("Location: list_pages.php");
    }
    else {
        header("Location: list_pages.php?error=Couldn't delete page");
    }

}

if(isset($_POST['editSave']) && !empty($_POST['editSave'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $page = $_POST['page'];
    $query = $connect->prepare("UPDATE text_page SET title = :title, text = :text, page = :page WHERE id = :id");
    $updated = $query->execute(array(
        ":title"=> $title,
        ":text"=> $text,
        ":page"=> $page,
        ":id"=> $id
    ));
    if($updated){
        header("Location: editPages.php?id=$id");
    }
    else{
        header("Location: editPages.php?id=$id?error=Couldn't update page");
    }
}

if(isset($_POST['newSave']) && !empty($_POST['newSave'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $page = $_POST['page'];
    $query = $connect->prepare("INSERT INTO text_page (title, text, page)
                                VALUES (:title, :text, :page)");
    $created = $query->execute(array(
        ":title"=> $title,
        ":text"=> $text,
        ":page"=> $page
        
    ));
    if($created){
        header("Location: list_pages.php");
    }
    else{
        header("Location: editPages.php?id=0?error=Couldn't create page");
    }
}

 

?>