@extends('template') @section('content')

<style type="text/css"> 
.AutoNewline 
{ 
  Word-break: break-all;/*必须*/ 
} 
</style> 

<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="am-cf">
                    <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                    <small>数据源详情</small>
                </div>

                <hr/>
                
                <div class="am-form-group am-u-sm-12">
                	<input type="text" name= "searchText" id="searchText" value= "{{$dbname_real}}" hidden>
                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                        <thead>
                            <tr>
                                <th>数据项</th>
                                <th>数据权限</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dbsrc as $dbsrcs)
                            <tr>
    							    <th>{{ $dbsrcs["items_name"] }}</th>
    							    <th>
    							    @foreach($dbsrcs["name"] as $name)
    							    	<li>{{ $name }}</li>    							    
    							    @endforeach
    							    </th>
                                    <th><a href="{{ asset('/datasource/userlist')}}/{{$dbname_real[0]->dbname_real}}/{{$dbsrcs['items_name']}}">编辑</a> | <a href="{{ asset('#')}}">删除</a></th>                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
     			</div>
     			
     			
        		    <div class="am-u-lg-12 am-cf">                          
                        <div class="am-fr">
                        	 <link rel="stylesheet" href="{{asset('css/app.css')}}">
                    		{{ $dbsrc->links() }}
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>                
@stop