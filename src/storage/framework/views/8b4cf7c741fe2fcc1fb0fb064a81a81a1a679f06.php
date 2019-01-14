<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>科技领域基础数据管理与服务系统</title>
<meta name="description" content="##">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-title" content="科技领域基础数据管理与服务系统" />

<link rel="icon" type="image/png"
	href="<?php echo e(asset('assets/i/favicon.png')); ?>">
<link rel="apple-touch-icon-precomposed"
	href="<?php echo e(asset('assets/i/app-icon72x72@2x.png')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/amazeui.min.css')); ?>" />
<link rel="stylesheet"
	href="<?php echo e(asset('assets/css/amazeui.datatables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/echarts.min.js')); ?>"></script>

<body data-type="widgets">
	<script src="<?php echo e(asset('assets/js/theme.js')); ?>"></script>

	<div class="am-g tpl-g">
		<!-- 头部 -->
		<header >
			<!-- logo -->
			<div class="am-topbar-brand">
				<strong>科技领域基础数据管理与服务系统 </strong>	
			</div>
			
			<!-- 右侧内容 -->
			<div class="tpl-header-fluid">			
				<!-- 其它功能-->
				<div class="am-fr tpl-header-navbar">
					<ul>
						<!-- 欢迎语 -->
						<li class="am-text-sm tpl-header-navbar-welcome"><a
							href="javascript:;">欢迎你<span></span>
						</a></li>

						<!-- 退出 -->
						<li class="am-text-sm"><a href="<?php echo e(asset('/bxLogout')); ?>"> <span
								class="am-icon-sign-out"></span> 退出
						</a></li>
					</ul>
				</div>
			</div>

		</header>
        <!-- 风格切换 -->
		<div class="tpl-skiner">
			<div class="tpl-skiner-toggle am-icon-cog"></div>
			<div class="tpl-skiner-content">
				<div class="tpl-skiner-content-title">选择主题</div>
				<div class="tpl-skiner-content-bar">
					<span class="skiner-color skiner-white" data-color="theme-white"></span>
					<span class="skiner-color skiner-black" data-color="theme-black"></span>
				</div>
			</div>
		</div>
		
		<!-- 侧边导航栏 -->
		<div class="left-sidebar">
			<!-- 用户信息 -->

			<!-- 菜单 -->
			<ul class="sidebar-nav">

				<li class="sidebar-nav-link"><a href="<?php echo e(asset('/index')); ?>"> 
					<i class="am-icon-home sidebar-nav-link-logo"></i> 首页</a></li>
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-users sidebar-nav-link-logo"></i> 本体配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/schema/list')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 本体类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/entity/list')); ?>"> <span
								class="am-icon-plus sidebar-nav-link-logo"></span> 实体类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/relationType/list')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 关系类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/relation/list')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 关系维护
						</a></li>
					</ul></li>
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-users sidebar-nav-link-logo"></i> 数据配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/database')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 数据库
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('datasource')); ?>"> <span
								class="am-icon-plus sidebar-nav-link-logo"></span> 数据源
						</a></li>
					</ul></li>
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-users sidebar-nav-link-logo"></i> 融合配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/database')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 本体映射
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('datasource')); ?>"> <span
								class="am-icon-plus sidebar-nav-link-logo"></span> 关系映射
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('')); ?>"> <span
								class="am-icon-plus sidebar-nav-link-logo"></span> 本体融合
						</a></li>
					</ul></li>	
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-users sidebar-nav-link-logo"></i> 数据注入<span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('taskallocation')); ?>"> <span
								class="am-icon-list sidebar-nav-link-logo"></span> 任务配置
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('taskhis')); ?>"> <span
								class="am-icon-plus sidebar-nav-link-logo"></span> 任务历史
						</a></li>
					</ul></li>

				<li class="sidebar-nav-link"><a href="<?php echo e(asset('safemanage')); ?>"> 
					<i class="am-icon-home sidebar-nav-link-logo"></i>安全管理</a></li>					
			</ul>
		</div>
		

		<!-- 内容区域 -->
		<div class="admin-content">
	<div class="admin-content-body">
    	<div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
              <strong class="am-text-primary am-text-lg">动态知识图谱 </strong> /
              <small>首页</small>
            </div>
         </div>
  
		<hr/>
  
		<div class="am-u-sm-12">
			
			<h2 class="am-text-center am-text-xxxl am-margin-top-lg">基础知识</h2>
			
			<div class="ant-row" style="margin-left: -8px; margin-right: -8px;">
				<div class="ant-col-24" style="padding-left: 8px; padding-right: 8px;">
					<h2>
						<span>●</span>动态知识图谱构建世界观、接入数据、建立数据世界
					</h2>
					<img src="<?php echo e(asset('assets/img/WechatIMG88.9a4c13aa.png')); ?>" alt="">
					<h2 class="dv2___3UUW1">
						<span>●</span>本体配置构建世界观、数据配置构建数据世界
					</h2> 
					<img src="<?php echo e(asset('assets/img/WechatIMG87.4f2d7c6d.png')); ?>" alt="">
					<h2 class="dv2___3UUW1">
						<span>●</span>本体映射、融合配置搭建本体和数据的桥梁
					</h2>
					<img src="<?php echo e(asset('assets/img/WechatIMG89.49078d01.png')); ?>" alt="">
					<h2 class="dv2___3UUW1">
						<span>●</span>动态知识图谱构建知识，支撑搜索、分析、战法等上层应用
					</h2>
					<img src="<?php echo e(asset('assets/img/WechatIMG90.f7acc1b0.png')); ?>" alt="">
				</div>
				<div class="ant-col-24" style="padding-left: 8px; padding-right: 8px;">
				</div>
			</div>
		</div>
	</div>
	<div class="globalFooter___1cM92">
		<div class="copyright___1ZP5c">
			<div>
				Copyright <i class="anticon anticon-copyright"></i>2018 Corporation All Rights Reserved.
			</div>
		</div>
	</div>
</div>
	</div>
	<script src="<?php echo e(asset('assets/js/amazeui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/amazeui.datatables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/dataTables.responsive.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>
</html>