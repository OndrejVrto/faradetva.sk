(function($) {

	/**
	 * --------------------------------------
	 * Move cursor to the end of input
	 *
	 */
	$.fn.moveCursorToEnd = function() {
		var originalValue = this.val();
		this.val('');
		this.blur().focus().val(originalValue);
	};


	/**
	 * ADD FORM, EDIT FORM
	 */
	$('#add-form, #edit-form').find('input[name=title]').moveCursorToEnd();


	/**
	 * DELETE FORM submit
	 */
	$('#delete-form').on('submit', function(event) {
		event.preventDefault();
		Swal.fire({
			title: 'Si si istý?',
			text: "Už to nebudeš môcť vrátiť späť!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Áno, chcem to vymazať!'
		}).then((result) => {
			if (result.isConfirmed) {
				document.getElementById("delete-form").submit();
			}
		})
	});

}(jQuery));
