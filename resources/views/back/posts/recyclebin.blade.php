@extends('back.layouts.master')

@section('title', "المقالات - سلة المهملات")


@section('content')

<div class="panel panel-default">


	<div class="panel-heading">
     
<form method="get" action="{{ asset('admin/post/recyclebin') }}" class="row">
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
<th>إستعادة</th>
<th>حذف</th>
</tr>
</thead>
<tbody>
@php $i=1; @endphp
@foreach($results as $result)

<tr>
<td>{{$i++}}</td>
<td><b>{{$result->title_ar}}</b></td>
<td>{{$result->category->category_name_ar}}</td>
<td><img class="thumbnail" style="max-height:100px; max-width:100px;" src="{{asset('storage/img/thumbnail/'.$result->image)}}"></td>


<td>
<a href="{{ asset('admin/post/recovery/'.$result->id) }}" class="btn Confirm btn-warning"><span class="glyphicon glyphicon-refresh"></span></a>
</td>


<td>
<a href="{{ asset('admin/post/delete/'.$result->id) }}" class="btn Confirm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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