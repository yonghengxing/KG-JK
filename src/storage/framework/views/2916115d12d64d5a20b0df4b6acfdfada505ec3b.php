 <?php $__env->startSection('content'); ?>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="am-cf">
                    <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
                    <small>智能问答</small>
                </div>

				<hr/> 
				
				<div class="am-u-sm-12 am-u-end">
                  <label  class="am-u-sm-2">问题</label>
                  <div class="am-u-sm-6 am-u-end">
						<?php echo e($question); ?>

                  </div>
                </div>
				 
				<br/>
				                        
                <div class="am-u-sm-12 am-u-end">
                  <?php if($value == 0 || $value == 1): ?>
                      <label class="am-u-sm-2">答案</label>
                      <br/>
                      <div class="am-u-sm-6 am-u-end">
                         <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         	<?php echo e($results["famingren_kg"]); ?>

                         	<br/>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                  <?php elseif($value == 2): ?>
 					<div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>机构名称</th>
                                    <th>专利数量</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            	<tr class="ant-table-row  ant-table-row-level-0">
                                    <td>
                                        <?php echo e($results["shenqingren_kg"]); ?>

                                    </td>
                                    <td>
                                        <?php echo e($results["Count(*)"]); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                  <?php endif; ?>
                </div>				
			</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>