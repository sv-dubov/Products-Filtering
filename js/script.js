$(document).ready(function () {
	var category = getCheckboxValues('category');
	var sorting = getCheckboxValues('sorting');
	$.ajax({
		type: 'POST',
		url: "ajax_products.php",
		dataType: "json",
		data: { category: category, sorting: sorting },
		success: function (data) {
			$("#results").append(data.products);
		}
	});

	function getCheckboxValues(checkboxClass) {
		var values = [];
		$("." + checkboxClass + ":checked").each(function () {
			values.push($(this).val());
		});
		return values;
	}

	$('.sort_rang').change(function () {
		$("#search_form").submit();
		return false;
	});

	$(document).on('click', 'label', function () {
		if ($('input:checkbox:checked')) {
			$('input:checkbox:checked', this).closest('label').addClass('active');
		}
	});
});

$('#results').on('click', '#buy_btn', function () {
	var id = $(this).data('id');
	$.ajax({
		url: 'ajax_modal.php',
		type: 'GET',
		dataType: 'json',
		data: { id: id },
		success: function (data) {
			$('.modal-body').html(data.product);
			//$('#productModal').modal('show');
		}
	});
});

