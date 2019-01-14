@extends('template') @section('content')
    <div>
        <div class="ant-modal-mask"></div>
        <div tabindex="-1" class="ant-modal-wrap " role="dialog" aria-labelledby="rcDialogTitle1">
            <div role="document" class="ant-modal addentity_modalrel___1sx3i" style="width: 520px; transform-origin: 8px 80px 0px;">
                <div class="ant-modal-content">
                    <button aria-label="Close" onclick="history.go(-1);" class="ant-modal-close"><span class="ant-modal-close-x"></span></button>
                    <div class="ant-modal-header">
                        <div class="ant-modal-title" id="rcDialogTitle1">
                            添加关系
                        </div>
                    </div>
                    <div class="ant-modal-body">

                        <form class="ant-form ant-form-horizontal" action="{{asset('relation/info')}}/{{$relation->rid}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="ant-row ant-form-item">
                                <div class="ant-form-item-label ant-col-xs-24 ant-col-sm-6">
                                    <label for="fromId" class="ant-form-item-required" title="起点对象">关系类型</label>
                                </div>

                                <div class="ant-form-item-control-wrapper ant-col-xs-24 ant-col-sm-12">
                                    <select class="fromId ant-select ant-select-enabled ant-select-selection ant-select-selection--single" name="relationType">
                                        <option value="{{ $relation->relationtype }}" selected="selected" >{{ $relation->typelabel }}</option>
                                        @if (isset($relationTypes))
                                            @foreach($relationTypes as $relationType)
                                                <option value="{{ $relationType->tid }}">{{ $relationType->relationlabel }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>

                            <div class="ant-row ant-form-item">
                                <div class="ant-form-item-label ant-col-xs-24 ant-col-sm-6">
                                    <label for="fromId" class="ant-form-item-required" title="起点对象">起点实体</label>
                                </div>

                                <div class="ant-form-item-control-wrapper ant-col-xs-24 ant-col-sm-12">
                                    <select class="fromId ant-select ant-select-enabled ant-select-selection ant-select-selection--single" name="startentity">
                                        <option value="{{ $relation->startentity }}" selected="selected" >{{ $relation->startlabel }}</option>
                                        @if (isset($entities))
                                            @foreach($entities as $entity)
                                                <option value="{{ $entity->eid }}">{{ $entity->entitylabel }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>

                            <div class="ant-row ant-form-item">
                                <div class="ant-form-item-label ant-col-xs-24 ant-col-sm-6">
                                    <label for="fromId" class="ant-form-item-required" title="起点对象">终点实体</label>
                                </div>

                                <div class="ant-form-item-control-wrapper ant-col-xs-24 ant-col-sm-12">
                                    <select class="fromId ant-select ant-select-enabled ant-select-selection ant-select-selection--single" name="endentity">
                                        <option value="{{ $relation->endentity }}" selected="selected" >{{ $relation->endlabel }}</option>
                                        @if (isset($entities))
                                            @foreach($entities as $entity)
                                                <option value="{{ $entity->eid }}">{{ $entity->entitylabel }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>



                            <div class="ant-modal-footer">
                                <button type="submit" class="ant-btn ant-btn-primary"><span>保 存</span></button>
                                <button type="button" class="ant-btn" onclick="history.go(-1);"><span>取 消</span></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop