@extends('template') @section('content')

<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;

		var str = '<div class="am-form-group" index="'+
					compIndex+'" id="Attr1"> <label for="schema-attribute'+
					compIndex+'" class="am-u-sm-3 am-form-label" >属性('+
					compIndex+') </label><div class="am-u-sm-6 am-u-end"> <input type="text" id="schema-attribute'+
					compIndex+'" placeholder="请输入属性('+
					compIndex+')名称"> </div> </div>';

		$("#showArri").append(str);

	}
</script>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>本体类型</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="am-form-group">
                      <label for="schema-name" class="am-u-sm-3 am-form-label">本体名称</label>
                      <div class="am-u-sm-6 am-u-end">
                        <input type="text" id="schema-name" placeholder="输入本体名称">
                      </div>
                    </div>
                    
                    <div class="widget-body am-fr" id="showArri">
                        <div class="am-form-group" index="1" id="Attr1">
                          <label for="schema-attribute1" class="am-u-sm-3 am-form-label" >属性(1)</label>
                          <div class="am-u-sm-6 am-u-end">
                            <input type="text" id="schema-attribute1" placeholder="输入属性(1)名称">
                          </div>
                        </div>
                     </div>
                     
                    
        			<div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-secondary">添加属性</button>
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