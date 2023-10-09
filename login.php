<?php 
    include 'header.php'; 
?>
<div class="bg">
    <section  class="login-field">
        <div class="content">
            <h3>Don't miss out on the conversation <br> sign up now!</h3> 
            <img src="img/phonem1.png" alt="">
        </div>
        <div class="form-container">
            <!-- signup form -->
            <form action="php/signup.php" method="POST" enctype="multipart/form-data" class="sign-form <?php if(isset($_SESSION['login'])){echo 'none';} ?>">
                <h2 class="f-title">Create your Account</h2> 
                <i class="i"><?php if(isset($_SESSION['signup'])){echo $_SESSION['signup'];} ?></i>
                <?php  unset($_SESSION['signup']); ?>
                <span>
                    <p>
                        <label class="signup-inputs" for="fn">First Name</label>
                        <input type="text" class="signup-inputs" id="fn"name="fname" placeholder="Your First name here...">
                    </p>
                    <p>
                        <label class="signup-inputs" for="ln">Last Name</label>
                        <input type="text" class="signup-inputs" id="ln" name="lname" placeholder="Your Last name here...">
                    </p>
                    
                </span>
                <label for="e">Email</label>
                <input type="email" id="e" name="email"  placeholder="Your email here...">
                <div class="">
                    <label for="p">Password</label>
                    <input type="password" class="pass"  name="pass" id="p" placeholder="Your pasword here..."> 
                    <img class="ey"onclick="showPass(this)"  src="https://img.icons8.com/ios-glyphs/30/null/visible--v1.png"/>
                    <img class="ey" onclick="hidePass(this)" style="display: none;" src="https://img.icons8.com/ios-glyphs/30/null/hide.png"/>
                </div>
                <input type="file" name="userimage" class="signup-inputs">
                <span>
                    <div><a href="#"  class="create-account" onclick="show_login_form()">Login</a></div>
                    <div><input type="submit" id='signup-btn' class="sub" value="Sign up"></div>
                </span>
                
            </form>

            <!-- login form -->
            <form action="php/login.php" class="login-form <?php if(!isset($_SESSION['login'])){echo 'none';} ?>"method="POST">
                <h2 class="f-title">Register</h2> 
                <i class="i"><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?></i> <br>
                <?php  unset($_SESSION['login']); ?>
                <label for="e">Email</label>
                <input type="email" id="e" name="email"  placeholder="Your email here...">
                <div>
                    <label for="p">Password</label>
                    <input type="password" class="pass"  name="pass" id="p" placeholder="Your pasword here..."> 
                    <img class="ey"onclick="showPass(this)" src="https://img.icons8.com/ios-glyphs/30/null/visible--v1.png"/>
                    <img class="ey"onclick="hidePass(this)" style="display: none;" src="https://img.icons8.com/ios-glyphs/30/null/hide.png"/>
                </div>
                
                <span>
                    <div><a href="#" class="create" onclick="show_sign_form()">Create Account</a></div>
                    <div><input type="submit" id='login-btn' class="sub" value="Login"></div>
                </span>
                
            </form>
        </div>
        
    </section>
</div>
<?php 
    include 'footer.php'; 
?>
