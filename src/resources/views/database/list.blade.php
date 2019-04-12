@extends('template') @section('content')

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
                              	<a   href="{{ asset('/database/new')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加数据库</a>
							  </div>
                          </div>
                          
                           <div  class="am-u-sm-12 am-u-md-3 am-u-end">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" id="search" class="am-form-field "  value="@if(isset($text)){{$text}}@endif">
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
                                var str1 = "{{asset('database/search')}}";
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
                                    <th>操作</th>
                                </tr>
                                </thead>
                            <tbody>
                              <?php 
                            for($i = 0;$i<count($databaseMsg);$i++){
                            ?>
                            <tr>
                                <td>{{ $databaseMsg[$i]->name }}</td>
                                <td>{{ $databaseMsg[$i]->type }}</td>
                                <td>{{ $databaseMsg[$i]->IP }}</td>
                                <td>{{ $databaseMsg[$i]->dbname }}</td>
                                <td>{{ $databaseMsg[$i]->created_at }}</td>
                                <td>{{ $databaseMsg[$i]->createdname }}</td>
                                <td>{{ $databaseMsg[$i]->updated_at }}</td>
                                <td>{{ $databaseMsg[$i]->updatename }}</td>
                                <td><a href="{{ asset('/DB_del/'.$databaseMsg[$i]->dbId)}}" >删除</a></td>
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