<div class="container">

	<script>
		$(function() {

			$("#search").autocomplete({
				source : 'http://localhost:8080/sandi/index.php/reader/searchBooks',
			})

		});
	</script>
	<div>

		<form class="form-search" method="get">
			<input type="text" id="search" class="input-xxlarge search-query" placeholder="Search For Books">
			<button type="submit" class="btn">
				Search
			</button>
		</form>
	</div>
</div>