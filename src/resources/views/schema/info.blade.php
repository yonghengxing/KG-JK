@extends('template') @section('content')

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;

		var str = '<div class="am-form-group" index="'+
					compIndex+'" id="Attr1"> <label for="schema-attribute'+
					compIndex+'" class="am-u-sm-3 am-form-label" >属性('+
					compIndex+') /  Attribute</label><div class="am-u-sm-9"> <input type="text" id="schema-attribute'+
					compIndex+'" placeholder="属性('+
					compIndex+')"> <small>输入属性名称</small> </div> </div>';

	    alert(str);
		$("#showArri").append(str);

	}
</script>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
              	 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">编辑本体类型</strong> /
                 </div>
                 
                 <hr/>
                 
                 
                 <form class="am-form tpl-form-border-form  tpl-form-border-br" action="{{ asset('/schema/info')}}/{{$schema->id}}" method="post" onsubmit="">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">本体名称<span class="tpl-form-line-small-title">Name</span></label>
                        <div class="am-u-sm-9">
                             <input type="text" class="tpl-form-input" id="comp_name"  name="comp_name" placeholder="请输入组件的名称" value="{{ $schema->stype }}">
                        </div>
                    </div>
                    
                     <div class="widget-body am-fr" id="showArri">
                     	@for ($i = 1; $i <= $num; $i++)
                        <div class="am-form-group" index="1" id="Attr1">
                          <label for="schema-attribute1" class="am-u-sm-3 am-form-label" >属性({{ $i }}) /  Attribute</label>
                          <div class="am-u-sm-9">
                            <input type="text" id="schema-attribute1" placeholder="请输入属性名称" value="{{$properties[$i-1]}}"/>
                            <small>输入属性名称</small>
                          </div>
                        </div>
                        @endfor
                     </div>
                     
                     <div class="am-form-group">
                     <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                          <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                    			<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加属性</button>
    					  </div>
                    </div>
                    </div>
                    
                    <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存</button>
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
						</div>
					</div>
                    
            	</form>
			</div>
		</div>
	</div>
</div>                    
@stop
