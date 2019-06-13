@extends('template') @section('content')

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>实体列表</small>
                     </div>
                     
                     <hr/>
                     
                       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                            <tr>
                                @for($i=0; $i < count($columns); $i++)
                                <th>{{ $columns[$i]["Field"] }}</th>
                                @endfor
				@if(count($columns)>1)
                                <th>操作</th>
				@endif
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($tablePaginator as $table)
                            <tr>
                            	@for($i=0; $i < count($columns); $i++)
                                <td> {{ $table[$columns[$i]["Field"]] }}</td>
                                @endfor
				@if(count($columns)>1)
                                <td><a href=" {{asset('/fuse/detail/')}}/{{ $tablename}}/{{ $table[$columns[0]["Field"]] }} ">详情</a></td>
                                @endif
			    </tr>
                            @endforeach                            
                            </tbody>
                        </table>
                     </div> 
                     
                   <div class="am-u-lg-12 am-cf">                          
                        <div class="am-fr">
                        	 <link rel="stylesheet" href="{{asset('css/app.css')}}">
                    		{{ $tablePaginator->links() }}
                        </div>
                    </div>
                     
              </div>
		</div>
	</div>
</div>
@stop
