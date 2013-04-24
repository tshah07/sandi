<div class="container">

	<!-- For form notification weather or not data got submitted , if submitted then what is response -->

	
	<div id="formResponse" class="alert alert-success">
		<button id="formResponseButton" type="button" class="close" data-dismiss="alert"></button>
		<span id="formResponseText"></span>
	</div>

<!-- End For form notification weather or not data got submitted , if submitted then what is response -->




	<a href="<?= base_url();?>index.php/admin/branch" role="button" class="btn" >Branches</a>


	
	
	<!-- Button to trigger modal -->
	<a href="#addBookModal" role="button" class="btn" data-toggle="modal">Add A New Book</a>

	<!-- Add New BookModal -->
	<div id="addBookModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				x
			</button>
			<h3 id="myModalLabel">Add New Book</h3>
		</div>
		<div id="modal-body" class="modal-body">

			<!-- Add Books Form Start    -->
			<form id="addBook" class="form-horizontal" method="get" action="<?= base_url() ?>index.php/admin/addBook">

				<div class="control-group">
					<label class="control-label" for="inputTitle">Title</label>
					<div class="controls">
						<input class="required" name="title" type="text" id="inputTitle" placeholder="Book Title">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputIsbn">ISBN</label>
					<div class="controls">
						<input name="isbn" type="text" id="inputIsbn" placeholder="ISBN">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputAuthor">Author Name</label>
					<div class="controls">
						<input name="author" type="text" id="inputAuthor" placeholder="Author Name">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPublisher">Publisher Name</label>
					<div class="controls">
						<input name="publisher" type="text" id="inputPublisher" placeholder="Publisher">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input name="numberOfBooks" type="text" id="inputNumberOfBooks" placeholder="Number Of Books">
						<input name="position" type="text" id="inputPosition" placeholder="Position In Library">

					</div>
				</div>

				<!-- Date Script -->
				<script>
					$(function() {
						$("#publishDate").datepicker({
							dateFormat : "yy-mm-dd"
						});
					});
				</script>
				<div class="control-group">
					<label class="control-label" for="publishDate">Publish Date</label>
					<div class="controls">
						<input type="text" id="publishDate" name="publishDate" />
					</div>
				</div>
				<!--End Date Script -->

				<!-- Auto Suggest for branch -->
				<div class="control-group">

					<script>
						$(function() {

							$("#InputBranchId").autocomplete({
								source : 'http://localhost:70/sandi/index.php/admin/searchBranchId',
							})

						});
					</script>

					<form method="get">
						<label class="control-label" for="InputBranchId">Branch Id</label>
						<div class="controls">

							<input name ="branchId"type="text" id="InputBranchId" placeholder="Branch Id">
						</div>
					</form>

				</div>

				<!-- Auto Suggest for branch -->

				<div class="modal-footer">
					<button  class="btn" data-dismiss="modal" aria-hidden="true">
						Cancel
					</button>

					<a id="addBookButton" class='btn btn-primary' data-loading-text="Adding..." href="#">Add Book</a>

				</div>
			</form>

			<script>
				$(function() {
					$('#addBookButton').on('click', function(e) {
					// We don't want this to act as a link so cancel the link action
					e.preventDefault();
					$(this).button('loading');
					// Find form and submit it
					$('#addBook').submit();
					$(this).button('reset');
					});
	
					// Since we want both pressing 'Enter' and clicking the button to work
					// We'll subscribe to the submit event, which is triggered by both
	
					$('#addBook').on('submit', function() {
	
					//Serialize the form and post it to the server
					$.post("<?= base_url();?>index.php/admin/addBook", $(this).serialize(), function() {
	
						// When this executes, we know the form was submitted
	
						// To give some time for the animation,
						// let's add a delay of 200 ms before the redirect
	
						// var delay = 2000;
						// setTimeout(function() {
						// $("#modal-body").html('Success');
						// }, delay);
	
						// Hide the modal
						$("#formResponseButton").text("x");
						$("#formResponseText").text("Book Added");
						$("#formResponse").show();
						
						$("#addBookModal").modal('hide');
	
						});
	
						// Stop the normal form submission
							return false;
							});
					});
			</script>

			<!-- Add Books Form end          -->
		</div>

	</div>
	
	
	
	
	
	
	
	
	
	
	

</div>