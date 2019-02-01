 <?php $__env->startSection('content'); ?>

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf" style = "height:600px">

				<iframe name="myframe" src="http://kg.itechs.ac.cn/#/loading-executor" style="width:100%; height:100%;"></iframe>

			</div>
			
			<div class="am-u-sm-12">
                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                    <thead>
                        <tr>
                            <th>键值</th>
                            <th>输入</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            GET /query/connectivity/test
                        </td>
                        <td>
                        </td>
                        <td>
                            <div class="operation___3s32S">
                                <span><a href="">编辑</a></span>
                                <span><a href="" onclick="return del()">删除</a></span>
                                <span><a href="">复制</a></span>
                            </div>
                             <script>
                                function del(){
                                    if(confirm("确定要删除吗？")){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
                            </script> 
                        </td>
                        </tr>

                        <tr>
                        <td>
                            GET /query/connectivity/connection_mining
                        </td>
                        <td>
                            A <input type="test" value="input"> 
                            k <input type="test" value="input"> 
                            B <input type="test" value="input"> 
                        </td>

                        <td>
                           <div class="operation___3s32S">
                                <span><a href="">编辑</a></span>
                                <span><a href="" onclick="return del()">删除</a></span>
                                <span><a href="">复制</a></span>
                            </div>

                            <script>
                                function del(){
                                    if(confirm("确定要删除吗？")){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }
                            </script>   
                        </td>
                        </tr>                        
                    </tbody>
                </table>
             </div>          
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>