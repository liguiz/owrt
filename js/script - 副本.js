$().ready(function(){
	
	$('#mProf').append('<p>jQuery functioning</p>');
	$("#cProf").hover(function(){
		$(".prof").addClass('prof-hover');
		$('#mProf').append('<p>'+$(this).className+'</p>');
		t = setTimeout(function () {$('#mProf').stop().slideDown(300);},350);
	},function(){
		
		clearTimeout(t);
		$('#mProf').stop().slideUp(150);
		$(".prof").removeClass('prof-hover');
		
	});

	$("#mProf").hover(function(){},function(){
		
		$(this).css('display','none');
		$('.prof').removeClass('prof-hover');
		
	});
	
	$('.content').hover(function(){
		
	});
});