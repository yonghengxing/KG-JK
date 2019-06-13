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
              			 <small>实体融合</small>
                     </div>
                     
                     <hr/>
                     
                     <div class="widget-body  am-fr">
                      <div class="am-g">
                          <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                              <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p tooltip" id="tooltip"data-am-modal="{target: '#my-modal-loading'}">
                              	<a   href="{{asset('entity/add')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>自动映射</a>
                      			@if($status==1)									 
							 	<span class="tooltiptext">有新模型及数据，可自动映射</span>
							 	@else
							 	<span class="tooltiptext">没有新信息，不可自动映射</span>
							 	@endif
							  </div>

                          </div>
                          
							<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
                              <div class="am-modal-dialog" tabindex="5">
                                <div class="am-modal-hd">正在载入...</div>
                                <div class="am-modal-bd">
                                  <span class="am-icon-spinner am-icon-spin"></span>
                                </div>
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
                                    <th>实体</th>
                                    <th>数据源</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                            <tbody>
                                @if (isset($data))
									@foreach($data as $key => $value)
									<tr class="gradeX">
										<td>{{ $key }}</td>
										<td>{{ $value }}</td>
										<td><a href="{{ asset('/fuse/show/'.$key)}}" >详情</a></td>
									</tr>
									@endforeach
								@endif
                            </tbody>
                        </table>
                     </div>                                

        		{{-- 版权所有，有没有无所谓，另外，暂时去掉了分页，以后再加--}}

			</div>
		</div>
	</div>
</div>
@stop
