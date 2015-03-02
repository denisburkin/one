/* ===========================================================
 * jquery-loadingbar.js v1.0
 * ===========================================================
 * Copyright 2014 Denis Burkin.
 * http://denisburkin.ru
 * ========================================================== */

(function ($)
{
	Loadingbar = {}
	Loadingbar.start = function ()
	{
		if ($("#loadingbar").length === 0)
		{
			$("body").append("<div id='loadingbar'></div>")
			$("#loadingbar").addClass("waiting").append($("<dt/><dd/>"));
			$("#loadingbar").width((50 + Math.random() * 30) + "%");
		}
	}
	Loadingbar.end = function ()
	{
		$("#loadingbar").width("101%");
		setTimeout(function ()
		{
			$("#loadingbar").css('opacity', '0');
		}, 300)
		setTimeout(function ()
		{
			$("#loadingbar").remove()
		}, 800)
	}
}(jQuery));

$.ajaxSetup({
	beforeSend: Loadingbar.start,
	complete  : Loadingbar.end
});
