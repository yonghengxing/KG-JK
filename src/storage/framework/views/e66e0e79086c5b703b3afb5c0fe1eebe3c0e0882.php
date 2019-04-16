 <?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/js/screenfull.js')); ?>"></script>
<script type="text/javascript">

$(document).ready(function(e){  
　　    var iframe = document.getElementById("myframe");    
    if (iframe.attachEvent) {    
        iframe.attachEvent("onload", function() {    
            //iframe加载完成后你需要进行的操作  
//         	alert("123");
        	document.getElementById("myframe").contentWindow.postMessage('message','http://api.kg.itechs.ac.cn/#/graph-explorer');
        	
        });    
    } else {    
        iframe.onload = function() {    
                  //iframe加载完成后你需要进行的操作  
//            alert("456");
//             debugger;
		changeFrame();
		setTimeout(()=>{
                document.getElementById("myframe").contentWindow.postMessage('message','http://api.kg.itechs.ac.cn/#/graph-explorer');  
                }, 2000);
        };    
    };
    });

	function sleep(delay) {
	  var start = (new Date()).getTime();
	  while ((new Date()).getTime() - start < delay) {
	    continue;
	  }
	}
    function changeFrame(){
        var ifm= document.getElementById("myframe"); 
        ifm.height=document.documentElement.clientHeight;
        ifm.width=document.documentElement.clientWidth;
    }
    
//     window.onresize=function(){  
      
    
//     } 
    
</script>
 <div class="row-content am-cf" >
    <div class="widget am-cf">
        <div class="widget-head am-cf">
            <div class="widget-title am-fl">
                 <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
      			 <small>图谱查看</small>
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
            
        </script>

        <div class="widget-body" style="overflow-y:auto;overflow-x:auto;">
    		<iframe id="myframe" style="width:100%;" allowfullscreen mozallowfullscreen webkitallowfullscreen src="http://api.kg.itechs.ac.cn/#/graph-explorer" scrolling="no" onload="changeFrame()" frameborder="0">
    		</iframe>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>