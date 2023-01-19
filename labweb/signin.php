<?php
   session_start();
  ?>
<?php 
	require 'Class.login.php';
	if (!empty($_POST['id1'])){
    login::checkIn($_POST['id'],$_POST['pass']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signin.css" />
</head>
<body>    
    <div style="width:40%; height:100%;" class="form-container sign-in-container">
  
        <?php
        if(isset($_POST['loginError']))
     {
     
         Tools::printError('Error in signIN');
     }
     
        ?>	
        <form  action="signin.php" method="post" >
          <img src="img/logo.png" height="100" width="100" />
          <br>
          <h1>Sign in</h1>
          <input name="id" type="number" placeholder="identity" required autocomplete="off"/>
          <input name="pass" type="password" placeholder="Password" required autocomplete="new-password"/>
          <input name="id1" value="true" hidden/>
          <br><br>
          <button type="submit" class="btn btn-danger">Sign IN</button>   
        </form>
      </div>
      
 
</body>
</html>