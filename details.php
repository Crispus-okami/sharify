<?php
session_start(); // demarrer la session
if (!empty($_SESSION['id'])) { // si l'utilisateur est connecté
    $username = $_SESSION['username'];
    require('utils/engine/functions.php'); // importer les fonctions
	$id = $_GET['project'];
    $req = get_project($id);
	$nav = '<a href="index.php" class="active">Accueil</a>
	<a href="all.php">Appartements</a>
	<a href="add.php">Ajouter</a>
	<a href="my_projects.php">Mes appartements</a>
	
	<a href="logout.php">Déconnexion</a>';
} else {
    // si l'utilisateur n'est pas connecté
	require('utils/engine/functions.php'); // importer les fonctions
    $nav = '<a href="index.php" class="active">Accueil</a>
	
	<a href="login.php">Se connecter</a>';
}

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from p.w3layouts.com/demos/Sharify/web/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 00:45:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Sharify | Single :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sharify Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="all" />
<script src="js/modernizr.custom.js"></script>
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
</head>
<!-- slide-toggle-menu -->
 <body class="cbp-spmenu-push">
<script src="http://m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-149859901-1'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149859901-1');
</script>

<script>
     window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
     ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
     ga('require', 'eventTracker');
     ga('require', 'outboundLinkTracker');
     ga('require', 'urlChangeTracker');
     ga('send', 'pageview');
   </script>
<script async src='https://p.w3layouts.com/js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="https://p.w3layouts.com/assests/css/font-awesome.min.css">
<!-- New toolbar-->
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}


#w3lDemoBar.w3l-demo-bar {
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  padding: 40px 5px;
  padding-top:70px;
  margin-bottom: 70px;
  background: #0D1326;
  border-top-left-radius: 9px;
  border-bottom-left-radius: 9px;
}

#w3lDemoBar.w3l-demo-bar a {
  display: block;
  color: #e6ebff;
  text-decoration: none;
  line-height: 24px;
  opacity: .6;
  margin-bottom: 20px;
  text-align: center;
}

#w3lDemoBar.w3l-demo-bar span.w3l-icon {
  display: block;
}

#w3lDemoBar.w3l-demo-bar a:hover {
  opacity: 1;
}

#w3lDemoBar.w3l-demo-bar .w3l-icon svg {
  color: #e6ebff;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons {
  margin-top: 30px;
  border-top: 1px solid #41414d;
  padding-top: 40px;
}
#w3lDemoBar.w3l-demo-bar .demo-btns {
  border-top: 1px solid #41414d;
  padding-top: 30px;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
  font-size: 26px;
}
#w3lDemoBar.w3l-demo-bar .no-margin-bottom{
  margin-bottom:0;
}
.toggle-right-sidebar span {
  background: #0D1326;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #e6ebff;
  border-radius: 50px;
  font-size: 26px;
  cursor: pointer;
  opacity: .5;
}
.pull-right {
  float: right;
  position: fixed;
  right: 0px;
  top: 70px;
  width: 90px;
  z-index: 99999;
  text-align: center;
}
/* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */

#right-sidebar {
  width: 90px;
  position: fixed;
  height: 100%;
  z-index: 1000;
  right: 0px;
  top: 0;
  margin-top: 60px;
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
  -o-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow-y: auto;
}


/* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */

.hide-right-bar-notifications {
  margin-right: -300px !important;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}



@media (max-width: 992px) {
  #w3lDemoBar.w3l-demo-bar a.desktop-mode{
      display: none;

  }
}
@media (max-width: 767px) {
  #w3lDemoBar.w3l-demo-bar a.tablet-mode{
      display: none;

  }
}
@media (max-width: 568px) {
  #w3lDemoBar.w3l-demo-bar a.mobile-mode{
      display: none;
  }
  #w3lDemoBar.w3l-demo-bar .responsive-icons {
      margin-top: 0px;
      border-top: none;
      padding-top: 0px;
  }
  #right-sidebar,.pull-right {
      width: 90px;
  }
  #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
      margin-bottom: 0;
  }
}
</style>
<div class="pull-right toggle-right-sidebar">
 
</div>

<div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
<div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">

     
    <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003"
        style="overflow: hidden; outline: none;">
    </div>
</div>
</div>
</div>

       <!--top-header-->
		<!--bottom-->
		  <section class="button">
					<button id="showLeftPush"><img src="images/menu.png" alt=""></button>
		   </section>
			<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<h3>Menu</h3>
					<?php
						echo $nav;
					?>
				<ul class="social-icons text-center">
					<li><a href="#" class="f1"></a></li>
					<li><a href="#" class="f2"></a></li>
					<li><a href="#" class="f3"></a></li>
					<li><a href="#" class="f4"></a></li>
				</ul>
		  </nav>
		  
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
				if( button !== 'showRightPush' ) {
					classie.toggle( showRightPush, 'disabled' );
				}
			}
		</script>
<!-- //slide-toggle-menu -->
<!-- banner -->
<div class="banner page-head">
	<div class="logo">
		<h1><a href="index.php">Sharify</a></h1>
	</div>
	<div class="search-in">
			<div class="search" style="display: none;">
				<form method='GET' action='search.php'> 

<input type="text" class="text" name="search">
					<input type="submit" value="SEARCH">
				</form>
				<div class="close-in"><img src="images/close.png" alt=""></div>
			</div>
			<div class="right"><button> </button></div>
	</div>
			<script type="text/javascript">
				$('.search').hide();
				$('button').click(function (){
				$('.search').show();
				$('.text').focus();
				}
				);
				$('.close-in').click(function(){
				$('.search').hide();
				});
			</script>
</div>
<!-- //banner -->
<!--blog-starts--> 
<!---728x90--->

<div class="blog-section">
	<div class="container"> 
		<h3 class="tittle-three">Details</h3>
		<!--single-page-->
		 <div class="banner-bdy sig">
			<div class="single">
			<div class="sing-img-text">
				<?php echo '<img src="'.$req['banner'].'" class="img-responsive" alt=" ">'; ?>
				<div class="sing-img-text1">
					<h3><?php echo $req['name']?></h3>
						<div class="admin-tag1">
							<p>Posted by <a <?php echo ' href="details.php?project='.$req['id'].'"'?>>Admin</a> in <a href="#">General</a> | <a <?php echo ' href="details.php?project='.$req['id'].'"'?>>10 Comments</a></p>
						</div>
					<p class="est"><?php echo $req['description']?></p>
					<!---728x90--->
					<div class="com">
						<h3 class="commant">Comments</h3>
						<ul class="media-list">
						  <li class="media">
							<div class="media-left">
							  <a href="#">
								<span class="glyphicon glyphicon-user"></span>
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading">Simmy</h4>
							  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus 
							  scelerisque ante sollicitudin commodo. Cras purus odio, 
							  vestibulum in vulputate at, tempus viverra turpis. 
							  Fusce condimentum nunc ac nisi vulputate fringilla. 
							  Donec lacinia congue felis in faucibus.</p>
							  <a href="#">Reply</a>
							</div>
						  </li>
						  <li class="media">
							<div class="media-left">
							  <a href="#">
								<span class="glyphicon glyphicon-user"></span>
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading">Sandra Rickon</h4>
							  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus 
							  scelerisque ante sollicitudin commodo. Cras purus odio, 
							  vestibulum in vulputate at, tempus viverra turpis. 
							  Fusce condimentum nunc ac nisi vulputate fringilla. 
							  Donec lacinia congue felis in faucibus.</p>
							  <a href="#">Reply</a>
							</div>
						  </li>
						  <li class="media">
							<div class="media-left">
							  <a href="#">
								<span class="glyphicon glyphicon-user"></span>
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading">Rita Rider</h4>
							  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus 
							  scelerisque ante sollicitudin commodo. Cras purus odio, 
							  vestibulum in vulputate at, tempus viverra turpis. 
							  Fusce condimentum nunc ac nisi vulputate fringilla. 
							  Donec lacinia congue felis in faucibus.</p>
							  <a href="#">Reply</a>
							</div>
						  </li>
						</ul>
					</div>
					
				</div>
			</div>
			<div class="sing-img-text-left">
				<div class="blog-right1">
					<div class="search11">
						<h3>Newsletter</h3>
						<form>
							<input type="text" value="Email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}" required="">
							<input type="submit" value="Subscribe">
						</form>
					</div>
					<div class="categories">
						<h3>Categories</h3>
						<ul>
							<li><a href="#">Aliquam dapibus tincidunt</a></li>
							<li><a href="#">Donec sollicitudin molestie</a></li>
							<li><a href="#">Fusce feugiat malesuada odio</a></li>
							<li><a href="#">Cum sociis natoque penatibus</a></li>
							<li><a href="#">Magnis dis parturient montes</a></li>
							<li><a href="#">Donec sollicitudin molestie</a></li>
						</ul>
					</div>
					<div class="categories categories-mid">
						<h3>Archives</h3>
						<ul>
							<li><a href="#">May 20,2009</a></li>
							<li><a href="#">July 31,2010</a></li>
							<li><a href="#">January 20,2012</a></li>
							<li><a href="#">November 2,2012</a></li>
							<li><a href="#">December 25,2014</a></li>
							<li><a href="#">January 14,2015</a></li>
						</ul>
					</div>
									</div>
			</div>
			<div class="clearfix"> </div>
			<div class="leave-a-comment">
				<h3>Leave your comment Here</h3> 
				<form>
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="text" value="Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone Number';}" required="">
					<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type Your Comment here...';}" required="">Type Your Comment here...</textarea>
					<input type="submit" value="Add Comment">
				</form>
			</div>
		</div>
	</div>
<!-- /single -->   
	</div>
</div> 

<!-- footer -->
<!---728x90--->
<div class="footer">
	<div class="container">
		<h2><a href="index.php">Sharify</a></h2>
		<div class="footer-grids">
			<div class="col-md-3 footer-grid">
				<h3>KEEP IN TOUCH</h3>
				<ul>
					<li><a href="#">Facebook</a></li>
					<li><a href="#">Twitter</a></li>
					<li><a href="#">Behance</a></li>
					<li><a href="#">Dribbble</a></li>
					<li><a href="#">Vimeo</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h3>SITES</h3>
				<ul>
					<li><a href="#">Tumblr</a></li>
					<li><a href="#">Pinterest</a></li>
					<li><a href="#">Linkedin</a></li>
					<li><a href="#">Email</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid special-icons">
				<h3>LIKE</h3>
				<ul>
					<li><a href="#" class="fb">Facebook</a></li>
					<li><a href="#" class="twitt">Twitter</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h3>COPYRIGHT</h3>
				<p> &copy; 2015 Sharify. All Rights Reserved | Design  by <a href="http://w3layouts.com/" target="target_blank">W3layouts</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- js -->
		 <script src="js/bootstrap.js"></script>
	<!-- js -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->


<div id = "v-w3layouts"></div><script>(function(v,d,o,ai){ai=d.createElement('script');ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, 'http://a.vdo.ai/core/v-w3layouts/vdo.ai.js');</script>
	</body>

<!-- Mirrored from p.w3layouts.com/demos/Sharify/web/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 00:45:08 GMT -->
</html>