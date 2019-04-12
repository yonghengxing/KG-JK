@extends('template') @section('content')
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
                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                        <thead>
                            <tr>
                                <th>数据项</th>
                                <th>数据权限</th>
                            </tr>
                            <?php for ($i=0;$i<count($results2);$i++){  ?>
                            <tr>
                                <td>{{$results2[$i]["items_name"]}}</td>
                                <td><?php for ($j=0;$j<count($results2[$i]["name"]);$j++){ ?>
                                        {{$results2[$i]["name"][$j]}}<br>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </thead>
                    </table>
     			</div>
                
            </div>
        </div>
    </div>
</div>                
@stop