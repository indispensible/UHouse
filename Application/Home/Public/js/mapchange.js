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
                var area1=50;
                var area2=70;
                var area3=90;
                var area4=110;
                var area5=150;

                var room1=0;
                var room2="一室";
                var room3="二室";
                var room4="三室";
                var room5="四室";
                var room6="五室";


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
                    case 0:area_min=area0;area_max=100000000000;break;
                    case 1:area_min=area0;area_max=area1;break;
                    case 2:area_min=area1;area_max=area2;break;
                    case 3:area_min=area2;area_max=area3;break;
                    case 4:area_min=area3;area_max=area4;break;
                    case 5:area_min=area4;area_max=area5;break;
                    case 6:area_min=area5;area_max=100000000000;break;
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
                
                alert(price_min);
                alert(price_max);
                alert(area_min);
                alert(area_max);
                alert(room);


                var data=new Array();

    
                    $.ajax({
                        async:false,
                        type:"post",
                        dataType:"json",
                        data:{price_min:price_min,price_max:price_max,area_min:area_min,area_max:area_max,room:room},
                        url:"/uhouse/index.php/Home/Map/markerchange",
                        success:function(result){
                            var json=result.data;
                             $.each(json, function(idx, obj) {                
                                  data.push(obj.rent_housing);     

                            });
                        }
                    });





}