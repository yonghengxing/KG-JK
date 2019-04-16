 <?php $__env->startSection('content'); ?>
  <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                                                 <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>用户管理</small>
                     </div>
                     
                     <hr/>

                               
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                  		<a   href="<?php echo e(asset('/user/new')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                    
                                    </div>
                                </div>

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                        	    <th>ID</th>
                                        	    <th>用户名</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="gradeX">
                                            	<td><?php echo e($user->id); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="<?php echo e(asset('user/info')); ?>/<?php echo e($user->id); ?>">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="<?php echo e(asset('user/delete')); ?>/<?php echo e($user->id); ?>" class="tpl-table-black-operation-del" onclick="return del()" >
                                                            <i class="am-icon-trash"></i> 删除
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
                                                        </a>
                                                    </div>
                                                </td>
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
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>