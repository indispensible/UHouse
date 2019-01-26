
$("#sendByLvgang").click(function(){
     var data=$("#lvgangde").serializeArray();
     var username=$("#usernamelvgang").html();

     postData={};
     $(data).each(function(i){
         postData[this.name]=this.value;
     });


    postData["username"]=username;

    url=SCOPE.save_url;
    jump_url=SCOPE.jump_url;

    $.post(url,postData,function(result){
        if(result['status']==0){
            dialog.error(result.message);
        }else if(result['status']==1){
            return dialog.success(result.message,jump_url);
        }
    },"JSON");

});
