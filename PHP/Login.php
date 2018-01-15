<?php
    ini_set("error_reporting",E_ALL);
    ini_set("log_errors","1");
    ini_set("error_log","php_errors.txt");
?>
<!--Calling reset the session-->
<?php
    require_once ("reset.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>    
    <body>
        <form method="POST" name="login" action="./ProsesLogin.php">
              <h1><a href="./Home.php">Home</a></h1><br>
		     <h1>Login</h1>
             <label>Username</label>
			 <input type="text" name="uname"/><br>
			 <label>Password</label>
			 <input type="text" name="pwd"/><br>
             <input type="submit" value="Login"/> 
             <lable><a href="./Signup.php">Sign Up</a></lable>
        
          
			<?php
			//output interface 
			if($login_session){
				echo '<p><a href="./Logout.php">Logout</a></p>';
			}
			else{
				echo '<p><a href="./Login.php">Login</a></p>';
			}
			?>
        </form>
    </body>
</html>