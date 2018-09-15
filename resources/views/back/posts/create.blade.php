@extends('back.layouts.master')

@section('title', 'إضافة مقال')

@section('content')
<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => 'post.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}


<div class="form-group">
<label for="title" class="col-sm-2 control-label">العنوان باللغة العربية</label>
<div class="col-sm-10">
{{ Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => 'العنوان']) }}
</div>
</div>

<div class="form-group">
<label for="title" class="col-sm-2 control-label">العنوان باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => 'العنوان', 
'style' => 'direction:ltr;']) }}
</div>
</div>


<div class="form-group">
<label for="details" class="col-sm-2 control-label">التفاصيل باللغة العربية</label>
<div class="col-sm-10">
{{ Form::textarea('details_ar', old('details_ar'), ['class' => 'form-control ckeditor', 'style' => 'height:70px;', 
'placeholder' => 'التفاصيل', 'id' => 'details_ar']) }}
</div>
</div>

<div class="form-group">
<label for="details" class="col-sm-2 control-label">التفاصيل باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::textarea('details_en', old('details_en'), ['class' => 'form-control ckeditor', 'style' => 'height:70px;', 
'placeholder' => 'التفاصيل', 'id' => 'details_en']) }}
</div>
</div>


<div class="form-group">
<label for="category_id" class="col-sm-2 control-label">القسم</label>
<div class="col-sm-10">
    {{ Form::select('category_id', $categories, 1, ['class' => 'form-control', 'style' => 'padding:2px;']) }}
</div>
</div>

<div class="form-group">
<label for="file" class="col-sm-2 control-label">الصور</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="photo" required="required" />
</div>
</div>


<div class="form-group">
<label for="file" class="col-sm-2 control-label">إرفاق ملف</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="file1"/>
</div>
</div>



<div class="form-group">
<label for="comment_status" class="col-sm-2 control-label">التعليقات</label>
<div class="col-sm-10">
    {{ Form::checkbox('comment_status', 1, 1, ['id' => 'comment_status']) }}
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
<a href="{{ asset('admin/post') }}" class="btn btn-default">إلغاء</a>
</div>
</div>


{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection