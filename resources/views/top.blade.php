@extends('layout.common')

@section('title', 'English Diary')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="/css/index.css" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<p>このページはインデックスページです。</p>
@endsection

@include('layout.footer')
