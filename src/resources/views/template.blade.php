<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>首页 - 动态知识图谱</title>

<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
<link rel="stylesheet"
	href="{{ asset('assets/css/amazeui.datatables.min.css') }}" />

</head>
<body>
<div id="root">
	<div class="screen-xl">
		<div class="ant-layout ant-layout-has-sider">
			<div class="sider___2u3fw ant-layout-sider ant-layout-sider-dark" style="flex: 0 0 218px; max-width: 218px; min-width: 218px; width: 218px;">
				<div class="ant-layout-sider-children">
					<div class="logo___2uo7K">
					</div>
					<ul class="ant-menu ant-menu-dark ant-menu-root ant-menu-inline" role="menu" style="margin: 16px 0px; width: 100%;">
						<li class="ant-menu-item ant-menu-item-selected" role="menuitem" style="padding-left: 24px;"><a href="./home.html"><i class="anticon anticon-book"></i><span>首页</span></a></li>
						<li class="ant-menu-submenu ant-menu-submenu-inline ant-menu-submenu-open" role="menuitem">
						<div class="ant-menu-submenu-title" aria-expanded="true" aria-haspopup="true" style="padding-left: 24px;" aria-owns="ontology-conf$Menu">
							<span><i class="anticon anticon-dashboard"></i><span>本体配置</span></span><i class="ant-menu-submenu-arrow"></i>
						</div>
						<ul id="ontology-conf$Menu" class="ant-menu ant-menu-sub ant-menu-inline" role="menu" style="">
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;"><a href="{{ asset('/otype')}}"><span>对象类型</span></a></li>
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;"><a href="{{ asset('/rtype')}}"><span>关系类型</span></a></li>
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;"><a href="http://kg.itechs.ac.cn/ontology-conf/graph"><span>查看图谱</span></a></li>
						</ul>
						</li>
						<li class="ant-menu-submenu ant-menu-submenu-inline ant-menu-submenu-open ant-menu-submenu-selected"
								role="menuitem">
									<div class="ant-menu-submenu-title" aria-expanded="true" aria-haspopup="true"
									style="padding-left: 24px;" aria-owns="datasource-conf$Menu">
										<span>
											<i class="anticon anticon-form">
											</i>
											<span>
												数据配置
											</span>
										</span>
										<i class="ant-menu-submenu-arrow">
										</i>
									</div>
									<ul id="datasource-conf$Menu" class="ant-menu ant-menu-sub ant-menu-inline"
									role="menu" style="">
										<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;">
											<a href="{{ asset('/database')}}">
												<span>
													数据库
												</span>
											</a>
										</li>
										<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;">
											<a href="{{ asset('datasource')}}">
												<span>
													数据源
												</span>
											</a>
										</li>
									</ul>
								</li>
						<li class="ant-menu-submenu ant-menu-submenu-inline" role="menuitem">
						<div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true" style="padding-left: 24px;">
							<span><i class="anticon anticon-table"></i><span>融合配置</span></span><i class="ant-menu-submenu-arrow"></i>
						</div>
						<ul id="fusion-conf$Menu" class="ant-menu ant-menu-sub ant-menu-inline"
									role="menu" style="">
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;">
								<a href="{{ asset('ontologymap')}}">
									<span>
										本体映射
									</span>
								</a>
							</li>
							<li class="ant-menu-item hide___1W3Vp" role="menuitem" style="padding-left: 48px;">
								<a href="http://kg.itechs.ac.cn/fusion-conf/release-map">
									<span>
										关系映射
									</span>
								</a>
							</li>
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;">
								<a href="{{ asset('ontologyfus')}}">
									<span>
										本体融合
									</span>
								</a>
							</li>
						</ul>
						</li>
						<li class="ant-menu-submenu ant-menu-submenu-inline" role="menuitem">
						<div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true" style="padding-left: 24px;">
							<span><i class="anticon anticon-check-circle"></i><span>数据注入</span></span><i class="ant-menu-submenu-arrow"></i>
						</div>
						<ul id="task-inject$Menu" class="ant-menu ant-menu-sub ant-menu-inline"
									role="menu" style="">
							<li class="ant-menu-item" role="menuitem" style="padding-left: 48px;">
								<a href="{{ asset('taskallocation')}}">
									<span>
										任务配置
									</span>
								</a>
							</li>
							<li class="ant-menu-item"
									role="menuitem" style="padding-left: 48px;">
								<a href="{{ asset('taskhis')}}">
									<span>
										任务历史
									</span>
								</a>
							</li>
						</ul>
						</li>
						<li class="ant-menu-item" role="menuitem" style="padding-left: 24px;"><a href="{{ asset('safemanage')}}"><i class="anticon anticon-warning"></i><span>安全管理</span></a></li>
						<li class="ant-menu-submenu ant-menu-submenu-inline hide___1W3Vp" role="menuitem">
						<div class="ant-menu-submenu-title" aria-expanded="false" aria-haspopup="true" style="padding-left: 24px;">
							<span><i class="anticon anticon-user"></i><span>登陆</span></span><i class="ant-menu-submenu-arrow"></i>
						</div>
						<div>
						</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="ant-layout">
				<div class="header___1gJeH ant-layout-header">
					<div class="right___2E7tm">
						<span class="action___1xWRQ account___1ksDw ant-dropdown-trigger" style="color: rgb(255, 255, 255);"><i class="fa fa-user user fa-1g" style="margin-right: 5px;"></i>admin</span>
					</div>
				</div>
        		<!-- 内容区域 -->
        		
        		<div class="tpl-content-wrapper">@yield('content')</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>