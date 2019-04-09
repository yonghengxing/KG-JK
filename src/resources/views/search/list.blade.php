@extends('template') @section('content')


    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
                        <small>模糊搜索</small>
                    </div>


                    <form class="am-form tpl-form-border-form  tpl-form-border-br am-form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="am-form-group">
                            <label for="schema" class="am-u-sm-2 am-form-label">实体选择</label>
                            <div class="am-u-sm-10">
                                <select data-am-selected="{searchBox: 1}" style="display: none;" id="schema" name="schema">
                                    <option name="schema1" selected = "selected" value="0">请选择查找的实体</option>
                                    @if (isset($schemas))
                                        @foreach($schemas as $schema)
                                            <option value="{{ $schema->sid }}">{{ $schema->slabel }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-centered">
                                <label for="show">文本域</label>
                                <textarea style="" class=" " rows="10" id="show">选取实体，获取模糊搜索模板</textarea>
                            </div>

                            <div class="am-u-sm-6" style="display:none" >
                                <label for="picture">效果图</label>
                                {{--<img src="{{ asset('assets/img/ISCAS.png') }}" id="picture" alt=""/>--}}
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" style="display:none"
                                        class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
                                <button type="button"
                                        class="am-btn am-btn-default tpl-btn-bg-color-success" onclick="history.go(-1);">返回</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            //数据库选择改变
            $("#schema").change(function(){
                var value = $(this).val();
                var str1 = "{{asset('schema/getQueryText')}}";
                var str2 = "{{asset('relation/getRelationField')}}";
                var url1 = str1 + '/' + value;
                var objectModel = {};
                var csrf = "_token";
                var ctoken = "{{csrf_token()}}";
                objectModel[csrf] = ctoken;
                $.ajax({
                    url:url1,
                    type:"post",
                    dataType:"json",
                    data: objectModel,//{_token:"{{csrf_token()}}",_method:'PATCH',type:value},
                    success:function(data){

                        $("#show").empty();
                        $("#show").html(data[0]);
                    }
                })
            })
        })
    </script>
@stop