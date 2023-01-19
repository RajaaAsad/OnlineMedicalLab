
<?php
  session_start();
  if($_SESSION['login']==false or ($_SESSION['role']!='admin'))
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
<?php
	require("../Class.Patient.php");
  require("../Class.Test.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="user.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View User</title>
</head>
<body>
  <div class="container">

<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
	{
    if(isset($_POST['edit'])){
		
		$test=Patient::updatePatient($_POST['id'],$_POST['name'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['date']);
    Tools::printSuccess("Updated Successfully"); 
		
   }  
	}
?>


<?php
 $id=$_GET['id'];
 $query1=Patient::getPatient($id);
 $row=$query1->fetch();
?>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
      {
        if(isset($_POST['save'])){
          $test=Test::insertTest($id,$_POST['name'],$_FILES['test']);
          Tools::printSuccess("Updated Successfully"); 
        }  
      }
    ?>
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="adminPageAllUsers.php">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>

    <div class="main-body">
      <br><br>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                   <img src="<?php echo '../img/'.$row['img']; ?>" alt="user img" class="rounded-circle" width="150">
                  </div>
                </div>
              </div>
            </div>
         
          
 <form  style='width:60%'enctype="multipart/form-data" action="" method="post" >
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <input name="name" type="text" class="form-control" value=<?php echo $row['name']?>>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">ID Nunmber</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="id" type="number" class="form-control" value=<?php echo $row['id']?>>
              </div>
            </div>
            
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="email" type="email"  class=form-control value=<?php echo $row['email']?>>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="phone" type="number" class="form-control" value=<?php echo $row['phone']?>>
              </div>
            </div>

            <hr>  
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Passward</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="password" type="password" class="form-control" value=<?php echo $row['password']?>>
                </div>
            </div>

            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Date of Birth</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="date" type="date" class="form-control" value=<?php echo $row['date']?> >
                </div>
            </div>

       
            
            <hr>
            <form  style='width:60%'enctype="multipart/form-data" action="" method="post" >

            <div class="row">
              <div class="col-sm-12">
              <button type="submit" name="edit" class="btn btn-default btn-primary" style="width:30%" >Edit</button>
              </div>
            </div>
          </div>
      </div>
 </form> 
 <form  enctype="multipart/form-data" action="" method="post">
      <div class="col-sm-6 mb-3" >
            <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="text-info">Medical Test</h6>
              <input name="name" type="text">
              <br><br>
              <input name="test" type="file" class="file">
              <br><br>
              <button type="submit" name="save" class="btn btn-default btn-primary" >Save</button>
            </div>
          </div>
      </div>
 </form>

 
   <?php 
    echo '<div>';
      $query1=Test::getAllTests($row["id"]);
      while($row=$query1->fetch())
    {
    ?>   
<br><br>

<div class=" card card-body h-100" style="border:solid">
    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Medical Test</i></h6>
    <h6><strong><?php echo $row['name'] ?></strong></h6>
    <a href=<?php echo '../tests/'.$row['test']?> class="btn btn-default btn-primary" download="proposed_file_name">Download</a>
</div>

<?php
  }
  echo '</div>';
   ?>
<br>

<div style="width:100%">
  <a href="adminPageAllUsers.php" class="btn btn-default btn-primary" style="width:10%">Back</a>
</div>

</body>
</html>