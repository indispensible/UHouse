function load(){
    var image1=$("#lvimage1").attr("src");
    var image2=$("#lvimage2").attr("src");
    var image3=$("#lvimage3").attr("src");
    var image4=$("#lvimage4").attr("src");
    var image5=$("#lvimage5").attr("src");
    var image6=$("#lvimage6").attr("src");


    if(image1){
        $("#lvli1").show();
    }else{
        $("#lvli1").hide();
    }
    if(image2){
        $("#lvli2").show();
    }else{
        $("#lvli2").hide();
    }
    if(image3){
        $("#lvli3").show();
    }else{
        $("#lvli3").hide();
    }
    if(image4){
        $("#lvli4").show();
    }else{
        $("#lvli4").hide();
    }
    if(image5){
        $("#lvli5").show();
    }else{
        $("#lvli5").hide();
    }
    if(image6){
        $("#lvli6").show();
    }else{
        $("#lvli6").hide();
    }
}

$("#lvimage1").click(function(){
    var image1=$("#lvimage1").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(1);
});

$("#lvimage2").click(function(){
    var image1=$("#lvimage2").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(2);
});

$("#lvimage3").click(function(){
    var image1=$("#lvimage3").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(3);
});

$("#lvimage4").click(function(){
    var image1=$("#lvimage4").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(4);
});

$("#lvimage5").click(function(){
    var image1=$("#lvimage5").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(5);
});

$("#lvimage6").click(function(){
    var image1=$("#lvimage6").attr("src");
    $("#view_big_img").attr("src",image1);
    $("#currentIndex").html(6);
});