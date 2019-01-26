$("#lvgangNext").click(function(){
	var a=$(".banner").attr('name');
	if(a==6){
		a=1;
	}else{
		a++;
	}
	$(".banner").attr('name',a);
	$(".banner").css('background-image','url(/uhouse/Public/images/a'+a+'.jpg)');
 });

$("#lvgangPrev").click(function(){
	var a=$(".banner").attr('name');
	if(a==1){
		a=6;
	}else{
		a--;
	}
	$(".banner").attr('name',a);
	$(".banner").css('background-image','url(/uhouse/Public/images/a'+a+'.jpg)');
 });