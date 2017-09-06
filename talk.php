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
                                        <li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a>
                                        </li>
										<li><a class="smoth-scroll" href="#about">Logout</a></li>
                                        <!--li><a class="smoth-scroll" href="#about">About</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#portfolio">Portfolio</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#testimonials">Testimonial</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#services">services</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#contact">Contact</a>
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
	<input type="button" onclick="location.href='logout.php';" value="logout" />

	<div id="board"></div>
	

	<form action="">
  	name: <?php echo "$uu";?><br>
 	 <!--input type="text" name="name" id="name"-->
	<?php $talk_id=$_SERVER['QUERY_STRING'];?>
  	<br>
  	context:<br>
  	<input id="content" type="text" name="content">
  	<br><br>
  	<input type="button" value="Submit" onclick="getMessage('<?php echo $uu;?>')">
	</form> 	


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript"> var curUser = <?php echo "'$uu'"; ?>;</script>
	<script type="text/javascript"> var talk_id = <?php echo "'$talk_id'"; ?>;</script>
        <script type="text/javascript" src="test.js"></script> 

    </body>

</html>




