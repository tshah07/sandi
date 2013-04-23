<div class="container">
	<div class="well well-small">
		<address>
		  <strong><?= $books[0]['name'] ?></strong>
		  <br><?= $books[0]['location'] ?><br>
	  
	</address>
	</div>
	
	<table class="table table-striped">
		<thead>
			<th>Book Id</th>
			<th>Book Title</th>
			<th>Author</th>
			<th>ISBN</th>
			<th>Publisher</th>
			<th>Publisher date</th>
			<th>Postion</th>
			<th>Total</th>
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
				<td><?= $book['position'] ?></td>
				<td><?= $book['numberOfBooks'] ?></td>
				
				<td></td>
			</tr>
			
			<?php endforeach; ?>
		</tbody>
	</table>
	
	
	
</div>