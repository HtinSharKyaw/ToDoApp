<?php  
  require 'config.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
  </head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <body>
  <?php 
    $sql = "Select * from todo order by Id Desc";
    $pdoStatement = $connection->prepare($sql);
    $pdoStatement->execute();
    $result = $pdoStatement->fetchAll();  
  ?>
    <div class="card">
      <div class="card-body">
      <div>
        <h2>Todo Home Page</h2>
        <a type="button" class="btn btn-success" href="add.php" style="margin:10px;">Creat New</a>
      </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>title</th>
              <th>description</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
              if($result){
                foreach($result as $value){

                  ?>
                  <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $value['title']?></td>
              <td><?php echo $value['description']?></td>
              <td><?php echo date('Y-m-d',strtotime($value['created_at']))?></td>
              <td>
                <a type="button" class="btn btn-primary" href="edit.php?id=<?php echo $value['id']?>">Edit</a>
                <a type="button" class="btn btn-warning" href="delete.php?id=<?php echo $value['id']?>">Delete</a>
              </td>
            </tr>

                  <?php
                  $i++;
                }
              }
            ?>
            

          </tbody>

        </table>

      </div>

    </div>

  </body>
</html>
