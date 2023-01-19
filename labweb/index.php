<!DOCTYPE html>
<html>
  <head>
    <title>Sign</title>
    <script type="text/javascript"></script>
    <link rel="stylesheet" href="css/signin.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <script src="https://code.jquery.com/jquery.js"></script>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        

      <form  enctype="multipart/form-data" action="signup.php" method="post" autocomplete="off"> 
          <h1>Create Account</h1>

          <input name="name" type="text" placeholder="Name" required autocomplete="off"/>
          <input name="id" type="text" placeholder="identity" required/>
          <input name="email" type="email" placeholder="Email" autocomplete="off" />
          <input name="phone" type="number" placeholder="phone" required autocomplete="off" />
          <input name="password" type="password" placeholder="Password" autocomplete="new-password"/>
          <input name="date" type="date" placeholder="date" required autocomplete="off" />
          <input name="role" type="hidden" value="patient" autocomplete="off"/>

          <input
            name="img"
            type="file"
            placeholder="Password"
            accept=".png"
            id="image"
            required
          />
          <button type="submit" name="add" class="btn btn-default btn-primary" >Sign Up</button>
        </form>
      </div>

      
     
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <br>
            <img src="img/lab.jpg" height="200" width="305" />
            <br /><br />
            <h1>Welcome Back!</h1>

            <p>
              To keep connected with us please login with your personal info
            </p>
           
            <form action="signin.php" method="post" style=" background:linear-gradient(to right, #0a254f, #085eb4);">
              <button type="submit" name="sign">Sign IN</button>
            </form>

          </div>
          <div class="overlay-panel overlay-right">
            <img src="img/logo.png" height="100" width="100" /><br /><br />
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details to create an account or Sign in</p>
            <button class="ghost" id="signUp">Sign</button>
          </div>
         </div>
        </div>
       </div>
    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });
    </script>
  </body>
</html>
