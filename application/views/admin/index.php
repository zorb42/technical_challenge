<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Procedo - Technical Challenge</title>
	<link rel="stylesheet" href="">

	<style>
		.btn{
			border-radius: 50px;
			font-size: 15px;
		}

		#messages{
			min-width: 1110px !important;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row-md-12">
			<div class="table-responsive">
				<table id="messages" class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Lucas</td>
							<td>Hello World</td>
							<td><button class="btn btn-danger" onclick="delete_message(this)"><i class="far fa-trash-alt"></i></button></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Murilo</td>
							<td>Message Message Message Messagev Message Message Message Message Message Message</td>
							<td><button class="btn btn-danger" onclick="delete_message(this)"><i class="far fa-trash-alt"></i></button></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Larissa</td>
							<td>Message Message Message Message Message Message Message Message Message Message Message Message Message</td>
							<td><button class="btn btn-danger" onclick="delete_message(this)"><i class="far fa-trash-alt"></i></button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>

<script>
	function delete_message(btn){
		document.getElementById('messages').deleteRow(btn.parentNode.parentNode.rowIndex);
	}
</script>