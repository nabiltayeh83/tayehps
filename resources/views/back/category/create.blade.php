@extends('back.layouts.master')

@section('title', 'إضافة قسم')

@section('content')

<div class="panel panel-default">

<div class="panel-body">
	
{!! Form::open(['route' => 'category.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal']) !!}
{{csrf_field()}}


<div class="form-group">
<label for="category_name" class="col-sm-2 control-label">العنوان باللغة العربية</label>
<div class="col-sm-10">
{{ Form::text('category_name_ar', old('category_name_ar'), ['class' => 'form-control', 'placeholder' => 'عنوان القسم']) }}
</div>
</div>


<div class="form-group">
<label for="category_name" class="col-sm-2 control-label">العنوان باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::text('category_name_en', old('category_name_en'), ['class' => 'form-control', 'placeholder' => 'عنوان القسم']) }}
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
<a href="{{ asset('admin/category') }}" class="btn btn-default">إلغاء</a>
</div>
</div>


{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection