<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>发布房源</title>

    <!-- Bootstrap -->
    <link href="/uhouse/Public/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/uhouse/Public/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/uhouse/Public/css/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/uhouse/Public/css/build/css/custom.min.css" rel="stylesheet">

    <link href="/uhouse/Public/css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/uhouse/Public/css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/uhouse/Public/css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/uhouse/Public/css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/uhouse/Public/css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/uhouse/Public/css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/uhouse/Public/css/party/uploadify.css">
    <link rel="stylesheet" type="text/css" href="/uhouse/Public/css/button.css">
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
                    <h2>发布房源</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate id="releaseByLvgang">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="community_city">小区所在城市</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="community_city" class="form-control col-md-7 col-xs-12" name="community_city" required="required" type="" placeholder="上海市" value="" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="community_name">小区名</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="community_name" class="form-control col-md-7 col-xs-12" name="community_name" required="required" type="text" placeholder="远光小区" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="community_location">小区地址</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="community_location" class="form-control col-md-7 col-xs-12" name="community_location" required="required" type="text" placeholder="上海市杨浦区国定路777号" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="house_location">房屋地址</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="house_location" class="form-control col-md-7 col-xs-12" name="house_location" required="required" type="text" placeholder="6栋6楼606室" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">户型</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="type" class="form-control col-md-7 col-xs-12" name="type" required="required" type="text" placeholder="两室一厅" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">面积</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="area" class="form-control col-md-7 col-xs-12" name="area" required="required" type="text" placeholder="42平米" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">您的预期租金</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="price" class="form-control col-md-7 col-xs-12" name="price" required="required" type="text" placeholder="4200元" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detail">详细信息</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="detail" class="form-control col-md-7 col-xs-12" name="detail"  type="text" placeholder="可不填" ></textarea>
                        </div>
                      </div>




                      <!--上传图片,已解决！-->

                      <!--上传图片-->
                      <div class="item form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thumb">房屋照片(最多上传6张）</label>
                        <button class="button button-large button-plain button-border button-square" id="buttonlv" type="button"><i class="fa fa-trash-o"></i></button>
                        <div class="col-sm-5" id="col-lvgang-1">
                          <input id="file_upload_lvgang"  type="file" multiple="true" >

                        <div id="mmp2">
                          <!--上传图片1-->
                          <img style="display: none" id="upload_org_code_img1" src="" width="120" height="120">
                          <input id="file_lvgang1" name="image1" type="hidden" multiple="true" value="">
                          <!--上传图片2-->
                          <img style="display: none" id="upload_org_code_img2" src="" width="120" height="120">
                          <input id="file_lvgang2" name="image2" type="hidden" multiple="true" value="">
                          <!--上传图片3-->
                          <img style="display: none" id="upload_org_code_img3" src="" width="120" height="120">
                          <input id="file_lvgang3" name="image3" type="hidden" multiple="true" value="">
                        </div>

                        </div>
                      </div>

                      <!--上传图片-->
                      <div class="item form-group" id="lvganglaile3">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thumb"></label>
                        <div class="col-sm-5" id="col-lvgang-2">

                        <div id="mmp2">
                          <!--上传图片4-->
                          <img style="display: none" id="upload_org_code_img4" src="" width="120" height="120">
                          <input id="file_lvgang4" name="image4" type="hidden" multiple="true" value="">
                          <!--上传图片5-->
                          <img style="display: none" id="upload_org_code_img5" src="" width="120" height="120">
                          <input id="file_lvgang5" name="image5" type="hidden" multiple="true" value="">
                          <!--上传图片6-->
                          <img style="display: none" id="upload_org_code_img6" src="" width="120" height="120">
                          <input id="file_lvgang6" name="image6" type="hidden" multiple="true" value="">
                        </div>

                        </div>
                      </div>





                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" onclick="changeHref()">取消</button>
                          <button id="sendByLandlord" type="button" class="btn btn-success">确认</button>
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

    <!-- Custom Theme Scripts -->
    <script src="/uhouse/Public/css/build/js/custom.min.js"></script>

  <script>
      var SCOPE={
          'save_url':'/uhouse/admin.php?c=landlord&a=check',
          'jump_url':'/uhouse/admin.php?c=index',
          'ajax_upload_swf':'/uhouse/Public/js/party/uploadify.swf',
          'ajax_upload_image_url':'/uhouse/admin.php?c=landlord&a=ajaxuploadimage'
      }

      function changeHref(){
          window.location.href="/uhouse/admin.php?c=index";
      }
  </script>

  <script src="/uhouse/Public/js/admin/image.js"></script>
  <script src="/uhouse/Public/js/dialog/layer.js"></script>
  <script src="/uhouse/Public/js/dialog.js"></script>
  <script src="/uhouse/Public/js/admin/landlord.js"></script>
  <script type="text/javascript" src="/uhouse/Public/js/party/jquery.uploadify.js"></script>

  </body>
</html>