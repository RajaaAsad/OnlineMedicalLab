<?php
  session_start();
  if($_SESSION['login']==false or !(in_array($_SESSION['role'],array('admin'))))
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="user.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="main-body">

<?php
	require("../Class.Patient.php");


	if($_SERVER['REQUEST_METHOD']=='POST')
	{
    if(isset($_POST['add'])){
		$test =patient::addPatient($_POST['id'],$_POST['name'],$_POST['password'], $_POST['email'],$_POST['phone'],$_POST['date'],$_FILES['img']);
		if($test)
		{	
		 Tools::printSuccess("One Record Inserted Successfully");
		}
		else
		{
		  Tools::printError("Inserting Failed for some ERROR");
		}  
	}
}
	
	?>
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="adminPageAllUsers.php">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../img/addUser.png" alt="user" class="rounded-circle" width="150">
                  </div>
                </div>
              </div>
            </div>

 <form  style='width:60%' enctype="multipart/form-data" action="" method="post" >
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              <input name="name" type="text" class="form-control" >
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">ID Nunmber</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="id" type="number" class="form-control" >
              </div>
            </div>
            
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="email" type="email"  class=form-control >
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input name="phone" type="number" class="form-control">
              </div>
            </div>

            <hr>  
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Passward</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="password" type="password" class="form-control"  autocomplete="new-password" >
                </div>
            </div>

            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Date of Birth</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="date" type="date" class="form-control" >
                </div>
            </div>

            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Upload an image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input name="img" accept=".png" type="file" class="form-control" >
                </div>
              </div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-sm-12">
              <button type="submit" name="add" class="btn btn-default btn-primary"style="width:30%" >Add</button>
              </div>
            </div>
          </div>
      </div>
      <input name="role" type="hidden" value="patient" />
 </form> 

 <div class="col-sm-12">
  <a href="adminPageAllUsers.php" class="btn btn-default btn-primary" style="width:20%">Back</a>
  </div>
 

          </div>
         </div>    
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>

</body>
</html>