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
						$dbservername = "localhost";
						$dbusername = "root";
						$dbpassword = "";
						$dbname = "lion library";
						$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

						if($conn->connect_error){
							die("Connection failed: " . $conn->connect_error);
						}
						
						$query = "select* from books";
						$result = mysqli_query($conn, $query);
						
						if(array_key_exists('logout', $_POST)){
							session_destroy();
							unset($_SESSION['user']);
							header('location: index.php');
							return;
						} 
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {

								$id = $row['id'];
								$name = $row['name'];
								$author = $row['author'];
								$image = $row['image'];

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
												'<input type=\"hidden\" name=\"recname\" value=\"$name\" />'+
												'<input type=\"hidden\" name=\"recauthor\" value=\"$author\" />'+
												'<input type=\"hidden\" name=\"recimage\" value=\"$image\" />'+
												'<input type=\"submit\" style=\"background-color: #9f6934; padding: 5px 30px 5px 30px; border: 2px white solid; border-radius: 10px; margin: 5% 35% 5% 35%; color: white;\" name=\"add\" value=\"Add\"/>'+
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
						if(array_key_exists('add', $_POST)){

							$usid = $_SESSION['userid'];
							$sid = $_POST['recid'];
							$sname = $_POST['recname'];
							$sauthor = $_POST['recauthor'];
							$simage = $_POST['recimage'];

							$case1 = "select * from library where bookid = '$sid'";
							$result1 = mysqli_query($conn, $case1);
							$num1 = mysqli_num_rows($result1);

							if($num1==0){
								$reg = "insert into library (userid, bookid, bookname, bookauthor, bookimage) values ('$usid','$sid','$sname','$sauthor','$simage') ";
								mysqli_query($conn, $reg);
							}
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
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			  <!-- menu start -->
			  <div class="menu_side">
				<div id="navbar_menu">
				  <ul class="first-ul">
					<li><a href="mylibrary.php">My Library</a></li>
				  </ul>
				</div>
				<div class="search_icon">
				  <ul>
					<li>
					<form method="POST">
						<input type="submit" class = "button_design" name="logout" value="Logout">
					</form>
						
					</li>
				  </ul>
				</div>
			  </div>
			  <!-- menu end -->
			<!-- </div> -->
		  </div>
		</div>
	  </div>
	</header>
	<!-- end header -->
	<!-- section -->
	<div id="slider" class="section main_slider">
	  <div class="container-fuild">
		<div class="row">
		  <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
			
			<!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
			<div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
			  <ul>
				<li data-index="rs-1812" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/loaders/slide1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Poetry Books" data-description="">
				  <!-- MAIN IMAGE -->
				  <img src="images/loaders/slide1.jpg"  alt="#"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
				  <!-- LAYERS -->
				  <!-- LAYER NR. BG -->
				  <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
								  id="slide-270-layer-1012" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-width="full"
								  data-height="full"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
								  data-transform_out="s:300;s:300;" 
								  data-start="750" 
								  data-basealign="slide" 
								  data-responsive_offset="on" 
								  data-responsive="off"
								  style="z-index: 5;background-color:black;border-color:black;"> </div>
				  <!-- LAYER NR. 1 -->
				  <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-912" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
								  data-width="500"
								  data-height="140"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;" 
								  data-mask_out="x:inherit;y:inherit;" 
								  data-start="2000" 
								  data-responsive_offset="on" 
								  style="z-index: 5;background-color:black;border-color:black;"> </div>
				  <!-- LAYER NR. 2 -->
				  <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-112" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-fontsize="['70','70','70','35']"
								  data-lineheight="['70','70','70','50']"
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1000" 
								  data-splitin="chars" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  data-elementdelay="0.05" 
								  style="z-index: 6; white-space: nowrap;">Poetry Books</div>
				  <!-- LAYER NR. 3 -->
				  <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-412" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1500" 
								  data-splitin="none" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  style="z-index: 7; white-space: nowrap;">Available At Lion Library</div>
				</li>
				<li data-index="rs-181" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/loaders/slide2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Discovery Books" data-description="">
				  <!-- MAIN IMAGE -->
				  <img src="images/loaders/slide2.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
				  <!-- LAYERS -->
				  <!-- LAYER NR. BG -->
				  <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
								  id="slide-270-layer-101" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-width="full"
								  data-height="full"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
								  data-transform_out="s:300;s:300;" 
								  data-start="750" 
								  data-basealign="slide" 
								  data-responsive_offset="on" 
								  data-responsive="off"
								  style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
				  <!-- LAYER NR. 1 -->
				  <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-91" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
								  data-width="500"
								  data-height="140"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;" 
								  data-mask_out="x:inherit;y:inherit;" 
								  data-start="2000" 
								  data-responsive_offset="on" 
								  style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
				  <!-- LAYER NR. 2 -->
				  <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-11" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-fontsize="['70','70','70','35']"
								  data-lineheight="['70','70','70','50']"
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1000" 
								  data-splitin="chars" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  data-elementdelay="0.05" 
								  style="z-index: 6; white-space: nowrap;">Discovery Books</div>
				  <!-- LAYER NR. 3 -->
				  <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-41" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1500" 
								  data-splitin="none" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  style="z-index: 7; white-space: nowrap;">Available At Lion Library </div>
				</li>
				<li data-index="rs-18" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/loaders/slide3.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Educational Books" data-description="">
				  <!-- MAIN IMAGE -->
				  <img src="images/loaders/slide3.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
				  <!-- LAYERS -->
				  <!-- LAYER NR. BG -->
				  <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
								  id="slide-270-layer-10" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-width="full"
								  data-height="full"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
								  data-transform_out="s:300;s:300;" 
								  data-start="750" 
								  data-basealign="slide" 
								  data-responsive_offset="on" 
								  data-responsive="off"
								  style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
				  <!-- LAYER NR. 1 -->
				  <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-9" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
								  data-width="500"
								  data-height="140"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;" 
								  data-mask_out="x:inherit;y:inherit;" 
								  data-start="2000" 
								  data-responsive_offset="on" 
								  style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
				  <!-- LAYER NR. 2 -->
				  <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-1" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								  data-fontsize="['70','70','70','35']"
								  data-lineheight="['70','70','70','50']"
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1000" 
								  data-splitin="chars" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  data-elementdelay="0.05" 
								  style="z-index: 6; white-space: nowrap;">Educational Books </div>
				  <!-- LAYER NR. 3 -->
				  <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
								  id="slide-18-layer-4" 
								  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								  data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
								  data-width="none"
								  data-height="none"
								  data-whitespace="nowrap"
								  data-transform_idle="o:1;"
								  data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
								  data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								  data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
								  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
								  data-start="1500" 
								  data-splitin="none" 
								  data-splitout="none" 
								  data-responsive_offset="on" 
								  style="z-index: 7; white-space: nowrap;">Available At Lion Library </div>
				</li>
			  </ul>
			  <div class="tp-static-layers"></div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- end section -->
	<!-- section -->
	<div class="section padding_layout_1">
		<div class="row">
		  <div class="col-md-12">
			<div class="full">
			  <div class="main_heading text_align_center">
				<h1 style="color:white; font-size: 40px; margin-top: -20px">Books We Have<h1>
			 </div>
			</div>
		  </div>
		</div>
		<div id="customSection" class="row">
		</div>
		
	</div>
	
	<!-- end section -->
	
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