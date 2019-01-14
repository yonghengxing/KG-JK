@extends('template') @section('content')
<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>关系类型</small>
                </div>
                 
                <hr/>
                
                <form class="am-form am-form-horizontal ">
                    <div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">类型名称 / Name</label>
                      <div class="am-u-sm-9">
                        <input type="text" id="ontoDisplayName"  name="relationType" placeholder="类型名称 / Name">
                        <small>输入关系类型名称</small>
                      </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">图标 / Icon</label>
                      <div class="am-u-sm-9">
                        <input type="text" id="ontoDisplayName"  name="icon" placeholder="图标 / Icon">
                        <small>请选择图标</small>
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