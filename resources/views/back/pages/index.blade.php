@extends('back.layouts.master')

@section('title', 'إدارة الصفحات	')

@section('content')

<div class="panel panel-default">

    <!-- / .panel-heading -->
    
    
    <div class="panel-body">
	
<div class="table-responsive">    
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="7%">#</th>
<th>عنوان الصفحة</th>
<th></th>
</tr>
</thead>
<tbody>
@php $i = 1; @endphp
@foreach($results as $result)
<tr>
<td>{{$i++}}</td>
<td><b>{{$result->title_ar}}</b></td>


<td>
<a href="{{ asset('admin/page/'.$result->id.'/edit') }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
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
            $.get("/admin/post/active/"+id);
        });
    });
</script>

@endsection