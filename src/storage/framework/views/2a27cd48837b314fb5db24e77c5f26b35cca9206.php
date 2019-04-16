 <?php $__env->startSection('content'); ?>

    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                        <small>关系类型</small>
                    </div>

                    <hr/>

                    <form class="am-form am-form-horizontal tpl-form-border-form  tpl-form-border-br" action="<?php echo e(asset('relationType/new')); ?>" method="post" onsubmit="return checkForm()" >
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div class="am-form-group">
                            <label for="rname" class="am-u-sm-3 am-form-label">关系类型</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="rname" name="rname" placeholder="请输入关系类型名称" required>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="rlabel" class="am-u-sm-3 am-form-label">关系标识</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="rlabel" name="rlabel" placeholder="请输入关系标识，仅限英文" required>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
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