<div class="box altbox"><!-- .altbox for alternative box's color -->
	<div class="boxin">
		<?php if($this->session->flashdata('message')) { ?>
			<div class="msg msg-ok">
				<p><?php echo $this->session->flashdata('message'); ?></p>
			</div>
		<?php } ?>
		<div class="header">
			<h3>Current CMS Spots</h3>
		</div> <!-- /.widget-header -->

		<div class="content">

			<table class="table table-striped">
				<thead>
					<th>Name</th>
					<th>Text</th>
					<th>Page</th>
					<th>Edit</th>
				</thead>
				<tbody>
				<?php foreach($clientTestimonials->result() as $clientT) {
					echo "<tr>";
					echo "<td>".$clientT->key."</td>";
					echo "<td>".$clientT->data."</td>";
					echo "<td>".$clientT->page."</td>";
					echo "<td><button>Modify</button></td>";
					echo "</tr>";
				} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>