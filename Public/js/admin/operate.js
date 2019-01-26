
$(".lvgang-delete").click(function(){
    postData={};
    var username=$('input[name="usernameByHidden"]').val();
    var house_id=$(this).attr('value');

    postData['house_id']=house_id;
    postData['username']=username;

    url="/uhouse/admin.php?c=Landlord&a=delete";
    jump_url="/uhouse/admin.php?c=Landlord";

    layer.open({
        type:0,
        title:"删除？",
        btn:['yes','no'],
        icon:3,
        closeBtn:2,
        content:"是否确定删除",
        scrollbar:true,
        yes:function(){
          todelete(url,postData);
    },
    });

});

function todelete(url,postData){
    $.post(url,postData,function(result){
        if(result['status']==0){
            return dialog.error(result.message);
        }else if(result['status']==1){
            return dialog.success(result.message,jump_url);
        }
    },"JSON");
}

$('.lvgang-update').click(function(){
   postData={};
   var username=$('input[name="usernameByHidden"]').val();
   var house_id=$(this).attr('value');
   postData['username']=username;
   postData['house_id']=house_id;

   url="/uhouse/admin.php?c=Landlord&a=edit";
   jump_url="/uhouse/admin.php?c=Landlord&a=update";

   $.post(url,postData,function(result){
       if(result['status']==0){
           return dialog.error(result.message);
       }else if(result['status']==1){
           return dialog.success(result.message,jump_url);
       }
   },"JSON");
});


$('#updateByLvGang').click(function(){
    var data=$("#updateforlvgang").serializeArray();

    postData={};
    $(data).each(function(i){
        postData[this.name]=this.value;
    });

    var username=$('input[name="usernameByHidden"]').val();
    postData['username']=username;

    url=SCOPE.save_url;
    jump_url=SCOPE.jump_url;

    $.post(url,postData,function(result){
        if(result['status']==0){
            return dialog.error(result.message);
        }else if(result['status']==1){
            return dialog.success(result.message,jump_url);
        }
    },"JSON");
});

$(".lvgang-detail").click(function(){
    var house_id=$(this).attr('value');
    url="/uhouse/admin.php?c=landlord&a=prepare";
    jump_url="/uhouse/admin.php?c=landlord&a=detail";
    postData={};
    postData['house_id']=house_id;

    $.post(url,postData,function(result){
        if(result['status']==0){
            return dialog.error(result.message);
        }else if(result['status']==1){
            window.open(jump_url);
        }
    },"JSON");
});