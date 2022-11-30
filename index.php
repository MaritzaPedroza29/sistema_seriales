<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charse="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <tittle></tittle>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/estilo.js"></script>
</head>
<body>
<div class="overlay">
<!-- LOGN IN FORM by Omar Dsoky -->
<form method="post" action="controller/controllerindex.php">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
      <h2>Log In</h2><br>
      <!--     A welcome message or an explanation of the login form -->
      <p>login use aqui su usuario y contraseña</p>
   </header>
   <!--     End  header Content  -->
   <br>
   <div class="field-set">
     
      <!--   user name -->
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required>
     
      <br>
     
           <!--   Password -->
     
      <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
      <!--   Password Input-->
      <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
     
<!--      Show/hide password  -->
     <span>
        <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
     </span>
     
     
      <br>
<!--        buttons -->
<!--      button LogIn -->
      <button class="log-in" name="login"> Log In </button>
   </div>
  
<!--   other buttons -->
   <div class="other">
<!--         Sign Up font icon -->
      </button>
<!--      End Other the Division -->
   </div>
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
</body>