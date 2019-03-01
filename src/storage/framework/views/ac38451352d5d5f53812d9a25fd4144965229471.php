 <?php $__env->startSection('content'); ?>

 <script>
    function del(){
        if(confirm("确定要删除吗？")){
            return true;
        }else{
            return false;
        }
    }
</script> 

<script>
  var sepLine = '；'; // 分割不同行
  var sepLable = '，'; // 分割标签和值名
  var sepVal = '、'; // 分割输入

  var str = "{value1，；value2，keyA、keyB、keyC}";
  str = str.replace('{', '').replace('}', '');

  var str1 = str.split(sepLine)[0];
  var str2 = str.split(sepLine)[1];

  $(function() {
    // 填入键值
    var lable1 = getLabel(str1);
    var lable2 = getLabel(str2);
    $('.value1').text(lable1);
    $('.value2').text(lable2);

    // 填入输入
    var vals1 = getValue(str1);
    var vals2 = getValue(str2);
	debugger;
    addVals($('.line1-vals'), vals1);
    debugger;
    addVals($('.line2-vals'), vals2);
    debugger;
  });

  // 从一行的字符串里解析键值
  function getLabel(str) {
    return str.split(sepLable)[0]
  }
  // 从一行的字符串里解析输入
  function getValue(str) {
    if (str.split(sepLable)[1] === '') {
      return []
    } else {
      return str.split(sepLable)[1].split(sepVal);
    }
  }
  function addVals($dom, arr) {
    if (arr.length === 0) {
      return
    }
Arr = arr;
    arr.map(function(item, index) {
      var html = '<span class="value-"' + index + '>' + item + '</span><input class="input-' + index + '" type="text">';
      debugger;
      $dom.append(html);
    });
  }
</script>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf" style = "height:600px">

				<iframe name="myframe" src="http://kg.itechs.ac.cn/#/loading-executor" style="width:100%; height:100%;"></iframe>

			</div>
			
			<div class="am-u-sm-12">
                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                    <thead>
                        <tr>
                            <th>键值</th>
                            <th>输入</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="line1">
                       <td><span class="value1"></span></td>
                        <td class="line1-vals">
                        </td>
                        <td>
                            <div class="operation___3s32S">
                                <span><a href="">编辑</a></span>
                                <span><a href="" onclick="return del()">删除</a></span>
                                <span><a href="">复制</a></span>
                            </div>

                        </td>
                        </tr>

                        <tr class="line2">
                        <td><span class="value2"></span></td>
                        <td class="line2-vals">
                        </td>

                        <td>
                           <div class="operation___3s32S">
                                <span><a href="">编辑</a></span>
                                <span><a href="" onclick="return del()">删除</a></span>
                                <span><a href="">复制</a></span>
                            </div>  
                        </td>
                        </tr>                        
                    </tbody>
                </table>
             </div>          
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>