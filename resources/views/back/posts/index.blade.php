@extends('back.layouts.master')

@section('title', 'إدارة المقالات	')

@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
     
<form method="get" action="{{ asset('admin/post') }}" class="row">
        <div class="col-sm-3">
        <input autofocus name="key" id="key" type="text" required="required" class="form-control" placeholder="ابحث ...">
      	</div>
            
      	<div class="col-sm-1">
         <button class="btn btn-primary" type="submit">انطلق!</button>
        </div>
        
        <div class="col-sm-8 text-left">
            <a class="btn btn-success" href="{{asset('admin/post/create')}}">
            <i class="glyphicon glyphicon-plus"></i>
            اضافة مقال جديدة
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
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="7%">#</th>
<th>العنوان</th>
<th width="11%">القسم</th>
<th width="11%">الصورة</th>
<th width="4%">فعال</th>
<th width="11%"></th>
</tr>
</thead>
<tbody>
@php $i = 1; @endphp
@foreach($results as $result)
<tr>
<td>{{$i++}}</td>
<td><b>{{$result->title_ar}}</b></td>
<td>{{$result->category->category_name_ar}}</td>
<td><img class="thumbnail" style="max-height:100px; max-width:100px;" src="{{asset('storage/img/thumbnail/'.$result->image)}}"></td>
<td>
    <input type="checkbox" value="{{$result->id}}" class="cbActive" {{$result->is_active?"checked":""}} >
</td>

<td>
	<a href="{{ asset('admin/post/isdelete/'.$result->id) }}" class="btn Confirm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="{{ asset('admin/post/'.$result->id.'/edit') }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</td>
</tr>
@endforeach
</tbody>
</table>
{{$results->links()}}

</div>
<!-- / .table-responisve -->
    

    </div>
    <!-- / panel-body -->

</div>

<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/post/active/"+id);
        });
    });
</script>

@endsection