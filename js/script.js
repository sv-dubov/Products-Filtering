$(document).ready(function () {
	var category = getCheckboxValues('category');
	var sorting = getCheckboxValues('sorting');
    $.ajax({
        type: 'GET',
		url: "ajax_products.php",
        dataType: "json",
		data: { category: category, sorting: sorting },
        success: function (dataResult) {
            $.each(dataResult.products, function (key, value) {
				let temp = "<article class='col-md-4 col-sm-6'>" + 
				"<div class='thumbnail product'>" +
				"<figure>" +
				"<a href='#'><img src='img/img_placeholder.png' alt='" + value['product_title'] + "' /></a>" +
				"</figure>" +
				"<div class='caption'>" +
				"<a href='#' class='product-name'>" + value['product_title'] + "</a>" +
				"<div class='price'>$" + value['price'] + "</div>" +
				"<button type='button' data-id='" + value['id'] + "' class='btn btn-primary' id='buy_btn' data-toggle='modal' data-target='#productModal'>Buy</button>" +
				"</div>" +
				"</div>" +
				"</article>";
                $('#results').append(temp);
            });
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
		}
	});
});
