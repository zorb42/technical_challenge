function insert_message() {
	var data = $("#form_message").serializeArray();
	$.ajax({
		url: 'message/insert',
		type: 'post',
		dataType: 'json',
		data: data,
	})
	.done(function(msg) {
		alert(msg.return);
		$('#form_message').each(function() {
			this.reset();
		});
	})
	.fail(function(msg) {
		alert(msg.return)
	});
}