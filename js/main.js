$(function() {
	// From
	$('.form-search').on('submit', function(event) {
		var newact = $(this).attr('action') + '/0/'
						// $(this).serialize() outputs param1=value1&param2=value2 string
						+ $(this).serialize()
						// replace params that havn't value (e.g. param1=& or param=) with ''
						.replace(/[A-Za-z_]*=&(?=[A-Za-z_])|[A-Za-z_]*=(?=$)/g, '')
						// replace space
						.replace(/\+/g, "")
						// replace & and = with /
						.replace(/&|=/g,"/");
		// 'PREFIX_TH=&PREFIX_TH_SH='.replace(/[A-Za-z_]*(?=\=&)|[A-Za-z_]*(?=\=$)/g, '')

		window.location = newact;

		return false;
	});
	$('.has-js-validation[name="formReport"]').on('submit', function(event) {
		var alertText = '';
		$(this).find('.require-field').each(function(index, value) {
			var $current = $(value);

			if ( $current.val() === '' 
				|| $current.val() === 'any') {
				alertText = $current.attr('data-require-field-alert-text');
				return false;
			}
		});

		if (alertText) {
			alert(alertText);
			return false;
		} else {
			return true;
		}
	});
	// End

	$('.datepicker[type="text"][data-type="birthdate"]').datepicker({
		language: 'th',
		format: 'dd/mm/yyyy',
		defaultViewDate: getDefaultDateObjec(),
		autoclose: true,
		clearBtn: true,
		todayHighlight: true
	});

	$('.datepicker[type="text"][data-type="normal-date"]').datepicker({
		language: 'th',
		format: 'dd/mm/yyyy',
		defaultViewDate: getDefaultDateObjec(),
		autoclose: true,
		clearBtn: true,
		todayBtn: true,
		todayHighlight: true
	});

	$('.btn-delete').on('click', function(event) {
		event.preventDefault();
		var url;

		if (confirm('กรุณายืนยัน')) {
			url = $(this).attr('href');

			if ($(this).attr('data-redirect-path') !== undefined) {
				url += '/redirect_path/' + $(this).attr('data-redirect-path');
			}

			if ($(this).attr('data-target') === '_parent') {
				window.top.location.href = url;
			} else {
				window.location.replace(url);
			}
		}
	});

	$('.has-preview[type="file"]').on('change', function(event) {
		var input = $(this).get(0),
			fileName = $(this).attr('name');

		if (input.files && input.files[0]) {
			var filerdr = new FileReader();

			filerdr.onload = function (e) {
				if ( e.target.result.indexOf('image') === -1) {
					$('.image-preview[data-name="' + fileName + '"]').attr('src', '<?php echo base_url("img/no_image.png"); ?>');
				} else {
					$('.image-preview[data-name="' + fileName + '"]').attr('src', e.target.result);
				}
			}
			filerdr.readAsDataURL(input.files[0]);
		}
	});

	$('.only-number[type="text"]').keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// // Allow: Ctrl+A
			// (e.keyCode == 65 && e.ctrlKey === true) ||
			// // Allow: Ctrl+C
			// (e.keyCode == 67 && e.ctrlKey === true) ||
			// // Allow: Ctrl+X
			// (e.keyCode == 88 && e.ctrlKey === true) ||
			// Allow: home, end, left, right
			(e.keyCode >= 35 && e.keyCode <= 39)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});

	/* ** Dependency dropdowns ** */
	$('.has-dependency[name="TYPE_ID"]').on('change', function(event) {
		$.ajax({
			url: $(this).attr('data-url-dependency')+'/' + $(this).val(),
			dataType: 'json',
			success: function (data) {
				$('select[name="SPORT_ID"]').prop('disabled', false);
				$('select[name="SPORT_ID"]').html(data.data);
			},
			error: function (xhr, desc, exceptionobj) {
				alert("ERROR:" + xhr.responseText);
			}
		});
	});

	$('.has-dependency[data-dependency-for="COURSE_ID"][name="SPORT_ID"]').on('change', function(e) {
		var $this = $(this);

		if ($this.val()) {
			$.ajax({
				url: $(this).attr('data-url-dependency-for-course-id') + '/' + $this.val(),
				dataType: 'json',
				success: function (data) {
					$('select[name="COURSE_ID"]').prop('disabled', false);
					$('select[name="COURSE_ID"]').html(data.data);
				},
				error: function (xhr, desc, exceptionobj) {
					alert("ERROR:" + xhr.responseText);
				}
			});
		}
	});

	// For TERM_ID
	$('.has-dependency[data-dependency-for="TERM_ID"][name="SPORT_ID"]').on('change', function(event) {
		setDropdownTerm($(this).attr('data-url-dependency-for-term-id'), 
							$(this).val(), 
							$('input[name="TERM_YEAR"]').val());
	});
	$('.has-dependency[data-dependency-for="TERM_ID"][name="TERM_YEAR"]').on('blur', function(event) {
		setDropdownTerm($(this).attr('data-url-dependency-for-term-id'), 
							$('.has-dependency[name="SPORT_ID"]').val(), 
							$(this).val());
	});
	$('.has-dependency[data-dependency-for="TERM_ID"][name="SPORT_ID"]').on('change', function(event) {
		setDropdownTerm($(this).attr('data-url-dependency-for-term-id'), 
							$(this).val(), 
							$('input[name="TERM_YEAR"]').val());
	});

	// For TERM_GEN
	$('.has-dependency[data-dependency-for="TERM_GEN"][name="TERM_YEAR"]').on('change', function(e) {
		setDropdownTermGen($(this).attr('data-url-dependency-for-term-gen'), 
							$('.has-dependency[data-dependency-for="TERM_GEN"][name="COURSE_ID"]').val(), 
							$(this).val());
	});
	$('.has-dependency[data-dependency-for="TERM_GEN"][name="COURSE_ID"]').on('change', function(e) {
		setDropdownTermGen($(this).attr('data-url-dependency-for-term-gen'),
							$(this).val(),
							$('.has-dependency[data-dependency-for="TERM_GEN"][name="TERM_YEAR"]').val());
	});
	/* ** 
	* End Dependency dropdowns ** */

	// Detail dropdown
	$('.has-detail[name="TERM_ID"]').on('change', function(event) {
		var $termTimeStart = $('.show-detail[data-detail-for="TERM_ID"][name="TERM_TIME_START"]').val(''),
			$termTimeEnd = $('.show-detail[data-detail-for="TERM_ID"][name="TERM_TIME_END"]').val(''),
			$termLocation = $('.show-detail[data-detail-for="TERM_ID"][name="TERM_LOCATION"]').val('');

		if ($(this).val() !== '0') {
			$.ajax({
				url: $(this).attr('data-url-dependency')+'/' + $(this).val(),
				dataType: 'json',
				success: function (data) {
					$termTimeStart.val(data.data.TERM_TIME_START);
					$termTimeEnd.val(data.data.TERM_TIME_END);
					$termLocation.val(data.data.TERM_LOCATION);
				},
				error: function (xhr, desc, exceptionobj) {
					alert("ERROR:" + xhr.responseText);
				}
			});
		}
	});
});

function getDefaultDateObjec() {
	var d = new Date();

	return {
			year: (d.getFullYear() + 543),
			month: d.getMonth(),
			day: d.getDate()
		};
}

function setDropdownTerm(url, sportId, year) {
	if (sportId && year) {
		$.ajax({
			url: url + '/' + sportId + '/' + year,
			dataType: 'json',
			success: function (data) {
				$('select[name="TERM_ID"]').prop('disabled', false);
				$('select[name="TERM_ID"]').html(data.data);
			},
			error: function (xhr, desc, exceptionobj) {
				alert("ERROR:" + xhr.responseText);
			}
		});
	}
}

function setDropdownTermGen(url, courseId, year) {
	courseId = (typeof courseId !== undefined)? courseId: 0;

	if ( ! year ) {
		alert('กรุณาเลือกปี');
		return;
	}

	$.ajax({
		url: url + '/' + courseId + '/' + year,
		dataType: 'json',
		success: function (data) {
			$('select[name="TERM_GEN"]').prop('disabled', false);
			$('select[name="TERM_GEN"]').html(data.data);
		},
		error: function (xhr, desc, exceptionobj) {
			alert("ERROR:" + xhr.responseText);
		}
	});
}