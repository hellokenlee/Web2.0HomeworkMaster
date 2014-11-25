var state=0;
//0: unstart; 1: started; 2:lose ;3:win
$(document).ready(function(){
	$('div.boundary').mouseover(function(){//lose
		if(state==1){
			$('div.boundary').addClass('youlose');
			$('#status').text("You Lose!!Click the S block to Restart");
			state=2
		}
	});
	$('#end').mouseover(function(){//win
		if(state==1){
			$('#status').text('You Win!!Click the S block to Play again!');
			state=3;
		}
	});
	$('#start').mouseover(function(){//start
		if(state==0){
			$('#status').text("Now Don't Touch The Wall...");
			state=1;
		}
	});
	$('#start').click(function(){//restart
		if(state==2||state==3){
			$('div.boundary').removeClass('youlose');
			$('#status').text("Now Don't Touch The Wall...");
			state=1;
		}
	});
	$('#maze').mouseleave(function(){//now allow cheatting
		if(state==1){
			$('div.boundary').addClass('youlose');
			$('#status').text("You Lose!!Click the S block to Restart");
			state=2;
		}
	});
});

