@extends('back.layouts.master')

@section('title', 'تعديل مستخدم')

@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => ['users.update', $result->id], 'method' => 'POST', 'files' => 'true', 'class' => 
'form-horizontal']) !!}
{{ csrf_field() }}
{{method_field('PUT')}}


<div class="form-group">
<label for="title" class="col-sm-2 control-label">الاسم</label>
<div class="col-sm-10">
{{ Form::text('name', $result->name, ['class' => 'form-control', 'placeholder' => 'الاسم', 'required' => 'required']) }}
</div>
</div>



<div class="form-group">
<label for="title" class="col-sm-2 control-label">البريد الإلكتروني</label>
<div class="col-sm-10"><b>{{$result->email}}</b></div>
</div>



<div class="form-group">
<label for="title" class="col-sm-2 control-label">كلمة المرور</label>
<div class="col-sm-10">
<input  type="text" class="form-control" name="password1" id="password1" placeholder="اضف لاعادة  كلمة المرور ">
</div>
</div>






<div class="form-group">
<label for="is_active" class="col-sm-2 control-label">فعال</label>
<div class="col-sm-10">
	{{ Form::checkbox('is_active', 1, '', ['id' => 'is_active', $result->is_active?"checked":""]) }}
</div>
</div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
{{ Form::submit('تعديل', ['class' => 'btn btn-primary']) }}
<a href="{{ asset('admin/users') }}" class="btn btn-default">إلغاء</a>
</div>
</div>




{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection