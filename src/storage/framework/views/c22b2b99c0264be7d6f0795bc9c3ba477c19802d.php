 <?php $__env->startSection('content'); ?>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<script type="text/javascript">
	var compIndex = 1;
	function addArri()
 	{
		compIndex++;

		var str = ' <div class="am-form-group" index="'+
					compIndex +'" id="Attr'+
					compIndex +'"> <label for="attribute-name'+
					compIndex +'"class="am-u-sm-1 am-form-label" >属性名称：</label> <div class="am-u-sm-11"> <input type="text" id="attribute-name'+
					compIndex +'" placeholder="属性名称"> <small>输入属性名称</small>	 </div> <label for="attribute-value'+
					compIndex + '" class="am-u-sm-1 am-form-label" >属性值</label> <div class="am-u-sm-11"> <input type="text" id="attribute-value'+
					compIndex + '" placeholder="属性值"> <small>输入属性值</small> </div> </div>';

// 	    alert(str);
		$("#showArri").append(str);

	}
</script>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                 <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>实体类型</small>
                 </div>
                 
                 <hr/>
                 
                 <form class="am-form am-form-horizontal ">
                    <div class="am-form-group">
                      <label class="am-u-sm-3 am-form-label am-u-sm-centered">实体名称：</label>
                    </div>     
                 
                    <div class="am-form-group">
                      <label for="schema-name" class="am-u-sm-3 am-form-label">本体名称 / Name</label>
                      <div class="am-u-sm-9 ">
                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="schema-name" name="schema-name">
                			<option value="schema-name1" selected = "selected">本体名称1</option>
                			<option value="schema-name2">本体名称2</option>
                        </select>
                     </div>
                    </div>
                    
                    <div class="widget-body am-fr" id="showArri">
                        <div class="am-form-group" index="1" id="Attr1">
                          <label class="am-u-sm-1 am-form-label" >属性名称：</label>
                          <label for="attribute-value1" class="am-u-sm-3 am-form-label" >属性值</label>
                          <div class="am-u-sm-8">
                            <input type="text" id="attribute-value1" placeholder="属性值">
                            <small>输入属性值</small>
                          </div>
                        </div>
                     </div>
                     
                    <div class="am-form-group">
                     <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                          <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                    			<button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加属性</button>
    					  </div>
                    </div>
                    </div>
                    
        			<div class="am-form-group">
						<div class="am-u-sm-9 am-u-sm-push-3">
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存</button>
						<button type="submit"
							class="am-btn am-btn-primary tpl-btn-bg-color-success ">取消</button>
						</div>
					</div>
            	</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>