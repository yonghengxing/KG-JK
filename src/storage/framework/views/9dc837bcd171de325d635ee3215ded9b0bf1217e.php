 <?php $__env->startSection('content'); ?>
 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置/数据源</strong> /
          			 <small>添加数据源</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="am-form-group">
                      <label for="database" class="am-u-sm-3 am-form-label">数据库</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="database" name="database">
                			<option value="database1" selected = "selected">数据库1</option>
                			<option value="database2">数据库2</option>
                        </select>
                     </div>
                    </div>
                    
                    <div class="am-form-group">
                      	<label for="DSname" class="am-u-sm-3 am-form-label">数据源</label>
                      	<div class="am-u-sm-6 am-u-end">
                        	<input type="text" id="DSname" name="DSname" placeholder="数据源">
                       	 	<small>添加数据源</small>
                      	</div>
                    </div>
                    
                    <div class="am-form-group">
                    	<label class="am-u-sm-3 am-form-label">数据源类型/ Type</label>
                    	<div class="am-u-sm-9">
                          <label class="am-radio-inline">
                            <input type="radio"  value="" name="docInlineRadio"> 实体
                          </label>
                          <label class="am-radio-inline">
                            <input type="radio" name="docInlineRadio"> 关系
                          </label>
                        </div>
                    </div>
                    
                    <div class="am-form-group">
						<label for="db-rules" class="am-u-sm-3 am-form-label">数据库提取规则</label>
						<div class="am-u-sm-9">
							<textarea class="" rows="10" id="db-rules" name="db-rules"
							placeholder="请输入数据库提取规则"></textarea>
						</div>
					</div>
					
					<div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存</button>
						<button type="submit"
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