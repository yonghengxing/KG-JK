 <?php $__env->startSection('content'); ?>

<style>
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* 定位 */
    position: absolute;
    z-index: 1;
	top: -5px;
    left: 105%;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>

<div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>实体融合</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                          <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p tooltip" id="tooltip">
                              	<a   href="<?php echo e(asset('entity/add')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>自动映射</a>
                      			<?php if($status==1): ?>									 
							 	<span class="tooltiptext">有新模型及数据，可自动映射</span>
							 	<?php else: ?>
							 	<span class="tooltiptext">没有新信息，不可自动映射</span>
							 	<?php endif; ?>
							  </div>
                          </div>
                          
                           <div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" class="am-form-field "  value="">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>
                        
						
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('search').value;
                                var str1 = "<?php echo e(asset('entity/search')); ?>";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }

                            function clearText() {
                                document.getElementById('search').value = "";
                            }
                        </script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>实体</th>
                                    <th>数据源</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php if(isset($data)): ?>
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="gradeX">
										<td><?php echo e($key); ?></td>
										<td><?php echo e($value); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
                            </tbody>
                        </table>
                     </div>                                

        		

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>