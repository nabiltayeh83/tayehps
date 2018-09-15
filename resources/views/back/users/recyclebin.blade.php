@extends('back.layouts.master')

@section('title', "المستخدمين - سلة المهملات")


@section('content')

<div class="panel panel-default">


	<div class="panel-heading">
    
    <form method="get" action="{{ asset('admin/users/recyclebin') }}" class="row">
        <div class="col-sm-3">
        <input autofocus name="key" id="key" type="text" required="required" class="form-control" placeholder="ابحث ...">
      	</div>
        
      	<div class="col-sm-1">
         <button class="btn btn-primary" type="submit">انطلق!</button>
        </div>
        
        <div class="col-sm-8 text-left">
        </div>
    </form>  
    
    </div>    
    
    <div class="panel-body">
	
@if(isset($key))    
<h3>البحث عن / {{$key}}</h3><br />
@endif
 
<div class="table-responsive">    
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="7%">#</th>
<th>الإسم</th>
<th>البريد الإلكتروني</th>
<th>إستعادة</th>
<th>حذف</th>
</tr>
</thead>
<tbody>
@php $i=1; @endphp
@foreach($results as $result)

<tr>
<td>{{$i++}}</td>
<td><b>{{$result->name}}</b></td>
<td>{{$result->email}}</td>




<td>
<a href="{{ asset('admin/users/recovery/'.$result->id) }}" class="btn Confirm btn-warning"><span class="glyphicon glyphicon-refresh"></span></a>
</td>


<td>
<a href="{{ asset('admin/users/delete/'.$result->id) }}" class="btn Confirm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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

@endsection