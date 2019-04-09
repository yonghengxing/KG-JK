 <?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/js/screenfull.js')); ?>"></script>
<script>
  var sepLine = ', u\'GET'; // 分割不同行
  var sepLable = ':'; // 分割标签和值名
  var sepVal = '\', '; // 分割输入


  var str = "{u'GET /query/connectivity/test': [], u'GET /query/connectivity/connection_mining': [u'A', u'k', u'B']}";

  str = str.replace('{', '').replace('}', '');
  var strArr = str.split(sepLine);

  $(function() {
	  strArr.map(function(item, index){
		  var key = getKey(item);
		  var value = "null";
          value = getValue(item);
		  var html = '<tr><td> <span class="key' + index + '">' + key + 
		  				'</span> </td> <td> <span class="key' + index + '">' + value + '</span></td> <td> </td></tr>';
		  $("tbody").append(html);
		  });

  });

  // 从一行的字符串里解析键值
  function getKey(str) {
    return str.substring(str.indexOf("/")+1,str.indexOf("':"));
  }
  
  // 从一行的字符串里解析输入
  function getValue(str) {
	  var strV = str.substring(str.indexOf("\[")+1,str.indexOf("\]"));
	  debugger;
	  if(strV != null)
		  return addKeys(strV);
  }
  //处理键值输入
  function addKeys(str) {
	var htmlK = "";
    reg = /u\'(.*?)\'/;
    if (str.length === 0) {
      return;
    }    
    var strK = str.split(",");

    strK.map(function(item, index){
    	var itemV = item.replace(reg,"$1");
    	var htmlV = '<span class="value' + index + '">' + itemV + '</span><input class="input-' + index + '" type="text">';
    	htmlK += htmlV;
    });
    return htmlK;
  }
  
</script>

 <div class="row-content am-cf" >
    <div class="widget am-cf">
    
        <div class="widget-head am-cf">
            <div class="widget-title am-fl">
                 <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
      			 <small>图谱查询</small>
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
                ifm.width=document.documentElement.clientWidth;
            }

            window.onresize=function(){  
                 changeFrame();  

            }             
        </script>

        <div class="widget-body" style="overflow-y:auto;overflow-x:auto;">
    		<iframe id="myframe" style="width:100%;" allowfullscreen mozallowfullscreen webkitallowfullscreen src="http://api.kg.itechs.ac.cn/#/query-editor" scrolling="no" onload="changeFrame()" frameborder="0">
    		</iframe>
		</div>
			
		<div class="am-u-sm-12">
            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r" style="display:none;" >
                <thead>
                    <tr>
                        <th>键值</th>
                        <th>输入</th>
                    </tr>
                </thead>
                <tbody class="tbody">

                </tbody>
            </table>
         </div>
                       
		
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>