@extends('template') @section('content')

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">

                <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
          			 <small>关系维护</small>
                </div>

                <hr/>

				<form class="ant-form ant-form-horizontal tpl-form-border-form  tpl-form-border-br" action="{{asset('relation/new')}}" method="post" onsubmit="return checkForm()">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>起点实体</th>
                                    <th>起点外键</th>
                                    <th>终点实体</th>
                                    <th>终点主键</th>
                                    <th>关系类型</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="gradeX">
										<td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="fromVertex" name="fromvertex" >
                                            <option value="none">选择数据库 </option>
                                                @if (isset($schemas))
                                                    @foreach($schemas as $schema)
                                                        <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationField" name="relationField" >
                                                <option value="none">选择起点关联外键</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="toVertex" name="tovertex" >
                                            	<option value="none">选择终点实体</option>
                                                @if (isset($schemas))
                                                    @foreach($schemas as $schema)
                                                        <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationToField" name="relationToField" >
                                                <option value="none">选择终点关联主键</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationType" name="relationType" >
                                            	<option value="none">选择关系类型</option>
                                                @if (isset($relationTypes))
                                                    @foreach($relationTypes as $relationType)
                                                         <option value="{{ $relationType->tid }}">{{ $relationType->rlabel }}</option>
                                                    @endforeach
                                                 @endif
                                            </select>

                                        </td>

									</tr>
                            </tbody>
                        </table>
                     </div>

					 <script>

                         function checkForm()
                         {
                             var relationField =document.getElementById("relationField").value;
                             var relationType =document.getElementById("relationType").value;
                             var toVertex =document.getElementById("toVertex").value;
                             var fromVertex =document.getElementById("fromVertex").value;

                             if(fromVertex == "none" || toVertex == "none" || relationField=="none" || relationType == "none"){
                                 alert("请完成所有的选择");
                                 return false;
                             }
                             return true;
                         }

                         $(function(){
                             //数据库选择改变
                             $("#toVertex").change(function(){
                                 var value = $(this).val();
                                 var str1 = "{{asset('relation/getRelationField')}}";
//                                 var text = $('#fromVertex option:selected').text();
                                 var url1 = str1 + '/' + value;
                                 console.log(url1);
                                 var objectModel = {};
                                 var csrf = "_token";
                                 var ctoken = "{{csrf_token()}}";
                                 objectModel[csrf] = ctoken;
                                 $.ajax({
                                     url:url1,
                                     type:"post",
                                     dataType:"json",
                                     data: objectModel,//{_token:"{{csrf_token()}}",_method:'PATCH',type:value},
                                     success:function(data){
                                         $("#relationToField").empty();
                                         var str = new Array;
                                         var strAll = " ";
                                         for(var i = 0;i < data.length;i++){
                                             var table_name = data[i];
                                             str[i] = "<option value = '"+table_name+"''>"+ table_name +"</option> ";
                                             strAll = strAll.concat(str[i]);
                                         }
                                         $("#relationToField").html(strAll);
                                     }
                                 })
                             })
                         });



                         $(function(){
                            //数据库选择改变
                            $("#fromVertex").change(function(){
                                var value = $(this).val();
                                var str1 = "{{asset('relation/getRelationField')}}";
//                                 var text = $('#fromVertex option:selected').text();
                                var url1 = str1 + '/' + value;
                                console.log(url1);
                                var objectModel = {};
                                var csrf = "_token";
                                var ctoken = "{{csrf_token()}}";
                                objectModel[csrf] = ctoken;
                                $.ajax({
                                    url:url1,
                                    type:"post",
                                    dataType:"json",
                                    data: objectModel,//{_token:"{{csrf_token()}}",_method:'PATCH',type:value},
                                    success:function(data){
                                        $("#relationField").empty();
                                        var str = new Array;
                                        var strAll = " ";
                                        for(var i = 0;i < data.length;i++){
                                            var table_name = data[i];
                                            str[i] = "<option value = '"+table_name+"''>"+ table_name +"</option> ";
                                            strAll = strAll.concat(str[i]);
                                        }
                                        $("#relationField").html(strAll);
                                    }
                                })
                            })
                        })
                    </script>

                   <div class="am-form-group">
						<div class="am-u-sm-8 am-u-sm-push-4">
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