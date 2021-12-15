(function ($) {
	/**
	 * --------------------------------------
	 * Move cursor to the end of input
	 *
	 */
	$.fn.moveCursorToEnd = function () {
		var originalValue = this.val();
		this.val('');
		this.blur().focus().val(originalValue);
	};

	/**
	 * DELETE FORM submit
	 */
	$('#delete-form').on('submit', function (event) {
		event.preventDefault();
		Swal.fire({
			title: 'Si si istý?',
			text: "Už to nebudeš môcť vrátiť späť!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Áno, chcem to vymazať!'
		}).then(function (result) {
			if (result.isConfirmed) {
				document.getElementById("delete-form").submit();
			}
		});
	});


	$('#add-form, #edit-form').find('#addFileSubmit').on('click', function () {
		var input = $('#addFileInput');
		output = input.clone().insertAfter('.add-files-group .form-row:last');
		output.removeAttr('id');
		output.find('label').html('Nová príloha ...');
	})
	.end()
	.find('input[name=title]').moveCursorToEnd();


	$('.add-files-group').on('change', 'input[type=file]', function () {
		//get the file name
		var fileName = $(this).val().split('\\').pop();
		//replace the "Choose a file" label
		$(this).next('.custom-file-label').html(fileName);
	});


	$('.add-files-group').on('click', 'button', function () {
		$(this).closest('.form-row').remove();
	});


})(jQuery);
