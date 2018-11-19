jQuery(document).ready(function($) {

	init();

	function moveObjectIntoCheckedSection(submitted_object, obj_id){

		// console.log($(submitted_object).children("button"));

		let submitted_object_last_children = $(submitted_object).children().last();

		$(submitted_object_last_children).find('.submit_button').remove();
		$(submitted_object_last_children).find('.preview_button').children().attr('class', 'fas fa-external-link-alt');

		$("#checked_objects").children('table').children('tbody').append('<tr class="object_' + obj_id + '">' + submitted_object.html() + '</tr>');

	}

	function checkForUncheckedObjects(){
		if ($("#unchecked_objects").children("table").children("tbody").children().length == 0) {

			$("#unchecked_objects").fadeOut('slow', function() {
				$(this).remove();
			});

		}
	}

	function submit_listener(){
		$('.submit_button').click(function() {

			let obj_id = $(this).val();

			let submitted_object = $('.object_' + obj_id);

			$.ajax({
				url: '/objects/submit_object',
				type: 'POST',
				data: {obj_id: obj_id},
			})

			.fail(function() {
				console.log("error");
			})
			.success(function(data) {

				$('.object_' + obj_id).fadeOut('slow', function() {
					moveObjectIntoCheckedSection(submitted_object, obj_id);
					$(this).remove();	
					checkForUncheckedObjects();
					
				});


			});
			
		});
	}

	function delete_listener(){
		$(document).on('click', '.delete_button', function(e) {
		    e.preventDefault();

		    var obj_id = $(this).val();

			$.ajax({
				url: '/objects/delete_object',
				type: 'POST',
				data: {obj_id: obj_id},
			})

			.fail(function() {
				console.log("error");
			})
			.success(function(data) {

				console.log("delete request is successful...");

				$('.object_' + obj_id).fadeOut('slow', function() {
					$(this).remove();	

				});
				console.log($('.object_' + obj_id));

			});

		});
	}

	function init(){
		submit_listener();
		delete_listener();	
		console.log("listeners are working...");
	}
	

	

});