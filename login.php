<?php
  // header('X-XSS-Protection:0');
  
  //Checks connected user
  if($_COOKIE[old_user]){
    $user = new UserLogin($_COOKIE[old_user]);
    $user->ConnectedUser();
  
  //Checks not connected user
  }elseif($_POST[username]){
    $user = new UserLogin(trim($_POST[username]));
    $user->NotConnectedUser($_POST[password],$_POST[Stay_connected]);
    include 'includes/session.php';
  }
    
  if($user->UserOk){
    $user->SetUserSession();
    header("Location:content");
  }
  
echo '<pre>';
print_r($user) ;
print_r($_SESSION[User]) ; 
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
    <?= $user->err?>
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In" style="margin-bottom:0">
      <div class="form-check-inline" style="margin:15px 15px 8px; float:right">
        <label class="form-check-label" for="Stay_connected">
          <input type="checkbox" class="form-check-input" id="Stay_connected" name="Stay_connected" checked>Stay connected
        </label>
      </div>
    </form>

    <!-- sign up -->
    <div id="formFooter" style="clear:right">
      <a class="underlineHover" href="?page_slug=signup">sign up now</a>
    </div>

  </div>
</div>