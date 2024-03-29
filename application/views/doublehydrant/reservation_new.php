      <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-datetimepicker.min.css" />
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
      
      <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

      <script type="text/javascript">
        function numDogs() {
          var numberOfDogs = $("#numOfDogs option:selected").val();
          if(numberOfDogs > 1) {
            $("#boardDog").show();
          } else {
            $("#boardDog").hide();
          }
        }
      </script>

      <style>
      .error {
        color: red;
        font-weight: bold;
      }
      </style>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <div class="row">
        	<div class="col-md-3">
        		<h3 class="text-muted"><img style="width: 375px; border-radius: 15px; border: 5px none black; top: 0px; left: 0px; width: 430px;" src="img/reservation.jpg" /></h3>
        	</div>
        	<div class="col-md-2">
        	&nbsp;
        	</div>
        	<div class="col-md-7">
        		<h1><span style="color: #CC3204">Book a Stay!</span></h1>
      	        <p class="lead">Please fill out the form below to reserve a room for your pet!</p>
                <div class="row" style="font-size: 16px;" align="left">
                  <div class="col-md-12">

                    <?php echo form_open_multipart('reservation'); ?>

                      <div id="step1" style="display: block;">
                        <div class="form-group">
                          <label for="datetimepicker">Drop Off Date:</label>
                          <?php echo form_error('dropoff'); ?>
                          <div id="datetimepicker" class="input-append date">
                            <div class="col-md-3">
                              <input name="dropoff" class="form-control input-sm" type="text" readonly value="<?php echo set_value('dropoff'); ?>"></input>
                            </div>
                            <span class="add-on">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="datetimepicker2">Pick Up Date:</label>
                          <?php echo form_error('pickup'); ?>
                          <div id="datetimepicker2"  class="input-append date">
                            <div class="col-md-3">
                            <input name="pickup" class="form-control input-sm" type="text" readonly value="<?php echo set_value('pickup'); ?>"></input>
                            </div>
                            <span class="add-on">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="numOfDogs">Number of Dogs</label>
                          <select name="numOfDogs" id="numOfDogs" class="form-control" onchange="numDogs();">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                          <span id="boardDog" style="display: none;">
                            <label>Board dogs together? (MAX 2 PER RUN)</label>
                            <input type="checkbox" name="boardTogether" />
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="vaccineUpload">Vaccine Record Upload</label>
                          <p>Please inclue rabies, distemper and bordetella vaccinations</p>
                          <input type="file" name="file" id="file" />
                          <p class="help-block">Please scan your vaccine record and upload it.</p>
                        </div>
                      </div> <!-- End Step 1 -->
                      <div id="step2">
                        <div class="form-group">
                          <label>Dog(s) Name</label>
                          <?php echo form_error('dogName'); ?>
                          <input type="text" name="dogName" class="form-control" value="<?php echo set_value('dogName'); ?>"/>
                        </div>
                        <div class="form-group">
                          <label>Age(s)</label>
                          <?php echo form_error('dogAge'); ?>
                          <input type="text" name="dogAge" class="form-control" value="<?php echo set_value('dogAge'); ?>"/>
                        </div>
                        <div class="form-group">
                          <label>Breed(s)</label>
                          <?php echo form_error('dogBreed'); ?>
                          <input type="text" name="dogBreed" class="form-control" value="<?php echo set_value('dogBreed'); ?>"/>
                        </div>
                      </div><!-- end step 2 -->
                      <div id="step3">
                        <div class="form-group">
                          <label>Allergies</label>
                          <div id="allergies">
                            <label>List of Allergies</label><br />
                            <input type="text" name="allergyText" class="form-control" value="<?php echo set_value('allergyText'); ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Medications</label>
                          <div id="medications">
                            <label>What kind and how often?</label><br />
                            <input type="text" name="medicationText" class="form-control" value="<?php echo set_value('medicationText'); ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Flea Treatment</label>
                          <div id="flea">
                            <label>What brand and how often?</label><br />
                            <input type="text" name="fleaText" class="form-control" value="<?php echo set_value('fleaText'); ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Feeding Requirements</label>
                          <div id="food">
                            <label>How much and how often?</label><br />
                            <input type="text" name="foodText" class="form-control" value="<?php echo set_value('foodText'); ?>"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Special Instructions</label><br />
                          <input type="checkbox" name="treats" value="treats" />Treats?<br />
                          <input type="checkbox" name="walks" value="walks" />Walks?<br />
                          <input type="checkbox" name="dogparks" value="dogpark" />Dog Park?<br /> 
                          <input type="checkbox" name="playtime" value="playTime" />Play Time?<br />
                        </div>                        
                      </div><!-- end step 3 -->
                      <div id="step4">
                        <div class="form-group">
                          <label>Your Name</label><br />
                          <?php echo form_error('yourName'); ?>
                          <input type="text" name="yourName" class="form-control" value="<?php echo set_value('yourName'); ?>">
                        </div>
                        <div class="form-group">
                          <label>Your Phone Number</label><br />
                          <?php echo form_error('yourPhone'); ?>
                          <input type="text" name="yourPhone" class="form-control" value="<?php echo set_value('yourPhone'); ?>">
                        </div>
                        <div class="form-group">
                          <label>Your Email Address</label><br />
                          <?php echo form_error('yourEmail'); ?>
                          <input type="text" name="yourEmail" class="form-control" value="<?php echo set_value('yourEmail'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
        	</div>
        </div>        
      </div>

      <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'MM/dd/yyyy'
      });

      $('#datetimepicker2').datetimepicker({
        format: 'MM/dd/yyyy'
      });
      </script>
