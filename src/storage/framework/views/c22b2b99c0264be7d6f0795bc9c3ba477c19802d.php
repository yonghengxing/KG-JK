 <?php $__env->startSection('content'); ?>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;

		var str = ' <div class="am-form-group" index="'+
					compIndex +'" id="Attr'+
					compIndex +'"> <label for="attribute-name'+
					compIndex +'" class="am-u-sm-2 am-form-label" >属性('+
					compIndex +')名称：</label> <div class="am-u-sm-4"> <input type="text" id="attribute-name'+
					compIndex +'" placeholder="请输入属性('+
					compIndex +')名称"> </div> <label for="attribute-value'+
					compIndex + '" class="am-u-sm-1 am-form-label" >属性值</label> <div class="am-u-sm-4 am-u-end"> <input type="text" id="attribute-value'+
					compIndex + '" placeholder="请输入属性值"> </div> </div>';


		$("#showArri").append(str);

	}
</script>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>实体类型</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                    <div class="am-form-group">
                      <label for="entityname" class="am-u-sm-3 am-form-label">实体名称：</label>
                      <div class="am-u-sm-6 am-u-end">
                        <input type="text" name="entitylabel" placeholder="输入实体名称">
                      </div>
                    </div>     
                 
                    <div class="am-form-group">
					   <label for="schema-name" class="am-u-sm-3 am-form-label">本体类型 / Name</label>
					   <div class="am-u-sm-9 ">
						  <select data-am-selected="{searchBox: 1}"  id="stype" name="stype">
							  <option value=""></option>
							     <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								    <option value="<?php echo e($schema->sid); ?>"><?php echo e($schema->stype); ?></option>
							     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </select>
					   </div>
                    </div>
					 <script type="text/javascript">
                         $(function(){
                             $("#stype").change(function(){
                                 var value = $(this).val();
                                 var str1 = "<?php echo e(asset('entity/new')); ?>";
                                 var url = str1 + '/' + value;
                                 window.location.href= url;
                             });
                         })
					 </script>



                    <div id="showArri">
                        <div class="am-form-group" index="1" id="Attr1">
							<label for="attribute-name2" class="am-u-sm-2 am-form-label" >属性(1)名称：</label>
							<div class="am-u-sm-4">
								<input type="text" id="attribute-name2" placeholder="请输入属性(1)名称">
							</div>
							<label for="attribute-value1" class="am-u-sm-1 am-form-label" >属性值</label>
                          	<div class="am-u-sm-4 am-u-end">
								<input type="text" id="attribute-value1" placeholder="请输入属性值">
                            </div>
                        </div>
                     </div>
                    
        			<div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-secondary">添加属性</button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>