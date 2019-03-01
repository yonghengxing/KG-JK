@extends('template') @section('content')

<script type="text/javascript">
window.onload = function() {
    var radios = document.getElementsByName('tablesource');
    for (var i = 0; i < radios.length; i++) {
          radios[i].indexs = i + 1;
        radios[i].onchange = function () {
            if (this.checked) {
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id" + this.indexs).style.display="block";

            } 
        }
    }
}
</script>

 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置/数据源</strong> /
          			 <small>添加数据源</small>
                 </div>
                 
                 <hr/>
                 
                 <form horizontal="true" class="am-form am-form-horizontal "action="{{ asset('../../../kg/addDBSrc_do')}}" method="post" onsubmit="return checkForm()">
                 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 	
                 	<div class="am-form-group">
                      	<label for="DSname" class="am-u-sm-3 am-form-label">数据源名称</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="DSname" name="DSname" placeholder="请输入数据源名称">
                      	</div>
                    </div>
                 	
                    <div class="am-form-group">
                      <label for="plevel" class="am-u-sm-3 am-form-label">密级选择</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="plevel" name="plevel">
                        	<option name="plevel" value="0" selected="selected">选择保密等级</option>
                			<option name="plevel" value="1">管理员</option>
              
                        </select>
                     </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="database" class="am-u-sm-3 am-form-label">数据库</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="database" name="database">
                			<option name="database1" selected = "selected">请选择数据库</option>
                			<option name="database2">数据库1</option>       
                			@foreach ($name as $name)
								<option value="{{$name->name}}" name="{{$name->name}}">{{$name->name}}</option>
							@endforeach      			
                        </select>
                     </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="table" class="am-u-sm-3 am-form-label">数据表</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="DBtable" name="DBtable">
                			<option value="table1" selected = "selected">请选择数据表</option>
                        </select>
                     </div>
                    </div>
             <script>
             $(function(){
                 //数据库选择改变
                 $("#database").change(function(){
                     var value = $(this).val();

                    var type = $(this).attr('id');
					var str1 = "{{asset('database/getDB')}}";
					var url1 = str1 + '/' + value;
					console.log(url1);
					var objectModel = {};
					var csrf = "_token";
          			var ctoken = "{{csrf_token()}}";
          			objectModel[type] =value;
          			objectModel[csrf] = ctoken;
          			$.ajax({
              			url:url1,
              			type:"post",
              			dataType:"json",
          				data: objectModel,//{_token:"{{csrf_token()}}",_method:'PATCH',type:value},
          				success:function(data){
          					$("#DBtable").empty();
              				var str = new Array;
              				var strAll = " ";
              				for(var i = 0;i < data.length;i++){
                  				var table_name = data[i].table_name;
                  				str[i] = "<option value = '"+table_name+"' name='"+table_name+"'>"+ table_name +"</option> ";
                  				strAll = strAll.concat(str[i]);
                  				}
              				$("#DBtable").html(strAll);
              				}
              			})
                     })


                     //数据表改变
                     $("#DBtable").change(function(){
                     var value = $(this).val();
                     var database = $("#database").val();
                     var database_public = 'database_public';

                    var type = $(this).attr('id');
					var str1 = "{{asset('database/getDBtableMsg')}}";
					var url1 = str1 + '/' + value;
					var objectModel = {};
					var csrf = "_token";
          			var ctoken = "{{csrf_token()}}";
          			objectModel[type] =value;
          			objectModel[database_public] =database;
          			objectModel[csrf] = ctoken;
          			$.ajax({
              			url:url1,
              			type:"post",
              			dataType:"json",
          				data:objectModel,
          				success:function(data){
              				if(data[0].column_name){//数据库类型
          					$("#choose_item").empty();
              				var str = new Array;
              				var strAll = " ";
              				for(var i = 0;i < data.length;i++){
                  				//var column_name = data[i].column_name;
                  				var items = new Array;
                  				str[i] = "<label class='am-checkbox-inline'><input type='checkbox' name='items["+i+"]' value='"+data[i].column_name+"'> "
                  				+ data[i].column_name + "("+ data[i].column_comment +")"+"</label>";
                  				strAll = strAll.concat(str[i]);
                  				}
              				$("#choose_item").html(strAll);
              				}else{//excel类型
              					$("#choose_item").empty();
                  				var str = new Array;
                  				var strAll = " ";
                  				for(var i = 0;i < data.length;i++){
                      				var items = new Array;
                      				str[i] = "<label class='am-checkbox-inline'><input type='checkbox' name='items["+i+"]' value='"+data[i]+"'> "
                      				+ data[i] /* + "("+ data[i] +")" */+"</label>";
                      				strAll = strAll.concat(str[i]);
                      				}
                  				$("#choose_item").html(strAll);
                  				}
              				}
              			})
                     })
                 })
             </script>
                    <div class="am-form-group">
                    	<label class="am-u-sm-3 am-form-label">数据源类型</label>
                    	<div class="am-u-sm-9">
								单表来源
                        </div>
                    </div>
                    
                    <span id="id1" style="display: block;">
                        <div class="am-form-group">
                        	<label class="am-u-sm-3 am-form-label">数据项选择</label>
                        	<div class="am-u-sm-9" id="choose_item">
                              <label class="am-checkbox-inline">
                                <input type="checkbox" value="option1"> 数据项1
                              </label>
                            </div>
                        </div>
                    </span>                    
                    
                    <span id="id2" style="display: none;" > 
                        <div class="am-form-group">
    						<label for="db_rules" class="am-u-sm-3 am-form-label">数据库提取规则</label>
    						<div class="am-u-sm-9">
    							<textarea class="" rows="10" id="db_rules" name="db_rules"
    							placeholder="请输入数据库提取规则"></textarea>
    						</div>
    					</div>
					</span>
					
					<div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
						<button type="submit"
							class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
						</div>
					</div>
                 	
            	</form>
			</div>
		</div>
	</div>
</div>
@stop
