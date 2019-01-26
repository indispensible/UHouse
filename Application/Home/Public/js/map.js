
 var map = new AMap.Map("container", {
    resizeEnable: true,
    zoomEnable: true,
    center: [121.497888,31.304371],
    zoom: 15
});

var scale = new AMap.Scale();
map.addControl(scale);

var arrivalRange = new AMap.ArrivalRange();
var x, y, t, time = 15, vehicle = "SUBWAY,BUS";
var workAddress, workMarker;
var rentMarkerArray = [];
var polygonArray = [];
var amapTransfer;

var infoWindow = new AMap.InfoWindow({
    offset: new AMap.Pixel(0, -30)
});

var auto = new AMap.Autocomplete({
    input: "work-location"
});
AMap.event.addListener(auto, "select", workLocationSelected);

var auto1 = new AMap.Autocomplete({
    input: "destination-location"
});
AMap.event.addListener(auto1, "select1", workLocationSelected);


function takeBus(radio) {
    vehicle = radio.value;
    loadWorkLocation()
}

function takeSubway(radio) {
    vehicle = radio.value;
    loadWorkLocation()
}

function importRentInfo(fileInfo) {
    var file = fileInfo.files[0].name;
    loadRentLocationByFile(file);
}

function workLocationSelected(e) {
    workAddress = e.poi.name;
    loadWorkLocation();
}

function loadWorkMarker(x, y, locationName) {
    workMarker = new AMap.Marker({
        map: map,
        title: locationName,
        icon: 'http://webapi.amap.com/theme/v1.3/markers/n/mark_r.png',
        position: [x, y]

    });
}


function loadWorkRange(x, y, t, color, v) {
    arrivalRange.search([x, y], t, function(status, result) {
        if (result.bounds) {
            for (var i = 0; i < result.bounds.length; i++) {
                var polygon = new AMap.Polygon({
                    map: map,
                    fillColor: color,
                    fillOpacity: "0.4",
                    strokeColor: color,
                    strokeOpacity: "0.8",
                    strokeWeight: 1
                });
                polygon.setPath(result.bounds[i]);
                polygonArray.push(polygon);
            }
        }
    }, {
        policy: v
    });
}

function addMarkerByAddress(address) {
    var geocoder = new AMap.Geocoder({
        city: "上海",
        radius: 1000
    });
    geocoder.getLocation(address, function(status, result) {
        if (status === "complete" && result.info === 'OK') {
            var geocode = result.geocodes[0];
            rentMarker = new AMap.Marker({
                map: map,
                title: address,
                icon: 'http://webapi.amap.com/theme/v1.3/markers/n/mark_b.png',
                position: [geocode.location.getLng(), geocode.location.getLat()]
            });
            rentMarkerArray.push(rentMarker);

            rentMarker.content = "<div>房源：<a target = '_blank' href='http://bj.58.com/pinpaigongyu/?key=" + address + "'>" + address + "</a><div>"
            rentMarker.on('click', function(e) {
                infoWindow.setContent(e.target.content);
                infoWindow.open(map, e.target.getPosition());
                if (amapTransfer) amapTransfer.clear();
                amapTransfer = new AMap.Transfer({
                    map: map,
                    policy: AMap.TransferPolicy.LEAST_TIME,
                    city: "上海",
                    panel: 'transfer-panel'
                });
                amapTransfer.search([{
                    keyword: workAddress
                }, {
                    keyword: address
                }], function(status, result) {})
            });
        }
    })
}

function delWorkLocation() {
    if (polygonArray) map.remove(polygonArray);
    if (workMarker) map.remove(workMarker);
    polygonArray = [];
}

function delRentLocation() {
    if (rentMarkerArray) map.remove(rentMarkerArray);
    rentMarkerArray = [];
}
var timeObj;
var vehiObj; 
function loadWorkLocation() {
    delWorkLocation();
    timeObj = document.getElementsByName("time");
    vehiObj = document.getElementsByName("vehicle");
    var geocoder = new AMap.Geocoder({
        city: "上海",
        radius: 1000
    });

    geocoder.getLocation(workAddress, function(status, result) {
        if (status === "complete" && result.info === 'OK') {
            var geocode = result.geocodes[0];
            x = geocode.location.getLng();
            y = geocode.location.getLat();
            for (var i = 0; i < timeObj.length; i++) {
                if (timeObj[i].checked == true) time = timeObj[i].value;
            }
            for (var i = 0; i < vehiObj.length; i++) {
                if (vehiObj[i].checked == true) vehicle = vehiObj[i].value;
            }
            loadWorkMarker(x, y);
            loadWorkRange(x, y, time, "#3f67a5", vehicle);
            map.setZoomAndCenter(12, [x, y]);
        }
    })
}

function loadRentLocationByFile(fileName) {
    delRentLocation();
    var rent_locations = new Set();
    $.get(fileName, function(data) {
        data = data.split("\n");
        data.forEach(function(item, index) {
            rent_locations.add(item.split(",")[1]);
        });
        rent_locations.forEach(function(element, index) {
            addMarkerByAddress(element);
        });
    });
}

//经纬度转换
var data=new Array();

    
    $.ajax({
        async:false,
        type:"post",
        dataType:"json",
        url:"/uhouse/index.php?c=index&a=marker",
        success:function(result){
            var json=result.data;
             $.each(json, function(idx, obj) {                
                  data.push(obj.rent_housing);     

            });
        }
    });

    
 function geocoder() {
            var geocoder = new AMap.Geocoder({
                city: "上海", //城市，默认：“全国”
                radius: 1000 //范围，默认：500
            });
                   
            //地理编码,返回地理编码结果




            for (var i = 0; i < data.length; i++)
            {
                geocoder.getLocation(data[i], function (status, result) {
                    if (status === 'complete' && result.info === 'OK') {
                        geocoder_CallBack(result);

                    }
                });
            }
        }


        //实例化信息窗体
        
        var title = '',
            content = [];
        content.push("");
        content.push("电话：010-64733333");




 //构建自定义信息窗体
 function createInfoWindow(title, housing_price_year) {

     var info = document.createElement("div");
     info.className = "info";

     //可以通过下面的方式修改自定义窗体的宽高
     //info.style.width = "400px";
     // 定义顶部标题
     var top = document.createElement("div");
     var titleD = document.createElement("div");
     var closeX = document.createElement("img");
     top.className = "info-top";
     titleD.innerHTML = title;
     closeX.src = "http://webapi.amap.com/images/close2.gif";
     closeX.onclick = closeInfoWindow;

     top.appendChild(titleD);
     top.appendChild(closeX);
     info.appendChild(top);

     // 定义中部内容
     var middle = document.createElement("div");
     middle.className = "info-middle";
     middle.style.backgroundColor = 'white';

     var canvas=document.createElement("canvas");
     var context=canvas.getContext('2d');
     canvas.className='canvas';

     //箭头绘制
     context.beginPath();
     context.moveTo(0,7);
     context.lineTo(4,0);
     context.lineTo(8,7);
     context.lineWidth=2;
     context.strokeStyle='#909090';

     context.stroke();

     context.beginPath();
     context.moveTo(4,0);
     context.lineTo(4,146);
     context.lineTo(299,146);
     context.lineWidth=2;
     context.strokeStyle='#909090';

     context.stroke();

     context.beginPath();
     context.moveTo(292,142);
     context.lineTo(299,146);
     context.lineTo(292,150);
     context.lineWidth=2;
     context.strokeStyle='#909090';

     context.stroke();

     //canvas中的文字
     context.font="normal 12px Arial";
     context.fillStyle="#000000";
     context.fillText("价格",10,12);
     context.fillText("月",286,122);
     context.fillText("份",286,134);


     //画图功能部分
     var n=new Array(12);
     var a=new Array(12);
     var b=new Array(12);

     for(var nnn=0;nnn<=11;nnn++){
         n[nnn]=0;
     }


     //1月
     var a_time =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10,146-n[0]);
         context.lineTo(26,146-n[0]);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[0]++;
         if(n[0]>=46){
             window.clearInterval(a_time);
         }
     },9)

     for(var i=1;i<=11;i++){
         a[i]=(housing_price_year[i]-housing_price_year[0])/housing_price_year[0]*270+50;
     }

     //2月
     var a_time_1 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+1*23,146);
         context.lineTo(10+1*23,146-n[1]);
         context.lineTo(26+1*23,146-n[1]);
         context.lineTo(26+1*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[1]++;
         if(n[1]>=a[1]){
             window.clearInterval(a_time_1);
         }
     },7)

     //3月
     var a_time_2 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+2*23,146);
         context.lineTo(10+2*23,146-n[2]);
         context.lineTo(26+2*23,146-n[2]);
         context.lineTo(26+2*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[2]++;
         if(n[2]>=a[2]){
             window.clearInterval(a_time_2);
         }
     },6.9)

     //4月
     var a_time_3 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+3*23,146);
         context.lineTo(10+3*23,146-n[3]);
         context.lineTo(26+3*23,146-n[3]);
         context.lineTo(26+3*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[3]++;
         if(n[3]>=a[3]){
             window.clearInterval(a_time_3);
         }
     },6.5)

     //5月
     var a_time_4 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+4*23,146);
         context.lineTo(10+4*23,146-n[4]);
         context.lineTo(26+4*23,146-n[4]);
         context.lineTo(26+4*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[4]++;
         if(n[4]>=a[4]){
             window.clearInterval(a_time_4);
         }
     },6.1)

     //6月
     var a_time_5 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+5*23,146);
         context.lineTo(10+5*23,146-n[5]);
         context.lineTo(26+5*23,146-n[5]);
         context.lineTo(26+5*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[5]++;
         if(n[5]>=a[5]){
             window.clearInterval(a_time_5);
         }
     },5.9)

     //7月
     var a_time_6 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+6*23,146);
         context.lineTo(10+6*23,146-n[6]);
         context.lineTo(26+6*23,146-n[6]);
         context.lineTo(26+6*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[6]++;
         if(n[6]>=a[6]){
             window.clearInterval(a_time_6);
         }
     },5.7)

     //8月
     var a_time_7 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+7*23,146);
         context.lineTo(10+7*23,146-n[7]);
         context.lineTo(26+7*23,146-n[7]);
         context.lineTo(26+7*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[7]++;
         if(n[7]>=a[7]){
             window.clearInterval(a_time_7);
         }
     },5.4)

     //9月
     var a_time_8 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+8*23,146);
         context.lineTo(10+8*23,146-n[8]);
         context.lineTo(26+8*23,146-n[8]);
         context.lineTo(26+8*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[8]++;
         if(n[8]>=a[8]){
             window.clearInterval(a_time_8);
         }
     },5)

     //10月
     var a_time_9 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+9*23,146);
         context.lineTo(10+9*23,146-n[9]);
         context.lineTo(26+9*23,146-n[9]);
         context.lineTo(26+9*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[9]++;
         if(n[9]>=a[9]){
             window.clearInterval(a_time_9);
         }
     },4.8)


     //11月
     var a_time_10 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+10*23,146);
         context.lineTo(10+10*23,146-n[10]);
         context.lineTo(26+10*23,146-n[10]);
         context.lineTo(26+10*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[10]++;
         if(n[10]>=a[10]){
             window.clearInterval(a_time_10);
         }
     },4.5)


     //12月
     var a_time_11 =window.setInterval(function(){
         context.beginPath();
         context.moveTo(10+11*23,146);
         context.lineTo(10+11*23,146-n[11]);
         context.lineTo(26+11*23,146-n[11]);
         context.lineTo(26+11*23,146);
         context.lineWidth=1;
         context.strokeStyle='#3399FF';
         context.stroke();
         n[11]++;
         if(n[11]>=a[11]){
             window.clearInterval(a_time_11);
         }
     },4.3)


     //直线绘制
     var i_line=1;

     var line_time=window.setInterval(function(){

         var j=(housing_price_year[i_line]-housing_price_year[0])/housing_price_year[0]*280;
         var b=(housing_price_year[i_line-1]-housing_price_year[0])/housing_price_year[0]*280;


         context.beginPath();
         context.strokeStyle='#FF6633';
         context.moveTo(-5+i_line*23,62-b);
         context.lineTo(18+i_line*23,62-j);
         context.closePath();
         context.lineWidth=2;
         context.stroke();


         i_line++;
         if(i_line>=12){
             window.clearInterval(line_time);
         }
     },44)



     middle.appendChild(canvas);
     info.appendChild(middle);

     // 定义底部内容
     var bottom = document.createElement("div");
     bottom.className = "info-bottom";
     bottom.style.position = 'relative';
     bottom.style.top = '0px';
     bottom.style.margin = '0 auto';
     var sharp = document.createElement("img");
     sharp.src = "http://webapi.amap.com/images/sharp.png";
     bottom.appendChild(sharp);
     info.appendChild(bottom);

     return info;
 }

 //关闭信息窗体

 function closeInfoWindow() {
     map.clearInfoWindow();
 }

 //创建markers
 var c=new Array();
 var markers = [];




 function addMarker(i, d) {

     var marker = new AMap.Marker({
         map: map,
         position: [d.location.getLng(), d.location.getLat()]

     });




     var b1=d.formattedAddress.substring(3);
     var b2=d.addressComponent.district;
     var b3=b2.substring(b2.length-1);
     var m=0
     for(m=0;m<b1.length;m++)
     {
         if(b3==b1.substring(m,m+1)) break;
     }
     var b=b1.substring(m+1);

     //点击在地图显示小区信息
     marker.on("click", function (e)
     {

         var title=new Array();
         var content = [];
         var housing_price_year=[];

         $.ajax({
             async:false,
             type:"post",
             dataType:"json",
             data: {loc:b},
             url:"/uhouse/index.php?c=index&a=housing",
             success:function(result){
                 //调取匹配的信息窗体展
                 var json = result.data;
                 $.each(json, function(idx, obj) {

                     title.push(obj.rent_housing+'<span style="font-size:11px;color:#F00;">价格:'+obj.price1+" UHouse"+'</span>');
                     content.push("<img src='http://tpc.googlesyndication.com/simgad/5843493769827749134'>地址："+obj.rent_condo_loc);
                     content.push("UHOUSE");
                     housing_price_year.push(obj.price1);
                     housing_price_year.push(obj.price2);
                     housing_price_year.push(obj.price3);
                     housing_price_year.push(obj.price4);
                     housing_price_year.push(obj.price5);
                     housing_price_year.push(obj.price6);
                     housing_price_year.push(obj.price7);
                     housing_price_year.push(obj.price8);
                     housing_price_year.push(obj.price9);
                     housing_price_year.push(obj.price10);
                     housing_price_year.push(obj.price11);
                     housing_price_year.push(obj.price12);

                 })
             }
         })




         var infoWindow = new AMap.InfoWindow({
             isCustom: true,  //使用自定义窗体
             content: createInfoWindow(title, housing_price_year),
             offset: new AMap.Pixel(16, -45)
         });



         infoWindow.open(map, marker.getPosition());


     });


                    
                    marker.on("click", function (e) 
                    {
                        var title=new Array();
                        var price=new Array();
                        var area=new Array();
                        var type=new Array();
                        var loc=new Array();
                        var housing=new Array();
                        var img=new Array();
                        var web=new Array();
                        var id=new Array();

                        c=b;

                        //AJAX调取数据
                         $.ajax({
                            async:false,
                            type:"post",
                            dataType:"json",
                            data: {loc:b,price_min:price_min,price_max:price,area_min:area_min,area_max:area_max,room:room},
                            url:"/uhouse/index.php?c=index&a=info",
                            success:function(result){
                                var json=result.data;
                                $.each(json, function(idx, obj) {
                                           // housing.push(boj.rent_housing)
                                            title.push(obj.rent_condo_title);
                                            price.push(obj.rent_condo_price);
                                            area.push(obj.rent_condo_area);
                                            type.push(obj.rent_condo_type);
                                            loc.push(obj.rent_condo_loc);
                                            img.push(obj.rent_condo_pic);
                                            web.push(obj.rent_condo_url);
                                            id.push(obj.rent_condo_id);
                                });
                            }              
                        })

                         

                         var oAside = document.getElementById('aside');
                         document.getElementById('aside').innerHTML = "";
                        for (var i = 0; i < title.length; i++) {
                            var oDiviv = document.createElement('div');
                            oDiviv.innerHTML = '<div id="list-box"><div class="list-title"><a href=" ' + web[i] + ' "  align="center" target="_blank" class="list-title-text">' + title[i] + '</a ></div><div class="list-info"><p class="list-info-info">租金：' + price[i] + '</p ><p class="list-info-info">面积：' + area[i] +/*' </p ><p class="list-info-info">户型：' + type[i]  + */'</p ><p class="nibaba" >位置：' + loc[i]+'</p ></div><div class="list-img"><img class="imagelv" src="/uhouse/Application/Home/Public/img/'+img[i]+'" width="140px" height="104px"></div><input type="button" onclick="lvgangfunction(this)" value="好房？" class="gangbaba" id="'+id[i]+'"></div>';
                            oDiviv.className = "list-box";
                            oAside.appendChild(oDiviv);
                        }

                    })


                    
                  markers.push(marker);


                    
                    
                }
                

 //点击header,返回相应的值
                var price_min,price_max;
                var area_min,area_max;
                var room;

                var btn1=document.getElementById("select_price");
                var btn2=document.getElementById("select_area");
                var btn3=document.getElementById("select_room");

                var price1=0;
                var price2=1000;
                var price3=2000;
                var price4=4000;
                var price5=6000;
                var price6=8000;
                var price7=12000;

                var area0=0;
                var area1=50.00;
                var area2=70.00;
                var area3=90.00;
                var area4=110.00;
                var area5=150.00;

                var room1=0;
                var room2="1";
                var room3="2";
                var room4="3";
                var room5="4";
                var room6="5";


function select_summary(){

                   var variable1=btn1.selectedIndex;
                   switch(variable1)
                   {
                    case 0:price_min=price1;price_max=100000000000;break;
                    case 1:price_min=price2;price_max=price3;break;
                    case 2:price_min=price3;price_max=price4;break;
                    case 3:price_min=price4;price_max=price5;break;
                    case 4:price_min=price5;price_max=price6;break;
                    case 5:price_min=price6;price_max=price7;break;
                    case 6:price_min=price7;price_max=100000000000;break;
                    default:alert("Error!");break;
                   }
                
                   var variable2=btn2.selectedIndex;
                   switch(variable2)
                   {
                    case 0:area_min=area0;area_max=10000;break;
                    case 1:area_min=area0;area_max=area1;break;
                    case 2:area_min=area1;area_max=area2;break;
                    case 3:area_min=area2;area_max=area3;break;
                    case 4:area_min=area3;area_max=area4;break;
                    case 5:area_min=area4;area_max=area5;break;
                    case 6:area_min=area5;area_max=0;break;
                    default:alert("Error!");break;
                   }
                
                   var variable3=btn3.selectedIndex;
                   switch(variable3)
                   {
                    case 0:room=room1;break;
                    case 1:room=room2;break;
                    case 2:room=room3;break;
                    case 3:room=room4;break;
                    case 4:room=room5;break;
                    case 5:room=room6;break;
                    case 5:room=6;break;
                    default:alert("Error!");break;
                   }
                
                


                var data=new Array();
                var title=new Array();
                        var price=new Array();
                        var area=new Array();
                        var type=new Array();
                        var loc=new Array();
                        var housing=new Array();
                        var img=new Array();
                        var web=new Array();
                        var id=new Array();

    
                    $.ajax({
                        async:false,
                        type:"post",
                        dataType:"json",
                        data:{loc:c,price_min:price_min,price_max:price_max,area_min:area_min,area_max:area_max,room:room},
                        url:"/uhouse/index.php/Home/Map/markerchange",
                        success:function(result){
                                var json=result.data;
                                $.each(json, function(idx, obj) {
                                           // housing.push(boj.rent_housing)
                                            title.push(obj.rent_condo_title);
                                            price.push(obj.rent_condo_price);
                                            area.push(obj.rent_condo_area);
                                            type.push(obj.rent_condo_type);
                                            loc.push(obj.rent_condo_loc);
                                            img.push(obj.rent_condo_pic);
                                            web.push(obj.rent_condo_url);
                                            id.push(obj.rent_condo_id);
                                });
                            }              
                        })

                         
                            
                         var oAside = document.getElementById('aside');
                         document.getElementById('aside').innerHTML = "";
                        for (var i = 0; i < title.length; i++) {
                            var oDiviv = document.createElement('div');
                            oDiviv.innerHTML = '<div id="list-box"><div class="list-title"><a href=" ' + web[i] + ' "  align="center" target="_blank" class="list-title-text">' + title[i] + '</a ></div><div class="list-info"><p class="list-info-info">租金：' + price[i] + '</p ><p class="list-info-info">面积：' + area[i] +/*' </p ><p class="list-info-info">户型：' + type[i]  + */'</p ><p class="list-info-info">位置：' + loc[i]+'</p ></div><div class="list-img"><img src="/uhouse/Application/Home/Public/img/'+img[i]+'" width="140px" height="104px"></div><input type="button" onclick="lvgangfunction(this)" value="好房？" class="gangbaba" id="'+id[i]+'"></div>';
                            oDiviv.className = "list-box";
                            oAside.appendChild(oDiviv);
                        }





}



                //地理编码返回结果展示
                
                function geocoder_CallBack(data) {
                    //地理编码结果数组
                    
                    var geocode = data.geocodes;
                    for (var i = 0; i < geocode.length; i++) {
                        addMarker(i, geocode[i]);
                         
                    }
                         
                }
            
                //当zoom小于13时，markers消失formattedAddress-b1-b2;
                var _onZoomEnd = function (e) {
                    if (map.getZoom() < 14) {
                        for (var i = 0; i < markers.length; i += 1) {
                            map.remove(markers[i]);
                        }
                    }
                    else {
                        for (var i = 0; i < markers.length; i += 1) {
                            map.add(markers[i])
                        }
                    }
                }

                AMap.event.addListener(map, 'zoomend', _onZoomEnd);
                
                //点击header,返回相应的值


           
           