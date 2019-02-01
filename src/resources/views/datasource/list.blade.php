@extends('template') @section('content')

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱 /数据配置</strong> /
              			 <small>数据源</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                         <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="{{ asset('/datasource/new')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>创建数据源</a>
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
                        
						{{-- 条件搜索，目前只能点击搜索才进行搜索，以后可以加入Enter键快速搜索 --}}
                        <script type="text/javascript">
                            function search() {

                                var value = document.getElementById('search').value;
                                var str1 = "{{asset('entity/search')}}";
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
                                    <th>类型</th>
                                    <th>密级状态</th>
                                    <th>创建时间</th>
                                    <th>创建人</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                </tr>
                                </thead>
                            <tbody>
                             <?php 
                            for($i = 0;$i<count($datasourceMsg);$i++){
                            ?>
                                <tr>
                                	<td>{{ $datasourceMsg[$i]->dataSource }}</td>
                                	<td>{{ $datasourceMsg[$i]->dbname }}</td>
                                	<td>{{ $datasourceMsg[$i]->type }}</td>
                                	<td>{{ $datasourceMsg[$i]->plevel }}</td>
                                	<td>{{ $datasourceMsg[$i]->created_at }}</td>
                                	<td>{{ $datasourceMsg[$i]->createdname }}</td>
                                	<td>{{ $datasourceMsg[$i]->updated_at }}</td>
                                	<td>{{ $datasourceMsg[$i]->updatename }}</td>
                                </tr>
                            <?php }?>   
                            </tbody>
                        </table>
                     </div>                                

        		{{-- 版权所有，有没有无所谓，另外，暂时去掉了分页，以后再加--}}

			</div>
		</div>
	</div>
</div>
@stop
