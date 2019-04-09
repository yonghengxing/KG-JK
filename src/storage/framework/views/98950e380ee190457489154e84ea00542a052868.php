 <?php $__env->startSection('content'); ?>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>数据库</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                         <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/database/new')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加数据库</a>
							  </div>
                          </div>
                          
                           <div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" id="search" class="am-form-field "  value="">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>
                        
						
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('search').value;
                                var str1 = "<?php echo e(asset('database/search')); ?>";
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
                                    <th>名称</th>
                                    <th>数据库类型</th>
                                    <th>IP地址</th>
                                    <th>数据库</th>                                                                        
                                    <th>创建时间</th>
                                    <th>创建人</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                </tr>
                                </thead>
                            <tbody>
                              <?php 
                            for($i = 0;$i<count($databaseMsg);$i++){
                            ?>
                            <tr>
                                <td><?php echo e($databaseMsg[$i]->name); ?></td>
                                <td><?php echo e($databaseMsg[$i]->type); ?></td>
                                <td><?php echo e($databaseMsg[$i]->IP); ?></td>
                                <td><?php echo e($databaseMsg[$i]->dbname); ?></td>
                                <td><?php echo e($databaseMsg[$i]->created_at); ?></td>
                                <td><?php echo e($databaseMsg[$i]->createdname); ?></td>
                                <td><?php echo e($databaseMsg[$i]->updated_at); ?></td>
                                <td><?php echo e($databaseMsg[$i]->updatename); ?></td>
                            </tr>
                            <?php }?>  
                            </tbody>
                        </table>
                     </div>                                

        		

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>