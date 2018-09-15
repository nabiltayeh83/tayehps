@extends('back.layouts.master')

@section('title', 'تعديل مقال')

@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => ['post.update', $result->id], 'method' => 'POST', 'files' => 'true', 'class' => 'form-horizontal']) !!}
{{csrf_field()}}
{{method_field('PUT')}}


<div class="form-group">
<label for="title" class="col-sm-2 control-label">العنوان باللغة العربية</label>
<div class="col-sm-10">
{{ Form::text('title_ar', $result->title_ar, ['class' => 'form-control', 'placeholder' => 'العنوان']) }}
</div>
</div>


<div class="form-group">
<label for="title" class="col-sm-2 control-label">العنوان باللغة الإنجليزية</label>
<div class="col-sm-10">
{{ Form::text('title_en', $result->title_en, ['class' => 'form-control', 'style' => 'direction:ltr;', 'placeholder' => 'العنوان']) }}
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
<label for="category_id" class="col-sm-2 control-label">القسم</label>
<div class="col-sm-10">
    {{ Form::select('category_id', $categories, $result->category_id, ['class' => 'form-control', 'style' => 'padding:2px;']) }}
</div>
</div>


<div class="form-group">
<label for="file" class="col-sm-2 control-label">الصور</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="photo" id="photo" />
<br />


@if(isset($result->image))
    <div class="col-sm-3" style="margin:10px;">
      <img  class="img-responsive" src="{{asset('storage/img/thumbnail/'.$result->image)}}">
    </div>
@endif    

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
    {{ Form::checkbox('comment_status', 1, '', ['id' => 'comment_status', $result->comment_status?"checked":""]) }}
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
<a href="{{ asset('admin/post') }}" class="btn btn-default">إلغاء</a>
</div>
</div>




{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection