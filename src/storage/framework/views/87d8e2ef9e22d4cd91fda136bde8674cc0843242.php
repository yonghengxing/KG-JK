 <?php $__env->startSection('content'); ?>                                 	                 
<script>
$(function(){
    $("#schema").change(function(){
    	
    	var value = $(this).val();
    	var textarea= $("#show").val();
    	var str = textarea.replace('schema',value);
   	 	$("#show").val(str);
    })
})
</script> 

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
          			 <small>模糊搜索</small>
                 </div>
                 
                
                 <form class="am-form">
                 	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                 	
             	   <div class="am-form-group">
                        <label for="schema" class="am-u-sm-1 am-form-label">实体选择</label>
                        <div class="am-u-sm-11">
                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="schema" name="schema">
                                <option name="schema1" selected = "selected" value="0">请选择查找的实体</option>
                                <option name="schema2" value="hello world">hello world</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                        <div class="am-u-sm-6">
                          <label for="show">文本域</label>
                          <textarea style="overflow-x; overflow-y" class=" " rows="10" id="show">ceshiceshiceshischema</textarea>
                        </div>
                        
                        <div class="am-u-sm-6">
                          <label for="picture">效果图</label>
                          <img src="<?php echo e(asset('assets/img/ISCAS.png')); ?>" id="picture" alt=""/>
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