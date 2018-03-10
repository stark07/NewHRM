// Search
function search() {
	var query_value = $('input#name').val();
	if(query_value !== ''){
		$.ajax({
			type: "POST",
			url: "search.php",
			data: { query: query_value },
			cache: false,
			success: function(html){
				$("table#resultTable tbody").html(html);
			}
		});
	}return false;    
}

$("input#name").live("keyup", function(e) {
	// Set a timeout
	clearTimeout($.data(this, 'timer'));
	
	// Search String
	var search_string = $(this).val();
	
	// Search
	if (search_string == '') {
		$("table#resultTable tbody").fadeOut(50);
	}else{
		$("table#resultTable tbody").fadeIn(50);
		$(this).data('timer', setTimeout(search, 100));
	};
});

