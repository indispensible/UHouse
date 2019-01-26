<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>查看已发布的房源</title>

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
                    <h2>已发布的房源</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <table id="dataLvgang" class="table table-striped table-bordered">

                      <thead>
                        <tr>
                          <th>小区名</th>
                          <th>小区地址</th>
                          <th>房屋详细地址</th>
                          <th>面积</th>
                          <th>户型</th>
                          <th>租金</th>
                          <th>房屋图片</th>
                          <th>详细信息</th>
                          <th>修改or删除</th>
                        </tr>
                      </thead>

                      <?php if(is_array($lvgang)): $i = 0; $__LIST__ = $lvgang;if( count($__LIST__)==0 ) : echo "您暂时还没有发布房源哦！" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
                          <tr>
                            <td><?php echo ($vo["community_name"]); ?></td>
                            <td><?php echo ($vo["community_location"]); ?></td>
                            <td><?php echo ($vo["house_location"]); ?></td>
                            <td><?php echo ($vo["area"]); ?></td>
                            <td><?php echo ($vo["type"]); ?></td>
                            <td><?php echo ($vo["price"]); ?></td>
                            <td><?php echo ($vo["imagenum"]); ?></td>
                            <td><a class="lvgang-detail" value="<?php echo ($vo["house_id"]); ?>" target="_blank">查看更多详细信息！</a></td>

                            <td>

                              <a  class="lvgang-update" attr-message="修改" value="<?php echo ($vo["house_id"]); ?>" >
                              <span class="glyphicon glyphicon-edit" aria-hidden="true" id="lvgang-edit" attr-id=""></span>
                              </a>
                              <a  class="lvgang-delete"   attr-message="删除" value="<?php echo ($vo["house_id"]); ?>">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                              </a>

                            </td>

                          </tr>

                        </tbody><?php endforeach; endif; else: echo "您暂时还没有发布房源哦！" ;endif; ?>

                    </table>

                    <div class="row">
                      <div class="col-sm-5">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                           共发布了 <?php echo ($houseCount); ?> 个房源

                          <input type="hidden" value="<?php echo ($houseCount); ?>" id="dealPageByLvgang">

                        </div>
                      </div>

                      <div class="col-sm-7" id="lvgangdecss3">
                        <?php echo ($pageLvgang); ?>
                      </div>
                    </div>



                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <br />
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
    <!-- iCheck -->
    <script src="/uhouse/Public/css/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/uhouse/Public/css/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/uhouse/Public/css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/uhouse/Public/css/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/uhouse/Public/css/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/uhouse/Public/css/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/uhouse/Public/css/build/js/custom.min.js"></script>

     <!--
     @lvgang制造
     分页处理的js方法！
     -->
     <script src="/uhouse/Public/js/pageDeal.js"></script>

     <!--
     @lvgang制造
     删除处理的js方法！
     -->
     <script src="/uhouse/Public/js/admin/operate.js"></script>


      <!-- jQuery -->
      <script src="/uhouse/Public/js/dialog/layer.js"></script>
      <script src="/uhouse/Public/js/dialog.js"></script>
      <script type="text/javascript" src="/uhouse/Public/js/party/jquery.uploadify.js"></script>

  </body>
</html>