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
   <head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" href="css/sign.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <script src="https://code.jquery.com/jquery.js"></script>

   </head>
<body>
    <?php
        if(isset($_POST['loginError']))
     {
     
         Tools::printError('Error in signIN');
     }
     
        ?>
    <div class="design">
        <br><br><br><br><br>

 <div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Now !</h1>
      <div>
        <input name="id" type="text" placeholder="ID" id="username" required autocomplete="off" />
      </div>
      <div>
        <input name="pass" type="password" placeholder="Password" id="password" required autocomplete="new-password"/>
        <input name="id1" value="true" hidden/>
      </div>
      <div>
      <input type="submit" value="Log in" />
      </div>
    </form>
    
  </section>
</div>
</div>
</body>
</html>