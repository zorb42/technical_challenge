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

		h1 {
			margin: 30px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row-md-12">
			<div class="title-page text-center">
				<h1>Check Answers</h1>
				<small><?= anchor('/', 'Back to homepage');?></small>
			</div>
			<div class="table-responsive">
				<table id="messages" class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Subject</th>
							<th>Message</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $dt): ?>
							<tr>
								<td><?= $dt->id ?></td>
								<td><?= $dt->name ?></td>
								<td><?= $dt->subject ?></td>
								<td><?= substr($dt->message, 0, 10)."..." ?></td>
								<td class="text-center">
									<button class="btn btn-primary" onclick="call_modal(<?=$dt->id?>)"><i class="far fa-eye"></i></button>
									<button class="btn btn-danger" onclick="delete_message(this, <?=$dt->id?>)"><i class="far fa-trash-alt"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- MODAL -->
<div class="modal fade" id="modalShowInfo" tabindex="-1" role="dialog" aria-labelledby="modalShowInfo" aria-hidden="true">
   	<div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
      		<div class="modal-header">
	         	<h3 class="text-center modal-title">Information</h3>
      		</div>
         	<div class="modal-body">
	            <p>Name: <span class="name"></span></p>
	            <p>Email: <span class="email"></span></p>
	            <p>Subject: <span class="subject"></span></p>
	            <p>Message: <span class="message"></span></p>
         	</div>
      	</div>
   	</div>
</div>

</body>
</html>

<script>
	function delete_message(btn, id){
		if (confirm("Are you sure you want to delete this message?")) {
			$.ajax({
			url: 'message/delete',
			type: 'post',
			dataType: 'json',
			data: {id: id},
			})
			.done(function(msg) {
				alert(msg.return);
				document.getElementById('messages').deleteRow(btn.parentNode.parentNode.rowIndex);
			})
			.fail(function(msg) {
				console.log(msg.responseText);
			});
		}
		
		
	}

	function call_modal(id) {
		$.ajax({
			url: 'message/get',
			type: 'post',
			dataType: 'json',
			data: {id: id},
		})
		.done(function(msg) {
			$('#modalShowInfo').on('show.bs.modal', function (event) {
				var modal = $(this);
				modal.find('.name').text(msg.name);
				modal.find('.email').text(msg.email);
				modal.find('.subject').text(msg.subject);
				modal.find('.message').text(msg.message);
			});
			$('#modalShowInfo').modal("show");
		})
		.fail(function() {
			console.log("error");
		});
		
		
		
	}
</script>