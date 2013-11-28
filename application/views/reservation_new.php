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

      <!-- Jumbotron -->
      <div class="jumbotron">
        <div class="row">
        	<div class="col-md-3">
        		<h3 class="text-muted"><img style="width: 350px;" src="img/dog_smiling.jpg" /></h3>
        	</div>
        	<div class="col-md-2">
        	&nbsp;
        	</div>
        	<div class="col-md-7">
        		<h1><span style="color: #CC3204">Book a Stay!</span></h1>
      	        <p class="lead">Please fill out the form below to reserve a room for your pet!</p>
                <div class="row" style="font-size: 16px;" align="left">
                  <div class="col-md-12">
                    <form role="form" action="/reservation.html" method="post" enctype="multipart/form-data">
                      <div id="step1" style="display: block;">
                        <div class="form-group">
                          <label for="datetimepicker">Drop Off Date:</label>
                          <div id="datetimepicker" class="input-append date">
                            <div class="col-md-3">
                              <input name="dropoff" class="form-control input-sm" type="text"></input>
                            </div>
                            <span class="add-on">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="datetimepicker2">Pick Up Date:</label>
                          <div id="datetimepicker2"  class="input-append date">
                            <div class="col-md-3">
                            <input name="pickup" class="form-control input-sm" type="text"></input>
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
                        <button class="btn btn-info" onclick="$('#step1').hide();$('#step2').show();return false;">Next -></button>
                      </div> <!-- End Step 1 -->
                      <div id="step2" style="display: none;">
                        <div class="form-group">
                          <label>Dog(s) Name</label>
                          <input type="text" name="dogName" class="form-control"/>
                        </div>
                        <div class="form-group">
                          <label>Age(s)</label>
                          <input type="text" name="dogAge" class="form-control"/>
                        </div>
                        <div class="form-group">
                          <label>Breed(s)</label>
                          <input type="text" name="dogBreed" class="form-control"/>
                        </div>
                        <button class="btn btn-info" onclick="$('#step2').hide();$('#step3').show();return false;">Next -></button>
                      </div><!-- end step 2 -->
                      <div id="step3" style="display: none;">
                        <div class="form-group">
                          <label>Allergies</label>
                          <input type="radio" name="allergies" value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="allergies" value="No" />No<br />
                          <div id="allergies">
                            <label>List of Allergies</label><br />
                            <input type="text" name="allergyText" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Medications</label>
                          <input type="radio" name="medications" value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="medications" value="No" />No<br />
                          <div id="medications">
                            <label>What kind and how often?</label><br />
                            <input type="text" name="medicationText" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Flea Treatment</label>
                          <input type="radio" name="flea" value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="flea" value="No" />No<br />
                          <div id="flea">
                            <label>What brand and how often?</label><br />
                            <input type="text" name="fleaText" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Feeding Requirements</label>
                          <input type="radio" name="food" value="Yes">Yes&nbsp;&nbsp;<input type="radio" name="food" value="No" />No<br />
                          <div id="food">
                            <label>How much and how often?</label><br />
                            <input type="text" name="foodText" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Special Instructions</label><br />
                          <input type="checkbox" name="treats" value="treats" />Treats?<br />
                          <input type="checkbox" name="walks" value="walks" />Walks?<br />
                          <input type="checkbox" name="dogparks" value="dogpark" />Dog Park?<br /> 
                          <input type="checkbox" name="playtime" value="playTime" />Play Time?<br />
                        </div>
                        <button class="btn btn-info" onclick="$('#step3').hide();$('#step4').show();return false;">Next -></button>
                      </div><!-- end step 3 -->
                      <div id="step4" style="display: none;">
                        <div class="form-group">
                          <label>Your Name</label><br />
                          <input type="text" name="yourName" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Your Phone Number</label><br />
                          <input type="text" name="yourPhone" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Your Email Address</label><br />
                          <input type="text" name="yourEmail" class="form-control">
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
