
/*$(".gangbaba").click(function(){
    var username=getRenterUsername();
    var rent_condo_id=$(this).attr("name");
    if(!$username){
        dialog.error("请先登录！");
        location.href="/uhouse/admin.php?c=Renterlogin";
    }
    postData["username"]=username;
    postData['rent_condo_id']=rent_condo_id;
    url="/uhouse/admin.php?c=Rlike&a=check";

    $.post(url,postData,function(result){
        if(result['status']==0){
            dialog.error(result.message);
        }else if(result['status']==1){
            layer.tips('关注成功！', '.gangbaba');
        }
    },"JSON");
});*/

function lvgangfunction(obj){

    var rent_condo_id=$(obj).attr('id');
    var p="'#"+rent_condo_id+"'";
    postData={};
    postData['rent_condo_id']=rent_condo_id;
    url="/uhouse/admin.php?c=Renter&a=check";
    login="/uhouse/admin.php?c=Renterlogin";

    $.post(url,postData,function(result){
        if(result['status']==0){
            dialog.confirm(result.message,login);
        }else if(result['status']==1){
            layer.tips(result.message, obj);
        }
    },"JSON");

}

$("#lvgangsss").click(function(){
    location.href="/uhouse/admin.php?c=Renter";
});
