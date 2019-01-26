
$("#sendByLandlord").click(function(){
    var data=$("#releaseByLvgang").serializeArray();

    postData={};

    $(data).each(function(i){
       postData[this.name]=this.value;
    });
    var username=$('input[name="usernameByHidden"]').val();
    postData["username"]=username;

    /*
     *写一个统计有多少图片的函数！
     * @ lvgang
     */
    var imagenum;
    if(postData['image6']){
        imagenum=6;
    }else{
        if(postData['image5']){
            imagenum=5;
        }else{
            if(postData['image4']){
                imagenum=4;
            }else{
                if(postData['image3']){
                    imagenum=3;
                }else{
                    if(postData['image2']){
                        imagenum=2;
                    }else{
                        if(postData['image1']){
                            imagenum=1;
                        }else{
                            imagenum=0;
                        }
                    }
                }
            }
        }
    }
        postData['imagenum']=imagenum;



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