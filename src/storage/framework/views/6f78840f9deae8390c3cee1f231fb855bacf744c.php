 <?php $__env->startSection('content'); ?>
            <div class="row-content am-cf">
                <div class="widget am-cf">
                    <div class="widget-body">
                        <div class="tpl-page-state">
                            <div class="tpl-page-state-title am-text-center tpl-error-title">success</div>
                            <div class="tpl-error-title-info">操作成功</div>
                            <div class="tpl-page-state-content tpl-error-content">
                                <p id="tips">页面跳转中</p>
                                <a href="<?php echo e(asset('')); ?><?php echo e($url); ?>" class="am-btn am-btn-secondary am-radius tpl-error-btn">点击跳转</a></div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                	onload = function() {
                		setInterval(go, 1000);
                	};
                	var x = 1; //利用了全局变量来执行  
                	function go() {
                    	$("#tips").text("页面跳转中... "+ x);
                		x--;
                		if (x > 0) {
                			document.getElementById("sp").innerHTML = x; //每次设置的x的值都不一样了。  
                		} else {
                			location.href = '<?php echo e(asset('')); ?><?php echo e($url); ?>';
                		}
                	}
                </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>