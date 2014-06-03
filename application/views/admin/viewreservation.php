<div class="main">

    <div class="container">

      <div class="row">

      	<div class="col-md-12">

      		<div class="widget stacked">
      			<div class="widget-header">
					<i class="icon-tasks"></i>
					<h3>Reservation</h3>
				</div> <!-- /.widget-header -->

				<div class="widget-content">
					<form action="/admin/updatecompany" role="form" class="form-horizontal col-md-7">


						<div class="form-group">
							<label class="col-md-4">Drop Off Date</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->dropOffDate;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Pick Up Date</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->pickUpDate;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Number Of Dogs</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->numOfDogs;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Dog Name</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->dogName;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Dog Age</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->dogAge;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Dog Breed</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->dogBreed;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Client Name</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->clientName;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Client Email</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->clientEmail;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Client Phone Number</label>
							<div class="col-md-8">
								<input type="text" name="hours" value="<?php echo $reservation->clientPhone;?>" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

					</form>
				</div> <!-- /.widget-content -->

			</div> <!-- /.widget -->

      	</div> <!-- /.col-md-12 -->


      </div> <!-- /.row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->