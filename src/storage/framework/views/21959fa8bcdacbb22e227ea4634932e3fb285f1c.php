 <?php $__env->startSection('content'); ?>
<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
          			 <small>添加实体类型</small>
                 </div>
                 
                 <hr/>
                 <div class="widget-body am-fr">
                 <form class="am-form tpl-form-border-form  tpl-form-border-br am-form-horizontal " action="<?php echo e(asset('schema/new')); ?>" method="post" onsubmit="return checkForm()">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="am-form-group">
                      <label for="schema-name" class="am-u-sm-3 am-form-label">实体名称</label>
                      <div class="am-u-sm-6 am-u-end">
                        <input type="text" id="sname" name="sname" placeholder="请输入实体名称" required>
                      </div>
                    </div>

					 <div class="am-form-group">
						 <label for="schema-name" class="am-u-sm-3 am-form-label">实体标识</label>
						 <div class="am-u-sm-6 am-u-end">
							 <input type="text" id="slabel" name="slabel" placeholder="请输入标识，仅限英文" required>
						 </div>
					 </div>
                    

					 <div id="showArri" class="">
						 <div class="am-form-group" index="1" id="Attr1">
							 <label for="labels-2" class="am-u-sm-3 am-form-label" >属性标识</label>
							 <div class="am-u-sm-6 am-u-end">
								 <input type="text" id="labels-2" name="labels[]" placeholder="请输入属性标识" required>
							 </div>
						 </div>
					 </div>
					 
					 <script type="text/javascript">
                    	var compIndex = 1;
                    	function addArri()
                     	{
                    		compIndex++;
                    
                    
                            var str = ' <div class="am-form-group" index="'+
                                compIndex +'" id="Attr'+
                                compIndex +'"> <label for="labels-'+
                                compIndex +'" class="am-u-sm-3 am-form-label" >属性标识</label> <div class="am-u-sm-6 am-u-end"> <input type="text" name="labels[]" id="labels-'+
                                compIndex +'" placeholder="请输入属性标识" required> </div> </div> </div>';
                    		
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


					 <div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-secondary">添加属性</button>
						<button type="button" onclick="deleteArri();" class="am-btn am-btn-default am-btn-secondary">删除属性</button>
						<button type="submit"
							class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
						<button type="button"
							class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
						</div>
					</div>

            	</form>
            	</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>