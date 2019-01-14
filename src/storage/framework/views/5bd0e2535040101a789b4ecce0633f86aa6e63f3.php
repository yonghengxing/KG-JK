 <?php $__env->startSection('content'); ?>
<div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱 /数据注入</strong> /
              			 <small>任务配置</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                         <div class="am-u-sm-12 am-u-md-12 am-u-lg-1">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/database/addDB')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>创建任务</a>
							  </div>
                          </div>
                          
                          <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/database/addDB')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>一键添加</a>
							  </div>
                          </div>
                          
                           <div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" class="am-form-field "  value="">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>
                        
						
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('search').value;
                                var str1 = "<?php echo e(asset('entity/search')); ?>";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }

                            function clearText() {
                                document.getElementById('search').value = "";
                            }
                        </script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>任务名称</th>
                                    <th>任务类型</th>
                                    <th>融合配置</th>
                                    <th>调度配置</th>
                                    <th>创建时间</th>
                                    <th>创建人</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>启用</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                     </div>                                

        		

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>