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
					<h3>Current CMS Spots</h3>
				</div> <!-- /.widget-header -->

				<div class="widget-content">

					<table class="table table-striped">
						<thead>
							<th>Name</th>
							<th>Text</th>
							<th>Page</th>
							<th>Edit</th>
						</thead>
						<tbody>
						<?php foreach($clientTestimonials->result() as $clientT) {
							//echo "<pre>"; var_dump($clientT); die();
							echo "<tr>";
							echo "<td>".$clientT->key."</td>";
							echo "<td>".$clientT->data."</td>";
							echo "<td>".$clientT->page."</td>";
							echo "<td><a data-toggle='modal' href='#editModal'><i class='icon-edit'></i></a></td>";							
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
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Edit CMS Spot</h4>
			</div>
			<div class="modal-body">
				<p>Testing</p>
			</div>
		</div>
	</div>
</div>