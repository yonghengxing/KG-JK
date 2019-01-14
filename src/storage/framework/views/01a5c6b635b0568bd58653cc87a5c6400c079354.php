 <?php $__env->startSection('content'); ?>

  <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
              			 <small>实体类型</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                         <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/entity/new')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加实体类型</a>
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
                                    <th>实体名称</th>
                                    <th>本体类型</th>
                                    <th>图标</th>
                                    <th>融合状态</th>
                                    <th>创建时间</th>
                                    <th>创建人</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php if(isset($entities)): ?>
                                    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									                                        <tr class="ant-table-row  ant-table-row-level-0">

                                            <td>
                                                <?php echo e($entity->showname); ?>

                                            </td>
                                            <td>
                                                <?php echo e($entity->entityname); ?>

                                            </td>
                                            <td>
                                                <?php echo e($entity->icon); ?>

                                            </td>
                                            <td>
                                                <?php echo e(config("app.entity_status")[$entity->status]); ?>

                                            </td>
                                            
                                            <td>
                                                <?php echo e(date('Y-m-d',strtotime($entity->created_at))); ?>

                                            </td>
                                            <td>
                                                <?php echo e($entity->createname); ?>

                                            </td>
                                            <td>
                                                <?php echo e(date('Y-m-d',strtotime($entity->updated_at))); ?>

                                            </td>
                                            <td>
                                                <?php echo e($entity->updatename); ?>

                                            </td>
                                            <td>
                                                <div class="operation___3s32S">
                                                    <span><a href="<?php echo e(asset('/entity/info')); ?>/<?php echo e($entity->sid); ?>">编辑</a></span>
                                                    <span><a href="<?php echo e(asset('/entity/delete')); ?>/<?php echo e($entity->sid); ?>" onclick="return del()">删除</a></span>
                                                    <span><a href="<?php echo e(asset('/entity/copy')); ?>/<?php echo e($entity->sid); ?>">复制</a></span>
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