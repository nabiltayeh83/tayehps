@extends('back.layouts.master')

@section('title', 'إضافة مستخدم')

@section('content')
<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}



<div class="form-group">
<label for="title" class="col-sm-2 control-label">الاسم</label>
<div class="col-sm-10">

{{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'الاسم']) }}
</div>
</div>


<div class="form-group">
<label for="title" class="col-sm-2 control-label">البريد الإلكتروني</label>
<div class="col-sm-10">

{{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'البريد الإلكتروني']) }}
</div>
</div>


<div class="form-group">
<label for="title" class="col-sm-2 control-label">كلمة المرور</label>
<div class="col-sm-10">

{{ Form::text('password1', old('password1'), ['class' => 'form-control', 'placeholder' => 'كلمة المرور']) }}
</div>
</div>




<div class="form-group">
<label for="is_active" class="col-sm-2 control-label">فعال</label>
<div class="col-sm-10">
	{{ Form::checkbox('is_active', 1, 1, ['id' => 'is_active']) }}
</div>
</div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
{{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
<a href="{{ asset('admin/users') }}" class="btn btn-default">إلغاء</a>
</div>
</div>


{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection