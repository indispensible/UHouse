<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>UHouse</title>

  <!-- Bootstrap -->
  <link href="/uhouse/Public/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/uhouse/Public/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/uhouse/Public/css/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="/uhouse/Public/css/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- iCheck -->
  <link href="/uhouse/Public/css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="/uhouse/Public/css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="/uhouse/Public/css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="/uhouse/Public/css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="/uhouse/Public/css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="/uhouse/Public/css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/uhouse/Public/css/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form enctype="multipart/form-data" method="post">
              <h1>房东登录</h1>
              <div>
                <input type="text" class="form-control" placeholder="用户名" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="密码" required="" name="password"/>
              </div>
              <div>
                <button class="btn btn-default submit" type="button" onclick="login.check()" >登录</button>
              </div>
            </form>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">新用户？
                  <a href="/uhouse/Application/Admin/View/Login/register.html" class="to_register"> 创建账户 </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> UHouse</h1>
                </div>
              </div>
          </section>
        </div>


      </div>
    </div>

    <script src="/uhouse/Public/js/jquery.js"></script>
    <script src="/uhouse/Public/js/dialog/layer.js"></script>
    <script src="/uhouse/Public/js/dialog.js"></script>
    <script src="/uhouse/Public/js/admin/login.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>