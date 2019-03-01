 <?php $__env->startSection('content'); ?>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;


        var str = ' <div class="am-form-group" index="'+
            compIndex +'" id="Attr'+
            compIndex +'"> <label for="labels-'+
            compIndex +'" class="am-u-sm-3 am-form-label" >属性标识：</label> <div class="am-u-sm-3"> <input type="text" name="labels[]" id="labels-'+
            compIndex +'" placeholder="请输入属性标识"> </div> <label for="iskey-'+
            compIndex + '" class="am-u-sm-2 am-form-label" >是否主键</label> <div class="am-u-sm-2 am-u-end">' +
            '<select data-am-selected="{searchBox: 1}"  id="iskey-'+
            compIndex + '" " name="iskey[]">'+
            '<option value="0">否</option>'+
            '<option value="1">是</option> 	</select> </div> </div> </div>';

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
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /实体配置</strong> /
          			 <small>添加实体类型</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal " action="<?php echo e(asset('schema/new')); ?>" method="post" onsubmit="return checkForm()">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="am-form-group">
                      <label for="schema-name" class="am-u-sm-3 am-form-label">实体名称</label>
                      <div class="am-u-sm-6 am-u-end">
                        <input type="text" id="sname" name="sname" placeholder="输入实体名称">
                      </div>
                    </div>

					 <div class="am-form-group">
						 <label for="schema-name" class="am-u-sm-3 am-form-label">实体标识</label>
						 <div class="am-u-sm-6 am-u-end">
							 <input type="text" id="slabel" name="slabel" placeholder="输入标识，仅限英文">
						 </div>
					 </div>
                    

					 <div id="showArri" class="am-g">
						 <div class="am-form-group" index="1" id="Attr1">
							 <label for="labels-2" class="am-u-sm-3 am-form-label" >属性标识：</label>
							 <div class="am-u-sm-3">
								 <input type="text" id="labels-2" name="labels[]" placeholder="请输入属性标识">
							 </div>
							 <label for="iskey-1" class="am-u-sm-2 am-form-label" >是否主键</label>
							 <div class="am-u-sm-2 am-u-end">
									 <select data-am-selected="{searchBox: 1}"  id="iskey-1" name="iskey[]">
										 <option value="0">否</option>
										 <option value="1">是</option>
									 </select>

							 </div>
						 </div>
					 </div>


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
					
					<script type="text/javascript">
						function checkForm(){
							var nameText = document.getElementById("sname").value;
							if ( nameText == "" || nameText == null ){
									alert("请输入实体名称！");
									return false;
							}
							var slabelText = document.getElementById("slabel").value;
							if ( slabelText == "" || slabelText == null ){
									alert("请输入标识，仅限英文！");
									return false;
							}

							return true;
						}
					</script>
            	</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>