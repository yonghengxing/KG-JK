@extends('template')

@section('content')
<div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                     <div class="am-cf">
                         <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
              			 <small>首页</small>
                     </div>
  
				<hr/>
		
                 <div class="widget-body  am-fr">
                 	<h2>
						<span>●</span>动态知识图谱构建世界观、接入数据、建立数据世界
					</h2>
					<img class="am-u-sm-12" src="{{ asset('assets/img/diyi.jpg') }}" alt="">
					<h2>
						<span>●</span>实体配置构建世界观、数据配置构建数据世界
					</h2> 
					<img class="am-u-sm-12" src="{{ asset('assets/img/dier.png') }}" alt="">
					<h2>
						<span>●</span>动态知识图谱构建知识，支撑搜索、分析、战法等上层应用
					</h2>
					<img class="am-u-sm-12" src="{{ asset('assets/img/disan.png') }}" alt="">
                 
                 </div>
		
			</div>
		</div>
	</div>
</div>
@endsection
