      <!-- Jumbotron -->
      <div class="jumbotron">
        <div class="row">
        	<div class="col-md-3">
        		<h3 class="text-muted">
              <div id="dogPictures" class="dogPicImages">
              <?php foreach($imgRotater->result() as $image) { ?>
                <img class="dogPicImages" src="<?php echo $image->imagePath; ?>"  />
              <?php } ?>
            </div>  
            </h3>
        	</div>
        	<div class="col-md-2">
        	&nbsp;
        	</div>
        	<div class="col-md-7">
        		<h1><span style="color: #CC3204">Double Hydrant</span></h1>
            <h2><i><span style="color: #CC3204;">Bed & Biscuits</span></i></h2>
        	        <p class="lead"><?php echo $cms_spots['homepage_top']; ?></p>
        	        <p><a class="btn btn-lg btn-success" href="/reservation.html">Make a Reservation Today!</a></p>
        	</div>
        </div>         
      </div>

      <?php if($clientConfig['clientTestimonals'] == '1') { 
      $i = 1;
      ?>
      <div id="clientTestimonials" style="position: relative; overflow: hidden;">
        <?php
        foreach ( $clientTestimonials->result() as $clientT ) { ?>
        <div class="row" id="client<?php echo $i; ?>" style="display: none;">
          <div class="col-md-2">
          &nbsp;
          </div>
          <div class="col-md-8">
            <div class="row" align="center">
              <div class="col-md-1">
              &nbsp;
              </div>
              <div class="col-md-4" align="center">
                <p><img src="<?php echo $clientT->pictureLocation; ?>" width="175px;"/></p>
              </div>
              <div class="col-md-6" align="center">
                <b>Client Testimonials</b><br /><br />
                <i>"<?php echo $clientT->text; ?>"</i> - <b><?php echo $clientT->name;?></b>
              </div>
              <div class="col-md-1">
              &nbsp;
              </div>
            </div>
          </div>
          <div class="col-md-2">
          &nbsp;
          </div>
        </div>
        <?php $i++; } ?>
      </div>
      <br /><br />
      <?php } ?>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
        &nbsp;
        </div>
        <div class="col-md-5">
          <h1><span style="color: #CC3204">Stay!</span></h1>
          <p><?php echo $cms_spots['first_selling_point']; ?></p>
          <p><a class="btn btn-primary" href="/aboutus.html">Learn More &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <img src="img/dog sleeping in bed.jpg" style="width: 350px;" />
        </div>
        <div class="col-md-1">
        &nbsp;
        </div>
      </div>
	    <div class="row">
        <div class="col-md-2">
        &nbsp;
        </div>
        <div class="col-md-4">
          <img style="width: 350px;" src="img/logo.png" />
        </div>
        <div class="col-md-5">
          <h1>Play!</h1>
          <p><?php echo $cms_spots['second_selling_point']; ?></p>
          <p><a class="btn btn-primary" href="/play.html">Learn More &raquo;</a></p>
        </div>
        <div class="col-md-1">
        &nbsp;
        </div>
       </div>
       <div class="row">
        <div class="col-md-2">
        &nbsp;
        </div>
        <div class="col-md-5">
          <h1>Enjoy!</h1>
          <p><?php echo $cms_spots['third_selling_point']; ?></p>
          <p><a class="btn btn-primary" href="/reservation.html">Reserve a room &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <img src="img/dog with a heart.png" style="width: 250px;" />
        </div>
        <div class="col-md-1">
        &nbsp;
        </div>
      </div>
