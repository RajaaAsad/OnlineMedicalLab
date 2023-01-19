
<?php
include("../Class.Database.php");
include("../Class.Test.php");
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../css/user.css"
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
 if($_SESSION['login']==false or $_SESSION['role']!='patient')
  {
    header("location: ../index.php?loginError=1");
    exit;
  }	
?>
  <div class="container">
    <div class="main-body">
     <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src=<?php echo '../img/'.$_SESSION['img'] ?> alt="user img" class="rounded-circle" width="150">
                  </div> 
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">


                  <form action="logout.php" method="post">
                     <button type="submit" name="logout" class="btn btn-default btn-primary" >Logout</button>
                   </form>

                </li>
                  
             
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['name']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ID Nunmber</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['id']?>
                    </div>
                  </div>
                  
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['email']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['phone']?>
                    </div>
                  </div>
      
                  <hr>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo $_SESSION['date']?>
                            </div>
                            </div>
                       </div>
               </div>
         <?php 
              echo '<div>';
               $query1=Test::getAllTests($_SESSION['id']);
                while($row=$query1->fetch())
              {
              ?>   
              <br>
          <div class="card card-body h-100" style="width:70%">
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Medical Test</i></h6>
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"><?php echo $row['name'] ?></i></h6>
                  <a href=<?php echo '../tests/'.$row['test']?> class="btn btn-default btn-primary" style="width:30%" download="proposed_file_name">Download</a>
          </div>
        <?php
           }
          echo '</div>';
        ?>


</body>
</html>