 <?php $__env->startSection('content'); ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#mytext').fontIconPicker({
			source:    ['icon-heart', 'icon-search', 'icon-user', 'icon-tag', 'icon-help'],
			emptyIcon: false,
			hasSearch: false
		});
	});
</script>


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
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">类型名称 / Name</label>
                      <div class="am-u-sm-9">
                        <input type="text" id="ontoDisplayName"  name="relationType" placeholder="类型名称 / Name">
                        <small>输入关系类型名称</small>
                      </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="ontoDisplayName" class="am-u-sm-3 am-form-label">图标 / Icon</label>
                      <div class="am-u-sm-8">
                        <input type="text" name="mytext" id="mytext" />
                      </div>
                      <span style="display: none;">
                      	<button type="submit" onclick="getValue()"></button>
                      </span>
                    </div>  
                    
                   <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>