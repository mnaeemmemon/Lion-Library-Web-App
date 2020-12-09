<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lion Library</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<script type="text/javascript">
        history.pushState(null, null, location.href);
        history.back();
        history.forward();
        window.onpopstate = function () { history.go(1); };
    </script>
	<?php
				session_start();
				if (isset($_SESSION['user'])) 
				{
					$uid=$_SESSION['userid'];
					$dbservername = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "lion library";
					$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

					if($conn->connect_error){
						die("Connection failed: " . $conn->connect_error);
					}

					$query = "select* from library where userid='$uid'";
					$result = mysqli_query($conn, $query);
					
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {

							$id = $row['id'];
							$name = $row['bookname'];
							$author = $row['bookauthor'];
							$image = $row['bookimage'];

							echo "
							<script>
							$(document).ready(function($) {

								var htmlString = '<div class=\"col-md-3 col-sm-6 col-xs-12 margin_bottom_30_all\">'+'<div class=\"product_list\">'+
										'<div class=\"product_img\"> <img class=\"img-responsive\" src=\"$image\"> </div>'+
										'<div class=\"product_detail_btm\">'+
											'<div class=\"center\">'+
												'<h4><a href=\"it_shop_detail.html\">$name</a></h4>'+
											'</div>'+
											'<div class=\"center\">'+
												'<h4><a href=\"it_shop_detail.html\">By: $author</a></h4>'+
											'</div>'+
											'<form method=\"POST\">'+
											'<input type=\"hidden\" name=\"recid\" value=\"$id\" />'+
											'<input type=\"submit\" style=\"background-color: #9f6934; padding: 5px 30px 5px 30px; border: 2px white solid; border-radius: 10px; margin: 5% 35% 5% 35%; color: white;\" name=\"remove\" value=\"Remove\"/>'+
											'</form>'+
											'<div class=\"starratin\">'+
												'<div class=\"center\"> <i class=\"fa fa-star\" aria-hidden=\"true\"></i> <i class=\"fa fa-star\" aria-hidden=\"true\"></i> <i class=\"fa fa-star\" aria-hidden=\"true\"></i> <i class=\"fa fa-star\" aria-hidden=\"true\"></i> <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i> </div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';

								$('#customSection').append(htmlString);

							});

							</script>
							";
						}
						
					}
					if(array_key_exists('remove', $_POST)){
						$rid = $_POST['recid'];
						$reg = "delete from library where id='$rid'";
						mysqli_query($conn, $reg);
						header('location: mylibrary.php');
					} 
					mysqli_close($conn);
				}
				else
				{
					header('location: index.php');
				}
	?>
	<link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/colors1_dark.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" type="text/css" href="revolution/css/settings.css" />
	<link rel="stylesheet" type="text/css" href="revolution/css/layers.css" />
	<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css" />
</head>

<body id="default_theme" class="it_service">
	<!-- loader -->
	<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /></div>
	<!-- end loader -->
	<!-- header -->
	<header id="default_header" class="header_style_1">
	  <div class="header_bottom">
		<!-- <div class="container"> -->
		<div class="row">
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			  <!-- logo start -->
			  <div class="logo"><a href="home.php"><img src="images/logos/it_logo_white.png" alt="logo" /><p style="color: white; font-size:25px; margin-left: -3px; margin-top: -10px;">Lion Library</p></a> </div>
			  <!-- logo end -->
			</div>
		</div>
	  </div>
	</header>
	<!-- end header -->
	<!-- section -->
	<div style="margin-top: -70px;" class="section padding_layout_1">
		<div class="row">
		  <div class="col-md-12">
			<div class="full">
			  <div class="main_heading text_align_center">
				<h1 style="color:white; font-size: 40px; margin-top: -20px">My Books<h1>
			 </div>
			</div>
		  </div>
		</div>
		<div id="customSection" class="row">
			</div>
	</div>
	<!-- js section -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/menumaker.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/custom.js"></script>
	<script src="revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
	<!-- js section end-->
</body>
</html>
