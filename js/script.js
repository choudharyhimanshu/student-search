
$(document).ready(function(){
	var el=$('.quick-view');
	var elpos=el.offset().top;
	$(window).scroll(function () {
	    var y=$(this).scrollTop();
	    if(y<elpos){el.stop().animate({'top':0},500);}
	    else{el.stop().animate({'top':y-elpos},500);}
	});
});

function resetFields(){
	document.getElementById('query').value = "";
	document.getElementById('gender').value = "all";
	document.getElementById('batch').value = "all";
	document.getElementById('hall').value = "all";
	document.getElementById('degree').value = "all";
	document.getElementById('dept').value = "all";
	document.getElementById('blood').value = "all";
}

function quickView(username){
	// alert(username);
	$.get('partials/quick_profile.php?username='+username,function(response){
		$('.quick-view').html(response);
		ga('send', 'pageview', 'profile.php?username='+username);
	});
}