@extends('template') @section('content')
<script type="text/javascript">
window.onload = function() {
    var radios = document.getElementsByName('searchType');
    for (var i = 0; i < radios.length; i++) {
          radios[i].indexs = i + 1;
        radios[i].onchange = function () {
            if (this.checked) {
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
//                document.getElementById("id3").style.display="none";
//                document.getElementById("question1").style.display="none";
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
                    <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
                    <small>模糊查找</small>
                </div>

				<hr/> 

                <form class="am-form tpl-form-border-form  tpl-form-border-br am-form-horizontal" action="{{ asset('/search')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

					<div class="am-form-group" style="display:none;">
						<label class="am-u-sm-2 am-form-label">查找类型</label>
                          <label class="am-radio-inline">
                            <input type="radio" name="searchType" value="0"> 模糊查找
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="searchType" value="1"> 智能问答
                          </label>
                    </div>

					<span id="id1" style="display: block;">
                        <div class="am-form-group">
                            <label for="schema" class="am-u-sm-2 am-form-label">实体选择</label>
                            <div class="am-u-sm-10">
                                <select data-am-selected="{searchBox: 1}" style="display: none;" id="schema" name="schema">
                                    <option name="schema1" selected = "selected" value="0">请选择查找的实体</option>
                                    @if (isset($schemas))
                                        @foreach($schemas as $schema)
                                            <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-centered">
                                <label for="show">文本域</label>
                                <textarea style="" class=" " rows="10" id="show">根据选项，获取搜索模板</textarea>
                            </div>
                    	</div>                    	
                    						
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button"
                                        class="am-btn am-btn-primary tpl-btn-bg-color-success" onclick="history.go(-1);">返回</button>
                            </div>
                        </div>
					</span>
					
					<span id="id2" style="display: none;">
						<div class="am-form-group">
							<label class="am-u-sm-2 am-form-label">问题模板 </label>
							<label class="am-radio-inline">
                            	<input type="radio" name="questionType" id="questionType" value="0"> 查找某机构中国籍是指定国家的发明人
                          	</label>
                          	<label class="am-radio-inline">
                            	<input type="radio" name="questionType" id="questionType" value="1"> 查找为多家不同机构申请过专利的发明人
                          	</label>
                          	<label class="am-radio-inline">
                            	<input type="radio" name="questionType" id="questionType" value="2"> 专利申请数量排名前几位的机构有哪些
                          	</label>
						</div>
						
    					<div class="am-form-group">
                          <label for="schema-name" class="am-u-sm-2 am-form-label">问题输入</label>
                          <div class="am-u-sm-6 am-u-end">
                            <input type="text" id="question" name="question" placeholder="请输入问题" required>
                          </div>
                        </div>                     
                                                
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit"
                                        class="am-btn am-btn-primary tpl-btn-bg-color-success" id="search" name="search">查找</button>
                            </div>
                        </div>

					</span>																					    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        //数据库选择改变
        $("#schema").change(function(){
            var value = $(this).val();
            var str1 = "{{asset('schema/getQueryText')}}";
            var str2 = "{{asset('relation/getRelationField')}}";
            var url1 = str1 + '/' + value;
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

                    $("#show").empty();
                    $("#show").html(data[0]);
                }
            })
        });

        $("#questionType").click(function(){
        	$("#show").empty();
        	var data = "CREATE QUERY inventor(String organ, String state)  FOR GRAPH connectivity { start = {sheet1.*};  res = select u from start:u  where  u.applicant_kg == organ and u.CountryCodeOfApplicant_kg == state ;  PRINT res.inventor_kg;}";
        	$("#show").html(data);
        });

        $("#questionType1").click(function(){
        	$("#show").empty();
        	var data = "CREATE QUERY inventor(String organ, String state)  FOR GRAPH connectivity { start = {sheet1.*};  res = select u from start:u  where  u.applicant_kg == organ and u.CountryCodeOfApplicant_kg == state ;  PRINT res.inventor_kg;}";
        	$("#show").html(data);
        });
    })
</script>
@stop
