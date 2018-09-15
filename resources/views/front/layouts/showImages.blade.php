@if(isset($results))

<div class="row">
@foreach($results as $r)

@php
$lg = "_" . Session::get('locale');
$title = $r->{"title".$lg};
@endphp

@if($title)
<div class="col-lg-6 col-md-6 showimage">
<a href="{{asset('showDetails/'.$r->id)}}">
<img class="img-responsive img-thumbnail img-rounded" src="{{asset('storage/img/'.$r->image)}}" /><br>
{{$title}}</a>
</div>

@endif
@endforeach 
</div>


@if(route('homepage')!= URL::current())
<div class="col-lg-12"> {{$results->links()}} </div>
@endif

   
@endif