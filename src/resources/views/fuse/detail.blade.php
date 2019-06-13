@extends('template') @section('content')

 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
              			 <small>实体详情</small>
                     </div>
                     
                     <hr/>
                     
                                          
                       <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                            <tr>
                                <th>数据项</th>
                                <th>数据值</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @for($i=0; $i< count($dbout_table_columns); $i++)
                            <tr>
                                <td>{{ $dbout_table_columns[$i]["Field"]}}</td>
                                <td>{{ $dbout_table[0][$dbout_table_columns[$i]["Field"]] }}</td>
                            </tr> 
                            @endfor                        
                            </tbody>
                        </table>
                     </div> 
                     
              </div>
		</div>
	</div>
</div>
@stop
