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
                 
                 <form horizontal="true"  enctype="multipart/form-data" class="am-form am-form-horizontal " method="post">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	
             	   <div class="am-form-group">
                      	<label for="IP" class="am-u-sm-3 am-form-label">IP地址 / Name</label>
                        <div class="am-u-sm-9">
                             IP地址 / Name
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Port" class="am-u-sm-3 am-form-label">端口 / Port</label>
                        <div class="am-u-sm-9">
                             	端口 / Port
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="DBname" class="am-u-sm-3 am-form-label">数据库名称 / Name</label>
                        <div class="am-u-sm-9">
                             	数据库名称 / Name
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="UserName" class="am-u-sm-3 am-form-label">用户名 / Name</label>
                        <div class="am-u-sm-9">
                             	用户名 / Name
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">密码 / Password</label>
                        <div class="am-u-sm-9">
                             	密码 / Password
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
                 	
                 	
                 </form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>