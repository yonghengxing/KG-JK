<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ISCAS-工作平台</title>
<meta name="description" content="##">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-title" content="波形管理" />


<link rel="icon" type="image/png"
	href="<?php echo e(asset('assets/i/favicon.png')); ?>">
<link rel="apple-touch-icon-precomposed"
	href="<?php echo e(asset('assets/i/app-icon72x72@2x.png')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/amazeui.min.css')); ?>" />
<link rel="stylesheet"
	href="<?php echo e(asset('assets/css/amazeui.datatables.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/jquery.fonticonpicker.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/fontello.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/themes/bootstrap-theme/jquery.fonticonpicker.bootstrap.min.css')); ?>"/>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.fonticonpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/echarts.min.js')); ?>"></script>

</head>

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
						class="am-icon-tags sidebar-nav-link-logo"></i> 本体配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/schema/list')); ?>"> <span
								class="am-icon-align-left sidebar-nav-link-logo"></span> 本体类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/entity/list')); ?>"> <span
								class="am-icon-align-right sidebar-nav-link-logo"></span> 实体类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/relationType/list')); ?>"> <span
								class="am-icon-align-center sidebar-nav-link-logo"></span> 关系类型
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/relation/list')); ?>"> <span
								class="am-icon-cogs sidebar-nav-link-logo"></span> 关系维护
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/schemagraph')); ?>"> <span
                              class="am-icon-picture-o sidebar-nav-link-logo"></span>查看图谱
                        </a></li>						
					</ul></li>
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-database sidebar-nav-link-logo"></i> 数据配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/database')); ?>"> <span
								class="am-icon-table sidebar-nav-link-logo"></span> 数据库
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('datasource')); ?>"> <span
								class="am-icon-file-text sidebar-nav-link-logo"></span> 数据源
						</a></li>
						
					</ul></li>
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-folder-open sidebar-nav-link-logo"></i> 融合配置 <span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/fuse/ontologymap')); ?>"> <span
								class="am-icon-arrows-h sidebar-nav-link-logo"></span> 本体映射
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/datagraph')); ?>"> <span
								class="am-icon-dot-circle-o sidebar-nav-link-logo"></span> 图谱融合
						</a></li>
					</ul></li>	
					
				<li class="sidebar-nav-link"><a href="javascript:;"
					class="sidebar-nav-sub-title"> <i
						class="am-icon-circle-o-notch sidebar-nav-link-logo"></i> 数据注入<span
						class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
				</a>
					<ul class="sidebar-nav sidebar-nav-sub">
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('taskallocation')); ?>"> <span
								class="am-icon-tasks sidebar-nav-link-logo"></span> 任务配置
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('taskhis')); ?>"> <span
								class="am-icon-file sidebar-nav-link-logo"></span> 任务历史
						</a></li>
						<li class="sidebar-nav-link"><a href="<?php echo e(asset('/taskgraph')); ?>"> <span
                               class="am-icon-picture-o sidebar-nav-link-logo"></span>查看图谱
                        </a></li>
					</ul></li>
					
					 <li class="sidebar-nav-link"><a href="javascript:;"
                            class="sidebar-nav-sub-title"> <i
                                    class="am-icon-eye sidebar-nav-link-logo"></i>图谱展示<span
                                    class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                        <ul class="sidebar-nav sidebar-nav-sub">
                                <li class="sidebar-nav-link"><a href="<?php echo e(asset('/checkgraph')); ?>"> <span
                                                class="am-icon-binoculars sidebar-nav-link-logo"></span>图谱查看
                                </a></li>
                                <li class="sidebar-nav-link"><a href="<?php echo e(asset('/searchgraph')); ?>"> <span
                                                class="am-icon-search sidebar-nav-link-logo"></span>图谱查询
                                </a></li>
                                <li class="sidebar-nav-link"><a href="<?php echo e(asset('/export')); ?>"> <span
                                      class="am-icon-search sidebar-nav-link-logo"></span>导入导出
                                </a></li>
                        </ul></li>
		

				<li class="sidebar-nav-link"><a href="<?php echo e(asset('safemanage')); ?>"> 
					<i class="am-icon-warning sidebar-nav-link-logo"></i>安全管理</a></li>					
			</ul>
		</div>
		

		<!-- 内容区域 -->
		<div class="tpl-content-wrapper"><?php echo $__env->yieldContent('content'); ?></div>
	</div>
	<script src="<?php echo e(asset('assets/js/amazeui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/amazeui.datatables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/dataTables.responsive.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>
</html>