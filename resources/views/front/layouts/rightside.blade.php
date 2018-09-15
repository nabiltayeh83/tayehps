<div>

<div class="beitdaras">
<h3>{{ __("Beit Daras") }}</h3>
<a href="{{asset('page/3')}}">
<img class="img-fluid" src="{{asset('storage/img/beitdaras/'. rand(1,4) .'.jpg')}}">
</a>
</div>

 
  
<div class="mostvisited">
<div id="mostvisited">{{ __("Most Visited") }}</div>
@foreach($rightsides as $rightside)	
@php
$lg = "_" . Session::get('locale');
$title = $rightside->{"title".$lg};
@endphp		
<a href="{{asset('showDetails/'.$rightside->id)}}">
<img src="{{asset('storage/img/'.$rightside->image)}}">
<h5>{{$title}}</h5> 
</a>    
@endforeach
</div>
  
  
</div>




