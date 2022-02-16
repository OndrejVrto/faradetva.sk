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
	$('.form-delete-wraper').on('click', 'button[type=submit]', function (event) {
		event.preventDefault();

		var form = $(this).parent();

		Swal.fire({
			title: 'Si si istý?',
			icon: 'info',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Áno, chcem to vymazať!'
		}).then(function (result) {
			if (result.isConfirmed) {
				form.submit();
			}
		});
	});



	$("#add-form, #edit-form")
		.find("#addFileSubmit")
		.on("click", function () {
			var input = $("#addFileInput");
			output = input
				.clone()
				.insertAfter(".add-files-group .form-row:last");
			output.removeAttr("id");
			output.removeClass("d-none");
			output.find("label").html("Nová príloha ...");
		})
		.end()
		.find("input[name=title]")
		.moveCursorToEnd();

	$("#add-form, #edit-form")
		.find("button[type=submit]")
		.on("click", function () {
			$("#addFileInput").remove();
		});

	$(".add-files-group, .custom-file").on("change", "input[type=file]", function () {
		//get the file name
		var fileName = $(this).val().split("\\").pop();
		//replace the "Choose a file" label
		$(this).next(".custom-file-label").html(fileName);
	});


	$('.add-files-group').on('click', 'button', function () {
		var formRow = $(this);

		Swal.fire({
			title: 'Si si istý?',
			icon: 'info',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Áno, chcem to vymazať!'
		}).then(function (result) {
			if (result.isConfirmed) {
				formRow.closest('.form-row').remove();
			}
		});
	});


})(jQuery);

var Timer = function(opts) {
    var self = this;

    self.opts     = opts || {};
    self.element  = opts.element || null;
    self.minutes  = opts.minutes || 0;
    self.seconds  = opts.seconds || 0;

    self.start = function() {
        self.interval = setInterval(countDown, 1000);
    };

    self.stop = function() {
        clearInterval(self.interval);
    };

    function countDown() {
        self.seconds--; //Changed Line

        if (self.minutes == 0 && self.seconds == 0) {
            self.stop();
        }

        if (self.seconds < 0) { //Changed Condition. Not include 0
            self.seconds = 59;
            self.minutes--;
        }

        if (self.seconds <= 9) {
            self.seconds = '0' + self.seconds;
        }

        self.element.textContent = ("0" + self.minutes).slice(-2) + ':' + self.seconds;
    }
};
