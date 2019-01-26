 var map = new AMap.Map("container", {
    resizeEnable: true,
    zoomEnable: true,
    center: [116.397428, 39.90923],
    zoom: 11
});

var scale = new AMap.Scale();
map.addControl(scale);

var arrivalRange = new AMap.ArrivalRange();
var x, y, t, vehicle = "SUBWAY,BUS";
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

function loadWorkLocation() {
    delWorkLocation();
    var geocoder = new AMap.Geocoder({
        city: "上海",
        radius: 1000
    });

    geocoder.getLocation(workAddress, function(status, result) {
        if (status === "complete" && result.info === 'OK') {
            var geocode = result.geocodes[0];
            x = geocode.location.getLng();
            y = geocode.location.getLat();
            loadWorkMarker(x, y);
            loadWorkRange(x, y, 60, "#3f67a5", vehicle);
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
        url:"/uhouse/index.php/Home/Index/marker",
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

/*
        //实例化信息窗体
        var title = '方恒假日酒店<span style="font-size:11px;color:#F00;">价格:318</span>','方恒假日酒店<span style="font-size:11px;color:#F00;">价格:318</span>','方恒假日酒店<span style="font-size:11px;color:#F00;">价格:318</span>'
            content = [];
        content.push("<img src='http://tpc.googlesyndication.com/simgad/5843493769827749134'>地址：北京市朝阳区阜通东大街6号院3号楼东北8.3公里");
        content.push("电话：010-64733333");
        var infoWindow = new AMap.InfoWindow({
            isCustom: true,  //使用自定义窗体
            content: createInfoWindow(title, content.join("<br/>")),
            offset: new AMap.Pixel(16, -45)
        });
 */   
        
        //构建自定义信息窗体
        function createInfoWindow(title, content) {
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
            middle.innerHTML = content;
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
                var markers = [];
                var b;
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
                     b=b1.substring(m+1);
                     
                     


                     
                     

                    marker.on("mouseover", function (e) 
                    {
                                var title=new Array();
                                content = [];

                                    $.ajax({

                                        async:false,
                                        type:"post",
                                        dataType:"json",
                                        data: {loc:b},
                                        url:"/uhouse/index.php/Home/Index/housing",
                                        success:function(result){
                                              //调取匹配的信息窗体展
                                             var json = result.data;
                                                 $.each(json, function(idx, obj) {
                                                    
                                                      title.push(obj.rent_condo_area);
                                                      content.push("<img src='http://tpc.googlesyndication.com/simgad/5843493769827749134'>地址："+obj.rent_condo_loc);
                                                      content.push("电话："+obj.rent_condo_tel);  
                                                                                          
                                                })            
                                           }
                                        })
                                    
                                infoWindow.open(map, marker.getPosition());  
                                alert(b);
                                document.getElementById("result").innerHTML=b;
                                
                    });
                    markers.push(marker);
                    map.setFitView(); 
                }
 


                //地理编码返回结果展示
                
                function geocoder_CallBack(data) {
                    //地理编码结果数组
                    
                    var geocode = data.geocodes;
                    for (var i = 0; i < geocode.length; i++) {
                        addMarker(i, geocode[i]);
                         
                    }
                    map.setFitView();      
                }
            
                //当zoom小于13时，markers消失formattedAddress-b1-b2;
                var _onZoomEnd = function (e) {
                    if (map.getZoom() < 12) {
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

//选取对应的房源数据
/*
 function check() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();

        var url = "/admin.php?c=login&a=check";
        var data = {'price':price,'area':area,'type':type,'loc':loc};
        // 执行异步请求  $.post
        $.post(url,data,function(result){



        },'JSON');

    }
    */