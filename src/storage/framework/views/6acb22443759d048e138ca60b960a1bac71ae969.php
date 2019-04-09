 <?php $__env->startSection('content'); ?>

    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;


        var str = ' <div class="am-form-group" index="'+
            compIndex +'" id="Attr'+
            compIndex +'"> <label for="labels-'+
            compIndex +'" class="am-u-sm-3 am-form-label" >属性标识：</label> <div class="am-u-sm-3"> <input type="text" name="labels[]" id="labels-'+
            compIndex +'" placeholder="请输入属性标识"> </div> <label for="iskey-'+
            compIndex + '" class="am-u-sm-2 am-form-label" >是否主键</label> <div class="am-u-sm-2 am-u-end">' +
            '<select data-am-selected="{searchBox: 1}"  id="iskey-'+
            compIndex + '" " name="iskey[]">'+
            '<option value="0">否</option>'+
            '<option value="1">是</option> 	</select> </div> </div> </div>';

		$("#showArri").append(str);
	}

	function deleteArri()
	{
// 		debugger;
		if(compIndex < 1){
		return;
		}
		$("#Attr"+compIndex).remove();
		compIndex--;
	}
</script>


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
                                <input type="text" id="rname" name="rname" placeholder="请输入关系类型名称">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="rlabel" class="am-u-sm-3 am-form-label">关系标识</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="rlabel" name="rlabel" placeholder="请输入关系标识，仅限英文">
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
                        
                      <script type="text/javascript">
						function checkForm(){
							var nameText = document.getElementById("rname").value;
							if ( nameText == "" || nameText == null ){
									alert("请输入关系类型名称！");
									return false;
							}
							var rlabelText = document.getElementById("rlabel").value;
							if ( rlabelText == "" || rlabelText == null ){
									alert("请输入关系标识，仅限英文！");
									return false;
							}
//							var labelsText = document.getElementById("labels-1").value;
//							if ( labelsText == "" || labelsText == null ){
//									alert("请输入属性标识！");
//									return false;
//							}

							return true;
						}
					</script>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>