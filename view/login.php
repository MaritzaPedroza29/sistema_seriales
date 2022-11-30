<div class="overlay" id="app">
   <form action="<?php echo BASE_URL?>login/userLogIn" method="post">
      <div class="con">
         <header class="head-form">
            <h2>Log In</h2><br>
            <p>login use aqui su usuario y contraseña</p>
         </header>
         <br>
         <div class="field-set">
            <span class="input-item">
               <i class="fa fa-user-circle"></i>
            </span>
            <input class="form-input" name="usuario" id="txt-input" type="text" placeholder="@UserName" required>

            <br>


            <span class="input-item">
               <i class="fa fa-key"></i>
            </span>
            <input class="form-input" name="clave" type="password" placeholder="Password" id="pwd" name="password"
               required>

            <span>
               <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
            </span>


            <br>
            <button class="log-in" type="submit"> Log In </button>
         </div>

         <div class="other">
            </button>
         </div>

      </div>

   </form>
</div>