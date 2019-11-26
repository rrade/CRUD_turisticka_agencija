<?php
include '../include/head.php';
include '../include/navigation.php';
//include 'page_akcije/deletePage.php';
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pages</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <a href="editPages.php?id=0" class="float-right btn btn-primary">Novi unos</a>

    <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Stranica</th>
                      <th>Naslov</th>
                      <th style="width: 40px"></th>
                    </tr>
                  </thead>
                  <tbody>

    <?php
    $pagesQuery = getAllPages();
    while($row = $pagesQuery->fetch()){
    ?>
    
    
                    <tr>
                      <td><?= $row['page'];?></td>
                      <td>
                        <?= $row['title'];?>
                      </td>
                      <td>
                          <a href="editPages.php?id=<?=$row['id']?>" class="btn btn-warning">Edit</a>
                          <a href="pageActions.php?id=<?=$row['id']?>&action=delete" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    
                  
    
    <?php
    }
    ?>
    </tbody>
                </table>
              </div>
    
<?php
include '../include/scripts.php';

?>