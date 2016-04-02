'use strict';

$(document).ready(function() {
	$('.datepicker').datepicker({
	    todayBtn: "linked",
	    keyboardNavigation: false,
	    forceParse: false,
	    calendarWeeks: true,
	    autoclose: true,
	    format: 'yyyy-mm-dd'
	});

	var create_new_customer = $('#create_new_customer').prop('checked');
	if (create_new_customer) {
		$('#old_customer').hide();
		$('#new_customer').show();
	} else {
		$('#old_customer').show();
		$('#new_customer').hide();
	}

	$('#create_new_customer').on('click', function() {
		create_new_customer = $(this).prop('checked');
		if (create_new_customer) {
	    	$('#old_customer').hide();
	    	$('#new_customer').show();
		} else {
			$('#old_customer').show();
	    	$('#new_customer').hide();
		}
	})

	var create_new_category = $('#create_new_category').prop('checked');
	if (create_new_category) {
		$('#old_category').hide();
		$('#new_category').show();
	} else {
		$('#old_category').show();
		$('#new_category').hide();
	}

	$('#create_new_category').on('click', function() {
		create_new_category = $(this).prop('checked');
		if (create_new_category) {
	    	$('#old_category').hide();
	    	$('#new_category').show();
		} else {
			$('#old_category').show();
	    	$('#new_category').hide();
		}
	})
})