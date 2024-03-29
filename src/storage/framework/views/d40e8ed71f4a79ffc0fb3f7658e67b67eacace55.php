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
              			 <small>关系维护</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                     	<div class="am-g">
                         <div class="am-u-sm-2 ">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/relation/new')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>创建实体关系</a>
							  </div>
                          </div>

							<div class="am-u-sm-2 ">
								<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p tooltip" id="tooltip">
									<a   href="<?php echo e(asset('/relation/auto')); ?>" class="am-btn am-btn-default am-btn-success"></span>生成模型</a>
										<?php if($status==1): ?>									 
									 	<span class="tooltiptext">有新信息，可生成模型</span>
									 	<?php else: ?>
									 	<span class="tooltiptext">没有新信息，不可生成模型</span>
									 	<?php endif; ?>
								</div>
							</div>

							<div  class="am-u-sm-3">
								<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
									<input type="text" name= "searchText" id="searchText" class="am-form-field "  value="<?php if(isset($text)): ?><?php echo e($text); ?><?php endif; ?>">
									<span class="am-input-group-btn">
                                    <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="button"></button>
                                  </span>
								</div>
							</div>
						</div>

						
						<script type="text/javascript">
							function search() {

                                var value = document.getElementById('searchText').value;
                                var str1 = "<?php echo e(asset('relation/search')); ?>";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }
						</script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
									<th>关系类型</th>
									<th>起始实体</th>
									<th>终点实体</th>
									<th>创建时间</th>
									<th>创建人</th>
									<th>更新时间</th>
									<th>更新人</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php if(isset($relations)): ?>
									<?php $__currentLoopData = $relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="gradeX">
										<td>
												<?php echo e($relation->typelabel); ?>

											</td>
											<td>
												<?php echo e($relation->startlabel); ?>

											</td>
											<td>
												<?php echo e($relation->endlabel); ?>

											</td>
											<td>
												<?php echo e(date('Y-m-d',strtotime($relation->created_at))); ?>


											</td>
											<td>
												<?php echo e($relation->createname); ?>

											</td>
											<td>
												<?php echo e(date('Y-m-d',strtotime($relation->updated_at))); ?>

											</td>
											<td>
												<?php echo e($relation->updatename); ?>

											</td>
											<td>
												<div class="operation___3s32S">
													
													<span><a href="<?php echo e(asset('/relation/delete')); ?>/<?php echo e($relation->rid); ?>" onclick="return del()">删除</a></span>

												</div>

												<script>
                                                    function del(){
                                                        if(confirm("确定要删除吗？")){
                                                            return true;
                                                        }else{
                                                            return false;
                                                        }
                                                    }
												</script>
											</td>
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