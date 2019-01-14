@extends('template') @section('content')
    <div class="ant-layout-content" style="margin: 10px 24px 0px; height: 100%;">
        <div style="min-height: calc(100vh - 260px);">
            <div class="bfd_entity_obj___11PwV">
                <div class="content_topp___3UCcv">
                    <i class="anticon anticon-home"></i>动态知识图谱 /
                    <i class="anticon anticon-folder-open"></i>本体配置 /
                    <i class="anticon anticon-file-text"></i>本体类型
                </div>

                <div class="con___2YtAo">


                    <div class="content_model___3iLuA">
                        <form class="ant-form ant-form-horizontal" action="{{asset('relationType/info')}}/{{$relationType->tid}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="ant-row ant-form-item">
                            </div>

                            <div class="ant-row ant-form-item">
                                <div class="ant-form-item-label ant-col-xs-24 ant-col-sm-2">
                                    <label for="ontoDisplayName" class="ant-form-item-required" title="显示名称">
                                        类型名称
                                    </label>
                                </div>
                                <div class="ant-form-item-control-wrapper ant-col-xs-24 ant-col-sm-22">
                                    <div class="ant-form-item-control">
                                        <span class="ant-form-item-children">
                                            <input placeholder="请输入关系类型名称" maxlength="50" type="text" id="ontoDisplayName"
                                                   name="relationType" class="ant-input"
                                                   value="{{ $relationType->relationlabel }}">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-row ant-form-item">
                                <div class="ant-form-item-label ant-col-xs-24 ant-col-sm-2">
                                    <label for="icon" class="" title="图标">
                                        图标
                                    </label>
                                </div>
                                <div class="ant-form-item-control-wrapper ant-col-xs-24 ant-col-sm-22">
                                    <div class="ant-form-item-control">
                                        <span class="ant-form-item-children">
                                            <input placeholder="请选择图标" maxlength="50" type="text" id="ontoDisplayName"
                                                   name="icon" class="ant-input"
                                                   value="{{ $relationType->icon }}">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="ant-row ant-form-item">
                                <div class="ant-col-22 ant-col-offset-2 ant-form-item-control-wrapper">
                                    <div class="ant-form-item-control">
                                            <span class="ant-form-item-children">
                                                <button type="submit" class="ant-btn ant-btn-primary" style="margin-right: 4px;">保 存</button>
                                                <button type="button"  onclick="history.go(-1);" class="ant-btn">取 消</button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="globalFooter___1cM92">
            <div class="copyright___1ZP5c">
                <div>
                    Copyright
                    <i class="anticon anticon-copyright">
                    </i>
                    2018 Corporation All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
    </div>
@stop