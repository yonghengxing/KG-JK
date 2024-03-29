 <?php $__env->startSection('content'); ?>
  <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>关系类型</small>
                     </div>
                     
                      <hr/>
                     
                     <div class="widget-body  am-fr">
						 <div class="am-g">
                             <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                                  <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                  	<a   href="<?php echo e(asset('/relationType/new')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加关系类型</a>
    							  </div>
                              </div>
                              
                          	<div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" id="searchText" class="am-form-field "  value="<?php if(isset($text)): ?><?php echo e($text); ?><?php endif; ?>">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>
						
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('searchText').value;
                                var str1 = "<?php echo e(asset('relationType/search')); ?>";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }

                        </script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>关系名称</th>
                                    <th>关系标识</th>
                                    <th>创建时间</th>
                                    <th>创建人</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($relationTypes)): ?>
                                    <?php $__currentLoopData = $relationTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="gradeX">
										<td>
                                                <?php echo e($relationType->rname); ?>

                                            </td>
                                            <td>
                                                <?php echo e($relationType->rlabel); ?>

                                            </td>
                                            <td>
                                                <?php echo e(date('Y-m-d',strtotime($relationType->created_at))); ?>


                                            </td>
                                            <td>
                                                <?php echo e($relationType->createname); ?>

                                            </td>
                                            <td>
                                                <?php echo e(date('Y-m-d',strtotime($relationType->updated_at))); ?>

                                            </td>
                                            <td>
                                                <?php echo e($relationType->updatename); ?>

                                            </td>
                                            <td>
                                                <div class="operation___3s32S">
<!--                                                     <span><a href="<?php echo e(asset('/relationType/info')); ?>/<?php echo e($relationType->tid); ?>">编辑</a></span> -->
                                                    <span><a href="<?php echo e(asset('/relationType/delete')); ?>/<?php echo e($relationType->tid); ?>" onclick="return del()">删除</a></span>

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