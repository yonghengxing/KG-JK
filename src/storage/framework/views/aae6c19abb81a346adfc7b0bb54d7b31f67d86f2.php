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
                 
                 <form horizontal="true"  enctype="multipart/form-data" class="am-form am-form-horizontal " action="<?php echo e(asset('/addDB_do')); ?>" method="post">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	
                 	<div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">名称 / Name</label>
                      	<input type="hidden" name="name" value="<?php echo e($name); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($name); ?>

                        </div>
                    </div>
                    
             	   <div class="am-form-group">
                      	<label for="IP" class="am-u-sm-3 am-form-label">IP地址 / Name</label>
                      	<input type="hidden" name="IP" value="<?php echo e($IP); ?>" />
                        <div class="am-u-sm-9">
                             <?php echo e($IP); ?>

                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Port" class="am-u-sm-3 am-form-label">端口 / Port</label>
                      	<input type="hidden" name="port" value="<?php echo e($port); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($port); ?>

                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="DBname" class="am-u-sm-3 am-form-label">数据库名称 / Name</label>
                      	<input type="hidden" name="dbname" value="<?php echo e($dbname); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($dbname); ?>

                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="UserName" class="am-u-sm-3 am-form-label">用户名 / Name</label>
                      	<input type="hidden" name="username" value="<?php echo e($username); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($username); ?>

                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">密码 / Password</label>
                      	<input type="hidden" name="password" value="<?php echo e($password); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($password); ?>

                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="Password" class="am-u-sm-3 am-form-label">数据库类型/ Type</label>
                      	<input type="hidden" name="type" value="<?php echo e($type); ?>" />
                        <div class="am-u-sm-9">
                             	<?php echo e($type); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>