 <?php $__env->startSection('content'); ?>

    <div class="row-content am-cf">
        <div class="row">
            <d  iv class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
                        <small>关系维护</small>
                    </div>

                    <hr/>

                    <form class="ant-form ant-form-horizontal" action="<?php echo e(asset('relation/info')); ?>/<?php echo e($relation->rid); ?>" method="post" >
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                <tr>
                                    <th>起点实体</th>
                                    <th>终点实体</th>
                                    <th>关系类型</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="fromvertex">
                                            <option value="<?php echo e($relation->fromvertex); ?>" selected="selected" ><?php echo e($relation->startlabel); ?></option>
                                            <?php if(isset($schemas)): ?>
                                                <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($schema->sid); ?>"><?php echo e($schema->slabel); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </select>
                                    </td>
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="tovertex">
                                            <option value="<?php echo e($relation->tovertex); ?>" selected="selected" ><?php echo e($relation->endlabel); ?></option>
                                            <?php if(isset($schemas)): ?>
                                                <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($schema->sid); ?>"><?php echo e($schema->slabel); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="relationType">
                                            <option value="<?php echo e($relation->relationtype); ?>" selected="selected" ><?php echo e($relation->typelabel); ?></option>
                                            <?php if(isset($relationTypes)): ?>
                                                <?php $__currentLoopData = $relationTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($relationType->tid); ?>"><?php echo e($relationType->rlabel); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-8 am-u-sm-push-4">
                                <button type="submit"
                                        class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
                                <button type="button"
                                        class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>