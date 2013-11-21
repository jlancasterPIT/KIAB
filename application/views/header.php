<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $clientConfig['title']; ?></title>
<script type="javascript/text" src="js/bootstrap.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/js/html5shiv.js"></script>
  <script src="/js/respond.min.js"></script>
<![endif]-->
<style>
body {
  background-image:url('img/background.png');
}

.footer {
  border-top: 1px solid #eee;
  margin-top: 40px;
  padding-top: 40px;
  padding-bottom: 40px;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  background-color: transparent;
}
.jumbotron .btn {
  font-size: 21px;
  padding: 14px 24px;
}

/* Customize the nav-justified links to be fill the entire space of the .navbar */

.nav-justified {
  background-color: #eee;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.nav-justified > li > a {
  padding-top: 15px;
  padding-bottom: 15px;
  color: #777;
  font-weight: bold;
  text-align: center;
  border-bottom: 1px solid #d5d5d5;
  background-color: #e5e5e5; /* Old browsers */
  background-repeat: repeat-x; /* Repeat the gradient */
  background-image: -moz-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%); /* FF3.6+ */
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f5f5), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
  background-image: -webkit-linear-gradient(top, #f5f5f5 0%,#e5e5e5 100%); /* Chrome 10+,Safari 5.1+ */
  background-image: -ms-linear-gradient(top, #f5f5f5 0%,#e5e5e5 100%); /* IE10+ */
  background-image: -o-linear-gradient(top, #f5f5f5 0%,#e5e5e5 100%); /* Opera 11.10+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */
  background-image: linear-gradient(top, #f5f5f5 0%,#e5e5e5 100%); /* W3C */
}
.nav-justified > .active > a,
.nav-justified > .active > a:hover,
.nav-justified > .active > a:focus {
  background-color: #ddd;
  background-image: none;
  box-shadow: inset 0 3px 7px rgba(0,0,0,.15);
}
.nav-justified > li:first-child > a {
  border-radius: 5px 5px 0 0;
}
.nav-justified > li:last-child > a {
  border-bottom: 0;
  border-radius: 0 0 5px 5px;
}

@media (min-width: 768px) {
  .nav-justified {
    max-height: 72px;
  }
  .nav-justified > li > a {
    border-left: 1px solid #fff;
    border-right: 1px solid #d5d5d5;
  }
  .nav-justified > li:first-child > a {
    border-left: 0;
    border-radius: 5px 0 0 5px;
  }
  .nav-justified > li:last-child > a {
    border-radius: 0 5px 5px 0;
    border-right: 0;
  }
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .masthead,
  .marketing,
  .footer {
    padding-left: 0;
    padding-right: 0;
  }
}

.nav-icon {
	width: 40px;
}

.btn-primary,
.btn-success {
  background-color: #CC3204;
  border-color: #CC3204;
  color: #FFFFFF;
}

h1 {
  color: #CC3204;
}

.container {
  -webkit-box-shadow: 2px 2px 4px 1px #fff;
    box-shadow: 2px 2px 4px 1px #fff;
    background-color: white;
}
.image {
  height: 250px;
}
.image img
{
  -moz-border-radius: 15px;
  border-radius: 15px;
  border: 5px;
  border-color: black;
  
  top:0;
  left:0;
  width: 430px;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
<link rel="stylesheet" href="css/li-scroller.css" type="text/css" media="screen" /> 
<script>
  $(function(){
    $("ul#thankyous").liScroll();
    $("ul#thankyou2").liScroll();

    $('.image img:gt(0)').hide(); // to hide all but the first image when page loads

    setInterval(function()
    {
        $('.image :first-child').hide()
            .next().show().end().appendTo('.image');

        if($('#client1').is(':visible')) {
          $("#client1").hide();
          $("#client2").show();
        } else {
          $("#client2").hide();
          $("#client1").show();
        }
    },5000);  

    setInterval(function()
    {
        if($('#client1').is(':visible')) {
          $("#client1").hide();
          $("#client2").show();
        } else {
          $("#client2").hide();
          $("#client1").show();
        }
    },3500);  
  });
</script>
</head>
<body style="background-color: grey">
    <div class="container">
    <?php if($clientConfig['facebook'] == '1') { ?>
      <br />
      <div style="float: left;">
        <a target="_blank" href="<?php echo $clientConfig['facebook_url']; ?>"><img style="width: 75px;" src="img/facebook.png" /></a>
      </div>
    <?php } ?>
    <div style="float: right;">
      <p style="color: #CC3204; font-size: 22px;">Hours</p>
      <p><?php echo $clientConfig['hours']; ?></p>
    </div>
    <br /><br /><br /><br />
      <div class="masthead">
	<?php

		$indexActive = "";
		$resActive   = "";
		$aboutActive = "";
		$contactActive = "";
		$meetteamActive = "";

		switch($page) {
			case 'index':
				$indexActive = "active";
				break;
			case 'reservation':
				$resActive = "active";
				break;
			case 'aboutus':
				$aboutActive = "active";
				break;
			case 'contactus':
				$contactActive = "active";
				break;
      case 'meettheteam':
        $meetteamActive = "active";
        break;
			default:
				$indexActive = "active";
				break;
		}
	?>
        <ul class="nav nav-justified">
          <li class="<?php echo $indexActive;?>">
      		  <a href="/"><img class="nav-icon" src="img/bone.png" />&nbsp;&nbsp;Home</a>
      	  </li>
          <li class="<?php echo $resActive; ?>">
      		  <a href="reservation.html"><img class="nav-icon" src="img/bone.png" />&nbsp;&nbsp;Reservation</a>
      	  </li>
          <li class="<?php echo $aboutActive; ?>">
      		  <a href="aboutus.html"><img class="nav-icon" src="img/bone.png" />&nbsp;&nbsp;About</a>
      	  </li>
          <li class="<?php echo $meetteamActive; ?>">
            <a href="meettheteam.html"><img class="nav-icon" src="img/bone.png" />&nbsp;&nbsp;Our Team</a>
          </li>
      	  <li class="<?php echo $contactActive; ?>">
      		  <a href="contact.html"><img class="nav-icon" src="img/bone.png" />&nbsp;&nbsp;Contact</a>
      	  </li>
        </ul>
      </div>
