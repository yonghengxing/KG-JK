 <?php $__env->startSection('content'); ?>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>实体详情</small>
                     </div>
                     
                     <hr/>
                     
                                          
                       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                            <tr>
                                <th>数据项</th>
                                <th>数据值</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php for($i=0; $i< count($dbout_table_columns); $i++): ?>
                            <tr>
                                <td><?php echo e($dbout_table_columns[$i]["Field"]); ?></td>
                                <td><?php echo e($dbout_table[0][$dbout_table_columns[$i]["Field"]]); ?></td>
                            </tr> 
                            <?php endfor; ?>                        
                            </tbody>
                        </table>
                     </div> 
                     
              </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>