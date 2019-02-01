 <?php $__env->startSection('content'); ?>
 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据注入/任务配置</strong> /
          			 <small>创建任务</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	
 					<div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">任务名称</label>
                        <div class="am-u-sm-6 am-u-end">
                             <input type="text" class="tpl-form-input" id="comp_name"  name="comp_name" placeholder="请输入任务名称">
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="tasktype" class="am-u-sm-3 am-form-label">任务类型</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="tasktype" name="tasktype">
                			<option value="tasktype1" selected = "selected">任务类型1</option>
                			<option value="tasktype2">任务类型2</option>
                        </select>
                     </div>
                    </div>
                    
                    <div class="am-form-group">
                      <label for="database" class="am-u-sm-3 am-form-label">融合配置</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="database" name="database">
                			<option value="database1" selected = "selected">融合配置1</option>
                			<option value="database2">融合配置2</option>
                        </select>
                     </div>
                    </div>
                    
 					<div class="am-form-group">
                        <label  class="am-u-sm-3 am-form-label">corn配置</label>
                        <div class="am-u-sm-6 am-u-end">
                             <input type="text" class="tpl-form-input" id="comp_name"  name="comp_name" placeholder="请输入corn配置">
                        </div>
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