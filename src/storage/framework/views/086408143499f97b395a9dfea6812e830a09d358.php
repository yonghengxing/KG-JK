 <?php $__env->startSection('content'); ?>
 <div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /融合配置/本地配置</strong> /
          			 <small>添加映射</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	  <div class="am-form-group">
                      <label for="schema" class="am-u-sm-1 am-form-label">本体</label>
                      <div class="am-u-sm-5">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id=""schema"" name="schema">
                			<option value="schema1" selected = "selected">本体1</option>
                			<option value="schema2">本体2</option>
                        </select>
                     </div>
                     
                     <label for="data" class="am-u-sm-1 am-form-label">数据</label>
                      <div class="am-u-sm-5">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="data" name="data">
                			<option value="data1" selected = "selected">数据1</option>
                			<option value="data2">数据2</option>
                        </select>
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