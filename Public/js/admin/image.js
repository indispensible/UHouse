/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',

        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {

                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                obj.data="/uhouse"+obj.data;




                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img").attr("src",obj.data);
                
                $("#file_upload_image").attr("value",obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});


$(function(){
   $("#file_upload_lvgang").uploadify({
       'swf'       : SCOPE.ajax_upload_swf,
       'uploader'  : SCOPE.ajax_upload_image_url,
       'buttonText':'上传图片',
       'fileTypeDesc':'Image Files',
       'fileObjName' : 'file',
       'fileTypeExts':'*.gif;*.jpg;*.png',
       'onUploadSuccess': function(file,data,response){
           if(response){
               var obj=JSON.parse(data);
               obj.data="/uhouse"+obj.data;

               $('#'+file.id).find('.data').html('上传完毕');

               var image1=$("#upload_org_code_img1").attr("src");
               var image2=$("#upload_org_code_img2").attr("src");
               var image3=$("#upload_org_code_img3").attr("src");
               var image4=$("#upload_org_code_img4").attr("src");
               var image5=$("#upload_org_code_img5").attr("src");
               var image6=$("#upload_org_code_img6").attr("src");

               if(image1){
                   if(image2){
                    if(image3){
                        if(image4){
                            if(image5){
                               if(image6){
                                        //没有操作了！
                               } else{
                                   $("#upload_org_code_img6").attr("src",obj.data);
                                   $("#file_lvgang6").attr("value",obj.data);
                                   $("#upload_org_code_img6").show();
                                   $("#file_upload_lvgang").hide();
                               }
                            }else{
                                $("#upload_org_code_img5").attr("src",obj.data);
                                $("#file_lvgang5").attr("value",obj.data);
                                $("#upload_org_code_img5").show();
                                $("#file_upload_lvgang").show();
                            }
                        }else{
                            $("#upload_org_code_img4").attr("src",obj.data);
                            $("#file_lvgang4").attr("value",obj.data);
                            $("#upload_org_code_img4").show();
                            $("#file_upload_lvgang").show();
                        }
                    }else{
                        $("#upload_org_code_img3").attr("src",obj.data);
                        $("#file_lvgang3").attr("value",obj.data);
                        $("#upload_org_code_img3").show();
                        $("#file_upload_lvgang").show();
                    }
                   }else{
                       $("#upload_org_code_img2").attr("src",obj.data);
                       $("#file_lvgang2").attr("value",obj.data);
                       $("#upload_org_code_img2").show();
                       $("#file_upload_lvgang").show();
                   }
               }else{
                   $("#upload_org_code_img1").attr("src",obj.data);
                   $("#file_lvgang1").attr("value",obj.data);
                   $("#upload_org_code_img1").show();
                   $("#file_upload_lvgang").show();
                   $("#buttonlv").show();
               }



           }else{
               alert("上传失败！");
           }
       }
   });
});

$(document).ready(function(){
    var image1=$("#upload_org_code_img1").attr("src");
    var image2=$("#upload_org_code_img2").attr("src");
    var image3=$("#upload_org_code_img3").attr("src");
    var image4=$("#upload_org_code_img4").attr("src");
    var image5=$("#upload_org_code_img5").attr("src");
    var image6=$("#upload_org_code_img6").attr("src");

    if(image1){
        $("#upload_org_code_img1").show();
    }else{
        $("#upload_org_code_img1").hide();
        $("#buttonlv").hide();
    }
    if(image2){
        $("#upload_org_code_img2").show();
    }else{
        $("#upload_org_code_img2").hide();
    }
    if(image3){
        $("#upload_org_code_img3").show();
    }else{
        $("#upload_org_code_img3").hide();
    }
    if(image4){
        $("#upload_org_code_img4").show();
    }else{
        $("#upload_org_code_img4").hide();
    }
    if(image5){
        $("#upload_org_code_img5").show();
    }else{
        $("#upload_org_code_img5").hide();
    }
    if(image6){
        $("#upload_org_code_img6").show();
        $("#file_upload_lvgang").hide();
    }else{
        $("#upload_org_code_img6").hide();
    }
});

$("#buttonlv").click(function(){
    var image1=$("#upload_org_code_img1").attr("src");
    var image2=$("#upload_org_code_img2").attr("src");
    var image3=$("#upload_org_code_img3").attr("src");
    var image4=$("#upload_org_code_img4").attr("src");
    var image5=$("#upload_org_code_img5").attr("src");
    var image6=$("#upload_org_code_img6").attr("src");

    if(image6){
        $("#upload_org_code_img6").attr("src",null);
        $("#file_lvgang6").attr("value",null);
        $("#upload_org_code_img6").hide();
        $("#buttonlv").show();
        $("#file_upload_lvgang").show();
    }else{
        if(image5){
            $("#upload_org_code_img5").attr("src",null);
            $("#file_lvgang5").attr("value",null);
            $("#upload_org_code_img5").hide();
            $("#buttonlv").show();
        }else{
            if(image4){
                $("#upload_org_code_img4").attr("src",null);
                $("#file_lvgang4").attr("value",null);
                $("#upload_org_code_img4").hide();
                $("#buttonlv").show();
            }else{
                if(image3){
                    $("#upload_org_code_img3").attr("src",null);
                    $("#file_lvgang3").attr("value",null);
                    $("#upload_org_code_img3").hide();
                    $("#buttonlv").show();
                }else{
                    if(image2){
                        $("#upload_org_code_img2").attr("src",null);
                        $("#file_lvgang2").attr("value",null);
                        $("#upload_org_code_img2").hide();
                        $("#buttonlv").show();
                    }else{
                        if(image1){
                            $("#upload_org_code_img1").attr("src",null);
                            $("#file_lvgang1").attr("value",null);
                            $("#upload_org_code_img1").hide();
                            $("#buttonlv").hide();
                        }else{
                            //没有操作了！
                        }
                    }
                }
            }
        }
    }
});







