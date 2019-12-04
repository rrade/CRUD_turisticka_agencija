<?php

function getAllPages() {
    global $connect;

    $query = $connect->prepare("SELECT * FROM text_page");
    $query->execute();
    return $query;

}

function getPageDetails($id) {
    global $connect;

    $query = $connect->prepare("SELECT * FROM text_page WHERE id = :id");
    $query->execute(array(':id' => $id));
    return $query;
}

function getAllUsers($rola) {
    global $connect;
    if($rola == 1){
    $query = $connect->prepare("SELECT * FROM user");
    $query->execute();
    return $query;
    }
    else {
        
    }

}

?>