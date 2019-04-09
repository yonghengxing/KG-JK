 <?php $__env->startSection('content'); ?>


<div  class="am-g tpl-g">
	<div class="tpl-content-wrapper" style ="font-weight:bold;">
        <video autoplay loop muted id="bgvid">
        	<source src="<?php echo e(asset('assets/img/bg_video.mp4')); ?>" type="video/mp4">
        </video>
        
        <div class="bg_mark"> </div>
        
        <div class="tpl-page-state-title am-text-center tpl-error-title" style="color: #ffffff;font-size: 6.6rem;font-weight: normal;">JKJ军事科学信息中心
			</div>
		<div class="tpl-error-title-info am-text-center"  style="color: #ffffff;font-size: 30px;">科技领域基础数据管理与服务系统
			</div>

        <div class="login-box">
            <form  method="POST" action="<?php echo e(route('login')); ?>" class="am-form" data-am-validator>
              <div class="am-form-group">
                <label for="name"><i class="am-icon-user"></i></label>
                <input type="text" id="name" minlength="3" placeholder="输入用户名" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('email')); ?>" required autofocus/>
              </div>
            
              <div class="am-form-group">
                <label for="password"><i class="am-icon-key"></i></label>
                <input type="password" id="password" placeholder="输入密码" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required/>
                <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
              </div>
              <button class="am-btn am-btn-secondary"  type="submit">登录</button>
            </form>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>