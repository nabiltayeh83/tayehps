@extends('front.layouts.master')

@section('title', $cat_name->category_name)



@section('content')

@php
	$lg = "_" . Session::get('locale');
	$category_name = $cat_name->{"category_name".$lg};
@endphp

<h3><a href="{{asset('')}}">{{ __("Home")}}</a> » {{$category_name}}</h3><br>

@include('front.layouts.showImages')

@endsection