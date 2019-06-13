 <?php $__env->startSection('content'); ?>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>实体列表</small>
                     </div>
                     
                     <hr/>
                     
                       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                            <tr>
                                <?php for($i=0; $i < count($columns); $i++): ?>
                                <th><?php echo e($columns[$i]["Field"]); ?></th>
                                <?php endfor; ?>
				<?php if(count($columns)>1): ?>
                                <th>操作</th>
				<?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $tablePaginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            	<?php for($i=0; $i < count($columns); $i++): ?>
                                <td> <?php echo e($table[$columns[$i]["Field"]]); ?></td>
                                <?php endfor; ?>
				<?php if(count($columns)>1): ?>
                                <td><a href=" <?php echo e(asset('/fuse/detail/')); ?>/<?php echo e($tablename); ?>/<?php echo e($table[$columns[0]["Field"]]); ?> ">详情</a></td>
                                <?php endif; ?>
			    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </tbody>
                        </table>
                     </div> 
                     
                   <div class="am-u-lg-12 am-cf">                          
                        <div class="am-fr">
                        	 <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
                    		<?php echo e($tablePaginator->links()); ?>

                        </div>
                    </div>
                     
              </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>