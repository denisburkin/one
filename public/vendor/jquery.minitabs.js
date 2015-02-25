//
// Minitabs 0.1
// Requires jquery
//
//
// Usage :
//
// $("#container").minitabs([speed],[slide|fade]);
//

jQuery.fn.minitabs = function (speed, effect)
{
	id = "#" + this.attr('id')
	$(id + " .container:gt(0)").hide();

	$(id + ">A.tab:first").addClass("select");
	$(id + ">A.tab").click(
		function ()
		{
			$(id + ">A.tab").removeClass("select");
			$(this).addClass("select");
			$(this).blur();
			var re = /([_\-\w]+$)/i;
			var target = $('#' + re.exec(this.href)[1]);
			var old = $(id + " .container");
			switch (effect)
			{
				case 'fade':
					old.fadeOut(speed).fadeOut(speed);
					target.fadeIn(speed);
					break;
				case 'slide':
					old.slideUp(speed);
					target.fadeOut(speed).fadeIn(speed);
					break;
				default :
					old.hide(speed);
					target.show(speed)
			}
			return false;
		}
	);
}

