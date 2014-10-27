(function() {

	$('#task-modal').on('shown.bs.modal', function () {
    	$('#name').focus();
	});

	$('form[data-remote]').on('submit', function(){

		var form = $(this);
		//grab method type used by form
		var method = form.find('input[name="_method"]').val() || 'POST';
		//grab url property of form
		var url = form.prop('action');

		$('#submit').attr('disabled', 'disabled');

		//ajax request 
		$.ajax({

			type: method,
			url: url,
			data: form.serialize(),
			success: function(response) {

				$('#no-list').remove();

				$('#task-modal').modal('hide');

				$('#submit').removeAttr('disabled');

				//var task = '<li class="task"><input type="checkbox" name="name" id="' + response['taskid'] + '"><p class="task-name">' + response["input"].name + '</p><span class="label label-default ' + response["input"].priority + '">' + response["input"].priority + '</span></li>';
				//$('#task-ul').prepend(task);

				$('#task-ul').html(response);

				$('#name').val('');

				$('input[name]').on('click', function() {
					var checkbox = $(this);
					updateTask(checkbox);
				});
			}

		}, "json");

		//prevent forms default action of submitting
		return false;

	});
 
	$('input[name]').on('click', function(){
		var checkbox = $(this);
		updateTask(checkbox);
	});
		
	function updateTask(checkbox) {

			var checkbox = checkbox;

			console.log(checkbox);

			var method = 'PUT';

			//grab url property of form
			var url = $(location).attr('href');

			var url = url.split('?')[0] + '/' + checkbox.attr('id');

			//ajax request 
			$.ajax({

				type: method,
				url: url,
				data: checkbox.serialize(),
				success: function(response) {
					if (response == 'checked') {
						//console.log(response);
						checkbox.next().addClass(' checked');
					} else {
						checkbox.next().removeClass(' checked');
					}
				}

			}, "json");

	}

})();