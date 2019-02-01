@extends('template') @section('content')

<div class="row-content am-cf">
  <div class="row">
       <d  iv class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
            
                <div class="am-cf">
                     <strong class="am-text-primary am-text-lg">动态知识图谱 /本体配置</strong> /
          			 <small>关系维护</small>
                </div>
                 
                <hr/>
                
				<form class="ant-form ant-form-horizontal" action="{{asset('relation/new')}}" method="post">
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
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="startentity" name="startentity">
                                                @if (isset($entities))
                                                    @foreach($entities as $entity)
                                                        <option value="{{ $entity->eid }}">{{ $entity->entitylabel }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="endentity" name="endentity">
                                                @if (isset($entities))
                                                    @foreach($entities as $entity)
                                                        <option value="{{ $entity->eid }}">{{ $entity->entitylabel }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" id="relationType" name="relationType">
                                                @if (isset($relationTypes))
                                                    @foreach($relationTypes as $relationType)
                                                         <option value="{{ $relationType->tid }}">{{ $relationType->relationlabel }}</option>
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
						<button type="submit"
							class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
						</div>
					</div>                  
            	</form>
            </div>
		</div>
	</div>
</div>

@stop