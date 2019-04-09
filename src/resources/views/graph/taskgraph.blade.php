@extends('template') @section('content')

<script src="{{ asset('assets/js/screenfull.js') }}"></script>
<div class="row-content am-cf" >
    <div class="widget am-cf">
        <div class="widget-head am-cf">
            <div class="widget-title am-fl">
                 <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
      			 <small>数据导入</small>
            </div>
                <div class="widget-function am-fr">
                    <a id='fullscreen' align='center' style='text-decoration:none;' class="am-icon-arrows">全屏</a>
            </div>
    	</div>
    	
    	<script type="text/javascript">
            $("#fullscreen").click(function(){
                var elem = document.getElementById("myframe");
                requestFullScreen(elem);
            });
            function requestFullScreen(element) {
                var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;
                console.log(requestMethod);
                if (requestMethod) {
                    requestMethod.call(element);
                } else if (typeof window.ActiveXObject !== "undefined") {
                    var wscript = new ActiveXObject("WScript.Shell");
                    if (wscript !== null) {
                        wscript.SendKeys("{F11}");
                    }
                }
            }

            function changeFrame(){
                var ifm= document.getElementById("myframe"); 
                ifm.height=document.documentElement.clientHeight;
                ifm.width=document.body.clientWidth;
            }

            window.onresize=function(){  
                 changeFrame();  

            }             
        </script>
        
        <div class="widget-body" style="overflow-y:auto;overflow-x:auto;">
    		<iframe id="myframe" style="width:100%;" allowfullscreen mozallowfullscreen webkitallowfullscreen src="http://api.kg.itechs.ac.cn/#/loading-executor" scrolling="no" onload="changeFrame()" frameborder="0">
    		</iframe>
		</div>
	</div>
</div>

@stop