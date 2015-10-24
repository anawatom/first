$(function() {
	$('.form-search').on('submit', function(event) {
		var newact = $(this).attr('action') + '/0/'
																				// $(this).serialize() outputs param1=value1&param2=value2 string
																				+ $(this).serialize()
																				// replace params that havn't value (e.g. param1=& or param=) with ''
																				.replace(/[A-Za-z_]*=&(?=[A-Za-z_])|[A-Za-z_]*=(?=$)/g, '')
																				// replace & and = with /
																				.replace(/&|=/g,"/");
		// 'PREFIX_TH=&PREFIX_TH_SH='.replace(/[A-Za-z_]*(?=\=&)|[A-Za-z_]*(?=\=$)/g, '')

		window.location = newact;

		return false;
	});

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

		if (confirm('กรุณายืนยัน')) {
			if ($(this).attr('data-target') === '_parent') {
				window.top.location.href = $(this).attr('href');
			} else {
				window.location.replace($(this).attr('href'));
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

	// Dependencies dropdown
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