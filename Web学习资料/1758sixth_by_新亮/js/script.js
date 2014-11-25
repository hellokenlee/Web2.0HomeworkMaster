$(function(){
	
	var note = $('#note'),
		ts = new Date(2012, 12, 23),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 20*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			days = 23-(new Date()).getDate();
			message += "还剩"+days + " 天";
			//message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			//message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " <br />";
			//message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "就到第六届1758翩翩喜欢你舞会了！1758，一起舞吧！";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
	
});
