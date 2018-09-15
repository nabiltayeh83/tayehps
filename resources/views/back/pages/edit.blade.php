@extends('back.layouts.master')

@section('title', 'تعديل صفحة')

@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => ['page.update', $result->id], 'method' => 'POST', 'files' => 'true', 'class' => 'form-horizontal']) !!}
{{csrf_field()}}
{{method_field('PUT')}}


<div class="form-group">
<label for="title" class="col-sm-2 control-label"></label>
<div class="col-sm-10">
<h3>{{$result->title}}</h3>
</div>
</div>


<div class="form-group">
<label for="details" class="col-sm-2 control-label">التفاصيل باللغة العربية</label>
<div class="col-sm-10">
{{ Form::textarea('details_ar', $result->details_ar, ['class' => 'form-control ckeditor', 'placeholder' => 'التفاصيل' , 'style' => 'height:70px;']) }}
</div>
</div>


<div class="form-group">
<label for="details" class="col-sm-2 control-label">التفاصيل باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::textarea('details_en', $result->details_en, ['class' => 'form-control ckeditor', 'placeholder' => 'التفاصيل' , 'style' => 'height:70px;']) }}
</div>
</div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
{{ Form::submit('تعديل', ['class' => 'btn btn-primary']) }}
<a href="{{ asset('admin/page') }}" class="btn btn-default">إلغاء</a>
</div>
</div>




{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection