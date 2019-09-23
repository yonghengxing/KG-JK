 <?php $__env->startSection('content'); ?>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                <div class="am-cf">
                    <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                    <small>数据源权限编辑</small>
                </div>
                
                <hr/>
                
				<div class="am-cf">
					<div class="widget-title  am-cf">  数据项  <?php echo e($dbsname); ?>

						可访问的人员:</div>
				</div>
				
				<br/>
				
				
				<div>
					<a href="<?php echo e(asset('/datasource/useradd')); ?>/<?php echo e($dbname); ?>/<?php echo e($dbsname); ?>"
						class="am-btn am-btn-default am-btn-success"> <span
						class="am-icon-plus"></span> 追加权限
					</a>
				</div>
            
						
    			<div class="am-form-group am-u-sm-12">
    			<input type="text" name= "searchText" id="searchText" value= "<?php echo e($dbname); ?>" hidden>
    			<input type="text" name= "searchText" id="searchText" value= "<?php echo e($dbsname); ?>" hidden>
    			<table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
    				<thead>
    					<tr>
    						<th>用户名</th>
    						<th>操作</th>
    					</tr>
    				</thead>
    				<tbody>
    				<?php $__currentLoopData = $user_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<tr class="gradeX">    							    
    					    <th><?php echo e($name["name"]); ?></th>    							    
    					    
    						<th>
    							<div class="tpl-table-black-operation">
    								<a href="<?php echo e(asset('/datasource/userdelete')); ?>/<?php echo e($dbname); ?>/<?php echo e($dbsname); ?>/<?php echo e($name['user_id']); ?>"
    									class="tpl-table-black-operation-del" onclick="return del()">
    									<i class="am-icon-trash"></i> 取消授权
    								</a>
    								<script> 
    													function del(){
    														if(confirm("确定要删除吗？")){
    															alert('删除成功！');
    															return true;
    														}else{
    															return false; 
    														}
    													} 
    											</script>
    							</div>
    						</th>								
    					</tr>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    					<!-- more data -->
    				</tbody>
    			</table>
    		</div>

            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>