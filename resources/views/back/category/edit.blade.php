@extends('back.layouts.master')

@section('title', 'تعديل قسم')

@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => ['category.update', $result->id], 'method' => 'POST', 'files' => 'true', 'class' => 'form-horizontal']) !!}
{{csrf_field()}}
{{method_field('PUT')}}


<div class="form-group">
<label for="title" class="col-sm-2 control-label">القسم باللغة العربية</label>
<div class="col-sm-10">
{{ Form::text('category_name_ar', $result->category_name_ar, ['class' => 'form-control', 'placeholder' => 'القسم']) }}
</div>
</div>

<div class="form-group">
<label for="title" class="col-sm-2 control-label">القسم باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::text('category_name_en', $result->category_name_en, ['class' => 'form-control', 'placeholder' => 'القسم']) }}
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
<a href="{{ asset('admin/category') }}" class="btn btn-default">إلغاء</a>
</div>
</div>




{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection