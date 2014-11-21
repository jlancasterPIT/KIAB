<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
    <head>
  
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="content-script-type" content="text/javascript" />
        
        <title>Dashboard · KennelKloud</title>
        
        <link rel="stylesheet" type="text/css" href="/css/orange.css" media="screen, projection, tv" /><!-- Change name of the stylesheet to change colors (blue/red/black/green/brown/orange/purple) -->
        <!--[if lte IE 7.0]><link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen, projection, tv" /><![endif]-->
    <!--[if IE 8.0]>
      <style type="text/css">
        form.fields fieldset {margin-top: -10px;}
      </style>
    <![endif]-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Adding support for transparent PNGs in IE6: -->
    <!--[if lte IE 6]>
      <script type="text/javascript" src="js/ddpng.js"></script>
      <script type="text/javascript">
        DD_belatedPNG.fix('#nav #h-wrap .h-ico');
        DD_belatedPNG.fix('.ico img');
        DD_belatedPNG.fix('.msg p');
        DD_belatedPNG.fix('table.calendar thead th.month a img');
        DD_belatedPNG.fix('table.calendar tbody img');
      </script>
    <![endif]-->
    <script type="text/javascript">
      $(document).ready(function() {
          // Search input text handling on focus
          var $searchq = $("#search-q").attr("value");
            $('#search-q.text').css('color', '#999');
          $('#search-q').focus(function(){
            if ( $(this).attr('value') == $searchq) {
              $(this).css('color', '#555');
              $(this).attr('value', '');
            }
          });
          $('#search-q').blur(function(){
            if ( $(this).attr('value') == '' ) {
              $(this).attr('value', $searchq);
              $(this).css('color', '#999');
            }
          });
        // Switch categories
          $('#h-wrap').hover(function(){
              $(this).toggleClass('active');
              $("#h-wrap ul").css('display', 'block');
            }, function(){
              $(this).toggleClass('active');
              $("#h-wrap ul").css('display', 'none');
          });
        // Handling with tables (adding first and last classes for borders and adding alternate bgs)
        $('tbody tr:even').addClass('even');
          $('table.grid tbody tr:last-child').addClass('last');
          $('tr th:first-child, tr td:first-child').addClass('first');
          $('tr th:last-child, tr td:last-child').addClass('last');
          $('form.fields fieldset:last-child').addClass('last');
        // Handling with lists (alternate bgs)
          $('ul.simple li:even').addClass('even');
        // Handling with grid views (adding first and last classes for borders and adding alternate bgs)
          $('.grid .line:even').addClass('even');
          $('.grid .line:first-child').addClass('firstline');
          $('.grid .line:last-child').addClass('lastline');
        // Tabs switching
          $('#box1 .content#box1-grid').hide(); // hide content related to inactive tab by default
          $('#box1 .header ul a').click(function(){
            $('#box1 .header ul a').removeClass('active');
            $(this).addClass('active'); // make clicked tab active
            $('#box1 .content').hide(); // hide all content
            $('#box1').find('#' + $(this).attr('rel')).show(); // and show content related to clicked tab
            return false;
          });
      });
    </script>
    
    </head>
    <body>

    <div id="header">
      <div class="inner-container clearfix">
        <h1 id="logo">
          <a class="home" href="#" title="Go to admin's homepage">
            KennelKloud <!-- your title -->
            <span class="ir"></span>
          </a><br />
          <a class="button" href="http://www.kennelkloud.com">visit site&nbsp;»</a>
        </h1>
        <div id="userbox">
          <div class="inner">
            <strong>Admin</strong>
            <ul class="clearfix">
              <!-- <li><a href="#">profile</a></li> -->
              <li><a href="/admin/companydetails.html">settings</a></li>
            </ul>
          </div>
          <a id="logout" href="/admin/logout">log out<span class="ir"></span></a>
        </div><!-- #userbox -->
      </div><!-- .inner-container -->
    </div><!-- #header -->
        <div id="nav">
      <div class="inner-container clearfix">
        <div id="h-wrap">
          <div class="inner">
            <h2>
              <span class="h-ico ico-dashboard"><span>Dashboard</span></span>
              <span class="h-arrow"></span>
            </h2>
            <ul class="clearfix">
              <!-- Admin sections - feel free to add/modify your own icons are located in "/css/img/h-ico/*" -->
              <li><a class="h-ico ico-edit" href="/admin/"><span>Homepage</span></a></li>
              <!--<li><a class="h-ico ico-comments" href="/admin/cmsspots.html"><span>Edit Web Content</span></a></li>-->
              <li><a class="h-ico ico-media" href="/admin/imagerotater.html"><span>Images</span></a></li>
              <li><a class="h-ico ico-syndication" href="/admin/reports.html"><span>Reports</span></a></li>
              <li><a class="h-ico ico-send" href="/admin/newsletter.html"><span>Newsletter</span></a></li>
              <li><a class="h-ico ico-cash" href="/admin/affiliate.html"><span>Offers / Promos</span></a></li>
              <li><a class="h-ico ico-color" href="/admin/cmsspots.html"><span>Appearance</span></a></li>
              <li><a class="h-ico ico-users" href="/admin/ownerlookup.html"><span>Clients</span></a></li>
              <li><a class="h-ico ico-advanced" href="/admin/companydetails.html"><span>Settings</span></a></li>
            </ul>
          </div>
        </div><!-- #h-wrap -->
        <form action="" method="post"><!-- Search form -->
          <fieldset>
            <label class="a-hidden" for="search-q">Search query:</label>
            <input id="search-q" class="text fl" type="text" name="search-q" size="20" value="search&hellip;" />
            <input class="hand fr" type="image" src="/css/img/search-button.png" alt="Search" />
          </fieldset>
        </form>
      </div><!-- .inner-container -->
        </div><!-- #nav -->
    <div id="container">
      <div class="inner-container">