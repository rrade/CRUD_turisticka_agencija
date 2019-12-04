<?php
session_start();
if(empty($_SESSION['user'])){
  header("Location: login/forma.php?Access=You have to login before entering this page");
}
include 'include/head.php';
include 'include/navigation.php';
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
<?php
include 'include/scripts.php';
?>