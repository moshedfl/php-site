<?php
	include 'includes/session.php';

  //Insert form data into variables
  $username = trim($_POST[username]);
	$email = trim($_POST[email]);
  $password = trim($_POST[password]);
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = trim($_POST[confirm_password]);
  $new_user = true ;

  // Checks form data
  if(isset($_POST[username]) && $username!="" && $_POST[email]!="" && $password!="" && $confirm_password!=""){
    
    // Checks the length of the username
    if(strlen($username)<5){
      $new_user = false ;
      $err_username = "<br><span style='color:red'>Username is too short, at least 7 characters long</span>";
    }else{
      $err_username = "";
    
    // Checks if the username already exists in the system
    $user = new user($username);
    
    if($user->UserName){
        $new_user = false ;
        $err_username = "<br><span style='color:red'>Username already exists</span>";
      }else{
        $err_username = "";
      }
    }

    //Checks email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $err_email = "<br><span style='color:red'>not a valid email address</span>";
      $new_user = false ;
    }else{
      $err_email = "";
    }

    // Checks the length of the password
    if(strlen($password)<7){
      $new_user = false ;
    }

    //Checks password confirmation
    if($confirm_password != $password){
      $err_password = "<br><span style='color:red'>Does not match the password</span>";
      $new_user = false ;
    }else{
      $err_password = "";
    }
    
    //Insert form data into database
    if($new_user==true){

      $sql_new_user = $conn->prepare("INSERT INTO users (username, email, user_password) VALUES (?, ?, ?)");
      $sql_new_user->bind_param("sss", $username, $email, $hashed_password);
      $sql_new_user->execute();
      
      if ($sql_new_user) {
        header("Location:index.php");
      } else {
        $err_receiving = "<span style='color:red'>Error receiving data Try again later</span>";
      }
    }
            
    $conn->close();
  }            
  
 
  echo '<pre>';
   // print_r($result);
    print_r($aa);
  echo '</pre>';
 
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="includes/icons/homework.png" id="icon" alt="User Icon" />
      <h1>homework</h1>
    </div>

    <!-- Login Form -->
    <form method="post">
      <?= $err_receiving?>
      <input type="text" id="username" class="fadeIn second " <?=$err_username ? 'style="background-color:#ffdddd"' : ""?> name="username" placeholder="username" value="<?= $username?>" minlength="5" required>
      <?= $err_username?>
      <input type="email" id="email" class="fadeIn second" <?=$err_email ? 'style="background-color:#ffdddd"' : ""?> name="email" placeholder="email" value="<?= $email?>" required>
      <?= $err_email?>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" value="<?= $password?>" minlength="8" required>
      <input type="password" id="confirm_password" class="fadeIn third" <?=$err_password ? 'style="background-color:#ffdddd"' : ""?> name="confirm_password" placeholder="confirm password" value="<?= $confirm_password?>" required>
      <?= $err_password?>
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="?page_slug=login">back to login page</a>
    </div>

  </div>
</div>