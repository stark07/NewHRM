// Search
function search() {
	var query_value = $('input#name').val();
	if(query_value !== ''){
		$.ajax({
			type: "POST",
			url: "php/search.php",
			data: { query: query_value },
			cache: false,
			success: function(html){
				$("table#resultTable tbody").html(html);
			}
		});
	}return false;    
}
