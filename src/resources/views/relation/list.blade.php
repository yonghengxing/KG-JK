@extends('template') @section('content')
<style>
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* 定位 */
    position: absolute;
    z-index: 1;
	top: -5px;
    left: 105%;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>

  <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>关系维护</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                     	<div class="am-g">
                         <div class="am-u-sm-2 ">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              	<a   href="{{ asset('/relation/new')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>创建实体关系</a>
							  </div>
                          </div>

							<div class="am-u-sm-2 ">
								<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p tooltip" id="tooltip" data-am-modal="{target: '#my-modal-loading'}">
									<a   href="{{ asset('/relation/auto')}}" class="am-btn am-btn-default am-btn-success"></span>生成模型</a>
										@if($status==1)									 
									 	<span class="tooltiptext">有新信息，可生成模型</span>
									 	@else
									 	<span class="tooltiptext">没有新信息，不可生成模型</span>
									 	@endif
								</div>
							</div>

<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">正在载入...</div>
    <div class="am-modal-bd">
      <span class="am-icon-spinner am-icon-spin"></span>
    </div>
  </div>
</div>

							<div  class="am-u-sm-3 am-u-sm-push-5">
								<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
									<input type="text" name= "searchText" id="searchText" class="am-form-field "  value="@if(isset($text)){{$text}}@endif">
									<span class="am-input-group-btn">
                                    <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"  onclick="search()" type="button"></button>
                                  </span>
								</div>
							</div>
						</div>

						{{-- 条件搜索，目前只能点击搜索才进行搜索，以后可以加入Enter键快速搜索 --}}
						<script type="text/javascript">
							function search() {

                                var value = document.getElementById('searchText').value;
                                var str1 = "{{asset('relation/search')}}";
                                var url = str1 + '/' + value;
                                window.location.href= url;
                            }
						</script>
					</div>
					
			       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
									<th>关系类型</th>
									<th>起始实体</th>
									<th>终点实体</th>
									<th>创建时间</th>
									<th>创建人</th>
									<th>更新时间</th>
									<th>更新人</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
								@if (isset($relations))
									@foreach($relations as $relation)
									<tr class="gradeX">
										<td>
												{{ $relation->typelabel }}
											</td>
											<td>
												{{ $relation->startlabel }}
											</td>
											<td>
												{{ $relation->endlabel}}
											</td>
											<td>
												{{  date('Y-m-d',strtotime($relation->created_at)) }}

											</td>
											<td>
												{{ $relation->createname }}
											</td>
											<td>
												{{  date('Y-m-d',strtotime($relation->updated_at)) }}
											</td>
											<td>
												{{ $relation->updatename }}
											</td>
											<td>
												<div class="operation___3s32S">
													{{--<span><a href="{{asset('/relation/info')}}/{{$relation->rid}}">编辑</a></span>--}}
													<span><a href="{{asset('/relation/delete')}}/{{$relation->rid}}" onclick="return del()">删除</a></span>

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
                   <div class="am-u-lg-12 am-cf">                          
                        <div class="am-fr">
                        	 <link rel="stylesheet" href="{{asset('css/app.css')}}">
                    		{{ $relations->links() }}
                        </div>
                    </div>


				</div>
			</div>
		</div>
	</div>

@stop
