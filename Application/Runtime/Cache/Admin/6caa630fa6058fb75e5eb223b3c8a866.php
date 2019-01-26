<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>个人资料</title>

    <!-- Bootstrap -->
    <link href="/uhouse/Public/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/uhouse/Public/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/uhouse/Public/css/vendors/nprogress/nprogress.css" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="/uhouse/Public/css/party/uploadify.css">
</head>

                <?php
$username=getLoginUsername(); $res=D('Admin')->getAdminByUsername($username); ?>

<body class="nav-md">
<input id="image_lvgang"  type="hidden"  value="<?php echo getLoginUsername()?>">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="" class="site_title"><i class="fa fa-paw"></i> <span>UHouse</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo $res['image']?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo getLoginRealName()?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> 发布 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/uhouse/admin.php?c=landlord&a=release">发布房源</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> 查看 <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/uhouse/admin.php?c=landlord">已发布的房源</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="设置">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="全屏">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="锁屏">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="退出" href="/uhouse/admin.php?c=login&a=loginout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $res['image']?>" alt=""><?php echo getLoginRealName()?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/uhouse/admin.php?c=person"> 个人资料</a></li>
                                <li><a href="/uhouse/admin.php?c=login&a=loginout"><i class="fa fa-sign-out pull-right"></i> 退出</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>欢迎使用UHouse系统！ <?php echo getLoginRealName()?></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="请输入内容">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">搜索</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="usernameByHidden" name="usernameByHidden" type="hidden"  value="<?php echo getLoginUsername()?>">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>房东个人资料</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate id="lvgangde">

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">姓名</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="realname" required="required" type="text" value="<?php echo ($ret["realname"]); ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">用户账号:</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <p class="lvgang" id="usernamelvgang" ><?php echo ($ret["username"]); ?></p>
                                            <span id="usernamelvgangde">(账号不可改变)</span>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password" >密码:</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" class="form-control col-md-7 col-xs-12" name="password" required="required" type="password" value="<?php echo ($ret["password"]); ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">手机号</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="phone" class="form-control col-md-7 col-xs-12" name="phone" required="required" type="text" value="<?php echo ($ret["phone"]); ?>" >
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thumb">头像:</label>
                                        <div class="col-sm-5">
                                            <input id="file_upload"  type="file" multiple="true" >
                                            <img style="" id="upload_org_code_img"  width="150" height="150" src="<?php echo ($ret["image"]); ?>">
                                            <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">取消</button>
                                            <button id="sendByLvgang" type="button" class="btn btn-success">确认</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<!-- jQuery -->
<script src="/uhouse/Public/css/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/uhouse/Public/css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/uhouse/Public/css/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/uhouse/Public/css/vendors/nprogress/nprogress.js"></script>
<!-- validator -->
<script src="/uhouse/Public/css/vendors/validator/validator.js"></script>

<script>
    var SCOPE={
        'save_url':'/uhouse/admin.php?c=person&a=check',
        'jump_url':'/uhouse/admin.php?c=index',
        'ajax_upload_swf':'/uhouse/Public/js/party/uploadify.swf',
        'ajax_upload_image_url':'/uhouse/admin.php?c=person&a=ajaxuploadimage'
    }
</script>

<!-- Custom Theme Scripts -->
<script src="/uhouse/Public/css/build/js/custom.min.js"></script>

<script src="/uhouse/Public/js/admin/image.js"></script>
<script src="/uhouse/Public/js/dialog/layer.js"></script>
<script src="/uhouse/Public/js/dialog.js"></script>
<script src="/uhouse/Public/js/admin/common.js"></script>
<script type="text/javascript" src="/uhouse/Public/js/party/jquery.uploadify.js"></script>


</body>
</html>