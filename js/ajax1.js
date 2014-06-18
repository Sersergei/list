function show_list()
	{
	   
	   var data = $('#mydata').val();
       
		$.ajax(
		{
			type: "POST",
			data: "data="+data,
			url: "/list/ajax",
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
    setTimeout(show_list, 1000);

        }
	