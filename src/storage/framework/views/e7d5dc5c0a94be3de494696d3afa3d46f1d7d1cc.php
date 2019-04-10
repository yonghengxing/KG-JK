<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>科技领域基础数据管理与服务系统</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/amazeui.css')); ?>" />
  	<link rel="stylesheet" href="<?php echo e(asset('assets/css/other.min.css')); ?>" />
  	<style>
        .tpl-content-wrapper{min-height: inherit;margin-left: 0px;}
        .row-content{padding: 0px;}
        .theme-white .widget {height:100%;width:100%;border-radius: 0px;}
        .tpl-page-state-content{float: left;}
        .theme-white .tpl-error-btn{border-radius: 10px;}
        .am-btn-primary{background-color: #1678c2;font-weight: bold;}
        video#bgvid {position: fixed;right: 0;bottom: -50px;min-width: 100%;min-height: 100%;width: auto;height: auto;z-index: -100;background-size: cover;}
    </style>
</head>
<body class="login-container">
            <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
