@extends('template') @section('content')

    <div class="row-content am-cf">
        <div class="row">
            <d  iv class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                        <small>关系维护</small>
                    </div>

                    <hr/>

                    <form class="ant-form ant-form-horizontal tpl-form-border-form  tpl-form-border-br" action="{{asset('relation/info')}}/{{$relation->rid}}" method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                <tr>
                                    <th>起点实体</th>
                                    <th>终点实体</th>
                                    <th>关系类型</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="fromvertex">
                                            <option value="{{ $relation->fromvertex }}" selected="selected" >{{ $relation->startlabel }}</option>
                                            @if (isset($schemas))
                                                @foreach($schemas as $schema)
                                                    <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                    </td>
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="tovertex">
                                            <option value="{{ $relation->tovertex }}" selected="selected" >{{ $relation->endlabel }}</option>
                                            @if (isset($schemas))
                                                @foreach($schemas as $schema)
                                                    <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"  name="relationType">
                                            <option value="{{ $relation->relationtype }}" selected="selected" >{{ $relation->typelabel }}</option>
                                            @if (isset($relationTypes))
                                                @foreach($relationTypes as $relationType)
                                                    <option value="{{ $relationType->tid }}">{{ $relationType->rlabel }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-8 am-u-sm-push-4">
                                <button type="submit"
                                        class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
                                <button type="button"
                                        class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>

@stop