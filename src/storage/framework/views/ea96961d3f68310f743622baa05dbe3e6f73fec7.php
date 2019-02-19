 <?php $__env->startSection('content'); ?>
 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>关系类型</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal " action="<?php echo e(asset('relationType/info')); ?>/<?php echo e($relationType->tid); ?>" method="post" >
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	<div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">类型名称 / Name</label>
                      <div class="am-u-sm-9">
                        <input type="text" id="ontoDisplayName"  name="relationType" value="<?php echo e($relationType->relationlabel); ?>">
                        <small>输入关系类型名称</small>
                      </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">图标 / Icon</label>
                      <div class="am-u-sm-9">
                        <input type="text" id="ontoDisplayName"  name="mytext" value="<?php echo e($relationType->icon); ?>">
                        <small>请选择图标</small>
                      </div>
                    </div>  
                    
                   <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存</button>
						<button type="button"
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