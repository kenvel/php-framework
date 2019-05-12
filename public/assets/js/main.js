$(document).ready(function () {
	$('#adminTask').on('show.bs.modal', function (event) {
		var button 	= $(event.relatedTarget);
		var id 		= button.data('id');
		var text	= button.data('text');
		var name 	= button.data('name');
		var email 	= button.data('email');
		var modal 	= $(this);

		modal.find('.taskId').val(id);
		modal.find('#textInput').text(text);
		modal.find('#nameInput').val(name);
		modal.find('#emailInput').val(email);
		modal.find('#textLabel').html('Task from ' + name + ' ' + email);
	});
});