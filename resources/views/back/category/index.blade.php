@extends('back.layouts.master')

@section('title', 'إدارة الأقسام	')

@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
     
    <form method="get" action="{{ asset('admin/category') }}" class="row">
        <div class="col-sm-3">
        <input autofocus name="key" id="key" type="text" required="required" class="form-control" placeholder="ابحث  ...">
      	</div>
        
      	<div class="col-sm-1">
         <button class="btn btn-primary" type="submit">انطلق!</button>
        </div>
        
        <div class="col-sm-8 text-left">
            <a class="btn btn-success" href="{{asset('admin/category/create')}}">
            <i class="glyphicon glyphicon-plus"></i>
            اضافة قسم جديد
        </a>
        </div>
    </form>  
    
    </div>
    <!-- / .panel-heading -->
    
    
    <div class="panel-body">
	
@if(isset($key))    
<h3>البحث عن / {{$key}}</h3><br />
@endif

 
<div class="table-responsive">    

<form action="{{ asset('admin/category/rearrange') }}" accept-charset="UTF-8" method="Get" class="form-horizontal">
{{csrf_field()}}
{{method_field('PUT')}}

<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>الترتيب</th>
<th>القسم</th>
<th>فعال</th>
<th></th>
</tr>
</thead>
<tbody>
@php $i=1; @endphp
@foreach($results as $result)
<tr>
<td>{{$i}}</td>
<td style="width:10%;">
{{ Form::number("arrange_num$i", $result->arrange_num, ['class' => 'form-control']) }}
{{ Form::hidden('id'.$i, $result->id) }}
@php $i++; @endphp
</td>
<td>{{$result->category_name_ar}}</td>
<td>
    <input type="checkbox" value="{{$result->id}}" class="cbActive" {{$result->is_active?"checked":""}} >

</td>
<td>
	<a href="{{ asset('admin/category/isdelete/'.$result->id) }}" class="btn Confirm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="{{ asset('admin/category/'.$result->id.'/edit') }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</td>
</tr>
@endforeach
{{ Form::hidden('cat_count', $i-1) }}
</tbody>
</table>

{{ Form::submit('إعادة الترتيب', ['class' => 'btn btn-warning']) }}
{!! Form::close() !!}


</div>
<!-- / .table-responisve -->
    

    </div>
    <!-- / panel-body -->

</div>
{{$results->links()}}

<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/category/active/"+id);
        });
    });
</script>

@endsection