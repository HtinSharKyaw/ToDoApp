<?php
  require 'config.php';

  if($_POST){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    // print "<pre>";
    // echo $id.$title.$desc;
    $sql = "UPDATE todo SET title='$title', description='$desc' WHERE id='$id'";
    $pdoStatement = $connection->prepare($sql);
    $result = $pdoStatement->execute();
    if($result){
      echo "<script>alert('successfully updated');window.location.href='index.php'</script>";
    }
  }else{
    $sql = "Select * from todo where id = ".$_GET['id'];
    $pdoStatement = $connection->prepare($sql);
    $pdoStatement->execute();
    $result = $pdoStatement->fetchAll();
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
         <h2>Edit</h2>
         <form class="" action="" method="post">
         <input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
           <div class="form-group">
             <label for="">Title</label>  
             <input type="text" class="form-control" name="title" value=" <?php echo $result[0]['title']?>" required>
            
           </div>
           <div class="form-group">
             <label for="">Description</label>
             <textarea name="description" class="form-control" rows="8" cols="80" ><?php echo $result[0]['description']?></textarea>
           </div>
           <div class="form-group">
             
             <input type="submit" class="btn btn-primary"name="" value="Update">
             <a href="index.php" type="button"  class="btn btn-warning">Back</a>
           </div>
         </form>
      </div>
    </div>
  </body>
</html>
