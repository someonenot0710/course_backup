<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="images/icon/logo.ico">
        <!-- All CSS Plugins -->
        <link rel="stylesheet" type="text/css" href="css/plugin.css">

        <!-- Main CSS Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Google Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">

        <link rel="stylesheet" type="text/css" href="another.css">
        <title>書報討論106上學期</title>
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

    <body background="images/bg/pattern-bg.png">
    <script type="text/javascript"> var curUser = <?php echo "null;" ?>;</script>
        <!-- Preloader Start -->
    <div class="preloader">
          <p>Loading...</p>
     </div>
     <!-- Preloader End -->

    <header id="home">
        <div class="header-top-area">
            <div class="container">
                <div class="row">

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
                    <div class="col-sm-3">
                        <div class="login">
			    <a>書報討論 106上學期</a>
                            <form action="syllabus.php" method="post">
                                <!--font>帳號:</font-->
                                <input type="text" name="account" placeholder="帳號" style="width:80px; display: inline;">
                                <!--font>密碼:</font-->
                                <input type="password" name="password" placeholder="密碼" style="width:80px; display: inline;">
                                <input type="submit" name="login" value="登入">
                            </form>
                        </div>
                    </div>

    <!--form action="syllabus.php" method="post">
        Account: <input type="text" name="account"><br/>
        Password: <input type="password" name="password"><br/>
        <input type="submit" name="login">
    </form-->
<?php 
}
else{
    $uu=$_SESSION['account'];
?>
                   <div class="col-sm-3">
                        <div class="login">
			    <a>書報討論 106上學期</a>
                            <a><?php echo "$uu";?></a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="navigation-menu">
                            <div class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smoth-scroll" href="info.php">Information</a>
                                        </li>
                                        <li class="active"><a class="smoth-scroll" href="changepwd.php">Change Password</a>
                                        </li>
					<li class="active"><a class="smoth-scroll" href="logout.php">Logout</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
 <script type="text/javascript"> var curUser = <?php echo "'$uu'"; ?>;</script>
<?php
}
?>
                </div>
            </div>
        </div>
 </header>

    <!--script type="text/javascript"> var curUser = <?php echo "'$uu'"; ?>;</script-->
    <!--input type="button" onclick="location.href='logout.php';" value="logout" /-->
        <div id="board" class="talk-board"></div>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <!-- All Javascript Plugins  -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugin.js"></script>

        <!-- Main Javascript File  -->
        <script type="text/javascript" src="js/scripts.js"></script>


        <script type="text/javascript" src="main.js"></script>
    </body>

</html>
