<div class="main">

    <div class="container">

      <div class="row">

      	<div class="col-md-12">

      		<div class="widget stacked">

      		<?php if($this->session->flashdata('message')) { ?>
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">&#215;</a>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php } ?>
      			<div class="widget-header">
					<i class="icon-tasks"></i>
					<h3>Client Testimonials</h3>
				</div> <!-- /.widget-header -->

				<div class="widget-content">

					<form action="/admin/addclient" role="form" class="form-horizontal col-md-7" method="post" enctype="multipart/form-data">


						<div class="form-group">
							<label class="col-md-4">Name</label>
							<div class="col-md-8">
								<input type="text" name="name" value="" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Testimonial</label>
							<div class="col-md-8">
								<textarea name="text" class="form-control" rows="3"></textarea>
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<label class="col-md-4">Picture</label>
							<div class="col-md-8">
								<input type="file" name="pictureLocation" title="Search for picture" style="padding-bottom: 45px;" class="form-control" />
							</div>
						</div> <!-- /.form-group -->

						<input type="submit" name="add_testimonial" class="form-control" value="Add Client Testimonial!"/>

					</form>

					<table style="margin-top: 350px;" class="table table-striped">
						<thead>
							<th>Name</th>
							<th>Text</th>
							<th>Delete</th>
						</thead>
						<tbody>
						<?php foreach($clientTestimonials->result() as $clientT) {
							echo "<tr>";
							echo "<td>".$clientT->name."</td><td>".$clientT->text."</td><td><a href='/admin/deleteclient?id=".$clientT->id."'><img height='45px;' src='/img/delete.png' /></a></td>";
							echo "</tr>";
						} ?>
						</tbody>
					</table>

				</div> <!-- /.widget-content -->

			</div> <!-- /.widget -->

      	</div> <!-- /.col-md-12 -->


      </div> <!-- /.row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->