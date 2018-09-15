@extends('front.layouts.master')

@section('title', $result->title)


@section('content')

@php
$lg = "_" . Session::get('locale');
$title    = $result->{"title".$lg};
$details  = $result->{"details".$lg};
@endphp

<div class="col-lg-12">    

<div class="col-lg-12 art_title"><a href="{{asset('')}}">{{ __("Home") }}</a> » {{$title}}</div>

<div class="col-lg-12 art_time">
{{ __("Last updated") }}: @php print substr($result->updated_at, 0,10); @endphp
{{ __("Time") }}: @php print substr($result->updated_at, 11); @endphp
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


<div class="col-lg-12">
@if(isset($result->comment_status))
@include('front.layouts.comments')
@else
@endif
</div>


</div>


@endsection