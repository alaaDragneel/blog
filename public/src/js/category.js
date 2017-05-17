$(document).ready(function() {
	$('#addNewCat').click(function (event) {
	    event.preventDefault();
	    $('#Add-catModel').modal();
	});

	//add category
	$('#addCat').on('click', function (e) {
		e.preventDefault();
		var name = $('#name');

		if(name.val() === ''){
			alert('please fill the category name');
			return;
		}

		$.ajax({
			method: 'POST',
			url: url,
			data: {name: name.val(), _token: token},
		}).done(function(msg){
			var obj = msg['msg'];
			$('#msg').removeClass('hidden').html(obj);
			location.reload();
		});
	});

	//edit category
	var editSection = $('.editBtn');
	for(i = 0; i< editSection.length; i++){
		$(editSection[i]).on('dblclick', function (e) {
			e.preventDefault();
			$(this).text('save');
			var data = $(this).parentsUntil('div.panel-body').children('h3').text();
			var text = $(this).parent().parent().children().first().children();
			text.parents().removeClass('hidden');
			text.val(data);
		});
	}

		//update category
		var updateSection = $('.saveBtn');
		for(i = 0; i< updateSection.length; i++){
			$(updateSection[i]).on('click',function (e) {
				e.preventDefault();
				var id = $(this).parentsUntil('div.panel-body').children('div .id').data('id');

				var textEdit = $(this).parent().parent().children().first().children();
				var nameEdit = textEdit.val();

				if(nameEdit.length === 0){
					return;
				}

				$.ajax({
					method: 'POST',
					url: urlEdit,
					data: {name: nameEdit, id: id, _token: token },
				}).done(function(msg){
					var obj = msg['msg'];
					location.reload();
					$('#msg').removeClass('hidden').html(obj);
				});
				// $(this).removeClass('editBtn').addClass('saveBtn');
				// var data = $(this).parentsUntil('div.panel-body').children('h3').text();
				// var text = $(this).parent().parent().children().first().children();
				// text.parents().removeClass('hidden');
			});
		}

});
