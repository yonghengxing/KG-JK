 <?php $__env->startSection('content'); ?>

<div class="row-content am-cf">
  <div class="row">
       <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">

                <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
          			 <small>关系维护</small>
                </div>

                <hr/>

				<form class="ant-form ant-form-horizontal tpl-form-border-form  tpl-form-border-br" action="<?php echo e(asset('relation/new')); ?>" method="post">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>起点实体</th>
                                    <th>终点实体</th>
                                    <th>关系类型</th>
				                    <th>关联字段</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="gradeX">
										<td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;" id="fromVertex" name="fromVertex">
                                            <option>请选择数据库</option>
                                                <?php if(isset($schemas)): ?>
                                                    <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($schema->sid); ?>"><?php echo e($schema->slabel); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="toVertex" name="tovertex">
                                            	<option>选择终点实体</option>
                                                <?php if(isset($schemas)): ?>
                                                    <?php $__currentLoopData = $schemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($schema->sid); ?>"><?php echo e($schema->slabel); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationType" name="relationType">
                                            	<option>选择关系类型</option>
                                                <?php if(isset($relationTypes)): ?>
                                                    <?php $__currentLoopData = $relationTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($relationType->tid); ?>"><?php echo e($relationType->rlabel); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 <?php endif; ?>
                                            </select>

                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationField" name="relationField">
												<option>选择关联字段</option>
                                            </select>
                                        </td>
									</tr>
                            </tbody>
                        </table>
                     </div>

					 <script>
                        $(function(){
                            //数据库选择改变
                            $("#fromVertex").change(function(){
                                var value = $(this).val();
                                var str1 = "<?php echo e(asset('relation/getRelationField')); ?>";
//                                 var text = $('#fromVertex option:selected').text();
                                var url1 = str1 + '/' + value;
                                console.log(url1);
                                var objectModel = {};
                                var csrf = "_token";
                                var ctoken = "<?php echo e(csrf_token()); ?>";
                                objectModel[csrf] = ctoken;
                                $.ajax({
                                    url:url1,
                                    type:"post",
                                    dataType:"json",
                                    data: objectModel,//{_token:"<?php echo e(csrf_token()); ?>",_method:'PATCH',type:value},
                                    success:function(data){
                                        $("#relationField").empty();
                                        var str = new Array;
                                        var strAll = " ";
                                        for(var i = 0;i < data.length;i++){
                                            var table_name = data[i];
                                            str[i] = "<option value = '"+table_name+"''>"+ table_name +"</option> ";
                                            strAll = strAll.concat(str[i]);
                                        }
                                        $("#relationField").html(strAll);
                                    }
                                })
                            })
                        })
                    </script>

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