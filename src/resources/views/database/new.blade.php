 @extends('template') @section('content')
 <script type="text/javascript">
window.onload = function() {
    var radios = document.getElementsByName('type');
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
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置/数据库</strong> /
          			 <small>添加数据库</small>
                 </div>
                 
                 <hr/>
                
                 <form horizontal="true"  enctype="multipart/form-data" class="am-form am-form-horizontal " action="{{ asset('../../../kg/addDB_do')}}" method="post" onsubmit="return checkForm()">
                 	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="am-form-group">
                      	<label for="DBID" class="am-u-sm-3 am-form-label">名称 / Name</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="DBID" name="DBID" placeholder="请输入名称">
                      	</div>
                    </div>
                                    
                    <div class="am-form-group">
                    	<label class="am-u-sm-3 am-form-label">数据库类型/ Type</label>
                    	<div class="am-u-sm-9">
                          <label class="am-radio-inline">
                            <input type="radio" name="type" value="0" > xls
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="type" value="1"> MySQL
                          </label>
                        </div>
                    </div>
                    
                    <span id="id2" style="display: none;">
                        <div class="am-form-group">
                          	<label for="IP" class="am-u-sm-3 am-form-label">IP地址 / Name</label>
                          	<div class="am-u-sm-6 am-u-end">
                            	<input type="text" id="IP" name="IP" placeholder="输入IP地址">
                          	</div>
                        </div>
                        
                        <div class="am-form-group">
                          	<label for="Port" class="am-u-sm-3 am-form-label">端口 / Port</label>
                          	<div class="am-u-sm-6 am-u-end">
                            	<input type="text" id="Port" name="Port" placeholder="输入填写端口">
                          	</div>
                        </div>
                        
                        <div class="am-form-group">
                          	<label for="DBname" class="am-u-sm-3 am-form-label">数据库名称 / Name</label>
                          	<div class="am-u-sm-6 am-u-end">
                            	<input type="text" id="DBname" name="DBname" placeholder="输入数据库名称">
                          	</div>
                        </div>
                        
                        <div class="am-form-group">
                          	<label for="UserName" class="am-u-sm-3 am-form-label">用户名 / Name</label>
                          	<div class="am-u-sm-6 am-u-end">
                            	<input type="text" id="UserName" name="UserName" placeholder="请填写用户名">
                          	</div>
                        </div>
                        
                        <div class="am-form-group">
                          	<label for="Password" class="am-u-sm-3 am-form-label">密码 / Password</label>
                          	<div class="am-u-sm-6 am-u-end">
                            	<input type="text" id="Password" name="Password" placeholder="请填写密码">
                          	</div>
                        </div>
                        
                          <div class="am-form-group">
    						<div class="am-u-sm-9 am-u-sm-push-3">
    						<button type="submit"
    							class="am-btn am-btn-primary tpl-btn-bg-color-success" name="button" value="test" >测试连接</button>
    						</div>
    					</div>
                        
                    </span>
                    
                    <span id="id1" style="display: none;"> 
						<div class="am-form-group">
							<label for="user-name" class="am-u-sm-3 am-form-label"><span
								class="tpl-form-line-small-title"></span></label>
							<div class="am-u-sm-9">
								<div class="am-form-group am-form-file">
									<button type="button" class="am-btn am-btn-primary am-btn-sm">
										<i class="am-icon-cloud-upload"></i> 选择要上传的文件
									</button>
									<input type="file" name="descdoc" id="descdoc" />
								</div>
								<div id="file-list2"></div>
								<script>
                                              $(function() {
                                                $('#descdoc').on('change', function() {
                                                  var fileNames = '';
                                                  $.each(this.files, function() {
                                                    fileNames += '<span class="am-badge">' + this.name + '</span> ';
                                                  });
                                                  $('#file-list2').html(fileNames);
                                                });
                                              });
                               </script>
							</div>
						</div>
						
    					<div class="am-form-group">
    						<div class="am-u-sm-9 am-u-sm-push-3">
    						<button type="submit"
    							class="am-btn am-btn-success tpl-btn-bg-color-success " name="button" value="save">保存</button>
    						<button type="submit"
    							class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
    						</div>
    					</div>
                    </span>

            	</form>
			</div>
		</div>
	</div>
</div>                 
  @stop