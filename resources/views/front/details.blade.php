@extends('front.layouts.master')

@section('title', $result->title)

@section('content')

<div class="col-lg-12">    
@php
$lg = "_" . Session::get('locale');
$category_name = $result->category->{"category_name".$lg};
$title = $result->{"title".$lg};
$details = $result->{"details".$lg};
@endphp

<div class="col-lg-12 art_title">
<a href="{{asset('')}}">{{ __("Home")}}</a> »  
<a href="{{asset('category/'.$result->category->id)}}">{{$category_name}}</a>
</div>


<div class="col-lg-12">
<img class="img-responsive img-thumbnail img-rounded" src="{{asset('storage/img/'.$result->image)}}" />
</div>
    
<div class="col-lg-12 art_title">{{$title}}</div>

<div class="col-lg-12">@include('front.layouts.social_buttons')</div>

<div class="col-lg-12 art_time">
{{  __("Last updated") }} : 
@php print substr($result->updated_at, 0,10); @endphp
 {{ __("Time") }}   
@php print substr($result->updated_at, 11); @endphp
</div>


<div class="col-lg-12 art_details">
@php
$det1 =  str_replace('<img ', '<img class="img-responsive img-thumbnail img-rounded" ', $details);
$det2 =  str_replace('width:', ' width1:', $det1);
$det3 =  str_replace('width=', ' width1=', $det2);

$det4 =  str_replace('height:', ' height1:', $det3);
$det5 =  str_replace('height=', ' height1=', $det4);

$det6 =  str_replace('<iframe ', '<iframe width=100% height=100% style="min-height:400px;" ', $det5);


$details = str_replace("</p>","</p><breakline>", $det6);
$details = str_finish($details, '<breakline>');
$details = substr($details, 0, -11); 
$details = explode("<breakline>" , $details);
$j = 0;

@endphp
    
@foreach($details as $detail)
@php $j++; @endphp
{!! $detail !!}
@endforeach

</div>

@php if($result->file != ""){ @endphp
<div class="col-lg-12 art_download">
{{ __('For Download') }}<br><br />
<a href="storage/upload/{{$result->file}}">
<img class="img-responsive img-thumbnail img-rounded" style="width:80px;" 
src="{{asset('storage/upload.png')}}" />
</a>
</div>
@php } @endphp


<div class="col-lg-12">@include('front.layouts.social_buttons')</div>

<div class="col-lg-12">
@if(isset($result->comment_status))
@include('front.layouts.comments')
@else
@endif
</div>

</div>

@endsection