<html lang="en">

    <head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="another.css">
        <title>course</title>
    </head>

<?php
error_reporting(E_ALL);
session_start();
include_once('item.php');

class Login extends DB{
        function __construct(){
                $db_server = parent::get_ip();
                $db_name = parent::get_name();
                $db_pwd = parent::get_pwd();
                $db_user = parent::get_user();
                $this->database= new mysqli($db_server,$db_user,$db_pwd,$db_name);
                if ($this->database->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
        }
}

$l = new Login();


?>

    <body>
    <script type="text/javascript"> var curUser = <?php echo "null;" ?>;</script>

<?php 
if(!isset($_SESSION['account'])){
    if(isset($_POST['login'])&&!empty($_POST['account'])&&!empty($_POST['password'])){
        $acc = $_POST['account'];
        $pwd = $_POST['password'];
        $acc = preg_replace("/[^A-Za-z0-9]/","",$acc);
        $pwd = preg_replace("/[^A-Za-z0-9]/","",$pwd);
        //check password from user table
        if($acc!=NULL && $pwd!=NULL){
            $sql = "SELECT * FROM user where acc = '$acc'";
            $result = $l->database->query($sql);
            $row = $result->fetch_assoc();

            if($row['pswd']==md5($pwd)){
                $_SESSION['account'] = $row['acc'];
                $_SESSION['isAdmin'] = $row['isAdmin'];
                // go to board
                echo '<meta http-equiv=REFRESH CONTENT=0;url=syllabus.php>';
            }else{
                //wrong account or password
                echo 'The account or password is wrong!';
            }

        }
    }
    ?> 
    <form action="syllabus.php" method="post">
        Account: <input type="text" name="account"><br/>
        Password: <input type="password" name="password"><br/>
        <input type="submit" name="login">
    </form>
<?php 
}
else{
    $uu=$_SESSION['account'];
    echo "Hi $uu <br>";
?>
    <script type="text/javascript"> var curUser = <?php echo "'$uu'"; ?>;</script>
    <input type="button" onclick="location.href='logout.php';" value="logout" />
<?php
}
 
?>
        <div id="board"></div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    </body>

</html>
