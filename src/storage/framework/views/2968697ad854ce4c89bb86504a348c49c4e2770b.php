 <?php $__env->startSection('content'); ?>
<div class="row-content am-cf">
    <div class="row">
    
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">新增用户</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">

                     <form class="am-form tpl-form-border-form  tpl-form-border-br" action="<?php echo e(asset('/user/new')); ?>" method="post" onsubmit="return checkForm()">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
						<div class="am-form-group">
                            <label  class="am-u-sm-3 am-form-label">用户名</label>
                            <div class="am-u-sm-9">
                                 <input type="text" class="tpl-form-input" id="username"  name="username" placeholder="请输入用户名，这是登录的账号">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label  class="am-u-sm-3 am-form-label">密码</label>
                            <div class="am-u-sm-9">
                                 <input type="password" class="tpl-form-input" id="pwd" name="pwd" placeholder="请输入密码">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label  class="am-u-sm-3 am-form-label">重复密码</span></label>
                            <div class="am-u-sm-9">
                                 <input type="password" class="tpl-form-input" id="pwd2" name="pwd2" placeholder="请再次输入密码">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-12 am-u-sm-push-12">
                                <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                            </div>
                        </div>
                        
                        <script type="text/javascript">
							function checkForm(){
								var nameText = document.getElementById("username").value;
								if ( nameText == "" || nameText == null ){
										alert("请输入用户名！");
										return false;
								}
								var tnameText = document.getElementById("truename").value;
								if ( tnameText == "" || tnameText == null ){
										alert("请输入用户真实姓名！");
										return false;
								}
								var roleCheck=$('input:radio[name="role"]:checked').val();
					            if(roleCheck == null){
					                alert("请选中人员属性!");
					                return false;
					            }
								var pwdText1 = document.getElementById("pwd").value;
								var pwdText2 = document.getElementById("pwd2").value;
								if ( pwdText1 == "" || pwdText1 == null ){
									alert("请输入密码！");
									return false;
								}
								if (pwdText1.length<10 || pwdText1.length>20){
									alert("密码请控制在10~20位！");
									return false;
								}
								if ( pwdText1!= pwdText2 ){
									alert("两次输入密码不一致！");
									return false;
								}
								return true;
							}
						</script>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>