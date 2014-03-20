<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Double Hydrant :: Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">        
    
    <link href="/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="/css/base-admin-3.css" rel="stylesheet">
    <link href="/css/base-admin-3-responsive.css" rel="stylesheet">
    
    <link href="/css/pages/dashboard.css" rel="stylesheet">   

    <link href="/css/custom.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.file-input.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="javascript">
      $( document ).ready(function() {
        $('input[type=file]').bootstrapFileInput();
      });
    </script>
  </head>

<body>

<nav class="navbar navbar-inverse" role="navigation">

  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon-cog"></i>
    </button>
    <a class="navbar-brand" href="/index.html">Double Hydrant - Admin</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
      <!-- <li class="dropdown">
            
      <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-cog"></i>
        Settings
        <b class="caret"></b>
      </a>
      
      <ul class="dropdown-menu">
        <li><a href="/account.html">Account Settings</a></li>
        <li class="divider"></li>
        <li><a href="javascript:;">Help</a></li>
      </ul>
      
    </li>-->

    <li class="dropdown">
            
      <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-user"></i> 
        <?php echo $username; ?>
        <b class="caret"></b>
      </a>
      
      <ul class="dropdown-menu">
        <li><a href="javascript:;">My Profile</a></li>
        <li class="divider"></li>
        <li><a href="/admin/logout/">Logout</a></li>
      </ul>
      
    </li>
    </ul>
    
    <!-- <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control input-sm search-query" placeholder="Search">
      </div>
    </form>-->
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>    
<div class="subnavbar">

  <div class="subnavbar-inner">
  
    <div class="container">
      
      <a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
          <span class="sr-only">Toggle navigation</span>
          <i class="icon-reorder"></i>
          
        </a>

      <div class="collapse subnav-collapse">
        <ul class="mainnav">
        
          <li class="<?php echo $homeActive; ?>">
            <a href="/admin/">
              <i class="icon-home"></i>
              <span>Home</span>
            </a>              
          </li>
          
          
          <li class="dropdown <?php echo $mycontent; ?>">         
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-th"></i>
              <span>Modify Content</span>
              <b class="caret"></b>
            </a>
          
            <ul class="dropdown-menu">
              <li><a href="/admin/companydetails.html">Company Details</a></li>
              <li><a href="/admin/clienttest.html">Client Testimonials</a></li>
              <li><a href="/admin/imagerotater.html">Homepage Image Rotation</a></li>
              <li><a href="/admin/cms_spots.html">Modify CMS Spots</a></li>
              <!--<li><a href="/forms.html">Form Styles</a></li>
              <li><a href="/jqueryui.html">jQuery UI</a></li>
              <li><a href="/charts.html">Charts</a></li>
              <li><a href="/popups.html">Popups/Notifications</a></li>-->
            </ul>         
          </li>
          
          <!--
          <li class="dropdown">         
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-copy"></i>
              <span>Sample Pages</span>
              <b class="caret"></b>
            </a>      
          
            <ul class="dropdown-menu">
              <li><a href="/pricing.html">Pricing Plans</a></li>
              <li><a href="/faq.html">FAQ's</a></li>
              <li><a href="/gallery.html">Gallery</a></li>
              <li><a href="/reports.html">Reports</a></li>
              <li><a href="/account.html">User Account</a></li>
            </ul>         
          </li>
          
          <li class="dropdown">         
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-external-link"></i>
              <span>Extra Pages</span>
              <b class="caret"></b>
            </a>  
          
            <ul class="dropdown-menu">
              <li><a href="/login.html">Login</a></li>
              <li><a href="/signup.html">Signup</a></li>
              <li><a href="/error.html">Error</a></li>
              <li class="dropdown-submenu">
                  <a tabindex="-1" href="#">More options</a>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">Second level</a></li>

                    <li><a href="#">Second level</a></li>
                    <li><a href="#">Second level</a></li>
                  </ul>
                </li>
            </ul>           
          </li>
          -->
        
        </ul>
      </div> <!-- /.subnav-collapse -->

    </div> <!-- /container -->
  
  </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->