<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>UHouse</title>
<!--theme-style-->
<link href="/uhouse/Application/Home/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/uhouse/Application/Home/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Journey Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- web-font -->
<!--<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->
<!-- web-font -->
<!-- js -->
<script src="/uhouse/Application/Home/public/js/calculator.js"></script>
<script src="/uhouse/Application/Home/public/js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/uhouse/Application/Home/public/js/move-top.js"></script>
<script type="text/javascript" src="/uhouse/Application/Home/public/js/easing.js"></script>
<script type="text/javascript">
            $(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
</head>
    <body>
        <!-- header -->
        <div class="header">
            <!-- container -->
            <div class="container">
                <div class="">
                    <div class="head-logo">
                        <h1 href="index.html" >UHouse</h1>
                    </div>
                    <div class="logo-border"> </div>
                    <div class="top-nav">
                        <span class="menu"> </span>
                            
                            <!-- script-for-menu -->
                             
                        <!-- /script-for-menu -->
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- //container -->
        </div>
        <!-- //header -->
        <!-- banner-grids -->
        <div class="banner-grids">
            <!-- container -->
            <div class="container">
                <div class="banner-grid-info">
                    <h3>买 OR 租</h3>
                </div>

                <div class="top-grids">
                    <div class="top-grid">

                        <div class="top-grid-info">
                            <div class="price">价</div>
                            <p>房子价格</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="2500000" id="a1" onmouseout="compute();"/> <b>元</b>
                            </div>
                        </div>
                    </div>
                    <div class="top-grid">
                        
                        <div class="top-grid-info">
                            <div class="price">住</div>
                            <p>预期居住时间</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="20" id="a2" onmouseout="compute();"/> <b>年</b>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>

                <div class="top-grids">
                    <div class="top-grid">

                        <div class="top-grid-info">
                            <div class="price">率</div>
                            <p>贷款利率</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="3.67" id="a3" onmouseout="compute();" /> <b>%</b>
                            </div>
                        </div>
                    </div>
                    <div class="top-grid">
                        
                        <div class="top-grid-info">
                            <div class="price">付</div>
                            <p>首付</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="25" id="a4" onmouseout="compute();"/> <b>%</b>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="top-grids">
                    <div class="top-grid">
                        
                        <div class="top-grid-info">
                            <div class="price">时</div>
                            <p>贷款时长</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="30" id="a5" onmouseout="compute();"/> <b>年</b>
                            </div>
                        </div>
                    </div>
                    <div class="top-grid">
                        
                        <div class="top-grid-info"> 
                            <div class="price">买</div>
                            <p>买房成本</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="4" id="a11" onmouseout="compute();"/> <b>%</b>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="top-grids">
                    <div class="top-grid">
                        
                        <div class="top-grid-info">
                            <div class="price">卖</div>
                            <p>卖方成本</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="6" id="a12" onmouseout="compute();"/> <b>%</b>
                            </div>
                        </div>
                    </div>
                    <div class="top-grid">
                        
                        <div class="top-grid-info">
                            <div class="price">费</div>
                            <p>每月水电费</p>
                            <div class="input_block">
                                <input type="text" class="input_style" value="100" id="a15" onmouseout="compute();" /> <b>元</b>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
            <!-- //container -->
            <div class="right_main">
                <div class="top_block_right"></div>
                <div class="text_header">
                    <h1>如果你可以租到一个房子，每月租金不到…</h1>
                </div>
                <div class="text_body">
                    <div class=".g-primary-cost-value">
                        <span class="span_font">￥<span id="price">4948</span></span>
                    </div>
                </div>
                <div class="text_footer">
                    <h1>…租房更划算</h1>
                </div>
            </div>
        </div>
        <!-- //banner-grids -->
        <!-- who -->

        <!-- //footer -->
    
                                    
    <!-- content-Get-in-touch -->
    </body>
</html>