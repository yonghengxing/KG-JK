@extends('layouts.app') @section('content')


<div  class="am-g tpl-g">
	<div class="tpl-content-wrapper" style ="font-weight:bold;">
        <video autoplay loop muted id="bgvid">
        	<source src="{{ asset('assets/img/bg_video.mp4') }}" type="video/mp4">
        </video>
        
        <div class="bg_mark"> </div>
        
        <div class="tpl-page-state-title am-text-center tpl-error-title" style="color: #ffffff;font-size: 6.6rem;font-weight: normal;">JKJ军事科学信息中心
			</div>
		<div class="tpl-error-title-info am-text-center"  style="color: #ffffff;font-size: 30px;">科技领域基础数据管理与服务系统
			</div>

        <div class="login-box">
            <form  method="POST" action="{{ route('login') }}" class="am-form" data-am-validator>
              <div class="am-form-group">
                <label for="name"><i class="am-icon-user"></i></label>
                <input type="text" id="name" minlength="1" placeholder="输入用户名" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('email') }}" required autofocus/>
              </div>
            
              <div class="am-form-group">
                <label for="password"><i class="am-icon-key"></i></label>
                <input type="password" id="password" placeholder="输入密码" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required/>
                @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
              <button class="am-btn am-btn-secondary"  type="submit">登录</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
