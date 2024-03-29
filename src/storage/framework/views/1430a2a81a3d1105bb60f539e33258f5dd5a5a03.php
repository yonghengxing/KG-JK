 <?php $__env->startSection('content'); ?>
<script type="text/javascript">
	
	var userIndex = 1;
	function addUser()
	{
		userIndex++;
		var str = '<div class="am-form-group" index="'+
		 userIndex + '" id="user'+
		 userIndex + '"><label class="am-u-sm-3 am-form-label">用户('+
		 userIndex + ')</label><div class="am-u-sm-2 am-u-end"><select data-am-selected="{searchBox: 1}" id="user_'+
		 userIndex + '" name="user_'+
		 userIndex + '"><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div>';
		$("#showUser").append(str);
		var user_num = document.getElementById("user_num");
		user_num.value = userIndex;
    }
	function deleteUser()
	{
		if(userIndex < 1){
		return;
		}
		$("#user"+userIndex).remove();
		userIndex--;
		var user_num = document.getElementById("user_num");
		user_num.value = userIndex;
	}
</script>
							
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                <div class="am-cf">
                    <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                    <small>数据源权限添加</small>
                </div>
                
                <hr/>
                
				<div class="am-cf">
					<div class="widget-title  am-cf">  数据项  <?php echo e($dbsname); ?>

					增加访问的人员:</div>
				</div>


					<form class="am-form am-form-horizontal "action="<?php echo e(asset('/datasource/useradd')); ?>/<?php echo e($dbname); ?>/<?php echo e($dbsname); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
							<input type="hidden" name="user_num" id="user_num" value="1" />
							<div class="widget-body am-fr" id="showUser">
								<div class="am-form-group" index="1" id="user1">
									<label class="am-u-sm-3 am-form-label">用户(1)</label>
									<div class="am-u-sm-9">
										<select data-am-selected="{searchBox: 1}" id="user_1" name="user_1">
											<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								
							</div>
						
						<div class="am-form-group" index="1">
								<label for="user-name" class="am-u-sm-3 am-form-label"></label>
								<div class="am-u-sm-9">
									<div class="am-form-group">
										<div class="am-btn-toolbar">
											<div class="am-btn-group am-btn-group-xs">
												<button type="button"
													class="am-btn am-btn-default am-btn-success"
													onclick="addUser();">
													<span class="am-icon-plus"></span> 追加用户
												</button>
												<button type="button"
													class="am-btn am-btn-default am-btn-danger"
													onclick="deleteUser();">
													<span class="am-icon-trash-o"></span> 删除用户
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="am-form-group">
									<div class="am-u-sm-9 am-u-sm-push-3">
									<button type="submit"
										class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
									</div>
								</div>
							</div>


						
					</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>