<?php
session_start(); // demarrer la session
if (!empty($_SESSION['id'])) { // si l'utilisateur est connecté
    $username = $_SESSION['username'];
    require('app/functions.php'); // importer les fonctions
    $req = last(); // executer la fonction de récuperation des 20 derniers projets partagé
	$nav = '<a href="index.php" class="active">Accueil</a>
	<a href="all.php">Appartements</a>
	<a href="add.php">Ajouter</a>
	<a href="my_projects.php">Mes appartements</a>
	
	<a href="logout.php">Déconnexion</a>';
} else {
    // si l'utilisateur n'est pas connecté
	require('app/functions.php'); // importer les fonctions
	$req = last(); // executer la fonction de récuperation des 20 derniers projets partagé
    $nav = '<a href="index.php" class="active">Accueil</a>
	
	<a href="login.php">Se connecter</a>';
}

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from p.w3layouts.com/demos/Sharify/web/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 00:41:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Sharify | Home</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sharify Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="public/css/lightbox.css" type="text/css" media="all" />
<link href="public/css/component.css" rel="stylesheet" type="text/css"  />
<script src="public/js/modernizr.custom.js"></script>
<!-- js -->
<script src="public/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="public/js/move-top.js"></script>
		<script type="text/javascript" src="public/js/easing.js"></script>
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
<script async src='https://p.w3layouts.com/public/js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="https://p.w3layouts.com/assests/public/css/font-awesome.min.css">
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
					<button id="showLeftPush"><img src="public/images/menu.png" alt=""></button>
		   </section>
			<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<h3>Menu</h3>
						<?php echo $nav;?>
				<ul class="social-icons text-center">
					<li><a href="#" class="f1"></a></li>
					<li><a href="#" class="f2"></a></li>
					<li><a href="#" class="f3"></a></li>
					<li><a href="#" class="f4"></a></li>
				</ul>
		  </nav>
		  
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="public/js/classie.js"></script>
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
<!-- banner -->
<div class="banner">
	<div class="logo">
		<h1><a href="index.php">SHARIFY</a></h1>
	</div>
	<div class="search-in">
			<div class="search" style="display: none;">
				<form method='GET' action='search.php'> 

<input type="text" class="text" name="search">
					<input type="submit" value="SEARCH">
				</form>
				<div class="close-in"><img src="public/images/close.png" alt=""></div>
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
	<div class="banner-info">
		<script src="public/js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
		<div id="top" class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-text">
							<h3>BIENVENUE A SHARIFY</h3>
							<h4>Des appartements pas chers et proches de chez vous</h4>
						</div>
					</li>
					<li>
						<div class="banner-text">
							<h3>BIENVENUE A SHARIFY</h3>
							<h4>Des meubles et décorations qui correspondent a vos désirs</h4>
						</div>
					</li>
					<li>
						<div class="banner-text">
							<h3>BIENVENUE A SHARIFY</h3>
							<h4>Inscrivez vous et profitez des maintenant ! </h4>
						</div>
					</li>
				</ul>
		</div>
	</div>
	<div class="scroll-button text-center"><a href="#hello" class="scroll"><img src="public/images/arr1.png" alt="" /></a></div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
<!---728x90--->

<div id="hello" class="banner-bottom">
	<div class="container">
		<div class="btm-header">
			<h3 class="tittle">HELLO!</h3>
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
			doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore 
			veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim eaque ipsa quae ab illo inventore 
			veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		</div>
		<div class="bottom-grids">
			<div class="col-md-6 bottom-grid">
				<div class="btm-left">
					<img src="public/images/aaa.png" alt="" />
				</div>
				<div class="btm-right">
					<h4>Aenean pulvinar</h4>
					<p>Nemo enim eaque ipsa quae ab illo inventore 
					veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					
					<div class="captn">
								
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 bottom-grid">
				<div class="btm-left">
					<img src="public/images/bbb.png" alt="" />
				</div>
				<div class="btm-right">
					<h4>Aenean pulvinar</h4>
					<p>Nemo enim eaque ipsa quae ab illo inventore 
					veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					
					<div class="captn">
								
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //banner-bottom -->
<!-- highest -->
<!---728x90--->

<!-- //highest -->
<!---728x90--->
<!-- collections -->
<div class="blog-section">
	<div class="container"> 
		<h3 class="tittle-three">Tendances</h3>
		<?php

function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}
            if ($req) {
                while ($line = $req->fetch()) {
                    $user = get_author($line['author_id']);
                    if($line['ville']=='ctn')
                        {
                            $line['ville']="Cotonou";
                        }

                        if($line['ville']=='pn')
                        {
                            $line['ville']="Porto-Novo";
                        }

                        if($line['ville']=='clv')
                        {
                            $line['ville']="Calavi";
                        }
                    
                    echo ('
              
				
					<div class="col-md-4 blog-post-grids">
					<div class="blog-post">
							<a href="single.html"><img src="'.$line['banner'].'" class="img-responsive" alt="  "/></a>
							<div class="text-pos">
								<a href="single.html"> '.$line['name'].'</a>
							</div>
							<div class="admin-tag">
							<p>Posted by <a href="single.html">'.$user['username'].'</a> | <a href="#">'.$line['ville'].'</a> | <a href="single.html">'.$line['price'].' XOF</a></p>
							<p class="erat">
							'.truncate($line['description'], 100).'
							</p>
							<a href="details.php?project='.$line['id'].'" class="hvr-shutter-in-horizontal button-more">Readmore<span> </span></a>
							</div>
					</div>
				
				</div>'
				);
                }
            }
            ?>
		
		<div class="clearfix"> </div>
	</div>
	<!--start-news-pagenate-->
	<!---728x90--->
				
			<!--//End-news-pagenate-->
	</div> 

<!-- collections -->
<!-- comfort -->
<div class="comfort">
	<div class="container">
		<h3 class="tittle-three">Nos Idées</h3>
		<div class="comfort-grids">
			<div class="col-md-4 comfort-grid">
				<div class="com-left">
					<p>01</p>
				</div>
				<div class="com-right">
					<h4>DESIGN</h4>
				</div>
				<div class="clearfix"></div>
				<p>Nemo enim eaque ipsa quae ab illo inventore 
					veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			</div>
			<div class="col-md-4 comfort-grid">
				<div class="com-left">
					<p>02</p>
				</div>
				<div class="com-right">
					<h4>RESULTATS</h4>
				</div>
				<div class="clearfix"></div>
				<p>Nemo enim eaque ipsa quae ab illo inventore 
					veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			</div>
			<div class="col-md-4 comfort-grid">
				<div class="com-left">
					<p>03</p>
				</div>
				<div class="com-right">
					<h4>SERVICES</h4>
				</div>
				<div class="clearfix"></div>
				<p>Nemo enim eaque ipsa quae ab illo inventore 
					veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //comfort -->
<!-- footer -->
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
		 <script src="public/js/bootstrap.js"></script>
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

<!-- Mirrored from p.w3layouts.com/demos/Sharify/web/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 00:43:21 GMT -->
</html>