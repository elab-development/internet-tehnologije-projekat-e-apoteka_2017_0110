<?php include("init.php");
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Apoteka</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

	
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
  <link href="lib/hover/hoverex-all.css" rel="stylesheet">
  <link href="lib/jetmenu/jetmenu.css" rel="stylesheet">
  <link href="lib/owl-carousel/owl-carousel.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">
	 <style type="text/css">
	img{
  	margin-top: 50px;
		margin-left: 10px;
	}
	#opisTeksta {
  margin-bottom: 2px;
	}
	#linkic {
		margin-top: 0;
	}
a {
    text-decoration:none;
    transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
    outline: none;
	color:#333;
}
a:hover {
	text-decoration: none;
	color:#3791eb;
	}
  </style>
  </head>
  <body>

  <?php include 'heder.php'; ?>
	<div class="features" style="padding-bottom:40px">
		<div class="container">
			<div class="text-left">
				<div  class="dm-icon-effect-1" data-effect="slide-bottom">
		<section class="intro-section spad col-12">
			<div class="container">
				<div class="row" style=" margin-left:40px;">
					<h2>Vesti</h2>
					<div id="outputDiv">
				</div>
			</div>
		</div>
	</section>
	</div>
</div>
</div>
</div>

<?php include 'footer2.php'; ?>




  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/functions.js"></script>
	<script>wow = new WOW({}).init();</script>
		<script>
		$( document ).ready(function() {
			$.getJSON('https://newsapi.org/v2/top-headlines?country=rs&category=health&apiKey=5a83b70ef93d4b65896d2b01995c03e8')
			.done(function(data) {
				var text = '';
				$.each(data.articles, function(i, val) {

						text += '<div class="col-lg-11 col-sm-12 col-md-12" style="border: 1px solid gray; border-radius: 5px; margin-bottom: 5px;">';
						text+='<div class=pull-right>';
						text+='<img src="'+val.urlToImage+'"height=100 width=130 style="padding-bottom: 10px; margin-right: 10px"></div>';
						text += '<h3>'+val.title+'</h3>';
						if(val.author != null){
							text += '<h6>'+val.author+'</h6>';
						}
						text += '<p id="opisTeksta" style="text-align: justify;">'+val.description+'</p>';
						text+='<a href="'+val.url+'" id="linkic">detaljnije</a>';
						if(val.publishedAt != null){
							text += '<h6>'+val.publishedAt+'</h6>';
						}
						text+='</div>';
						
						});

						$('#outputDiv').html(text);
			})
			.error(function(err) { console.log(err);
			});

		});

		</script>
</body>
</html>
