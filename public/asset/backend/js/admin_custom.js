(function ($) {
	/**
	 * Move cursor to the end of input
	 */
	$.fn.moveCursorToEnd = function () {
		var originalValue = this.val();
		this.val('');
		this.blur().focus().val(originalValue);
	};

	/**
	 * DELETE FORM submit
	 */
	$('.delete-form').on('click', 'button[type=submit]', function (event) {
		event.preventDefault();

		var form = $(this).parent();

		Swal.fire({
			title: 'Si si istý?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Áno, chcem to zmazať!'
		}).then(function (result) {
			if (result.isConfirmed) {
				form.submit();
			}
		});
	});

	/**
	 * RESTORE FORM submit
	 */
	$('.restore-form').on('click', 'button[type=submit]', function (event) {
		event.preventDefault();

		var form = $(this).parent();

		Swal.fire({
			title: 'Obnovenie záznamu',
			icon: 'info',
			showCancelButton: true,
			confirmButtonColor: '#28A745',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Chcem obnoviť!'
		}).then(function (result) {
			if (result.isConfirmed) {
				form.submit();
			}
		});
	});

    /**
	 * FORCE DELETE FORM submit
	 */
	$('.force-delete-form').on('click', 'button[type=submit]', function (event) {
		event.preventDefault();

		var form = $(this).parent();

		Swal.fire({
			title: 'Trvalé vymazanie z databázy',
			icon: 'error',
			showCancelButton: true,
			confirmButtonColor: '#dc3545',
			cancelButtonColor: '#007BFF',
			confirmButtonText: 'Chcem ZMAZAŤ z databázy na trvalo!'
		}).then(function (result) {
			if (result.isConfirmed) {
				form.submit();
			}
		});
	});

    /**
	 * Add file name to input field when it is selected
	 */
	$(".add-files-group, .custom-file").on("change", "input[type=file]", function () {
		//get the file name
		var fileName = $(this).val().split("\\").pop();
		//replace the "Choose a file" label
		$(this).next(".custom-file-label").html(fileName);
	});

})(jQuery);


/**
 *  Countdown timer in rigth corner
 */
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
