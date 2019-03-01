@extends('template') @section('content')

 <script>
    function del(){
        if(confirm("确定要删除吗？")){
            return true;
        }else{
            return false;
        }
    }
</script> 



 <div class="row-content am-cf">
      <div class="row">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf" style = "height:600px">

				<iframe name="myframe" src="http://kg.itechs.ac.cn/#/loading-executor" style="width:100%; height:100%;"></iframe>

			</div>						        
		</div>
	</div>
</div>

@stop