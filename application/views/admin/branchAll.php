<div class="container">
	<table class="table table-striped">
		<thead>
			<th>Branch Id</th>
			<th>Name</th>
			<th>Location</th>
			<th></th>
		</thead>
		
		<tbody>
			<?php foreach($branches as $branch) :?>
				
			<tr>
				<td><?= $branch['branchId'] ?></td>
				<td><?= $branch['name'] ?></td>
				<td><?= $branch['location'] ?></td>
				<td><a href="<?= base_url()?>index.php/admin/branchDetails?branchId=<?= $branch['branchId'] ?>" role="button" class="btn" >Details</a></td>
			</tr>
			
			<?php endforeach; ?>
			
		</tbody>
	</table>
	
	
	
</div>