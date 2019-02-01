  <?php $__env->startSection('content'); ?>
 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置/数据库</strong> /
          			 <small>添加数据库</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
					<div class="am-form-group">
                      	<label for="DBID" class="am-u-sm-3 am-form-label">名称 / Name</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="DBID" name="DBID" placeholder="名称 / Name">
                       	 	<small>输入名称</small>
                      	</div>
                    </div>
                                    
                    <div class="am-form-group">
                    	<label class="am-u-sm-3 am-form-label">数据库类型/ Type</label>
                    	<div class="am-u-sm-9">
                          <label class="am-radio-inline">
                            <input type="radio"  value="" name="docInlineRadio"> Kafka
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="docInlineRadio"> CSV
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="docInlineRadio"> Hive
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="docInlineRadio"> MySQL
                          </label>
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="IP" class="am-u-sm-3 am-form-label">IP地址 / Name</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="IP" name="IP" placeholder="IP地址 / Name">
                       	 	<small>输入IP地址</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Port" class="am-u-sm-3 am-form-label">端口 / Port</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="Port" name="Port" placeholder="端口 / Port">
                       	 	<small>输入填写端口</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="DBname" class="am-u-sm-3 am-form-label">数据库名称 / Name</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="DBname" name="DBname" placeholder="数据库名称 / Name">
                       	 	<small>输入数据库名称</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="UserName" class="am-u-sm-3 am-form-label">用户名 / Name</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="UserName" name="UserName" placeholder="用户名 / Name">
                       	 	<small>请填写用户名</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">密码 / Password</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="Password" name="Password" placeholder="密码 / Passwor">
                       	 	<small>请填写密码</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-success tpl-btn-bg-color-success ">测试连接</button>
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
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>