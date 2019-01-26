/**
 * 前端登录业务类
 * @author singwa
 */
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();


        var url = "/uhouse/admin.php?c=Renterlogin&a=check";
        var data = {'username':username,'password':password};
        // 执行异步请求  $.post
        $.post(url,data,function(result){

            if(result.status == 0) {

                return dialog.error(result.message);
            }
            if(result.status == 1) {
                return dialog.success(result.message, '/uhouse/index.php?c=map&a=map');
            }

        },'JSON');

    },

    register:function(){
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();
        var phone=$('input[name="phone"]').val();
        var realname=$('input[name="realname"]').val();

        var url="/uhouse/admin.php?c=Renterlogin&a=register";
        var data={'username':username,
                  'password':password,
                  'phone':phone,
                  'realname':realname};

        $.post(url,data,function(result){

            if(result.status==0){
                return dialog.error(result.message);
            }
            if(result.status==1){
                return dialog.success(result.message,'/uhouse/admin.php?c=renterlogin');
            }
        },'JSON')
    }

}