
function  deleteRenter(obj){
    var rent_condo_id=$(obj).attr("value");
    var username=$("#usernameByLvgang").attr("value");
    if(!rent_condo_id || !username){
        dialog.error("username或者rent_condo_id缺失！");
    }

    postData={};
    postData['username']=username;
    postData['rent_condo_id']=rent_condo_id;

    url="/uhouse/admin.php?c=Renter&a=delete";
    jump_url="/uhouse/admin.php?c=Renter&a=liked";

    $.post(url,postData,function(result){
        if(result['status']==0){
            dialog.error(result.message);
        }else if(result['status']==1){
            dialog.success(result.message,jump_url);
        }
    },"JSON");
}