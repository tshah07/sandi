
<div class="container">
	
	<table class="table table-striped">
		<thead>
			<th>Book Id</th>
			<th>Book Title</th>
			<th>Author</th>
			<th>ISBN</th>
			<th>Publisher</th>
			<th>Publisher date</th>
			<th>Reserve</th>
		</thead>
		
		<tbody>
			<?php foreach($books as $book) :?>
				
			<tr>
				<td><?= $book['bookId'] ?></td>
				<td><?= $book['title'] ?></td>
				<td><?= $book['author'] ?></td>
				<td><?= $book['isbn'] ?></td>
				<td><?= $book['publisher'] ?></td>
				<td><?= $book['publishDate'] ?></td>
				<td><a href="<?= base_url()?>index.php/reader/reserve?bookId=<?= $book['bookId']?>&readerId=<?= $readerId?>"role="button" class="btn btn-primary" >Reserve</a></td>
				
				
				<td></td>
			</tr>
			
			<?php endforeach; ?>
		</tbody>
	</table>
</div>