<?php
include "../../include/connect.php";
echo $_POST['email'];
echo $_POST['pass'];
if(isset($_POST['log']) && !empty($_POST['log'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $query = $connect->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
    $query->execute(array(
        ":email"=> $email,
        ":password"=> $password
    ));
    $result= $query->rowCount();
    if($result == 1){
        session_start();
        $_SESSION['user'] = $email;
        header("Location: ../index.php");
    }
    else{
        header("Location: forma.php?Error=Wrong email or password");
    }
    
}
else{
    header("Location: forma.php?Error=Post is empty");
}


?>
 