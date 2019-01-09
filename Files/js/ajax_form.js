if(typeof CKEDITOR === 'undefined')
{
	CKEDITOR = false;
}
console.log('coucou');

$(document).off("click", "#popupwindow form input[type=submit]").on("click", "#popupwindow form input[type=submit]", function(event)
{
	console.log('form post by ajax');
	if(CKEDITOR)
	{
		for ( instance in CKEDITOR.instances )
		{
			CKEDITOR.instances[instance].updateElement();
		}
	}
	event.preventDefault();
	form = $(this).parents('form');
	$(form).trigger("beforesubmit");
	data = form.serialize();

	if ($(this).attr('name') != undefined)
	{
		data = data + "&"+ $(this).attr('name') + "=" + $(this).val();
	}
	$("#popupwindow form").LoadingOverlay("show");
	$.post(form.attr('action'),data,function (data){
		try
		{
			ret = $.parseJSON(data);
		}
		catch(err) 
		{
			ret = data;
		} 
	   		
		if(ret['snap'])
		{
			$.each( ret['snap'], function( key, snap ) 
			{
				ohSnap(snap.text, {color: snap.color});
			});
							
		}
		else
		{
		
			ret = data;
		
		}
		
		$(form).LoadingOverlay("hide", true);
		$( "#popupwindow" ).dialog( "close" );
		$(form).trigger("aftersubmit",ret);
	})
	.fail(function(ret){
		console.log(ret);
		$(form).LoadingOverlay("hide", true);
		$(form).trigger("afterbadsubmit",ret);
	});

});



$(document).off("click", ".open_popup").on("click", ".open_popup", function(event)
{
	event.preventDefault();
	$("#popupwindow").load($(this).attr('href'),function(){$("#popupwindow").dialog("open")});
});


$(document).off("click", "#popup_cancel_button").on("click", "#popup_cancel_button", function(event)
{
	$( "#popupwindow" ).dialog( "close" );
});

$(function () {
$("#popupwindow").dialog({
	autoOpen: false,
	width: 'auto',
	height: 'auto',
	top: 200,
	show: {
		effect: "blind",
		duration: 1000
	},
	hide: {
		effect: "explode",
		duration: 1000
	}
});
});