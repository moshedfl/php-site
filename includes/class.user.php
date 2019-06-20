<?php
    
  class User{

      public $UserId;
      public $UserName;
      public $UserEmail;
      public $Password;
      public $TimeAdded;

      function __construct($username){
        $sql = new Database;
        $stmt = $sql->connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt-> bind_param("s",$username);
        $stmt-> execute();
        $result = $stmt-> get_result();
        $result_user = $result ->fetch_assoc();

        $this->UserId = $result_user["user_id"];
        $this->UserName = htmlspecialchars($result_user ["username"]);
        $this->UserEmail = $result_user["email"];
        $this->Password = $result_user["user_password"];
        $this->TimeAdded = $result_user["Time_added"];
      }
  }

  class UserLogin extends User{

      public $UserOk = true;
      public $err; 

      public function ConnectedUser(){
        
        if(!$this->UserName){
          $this->UserOk = false;
        }
      }

      public function NotConnectedUser($password,$stay_connected){
        
        if(!password_verify($password, $this->Password)){
          $this->UserOk = false;
          $this->err = "<span style='color:red'>One of the data is incorrect</span>";
        
        }elseif($stay_connected){
          setcookie('old_user', $user->UserName, time() + (86400 * 30), "/"); 
        }
      }

      public function SetUserSession(){
        $_SESSION[User][User_id]= $this->UserId;
        $_SESSION[User][User_name]= $this->UserName;
        $_SESSION[User][User_email]= $this->UserEmail;
      
        header("Refresh:0");
      }

  }
?>    