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
});

function getDefaultDateObjec() {
	var d = new Date();

	return {
			year: (d.getFullYear() + 543),
			month: d.getMonth(),
			day: d.getDate()
		};
}