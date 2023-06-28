<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<h1 style="text-align:center;margin-top:25px;">List of posts</h1>
<?php if($message = Session::get('success')): ?>
	<div class="alert alert-success">
		<p><?php echo e($message); ?></p>
	</div>
<?php endif; ?>
<div class="pull-right mb-2">
	<a class="btn btn-success" href="<?php echo e(route('post.create')); ?>" style="margin-left:120px;"> Create New Post</a>
</div>
<div class="container">
	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-bordered user_datatable">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="30%">Name</th>
						<th>Discription</th>
						<th width="14%">Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	setTimeout(function() {
			$('.alert').fadeOut('fast');
		}, 3000);
  $(function () {
	var table = $('.user_datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: "<?php echo e(route('post.index')); ?>",
		columns: [
			{data: 'id', name: 'id'},
			{data: 'post_name', name: 'post_name'},
			{data: 'post_details', name: 'post_details'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});
  });
</script>
</html><?php /**PATH C:\xampp\htdocs\ByteTest\resources\views/post/post.blade.php ENDPATH**/ ?>