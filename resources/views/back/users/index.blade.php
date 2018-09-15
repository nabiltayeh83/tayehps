@extends('back.layouts.master')

@section('title', 'إدارة المستخدمين	')

@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
    
    <form method="get" action="{{ asset('admin/users') }}" class="row">
        <div class="col-sm-3">
        <input autofocus name="key" id="key" type="text" required="required" class="form-control" placeholder="ابحث ...">
      	</div>
        
      	<div class="col-sm-1">
         <button class="btn btn-primary" type="submit">انطلق!</button>
        </div>
        
        <div class="col-sm-8 text-left">
            <a class="btn btn-success" href="{{asset('admin/users/create')}}">
            <i class="glyphicon glyphicon-plus"></i>
            اضافة مستخدم جديد
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
<th>#</th>
<th>الإسم</th>
<th>البريد الإلكتروني</th>
<th>فعال</th>
<th></th>
</tr>
</thead>
<tbody>
@php $i = 1; @endphp
@foreach($results as $result)
<tr>
<td>{{$i++}}</td>
<td><b>{{$result->name}}</b></td>
<td>{{$result->email}}</td>
<td>    
    <input type="checkbox" value="{{$result->id}}" class="cbActive" {{$result->is_active?"checked":""}} >
</td>

<td>

<a title='صلاحيات - {{$result->name}}' href="{{ asset('admin/users/permission/'.$result->id) }}" 
class="btn btn-warning IFrame">
                    	<i class="glyphicon glyphicon-lock"></i>
                    </a>


	<a href="{{ asset('admin/users/isdelete/'.$result->id) }}" class="btn Confirm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
    <a href="{{ asset('admin/users/'.$result->id.'/edit') }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
<!-- / .table-responisve -->
    

    </div>
    <!-- / panel-body -->

</div>


<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/users/active/"+id);
        });
    });
</script>


@endsection



