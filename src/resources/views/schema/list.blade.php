@extends('template') @section('content')
  <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱 /实体配置</strong> /
              			 <small>实体类型</small>
                     </div>
                     
                      <hr/>  
                   
                     
                     <div class="widget-body  am-fr">
                         <div class="am-g">
                             <div class="am-u-sm-2 ">
								 <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
									 <a   href="{{ asset('/schema/new')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加实体类型</a>
								 </div>
							 </div>

							 <div class="am-u-sm-2 ">
								 <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
									 <a   href="{{ asset('/schema/auto')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 自动生成实体</a>
								 </div>
							 </div>

                          	<div  class="am-u-sm-4 " hidden>
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                    <input type="text" name= "searchText" id="searchText" class="am-form-field "  value="@if(isset($text)){{$text}}@endif">
                                      <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="submit"></button>
                                      </span>
                                </div>
                            </div>
                        </div>

						{{-- 条件搜索，目前只能点击搜索才进行搜索，以后可以加入Enter键快速搜索 --}}
						<script type="text/javascript">
							function search() {

                                var value = document.getElementById('searchText').value;
                                var str1 = "{{asset('schema/search')}}";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }

						</script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
									<th>实体类型</th>
									<th>实体标识</th>
									<th>创建时间</th>
									<th>创建人</th>
									<th>更新时间</th>
									<th>更新人</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
								@if (isset($schemas))
									@foreach($schemas as $schema)
									<tr class="gradeX">
										<td>{{ $schema->sname }}</td>
										<td>{{ $schema->slabel }}</td>
										<td>{{ $schema->created_at }}</td>
										<td>{{ $schema->createname }}</td>
										<td>{{ $schema->updated_at }}</td>
										<td>{{ $schema->updatename }}</td>
										<td>
											<div class="operation___3s32S">
												<span><a href="{{asset('../../../kg/schema/info')}}/{{$schema->sid}}">详情</a></span>
												<span><a href="{{asset('../../../kg/schema/delete')}}/{{$schema->sid}}" onclick="return del()">删除</a></span>
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
									@endforeach
								@endif
                            </tbody>
                        </table>
                     </div>                                

			</div>
		</div>
	</div>
</div>
@stop