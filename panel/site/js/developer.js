
/*function nextFormPage(step){
		if(step == 0){
		document.getElementById("newProjectForm").style.display="block"; // Set Visible Form to None
		document.getElementById("newProjectForm1").style.display="none"; // Reset
		document.getElementById("newProjectForm2").style.display="none"; // Reset
		document.getElementById("nextstep").style.display="inline"; // Reset
		document.getElementById("nextstep2").style.display="none"; // Reset
		}
		if(step == 1){
		document.getElementById("newProjectForm").style.display="none"; // Set Visible Form to None
		document.getElementById("newProjectForm1").style.display="block"; // Set Invisible Form to Visible
		document.getElementById("nextstep").style.display="none"; // Select The Current Button Making it invisible.
		document.getElementById("nextstep1").style.display="inline"; // Set The Next button to the current button making it visible.
		}
		if(step == 2){
		document.getElementById("newProjectForm2").style.display="block"; // Make the next form visible.
		document.getElementById("newProjectForm1").style.display="none"; // Make the current form invisible
		document.getElementById("nextstep1").style.display="none"; // Make the last button invisible
		document.getElementById("nextstep2").style.display="inline"; // Make the submit button visible.
		}
	}

function showSideBar(){
			
		document.getElementById("sidebar").style.display="initial"; // Set Sidebar to visible
		document.getElementById("content").style.marginRight="18%"; // Set Content Width
		document.getElementById("footer").style.marginRight="18%"; // Set Footer Width
		document.getElementById("showSideBar").style.display="none"; // Set Show Button to Hide
		document.getElementById("hideSideBar").style.display="block"; // Set Hide Button to Show
}
function hideSideBar(){
			
		document.getElementById("sidebar").style.display="none"; // Set Sidebar to hide
		document.getElementById("content").style.marginRight="auto"; // Set Content Width
		document.getElementById("footer").style.marginRight="auto"; // Set Footer Width
		document.getElementById("showSideBar").style.display="block"; // Set Show Button to Show
		document.getElementById("hideSideBar").style.display="none"; // Set Hide Button to Hide
}*/
	$('#showSideBar').click(function(){$('#sidebar').animate({'right':'0%'},2000,'swing');$('#showSideBar').hide();$('#hideSideBar').show();});
	$('#hideSideBar').click(function(){$('#sidebar').animate({'right':'-20%'},2000,'swing');$('#hideSideBar').hide();$('#showSideBar').show();});
// Timer
var time = 0;
var running = 0;

function startPause(){
	if(running == 0){
	running = 1; 
	increment();
	document.getElementById("startPause").innerHTML = "Pause";
	}else{
	running = 0;
	document.getElementById("startPause").innerHTML = "Resume";
	}	
}

function reset(){
	running = 0;
	time = 0;
	document.getElementById("startPause").innerHTML = "Start";
	document.getElementById("output").innerHTML = "00:00:00:00";
}
function increment(){
	if(running == 1){
		setTimeout(function(){
			time++;
			var hours = Math.floor(time/10/60/60);
			var mins = Math.floor(time/10/60);
			var secs = Math.floor(time/10);
			var tenths = time % 10;
			
			if(hours < 10){
			hours = "0" + hours;
			}
			if(mins < 10){
			mins = "0" + mins;
			}
			if(secs > 59){
			secs = Math.floor(secs-60);
			time = Math.floor(time-60);
			}
			if(secs < 10){
			secs = "0" + secs;
			}
			document.getElementById("output").innerHTML = hours + ":" + mins  + ":" + secs + ":" + "0" + tenths;
			increment();
		}, 100);
	}
}

$(".toggle_right_pane").toggle(function() {       
  $('#left_pane').animate({ left: '0' }, 500);
  $('#main_pane').animate({ left: '300' }, 500);
}, function() {       
  $('#left_pane').animate({ left: '-300' }, 500);
  $('#main_pane').animate({ left: '0' }, 500);
});