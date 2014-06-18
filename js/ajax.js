function show_list(current_id)
	{
		$.ajax(
		{
			type: "POST",
			data: ,
			url: "ajax_new.php",
			async: true,
			dataType: "json",
			success: function(data)
			{
				write_item(data);
			}
		});
	};
	function write_item(data)
	{
		var len = data.length;
		for(var cnt = 0; cnt < len; cnt++)
			$('#list').append('<li>' + data[cnt].id + '<li>' + data[cnt].name' + <li>' + data[cnt].value);
        }