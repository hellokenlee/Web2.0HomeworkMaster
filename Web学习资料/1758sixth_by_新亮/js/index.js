window.onload = function()  {
	showIntro.Initialize();
};

var showIntro = function()  {
	var lines = new Array();
	lines[0] = '第六届1758 翩翩喜欢你 舞会';
	lines[1] = '时光深处 Somewhere in time';
	lines[2] = '12月23日 约定你';
	var intro = new Array();
	var interval = 2000;
	var counter = 0;
	
	var getDOM = function()  {
		intro = $('.intro');
	};
	
	var show = function()  {
		if (counter == lines.length)  {
			return;
		}
		intro[counter].innerHTML = lines[counter];
		$(intro[counter]).fadeIn(interval, show);
		counter++;
	};
	
	
	return  {
		'Initialize' : function()  {
			getDOM();
			show();				
		}
	};
}();
