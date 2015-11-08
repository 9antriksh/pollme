<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        <title>Poll Me</title>
        <link rel="stylesheet" type="text/css" href="index.css" />
        <script src="index.js"></script>
</head>
    <body >
        <div id="header">
            <a href="index.php?" style="text-decoration:none"><h2>Poll Me</h2></a>
        </div>
        
        <div id ="main">


<!--    php  starts here -->
<?php
class login_module{
    
    //Databse details
    private $dbconn = null;
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'pollme';

    //Login Variables
    private $login_status = false;
    public $output = "";
    
    //Constructor (Initialization point)
    public function __construct(){
        $this->runApp();
    }

    //Controll flow function
    public function runApp(){
        if(isset($_GET["action"]) && $_GET["action"]=="signup"){
            $this->doSignup();
            $this->showSignUpPage();
            
        }
        elseif(isset($_GET["action"]) && $_GET["action"]=="aboutus"){
            $this->showAbout();
        }
        elseif(isset($_GET["action"]) && $_GET["action"]=="contactus"){
            $this->showContact();
        }
        else{
            $this->startSession();
            $this->performLogin();
            if($this->getLoginStatus()){
                $this->showPollMePage();

            }
            else{
                $this->showLoginPage();
            }
        }
    }

    //SignUp Preparation
    private function doSignup(){
        if($this->checkSignUp()){
            if($this->dbConnect()){
                $this->createUser();
            }
        }
        return false;
    }

    //Create Database Connection
    private function dbConnect(){
        try{
            $this->dbconn = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);    
            return true;
        }
        catch(mysqli_connect_error $e){
            $this->output= "Connection Failed:" . $e;
        }
        return false;
    }

    //Check form submission
    private function checkSignUp(){
        if(!isset($_POST["signup"])){
            return false;
        }
        return true;   
    }

    //Inserting in the database
    private function createUser(){

        $uname= isset($_POST['name'])?$_POST['name']:"";
        $pass= isset($_POST['password'])?$_POST['password']:"";
        $uemail= isset($_POST['uemail'])?$_POST['uemail']:"";
        $fname= isset($_POST['fname'])?$_POST['fname']:"";
        $lname= isset($_POST['lname'])?$_POST['lname']:"";
        $mname= isset($_POST['mname'])?$_POST['mname']:"";
        $dob= isset($_POST['dob'])?$_POST['dob']:"";

        $sql = "Select u_id from pollme_users where u_name = '$uname' ";

        $result = $this->dbconn->query($sql);
        if($row=$result->num_rows > 0 ){
          $this->output = "Sorry, Username: #". $uname ."# Already Exists!";
        }
        else{
            $sql="Insert Into pollme_users (u_name,u_pass,u_email,f_name,m_name,l_name,dob) value ('$uname','$pass','$uemail','$fname','$mname','$lname','$dob')";
            $insertSuccess = $this->dbconn->query($sql);
            if($insertSuccess){
                $this->output = "Account Created for username: #". $uname ."# Login Now!";
                return true;
            }
            else{
                $this->output = "Failed.";
            }
        }
        return false;
    }

    //Sign Up Page
    private function showSignUpPage(){
        include("pages/signup.php");
        if ($this->output) {
            echo '<p style="text-align:center; color:red">' . $this->output . '</p>';
        }

    }

    //Sign In Page
    private function showLoginPage(){
        include("pages/signin.php");
        if($this->output){
            echo '<p style="text-align:center; color:red">' .$this->output . '</p>';
        }
    }

    //Show Poll Me
    private function showPollMePage(){
        if($this->output){
            echo $this->output;
        }
        $this->output = "Hello !" . $_SESSION["username"];
        include("pages/pollme.php");
    }

    //Session Start
    private function startSession(){
        if(session_status() == PHP_SESSION_NONE) session_start();
    }

    //Login handeler
    private function performLogin(){
        if (isset($_GET["action"]) && $_GET["action"] == "logout") {
            $this->logout();
        }
        elseif(!empty($_SESSION['username']) && $_SESSION['user_login_status']){
            $this->loginSession();
        }
        elseif (isset($_POST['login'])) {
            $this->loginForm();
        }
    }

    //Login Status
    private function getLoginStatus(){
        return $this->login_status;
    }

    //Destroying the session
    private function logout(){
        $_SESSION = array();
        session_destroy();
        $this->login_status = false;
        $this->output = "You are now logged out.";
    }

    //Still Logged in
    private function loginSession(){
        $this->login_status = true;
    }

    //Password check Handelrer
    private function loginForm(){
        if($this->checkLogin()){
            if($this->dbConnect()){
                $this->checkPassAndLogin();
            }
        }
    }

    //check login submission
    private function checkLogin(){
        if(!isset($_POST["login"])){
            return false;
        }
        return true; 
    }

    //Actuall Login and password check
    private function checkPassAndLogin(){
        $sql = "Select u_name,u_id, u_pass From pollme_users where u_name = '" . $_POST["loginName"] ."'";
        $result= $this->dbconn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($_POST["loginPassword"]==$row["u_pass"]){
                    $_SESSION['username']=$row["u_name"];
                    $_SESSION['uid'] = $row["u_id"];
                    $_SESSION['user_login_status'] = true;
                    $this->login_status = true;
                    return true;
                }
            }
        }
        $this->output = "Invalid login";
        return false;
    }

    private function showAbout(){
         include("pages/contactus.php");
    }

    private function showContact(){
        include("pages/aboutus.php");
    }
   

}

//Class Object Initialized
$run = new login_module();
?>

<!--    php  ends here -->

        </div>
        <div id="footer">
            <p>Designed by: XanterX</p>
            <?php
                if(substr($run->output,0,5)=="Hello") echo "<p>" . $run->output . "</p>";
            ?>
        </div>
    </body>
</html>