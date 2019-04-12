 <?php $__env->startSection('content'); ?>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>数据源</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                         <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="<?php echo e(asset('/datasource/addnew')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>创建数据项</a>
							  </div>
                          </div>
                          
                           <div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" id="searchText" class="am-form-field "  value="">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>
                        
						
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('searchText').value;
                                var str1 = "<?php echo e(asset('datasource/search')); ?>";
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
                                <th>数据源</th>
                                <th>数据库</th>

                                <th>真实数据库名</th>
                                <th>创建时间</th>
                                <th>创建人</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php 
                            for($i = 0;$i<count($datasourceMsg);$i++){
                            ?>

                            <tr>
                                <td><?php echo e($datasourceMsg[$i]->dataSource); ?></td>
                                <td><?php echo e($datasourceMsg[$i]->dbname); ?></td>

                                <td><?php echo e($datasourceMsg[$i]->dbname_real); ?></td>
                                <td><?php echo e($datasourceMsg[$i]->created_at); ?></td>
                                <td><?php echo e($datasourceMsg[$i]->createdname); ?></td>
                                <td><a href="<?php echo e(asset('/datasource/show/'.$datasourceMsg[$i]->rid)); ?>"> 详情</a> |<a href="<?php echo e(asset('/DBsrc_del/'.$datasourceMsg[$i]->rid)); ?>"> 删除</a></td>
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