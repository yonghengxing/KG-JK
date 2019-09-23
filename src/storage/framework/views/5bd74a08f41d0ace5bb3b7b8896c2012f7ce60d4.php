 <?php $__env->startSection('content'); ?>

<style type="text/css"> 
.AutoNewline 
{ 
  Word-break: break-all;/*必须*/ 
} 
</style> 

<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="am-cf">
                    <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                    <small>数据源详情</small>
                </div>

                <hr/>
                
                <div class="am-form-group am-u-sm-12">
                	<input type="text" name= "searchText" id="searchText" value= "<?php echo e($dbname_real); ?>" hidden>
                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                        <thead>
                            <tr>
                                <th>数据项</th>
                                <th>数据权限</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $dbsrc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dbsrcs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
    							    <th><?php echo e($dbsrcs["items_name"]); ?></th>
    							    <th>
    							    <?php $__currentLoopData = $dbsrcs["name"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							    	<li><?php echo e($name); ?></li>    							    
    							    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    							    </th>
                                    <th><a href="<?php echo e(asset('/datasource/userlist')); ?>/<?php echo e($dbname_real[0]->dbname_real); ?>/<?php echo e($dbsrcs['items_name']); ?>">编辑</a> | <a href="<?php echo e(asset('#')); ?>">删除</a></th>                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
     			</div>
     			
     			
        		    <div class="am-u-lg-12 am-cf">                          
                        <div class="am-fr">
                        	 <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
                    		<?php echo e($dbsrc->links()); ?>

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>                
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>