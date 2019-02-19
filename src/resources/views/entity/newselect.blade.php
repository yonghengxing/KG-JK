@extends('template') @section('content')

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script type="text/javascript">
        var compIndex = "{{ $num }}";
        function addArri()
        {
            compIndex++;

            var str = ' <div class="am-form-group" index="'+
                compIndex +'" id="Attr'+
                compIndex +'"> <label for="attribute-name'+
                compIndex +'" class="am-u-sm-2 am-form-label" >属性('+
                compIndex +')名称：</label> <div class="am-u-sm-4"> <input type="text" name="labels[]"  id="attribute-name'+
                compIndex +'" placeholder="请输入属性('+
                compIndex +')名称"> </div> <label for="attribute-value'+
                compIndex + '" class="am-u-sm-1 am-form-label" >属性值</label> <div class="am-u-sm-4 am-u-end"> <input type="text" name="properties[]" id="attribute-value'+
                compIndex + '" placeholder="请输入属性值"> </div> </div>';


            $("#showArri").append(str);

        }
    </script>

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
                        <small>实体类型</small>
                    </div>

                    <hr/>

                    <form class="am-form am-form-horizontal " action="{{ asset('/entity/new')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="am-form-group">
                            <label for="entityname" class="am-u-sm-3 am-form-label">实体名称：</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" name="entitylabel" placeholder="输入实体名称">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="schema-name" class="am-u-sm-3 am-form-label">本体类型 / Name</label>
                            <div class="am-u-sm-9 ">
                                <select data-am-selected="{searchBox: 1}"  id="stype" name="stype">
                                    @if(isset($schemaselected))
                                        <option value="{{ $schemaselected->sid }}">{{ $schemaselected->stype }}</option>
                                    @endif
                                    @if (isset($schemas))
                                        @foreach($schemas as $schema)
                                            <option value="{{ $schema->sid }}">{{ $schema->stype }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                $("#stype").change(function(){
                                    var value = $(this).val();
                                    var str1 = "{{asset('entity/new')}}";
                                    var url = str1 + '/' + value;
                                    window.location.href= url;
                                });
                            })
                        </script>



                        <div id="showArri">
                            @for ($i = 1; $i <= $num; $i++)
                            <div class="am-form-group" index="1" id="Attr1">

                                <label for="attribute-name2" class="am-u-sm-2 am-form-label" >属性(({{$i}})名称：</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="attribute-name2" name="labels[]" value="{{$properties[$i-1]}}">
                                </div>
                                <label for="attribute-value1" class="am-u-sm-1 am-form-label" >属性值</label>
                                <div class="am-u-sm-4 am-u-end">
                                    <input type="text" id="attribute-value1"  name="properties[]" placeholder="请输入属性值">
                                </div>

                            </div>
                            @endfor
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
