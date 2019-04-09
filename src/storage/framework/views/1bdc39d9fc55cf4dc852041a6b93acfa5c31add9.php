 <?php $__env->startSection('content'); ?>

<script type="text/javascript">
	var compIndex = "<?php echo e($num); ?>";
	function addArri()
 	{
		compIndex++;

		var str = '<div class="am-form-group" index="'+
					compIndex+'" id="Attr'+
					compIndex+'"> <label for="schema-attribute'+
					compIndex+'" class="am-u-sm-3 am-form-label" >属性('+
					compIndex+') /  Attribute</label><div class="am-u-sm-9"> <input name="properties[]" type="text" id="schema-attribute'+
					compIndex+'" placeholder="属性('+
					compIndex+')"> <small>输入属性名称</small> </div> </div>';

		$("#showArri").append(str);

	}

	function deleteArri()
	{
// 		debugger;
		if(compIndex < 1){
		return;
		}
		$("#Attr"+compIndex).remove();
		compIndex--;
	}
</script>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
              	 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                     <small>查看实体详情</small>
                 </div>
                 
                 <hr/>


                 <form class="am-form tpl-form-border-form  tpl-form-border-br" action="<?php echo e(asset('/schema/info')); ?>/<?php echo e($schema->sid); ?>" method="post" >
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
					<div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">实体名称：</label>
                        <div class="am-u-sm-9">
                             <?php echo e($schema->sname); ?>

                        </div>
                    </div>

					 <div class="am-form-group">
						 <label for="schema-name" class="am-u-sm-3 am-form-label">实体标识：</label>
						 <div class="am-u-sm-9">
                             <?php echo e($schema->slabel); ?>

                        </div>
					 </div>
                    
                     <div class="" id="showArri">
                     	<?php for($i = 1; $i <= $num; $i++): ?>
                        <div class="am-form-group" index="1" id="Attr1">
                          <label for="schema-attribute1" class="am-u-sm-3 am-form-label" >属性(<?php echo e($i); ?>) ：</label>
                          <div class="am-u-sm-9">
                             <?php echo e($properties[$i-1]); ?>

                          </div>
                        </div>
                        <?php endfor; ?>
                     </div>                     
                    
                    <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
<!-- 			<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-secondary" hidden>添加属性</button>
						<button type="button" onclick="deleteArri();" class="am-btn am-btn-default am-btn-secondary" hidden>取消添加</button>
						<button type="submit"
							class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button> -->
						<button type="button"
							class="am-btn am-btn-default tpl-btn-bg-color-success" onclick="history.go(-1);">返回</button>
						</div>
					</div>
                    
            	</form>
			</div>
		</div>
	</div>
</div>                    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>