<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>UHouse</title>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css?v=1.0" />
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css" />
    <link rel="stylesheet" href="/uhouse/Public/css/lvgang.css">
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/jquery.range.css" />
    <link rel="stylesheet" type="text/css" href="/uhouse/Public/css/button.css">


    <script src="http://cache.amap.com/lbs/static/es5.min.js"></script>
    <script src="http://webapi.amap.com/maps?v=1.3&key=22d3816e107f199992666d6412fa0691&plugin=AMap.ArrivalRange,AMap.Scale,AMap.Geocoder,AMap.Transfer,AMap.Autocomplete"></script>

    <style>
        body {
            font-size: 12px;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        .amap-info-close {
            top: 10px;
        }

        .info {
            border: solid 1px silver;
        }

        div.info-top {
            position: relative;
            background: none repeat scroll 0 0 #F9F9F9;
            border-bottom: 1px solid #CCC;
            border-radius: 5px 5px 0 0;
        }

            div.info-top div {
                display: inline-block;
                color: #333333;
                font-size: 14px;
                font-weight: bold;
                line-height: 31px;
                padding: 0 10px;
            }

            div.info-top img {
                position: absolute;
                top: 10px;
                right: 10px;
                transition-duration: 0.25s;
            }

                div.info-top img:hover {
                    box-shadow: 0px 0px 5px #000;
                }

        div.info-middle {
            font-size: 12px;
            height: 154px;
            line-height: 20px;
            padding: 5px 0 0 7px;
            width: 312px;
        }

        div.info-bottom {
            height: 0px;
            width: 100%;
            clear: both;
            text-align: center;
        }

            div.info-bottom img {
                position: relative;
                z-index: 104;
            }

        span {
            margin-left: 5px;
            font-size: 11px;
        }

        .info-middle img {
            float: left;
            margin-right: 6px;
        }

        #ti {
            background-color: #fff;
            padding-left: 10px;
            padding-right: 10px;
            position: absolute;
            font-size: 12px;
            right: 10px;
            top: 20px;
            border-radius: 3px;
            border: 1px solid #ccc;
            height: auto;
        }


        #header {
            height: 88px;
            width: 100%;
            margin-top: -90px;
            border-bottom: 2px solid #FF2334;
        }

        #aside {
            height: calc(100% - 60px);
            width: 300px;
            overflow-y: auto;
            overflow-x: hidden;
            margin-top: 60px;
        }

        #section {
            height: calc(100% - 60px);
            width: calc(100% - 300px);
            margin-top: 60px;
        }

        #container {
            width: calc(100% - 300px);
            height: calc(100% - 60px);
            margin-top: 60px;
            margin-left: 300px;
        }

        .control-panel {
            position: absolute;
            top: 120px;
            right: 20px;
            font-size: 16px;
        }

        .control-entry {
            width: 280px;
            background-color: rgba(119, 136, 153, 0.8);
            text-align: left;
            color: white;
            overflow: auto;
            padding: 10px;
            margin-bottom: 10px;
        }

        .control-input {
            margin-left: 120px;
        }

            .control-input input[type="text"] {
                width: 160px;
            }

        .control-panel label {
            float: left;
            width: 120px;
        }

        #transfer-panel {
            position: absolute;
            background-color: white;
            max-height: 80%;
            overflow-y: auto;
            top: 30px;
            left: 20px;
            width: 250px;
        }

        #list-box {
            height: 198px;
            width: 100%;
            border: 2px solid #ADF;
            overflow-y: hidden;
        }

        .list-title {
            height: 44px;
            width: 100%;
        }

        .list-title-text {
            height: 35.2px;
            width: 100%;
            margin-top: 4.4px;
        }

        .list-info {
            display: inline-block;
            height: 100px;
            width: 104px;
        }

        .list-info-info {
            width: 100%;
            margin-top: 9px;
            margin-bottom: 9px;
        }

        .list-img {
            display: inline-block;
            height: 100px;
            width: 135px;
            margin-left: 30px;
        }

        #logo {
            display: inline-block;
            height: 90px;
            margin-top: 90px;
            width: 140px;
        }

       #option-box {
            display: inline-block;
            margin-left: 80px;
            height: 90px;
            width: 100%;
            position: absolute;
            top: -1.8%;
        }



        .option-title {
            display: inline-block;
            position: absolute;
            margin-top: 35px;
            height: 20px;
            width: 100px;
            font-size: 18px;
        }

        .option-option {
            display: inline-block;
            margin-left: 3%;
            height: 60px;
            width: 11%;
        }


        .option-choice {
            display: inline-block;
            margin-top: 30px;
            height: 30px;
            width: 8%;
            z-index: 1;
            margin-left: 80px;
            position: absolute;
            border-radius: 11px;
        }

        
        #logo-logo {
            margin-left: 70px;
            width: 140px;
        }

        a{
            text-decoration: none;
            color:black;
        }
        h1{
            color:#D0D0D0;
            margin:0px 0px 0px 70px;
            padding:0;
            font-size:40px;
        }

        .imagelv{
            position: relative;
            top: 12px;
        }

        .gangbaba{
            background-color: #04b5af;
            border-radius: 6px;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            height: 26px;
            line-height: 26px;
            margin: -2px 0 0 0;
            padding: 0 8px 0 13px;
        }

        #bbb{
            display: inline-block;
            height: 60px;
            margin-left: 10%;
            position: relative;
            top: -9px;
            width: 100px;
        }
        
    </style>
</head>
<body bgcolor="#FCFCFC" id="body" onload="geocoder()">
    <div id="header">
        <div id="logo">
            <h1>UHouse</h1>
        </div>
        <div id="option-box">
            <div class="option-option">
                <p align="center" class="option-title">租金</p>
                <select name="option-price" class="option-choice" size="1" id="select_price" onchange="select_summary()">
                    <option value="price-A" selected="selected">不限
                    <option value="price-B">1000-2000元
                    <option value="price-C">2000-4000元
                    <option value="price-D">4000-6000元
                    <option value="price-E">6000-8000元
                    <option value="price-F">8000-12000元
                    <option value="price-G">12000元以上
                </select>
            </div>
            <div class="option-option">
                <p align="center" class="option-title">面积</p>
                <select name="option-area" class="option-choice" size="1" id="select_area" onchange="select_summary()">
                    <option value="area-A" selected="selected">不限
                    <option value="area-B">50平以下
                    <option value="area-C">50-70平
                    <option value="area-D">70-90平
                    <option value="area-E">90-110平
                    <option value="area-F">110-150平
                    <option value="area-G">150平以上
                </select>
            </div>
            <div class="option-option" id="aaa">
                <p align="center" class="option-title">户型</p>
                <select name="option-room" class="option-choice" size="1" id="select_room" onchange="select_summary()">
                    <option value="room-A" selected="selected">不限
                    <option value="room-B">一室
                    <option value="room-C">二室
                    <option value="room-D">三室
                    <option value="room-E">四室
                    <option value="room-F">五室
                    <option value="room-G">五室以上
                </select>
            </div>

            <div id="bbb">
                <input value="租客后台" class="button button-pill button-primary" type="button" id="lvgangsss">
            </div>

        </div>
        <span id="result"></span>
    </div>

    <div id="aside">
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div id="list-box">
            <div class="list-title">
                <p align="center" class="list-title-text"><?php echo ($v["rent_condo_title"]); ?></p>
            </div>
            <div class="list-info">
                <p class="list-info-info">租金：<?php echo ($v["rent_condo_price"]); ?></p>
                <p class="list-info-info">面积：<?php echo ($v["rent_condo_area"]); ?></p>
                <p class="list-info-info">户型：<?php echo ($v["rent_condo_type"]); ?></p>
                <p class="list-info-info">小区：<?php echo ($v["rent_housing"]); ?></p>
                <p class="list-info-info">位置：<?php echo ($v["rent_condo_loc"]); ?></p>
            </div>
            <div class="list-img">
                <img src="/uhouse/Application/Home/Public/img/house1.jpg" width="142px">
            </div>
        </div><?php endforeach; endif; ?>
    </div>

    <div id="section">
        <div id="container">
            <div id="aaaa">
                <span id="result_code"></span>

            </div>
        </div>
        <div class="control-panel">
            <div class="control-entry">
                <label>选择工作地点：</label>
                <div class="control-input">
                    <input id="work-location" type="text">
                </div>
            </div>
            <div class="control-entry">
                <label>选择通勤方式：</label>
                <div class="control-input">
                    <input type="radio" name="vehicle" value="SUBWAY,BUS" onClick="loadWorkLocation()" checked /> 公交地铁
                    <input type="radio" name="vehicle" value="SUBWAY" onClick="loadWorkLocation()" /> 地铁
                </div>
            </div>
            <div class="control-entry">
                <label>选择通勤时间：</label>
                <div class="control-input2">
                    <input type="radio" name="time" value="15" onClick="loadWorkLocation()" /> 15分钟
                    <input type="radio" name="time" value="30" onClick="loadWorkLocation()" /> 30分钟
                    <input type="radio" name="time" value="45" onClick="loadWorkLocation()"  checked/> 45分钟
                    <input type="radio" name="time" value="60" onClick="loadWorkLocation()" /> 60分钟
                </div>
            </div>
        </div>
        <div id="transfer-panel"></div>
    </div>
    <script type="text/javascript" src="/uhouse/Public/css/vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/uhouse/Application/Home/Public/js/map.js"></script>
    <script type="text/javascript" src="http://webapi.amap.com/demos/js/liteToolbar.js"></script>
    <script type="text/javascript" src="/uhouse/Application/Home/Public/js/mapchange.js"></script>
    <script type="text/javascript" src="/uhouse/Public/js/likethehouse.js"></script>
    <script src="/uhouse/Public/js/dialog/layer.js"></script>
    <script src="/uhouse/Public/js/dialog.js"></script>
</body>
</html>