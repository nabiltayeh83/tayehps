@extends('front.layouts.master')

@section('title', "نتائج البحث عن $key")



@section('content')
<h3><a href="{{asset('')}}">الرئيسية</a> » نتائج البحث عن ({{$key}})</h3>
@include('front.layouts.showImages')

@endsection