<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="style.css">
        <!-- All CSS Plugins -->
        <link rel="stylesheet" type="text/css" href="css/plugin.css">
    
        <!-- Main CSS Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
    
        <!-- Google Web Fonts  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
        <title>course</title>
    </head>


<?php
error_reporting(E_ALL);
session_start();
#include_once('item.php');

if(!isset($_SESSION['account'])){
    echo '<meta http-equiv=REFRESH CONTENT=0;url=syllabus.php>';
}
$uu = $_SESSION['account'];
//echo "Hi $uu!";

?>

<?php 

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

$sql = "SELECT * FROM `user` where `acc` = '$uu'";
$result = $l->database->query($sql);
$talk_id=$_SERVER['QUERY_STRING'];
while ($row = $result->fetch_assoc()){
$myobj=new stdClass;
$myobj->thumb=$row['thumb'.$talk_id];
$myobj->publish=$row['publish'.$talk_id];

}

?>

    <body>
	
	<!-- Preloader Start -->
    <div class="preloader">
	  <p>Loading...</p>
     </div>
     <!-- Preloader End -->

    
    
    <!-- Menu Section Start -->
    <header id="home">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                
                    <!--div class="col-sm-3">
                        <div class="logo">
                            <a href="index-2.html">WebRes</a>
                        </div>
                    </div-->
                    
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
                                        <li class="active"><a class="smoth-scroll" href="syllabus.php">Home<!--div class="ripple-wrapper"></div--></a>
                                        </li>
					<li><a class="smoth-scroll" href="logout.php">Logout</a></li>
                                        </li-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </header>

	<form action="">
	<h1 >thumb: <span id="thumb"><?php echo $myobj->thumb;?></span></h1>
	<h1 >publish:<span id="publish"> <?php echo $myobj->publish;?></span></h1>
  	name: <?php echo "$uu";?><br>
 	 <!--input type="text" name="name" id="name"-->
	<?php $talk_id=$_SERVER['QUERY_STRING'];?>
  	<br>
  	context:<br>
  	<input id="content" type="text" name="content">
  	<br><br>
  	<input type="button" value="Submit" onclick="getMessage('<?php echo $uu;?>')">
	</form> 	
        <div id="board"></div>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript"> var curUser = <?php echo "'$uu'"; ?>;</script>
	<script type="text/javascript"> var talk_id = <?php echo "'$talk_id'"; ?>;</script>
	<script type="text/javascript"> var user_thumb = <?php echo "'$myobj->thumb'"; ?>;</script>
	<script type="text/javascript"> var user_publish = <?php echo "'$myobj->publish'"; ?>;</script>
        <script type="text/javascript" src="test.js"></script> 
	<!-- All Javascript Plugins  -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugin.js"></script>
    
        <!-- Main Javascript File  -->
        <script type="text/javascript" src="js/scripts.js"></script>

    </body>

</html>




