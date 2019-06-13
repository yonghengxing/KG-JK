@extends('template') @section('content')
<script>

function onlyYesradio(i){
 	var domName = $('#onlyesradio'+i).attr('name');
   	var $radio = $('#onlyesradio'+i);

       // if this was previously checked
       if ($radio.data('waschecked') == true){
    	   $radio.prop('checked', false);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           
       } else {
    	   $radio.prop('checked', true);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           $radio.data('waschecked', true);
       }
}

function onlyNoradio(i){
 	var domName = $('#onlynoradio'+i).attr('name');
   	var $radio = $('#onlynoradio'+i);

       // if this was previously checked
       if ($radio.data('waschecked') == true){
    	   $radio.prop('checked', false);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           
       } else {
    	   $radio.prop('checked', true);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           $radio.data('waschecked', true);
       }
}

function cutYesradio(i){
 	var domName = $('#cutyesradio'+i).attr('name');
   	var $radio = $('#cutyesradio'+i);

       // if this was previously checked
       if ($radio.data('waschecked') == true){
    	   $radio.prop('checked', false);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           
       } else {
    	   $radio.prop('checked', true);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           $radio.data('waschecked', true);
       }
}

function cutNoradio(i){
 	var domName = $('#cutnoradio'+i).attr('name');
   	var $radio = $('#cutnoradio'+i);

       // if this was previously checked
       if ($radio.data('waschecked') == true){
    	   $radio.prop('checked', false);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           
       } else {
    	   $radio.prop('checked', true);
           $("input:radio[name='" + domName + "']").data('waschecked',false);
           $radio.data('waschecked', true);
       }
}


</script>

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                        <small>创建数据源</small>
                    </div>

                    <hr/>

                    <form horizontal="true" class="am-form am-form-horizontal tpl-form-border-form  tpl-form-border-br"action="{{ asset('/addDBSrc_do')}}" method="post" onsubmit="return checkForm()">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="am-form-group">
                            <label for="DSname" class="am-u-sm-3 am-form-label">数据源名称</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="DSname" name="DSname" placeholder="请输入数据源名称" required>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="database" class="am-u-sm-3 am-form-label">数据库</label>
                            <div class="am-u-sm-9 ">
                                <select data-am-selected="{searchBox: 1}" style="display: none;" id="database" name="database">
                                    <option name="database1" selected = "selected" value="0">请选择数据库</option>
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
                                 });


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
                                                debugger;
                                                $("#choose_item").empty();
                                                var str = new Array;
                                                var strAll = " ";
                                                for(var i = 0;i < data.length;i++){
                                                    //var column_name = data[i].column_name;
                                                    var items = new Array;
                                                    str[i] = "<tr><td> <label class='am-checkbox-inline'><input type='checkbox' class='qx' name='items["+i+"]' value='"+data[i]["column_name"]+"'> "
                                                        + data[i]["column_name"] + "("+ data[i]["column_comment"] +")"+"</label> </td>"
                                                        + "<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' class='oy' id='onlyesradio"+i+"' onclick='onlyYesradio("+i+")' name='onlyradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' class='on' id='onlynoradio"+i+"' onclick='onlyNoradio("+i+")' name='onlyradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td>"
                                                        +"<td> <label class='am-checkbox-inline' id='plevel"+i+"' name=='plevel"+i+"'></lable> </td>"
                                                        +"<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' class='cy' id='cutyesradio"+i+"' onclick='cutYesradio("+i+")' name='cutradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' class='cn' id='cutnoradio"+i+"' onclick='cutNoradio("+i+")' name='cutradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td> </tr>";
                                                    strAll = strAll.concat(str[i]);
                                                }
                                                $("tbody").html(strAll);
                                            }else{//excel类型
                                                $("#choose_item").empty();
                                                var str = new Array;
                                                var strAll = " ";
						                        datalength = data.length;
                                                for(var i = 0;i < data.length;i++){

                                                    var items = new Array;
                                                    str[i] = "<tr><td> <label class='am-checkbox-inline'><input type='checkbox' class='qx' name='items["+i+"]' value='"+data[i]+"'> "
                                                        + data[i] + "("+ data[i] +")"+"</label> </td>"
                                                        + "<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' class='oy' id='onlyesradio"+i+"' onclick='onlyYesradio("+i+")' name='onlyradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' class='on' id='onlynoradio"+i+"' onclick='onlyNoradio("+i+")' name='onlyradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td>"
                                                        +"<td> <label class='am-checkbox-inline' id='plevel"+i+"' name=='plevel"+i+"'></lable> </td>"
                                                        +"<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' class='cy' id='cutyesradio"+i+"' onclick='cutYesradio("+i+")' name='cutradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' class='cn' id='cutnoradio"+i+"' onclick='cutNoradio("+i+")' name='cutradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td> </tr>";
                                                    strAll = strAll.concat(str[i]);                                                    

                                                }
                                                $("tbody").html(strAll);
                                            }
                                            //权限加名字
                                            for (var j = 0;j<data.length;j++){
                                                // if(document.getElementById("plevel"+j)){
                                                    //存在
                                                    var userMsg = "{{$userMsg}}";
                                                    userMsg = userMsg.replace(/&quot;/g,'"');
                                                    var c = JSON.parse(userMsg);
                                                    var str_level = "";
                                                    for (var k = 0;k<c.length;k++){
                                                        // str_level = str_level+"<option name='plevel123["+k+"]' value='"+c[k]["id"]+"'>"+c[k]["name"]+"</option>";
                                                        str_level = str_level+"<label ><input name='plevel["+j+"]["+c[k]["id"]+"]' type='checkbox' class='qxqx' value='1'>"+c[k]["name"]+"</lable><br>";
                                                    }
                                                    //$("#plevel0").empty();
                                                    $("#plevel"+j+"").html(str_level);
                                                    //str_level = str_level.concat("<option name='plevel["+j+"' value='"+c[j]["id"]+"'>"+c[j]["name"]+"</option>")
                                                // }else {
                                                //     break;
                                                // }
                                            }

                                        }
                                    })
                                });

                                $("#quanxuan").click(function(){//给全选按钮加上点击事件
                                    var xz = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck = $(".qx").prop("checked",xz);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                $("#qxqx").click(function(){//给全选按钮加上点击事件
                                    var xz1 = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck1 = $(".qxqx").prop("checked",xz1);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                $("#onlyyes").click(function(){//给全选按钮加上点击事件
                                 	var domName = $(this).attr('name');
                                   	var $radio = $(this);

                                       // if this was previously checked
                                       if ($radio.data('waschecked') == true){
                                    	   $radio.prop('checked', false);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           
                                       } else {
                                    	   $radio.prop('checked', true);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           $radio.data('waschecked', true);
                                       }
                                    var xz2 = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck2 = $(".oy").prop("checked",xz2);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                $("#onlyno").click(function(){//给全选按钮加上点击事件
                                 	var domName = $(this).attr('name');
                                   	var $radio = $(this);

                                       // if this was previously checked
                                       if ($radio.data('waschecked') == true){
                                    	   $radio.prop('checked', false);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           
                                       } else {
                                    	   $radio.prop('checked', true);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           $radio.data('waschecked', true);
                                       }

                                    var xz3 = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck3 = $(".on").prop("checked",xz3);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                $("#cutyes").click(function(){//给全选按钮加上点击事件
                                 	var domName = $(this).attr('name');
                                   	var $radio = $(this);

                                       // if this was previously checked
                                       if ($radio.data('waschecked') == true){
                                    	   $radio.prop('checked', false);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           
                                       } else {
                                    	   $radio.prop('checked', true);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           $radio.data('waschecked', true);
                                       }
                                    var xz2 = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck2 = $(".cy").prop("checked",xz2);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                $("#cutno").click(function(){//给全选按钮加上点击事件
                                 	var domName = $(this).attr('name');
                                   	var $radio = $(this);

                                       // if this was previously checked
                                       if ($radio.data('waschecked') == true){
                                    	   $radio.prop('checked', false);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           
                                       } else {
                                    	   $radio.prop('checked', true);
                                           $("input:radio[name='" + domName + "']").data('waschecked',false);
                                           $radio.data('waschecked', true);
                                       }
                                    var xz2 = $(this).prop("checked");//判断全选按钮的选中状态
                                    var ck2 = $(".cn").prop("checked",xz2);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。  
                                });

                                
                               
                         });
                       </script>


                        <div class="am-form-group am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="quanxuan"> 数据项</th>
                                        <th>是否唯一<br/><input type="radio" name="onlyyes" id="onlyyes">是  <input type="radio" name="onlyno" id="onlyno">否</th>
                                        <th><input type="checkbox" id="qxqx"> 数据权限</th>
                                        <th>是否分割<br/><input type="radio" name="cutyes" id="cutyes">是  <input type="radio" name="cutno" id="cutno">否</th>
                                    </tr>
                                </thead>

                                <tbody class="tbody">

                                </tbody>
                            </table>
             			</div>                            
                    
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
                                <button type="button"
                                        class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
@stop
