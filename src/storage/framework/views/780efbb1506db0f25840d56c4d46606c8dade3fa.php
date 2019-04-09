 <?php $__env->startSection('content'); ?>

<script type="text/javascript">
window.onload = function() {
    var radios = document.getElementsByName('tablesource');
    for (var i = 0; i < radios.length; i++) {
          radios[i].indexs = i + 1;
        radios[i].onchange = function () {
            if (this.checked) {
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id" + this.indexs).style.display="block";

            } 
        }
    }
}
</script>

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="am-cf">
                        <strong class="am-text-primary am-text-lg">动态知识图谱</strong> /
                        <small>添加数据源</small>
                    </div>

                    <hr/>

                    <form horizontal="true" class="am-form am-form-horizontal tpl-form-border-form  tpl-form-border-br"action="<?php echo e(asset('/addDBSrc_do')); ?>" method="post" onsubmit="return checkForm()">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <div class="am-form-group">
                            <label for="DSname" class="am-u-sm-3 am-form-label">数据源名称</label>
                            <div class="am-u-sm-6 am-u-end">
                                <input type="text" id="DSname" name="DSname" placeholder="请输入数据源名称" required>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="database" class="am-u-sm-3 am-form-label">数据库</label>
                            <div class="am-u-sm-9 ">
                                <select data-am-selected="{searchBox: 1}" style="display: none;" id="database" name="database">
                                    <option name="database1" selected = "selected" value="0">请选择数据库</option>
                                    <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($name->name); ?>" name="<?php echo e($name->name); ?>"><?php echo e($name->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="table" class="am-u-sm-3 am-form-label">数据表</label>
                            <div class="am-u-sm-9 ">
                                <select data-am-selected="{searchBox: 1}" style="display: none;" id="DBtable" name="DBtable">
                                    <option value="table1" selected = "selected">请选择数据表</option>
                                </select>
                            </div>
                        </div>
                        <script>

                            $(function(){
                                //数据库选择改变
                                $("#database").change(function(){
                                    var value = $(this).val();

                    var type = $(this).attr('id');
					var str1 = "<?php echo e(asset('database/getDB')); ?>";
					var url1 = str1 + '/' + value;
					console.log(url1);
					var objectModel = {};
					var csrf = "_token";
          			var ctoken = "<?php echo e(csrf_token()); ?>";
          			objectModel[type] =value;
          			objectModel[csrf] = ctoken;
          			$.ajax({
              			url:url1,
              			type:"post",
              			dataType:"json",
          				data: objectModel,//{_token:"<?php echo e(csrf_token()); ?>",_method:'PATCH',type:value},
          				success:function(data){
          					$("#DBtable").empty();
              				var str = new Array;
              				var strAll = " ";
              				for(var i = 0;i < data.length;i++){
                  				var table_name = data[i].table_name;
                  				str[i] = "<option value = '"+table_name+"' name='"+table_name+"'>"+ table_name +"</option> ";
                  				strAll = strAll.concat(str[i]);
                  				}
              				$("#DBtable").html(strAll);
              				}
              			})
                     })


                                //数据表改变
                                $("#DBtable").change(function(){
                                    var value = $(this).val();
                                    var database = $("#database").val();
                                    var database_public = 'database_public';

                                    var type = $(this).attr('id');
                                    var str1 = "<?php echo e(asset('database/getDBtableMsg')); ?>";
                                    var url1 = str1 + '/' + value;
                                    var objectModel = {};
                                    var csrf = "_token";
                                    var ctoken = "<?php echo e(csrf_token()); ?>";
                                    objectModel[type] =value;
                                    objectModel[database_public] =database;
                                    objectModel[csrf] = ctoken;
                                    $.ajax({
                                        url:url1,
                                        type:"post",
                                        dataType:"json",
                                        data:objectModel,
                                        success:function(data){
                                            if(data[0].column_name){//数据库类型
                                                //debugger;
                                                $("#choose_item").empty();
                                                var str = new Array;
                                                var strAll = " ";
                                                for(var i = 0;i < data.length;i++){
                                                    //var column_name = data[i].column_name;
                                                    var items = new Array;
                                                    str[i] = "<label class='am-checkbox-inline'><input type='checkbox' name='items["+i+"]' value='"+data[i].column_name+"'> "
                                                        + data[i].column_name + "("+ data[i].column_comment +")"+"</label>";
                                                    strAll = strAll.concat(str[i]);
                                                }
                                                $("#tbody").html(strAll);
                                            }else{//excel类型
                                                $("#choose_item").empty();
                                                var str = new Array;
                                                var strAll = " ";
						                        datalength = data.length;
                                                for(var i = 0;i < data.length;i++){

                                                    var items = new Array;
                                                    str[i] = "<tr><td> <label class='am-checkbox-inline'><input type='checkbox' name='items["+i+"]' value='"+data[i]+"'> "
                                                        + data[i] + "("+ data[i] +")"+"</label> </td>"
                                                        + "<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' name='onlyradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' name='onlyradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td>"
                                                        +"<td> <label class='am-checkbox-inline' id='plevel"+i+"' name=='plevel"+i+"'></lable> </td>"
                                                        +"<td> <div class='am-u-sm-3'> <label class='am-radio'> <input type='radio' name='cutradio["+i+"]"
                                                        +"'value='1' >是	 </label> <label class='am-radio'> <input type='radio' name='cutradio["+i+"]"
                                                        +"'value='0' >否</label> </div> </td> </tr>";

                                                    strAll = strAll.concat(str[i]);

                                                }
                                                $("tbody").html(strAll);
                                            }
                                            //权限加名字
                                            for (var j = 0;j<data.length;j++){
                                                // if(document.getElementById("plevel"+j)){
                                                    //存在
                                                    var userMsg = "<?php echo e($userMsg); ?>";
                                                    userMsg = userMsg.replace(/&quot;/g,'"');
                                                    var c = JSON.parse(userMsg);
                                                    var str_level = "";
                                                    for (var k = 0;k<c.length;k++){
                                                        // str_level = str_level+"<option name='plevel123["+k+"]' value='"+c[k]["id"]+"'>"+c[k]["name"]+"</option>";
                                                        str_level = str_level+"<label ><input name='plevel["+j+"]["+c[k]["id"]+"]' type='checkbox' value='1'>"+c[k]["name"]+"</lable><br>";
                                                    }
                                                    //$("#plevel0").empty();
                                                    $("#plevel"+j+"").html(str_level);
                                                    //str_level = str_level.concat("<option name='plevel["+j+"' value='"+c[j]["id"]+"'>"+c[j]["name"]+"</option>")
                                                // }else {
                                                //     break;
                                                // }
                                            }

                                        }
                                    })
                                })
                            })
                        </script>


                        <div class="am-form-group am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th>数据项</th>
                                        <th>是否唯一</th>
                                        <th>数据权限</th>
                                        <th>是否分割</th>
                                    </tr>
                                </thead>

                                <tbody class="tbody">

                                </tbody>
                            </table>
             			</div>                            
                    
                    <span id="id2" style="display: none;" > 
                        <div class="am-form-group">
    						<label for="db_rules" class="am-u-sm-3 am-form-label">数据库提取规则</label>
    						<div class="am-u-sm-9">
    							<textarea class="" rows="10" id="db_rules" name="db_rules"
    							placeholder="请输入数据库提取规则"></textarea>
    						</div>
    					</div>
					</span>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit"
                                        class="am-btn am-btn-success tpl-btn-bg-color-success ">保存</button>
                                <button type="button"
                                        class="am-btn am-btn-danger tpl-btn-bg-color-success" onclick="history.go(-1);">取消</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>