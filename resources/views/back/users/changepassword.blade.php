@extends('back.layouts.master')

@section('title', 'تغيير كلمة المرور')

@section('content')
<div class="panel panel-default">


<div class="panel-body">	

<form action="{{ asset('admin/users/updatepassword') }}" accept-charset="UTF-8" method="POST" class="form-horizontal">
{{csrf_field()}}
{{method_field('PUT')}}


  <div class="form-group">
    <label for="oldpassword" class="col-sm-3 control-label"> كلمة المرور الحالية</label>
    <div class="col-sm-9">
      <input value="{{old("oldpassword")}}"  type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="كلمة المرور الحالية">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="password" class="col-sm-3 control-label"> كلمة المرور الجديدة</label>
    <div class="col-sm-9">
    <input name="password" type="password"   class="form-control" value="{{old("password")}}" id="password" placeholder="كلمة المرور الجديدة"/>

    </div>
  </div>

  <div class="form-group">
    <label for="password_confirmation" class="col-sm-3 control-label"> تأكيد الكلمة الجديدة</label>
    <div class="col-sm-9">
      <input value="{{old("password_confirmation")}}"  type="password" class="form-control" 
       <input name="password_confirmation" type="password" class="form-control" value="{{old("password_confirmation")}}" id="password_confirmation" placeholder="تأكيد الكلمة الجديدة"/>
    </div>
  </div>
  
  
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
      <a class="btn btn-default" href="{{ asset('login') }}">الغاء الأمر</a>
    </div>
  </div>

</form> 

</div>
<!-- / panel-body -->

</div>

@endsection