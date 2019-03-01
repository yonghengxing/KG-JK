@extends('template') @section('content')

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

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf" style = "height:600px">

				<iframe name="myframe" src="http://kg.itechs.ac.cn/#/query-editor" style="width:100%; height:100%;"></iframe>

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
</div>

@stop