@extends('template') @section('content')

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script type="text/javascript">
        var compIndex = 1;
        function addArri()
        {
            compIndex++;

            var str1 = ['<div class="am-form-group" index="1" id="Attr1">',
                '<label for="attribute-name2" class="am-u-sm-3 am-form-label" >属性标识：</label>',
                '<div class="am-u-sm-3">',
                '<input type="text" id="attribute-name2" name="labels[]" placeholder="请输入属性标识">',
                '</div>',
                '<label for="attribute-value1" class="am-u-sm-3 am-form-label" >是否主键</label>',
                '<div class="am-u-sm-3 ">',
                '<select data-am-selected="{searchBox: 1}"  id="iskey" name="iskey[]">',
                '<option value="0">否</option>',
                '<option value="1">是</option>',
                '</select>',
                '</div>',
                '</div>'].join("");
            $("#showArri").append(str1);

        }
    </script>

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
                        <small>关系类型</small>
                    </div>

                    <hr/>

                    <form class="am-form am-form-horizontal " action="{{asset('relationType/new')}}" method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="am-form-group">
                            <label for="schema-name" class="am-u-sm-3 am-form-label">关系类型</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="schema-name" name="rname" placeholder="输入关系类型名称">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="schema-name" class="am-u-sm-3 am-form-label">关系标识</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="schema-name" name="rlabel" placeholder="输入关系标识，仅限英文">
                            </div>
                        </div>


                        <div id="showArri" class="am-g">
                            <div class="am-form-group" index="1" id="Attr1">
                                {{--<label for="attribute-name2" class="am-u-sm-2 am-form-label" >属性名称：</label>--}}
                                {{--<div class="am-u-sm-2">--}}
                                {{--<input type="text" id="attribute-name2" name="names[]" placeholder="请输入属性名称">--}}
                                {{--</div>--}}
                                <label for="attribute-name2" class="am-u-sm-3 am-form-label" >属性标识：</label>
                                <div class="am-u-sm-3">
                                    <input type="text" id="attribute-name2" name="labels[]" placeholder="请输入属性标识">
                                </div>
                                <label for="attribute-value1" class="am-u-sm-3 am-form-label" >是否主键</label>
                                <div class="am-u-sm-3 am-u-end ">
                                    <select data-am-selected="{searchBox: 1}"  id="iskey" name="iskey[]">
                                        <option value="0">否</option>
                                        <option value="1">是</option>
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" onclick="addArri();" class="am-btn am-btn-default am-btn-secondary">添加属性</button>
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