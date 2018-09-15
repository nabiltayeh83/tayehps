<link href="{{asset('nprogress-master/nprogress.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('nprogress-master/nprogress.js')}}" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>


<!-- تستخدم هذه الرسالة لطباعة تنبيه عند محاولة اضافة او تعديل بيانات مع ترك خانات فارغة -->
@if($errors->count() >0)
<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
@foreach($errors->all() as $error)
- {{$error}}<br>
@endforeach
</div>
@endif


<!-- لطباعة رسالة تاكيد اضافة او حذف او تعديل البيانات -->
@if(Session::get("msg")!=NULL)

@php
$msgClass="alert-info";
if(strstr(Session::get("msg"),"s:")){ $msgClass="alert-success"; }
else if(strstr(Session::get("msg"),"e:")){ $msgClass="alert-danger"; }
else if(strstr(Session::get("msg"),"i:")){ $msgClass="alert-info"; }
else if(strstr(Session::get("msg"),"w:")){ $msgClass="alert-warning"; }
@endphp

<div class="alert {{$msgClass}} alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{substr(Session::get("msg"),2)}}
</div>  
@endif




<!-- أليرت جافا لتأكيد حذف البيانات -->
<div id="Confirm" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">تأكيد</h4>
      </div>
      <div class="modal-body">
        <p>هل انت متأكد من الاستمرار في العملية؟</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء الامر</button>
        <a class="btn btn-danger">نعم, متأكد</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div id="IFrame" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<script>
		$(function(){
			//$("#Confirm").modal("show");	
			//لما ينضغط على اي واحد كلاسه كونفيرم
			$(".Confirm").click(function(e) {
                $("#Confirm").modal("show");	
				$("#Confirm .btn-danger").attr("href",$(this).attr("href"));
				//يعني ما يكمل ويقف هان
				return false;
            });
            
            $(".IFrame").click(function(e) {
                $("#IFrame").modal("show");	
                $("#IFrame .modal-title").html($(this).attr("title"));
				$("#IFrame .modal-body").html("<iframe frameborder=0 width='100%' height=550 src='"+$(this).attr("href")+"'></iframe>");
				//يعني ما يكمل ويقف هان
				return false;
            });
            
            $( document ).ajaxStart(function() {
              NProgress.start();
            });

            $( document ).ajaxStop(function() {
              NProgress.done();
            });


            $( document ).ajaxError(function() {
              NProgress.done();
            });
		});
    </script>