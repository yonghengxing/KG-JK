@extends('template') @section('content')
<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置/数据库</strong> /
          			 <small>添加数据库</small>
                 </div>
                 
                 <hr/>
                 
                 <form horizontal="true"  enctype="multipart/form-data" class="am-form am-form-horizontal " action="{{ asset('/addDB_do')}}" method="post">
                 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 	
                 	<div class="am-form-group">
                      	<label for="name" class="am-u-sm-3 am-form-label">名称 / Name</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="name"  name="name" placeholder="请输入名称" value="{{$name}}">                             	
                        </div>
                    </div>
                    
                    
             	   <div class="am-form-group">
                      	<label for="IP" class="am-u-sm-3 am-form-label">IP地址 / Name</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="IP"  name="IP" placeholder="请输入IP" value=" {{ $IP}}">                             	
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Port" class="am-u-sm-3 am-form-label">端口 / Port</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="port"  name="port" placeholder="请输入端口" value=" {{ $port}}">                             	
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="DBname" class="am-u-sm-3 am-form-label">数据库名称 / Name</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="dbname"  name="dbname" placeholder="请输入数据库名称" value=" {{$dbname}}">                             	
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="UserName" class="am-u-sm-3 am-form-label">用户名 / Name</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="username"  name="username" placeholder="请输入用户名" value=" {{$username}}">                             	
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">密码 / Password</label>
                        <div class="am-u-sm-6 am-u-end">
                        	<input type="text" class="tpl-form-input" id="password"  name="password" placeholder="无密码" value="{{$password}}">                             	
                        </div>
                    </div>
 
                    <div class="am-form-group">
                        <label for="Type" class="am-u-sm-3 am-form-label">数据库类型 / Type</label>
                        <div class="am-u-sm-6 am-u-end">
                                <input type="text" class="tpl-form-input" id="type"  name="type" placeholder="无" value=" {{$type}}">   
                        </div>
                    </div>

                   
                   <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-success tpl-btn-bg-color-success " name="button" value="save">保存</button>
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
