<?php
include '../include/head.php';
include '../include/navigation.php';
//include 'page_akcije/deletePage.php';

?>

 <?php
    if(isset($_GET['id'])) {
        $queryEdit=getPageDetails($_GET['id']);
        $rowEdit = $queryEdit->fetch();
        $title = $rowEdit['title'];
        $text = $rowEdit['text'];
        $page = $rowEdit['page'];
        $id = $rowEdit['id'];    
    }
    else{
        header("Location: list_pages.php");
    }
    
    ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php
            if($_GET['id'] == 0){
                $titleUpdateSave='Dodavanje nove stranice';
                $display= 'none';
                $name='newSave';
            }else{
               $titleUpdateSave = 'Edituj stranicu - '.$title;
               $display= 'inline';
               $name='editSave';
            }
            
            ?>
            <h1 class="m-0 text-dark"><?= $titleUpdateSave;?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="card card-primary">
            <div class="card-header">

              <div class="card-tools">
                
              </div>
            </div>
            <form action="pageActions.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Naziv stranice</label>
                <input type="text" id="inputName" class="form-control"name="title" value="<?=$title?>">
              </div>
              <div class="form-group">
                <label for="inputDescription">Sadrzaj stranice</label>
                <textarea id="inputDescription" class="form-control"name="text" rows="4"><?=$text?></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Link stranice</label>
                <input type="text" id="inputClientCompany" class="form-control" name ="page" value="<?=$page?>">
              </div> 
              <a href="pageActions.php?id=<?=$_GET['id']?>&action=delete" style="display:<?=$display?>" class="btn btn-danger">Delete</a>
              <input type="submit" class="btn btn-success" name="<?=$name?>" value="Save">
              <input type="hidden"name="id" value="<?=$id?>">
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <?php
include '../include/scripts.php';

?>