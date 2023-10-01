@extends('layout.common')

@section('title', 'English Diary')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<div class="top_start">
    <h1>English Diary</h1>
    <h3>英語で日記を書いてみましょう！</h3>
    <a href="/create" class="btn btn-primary">日記を書く</a>
</div>
@endsection

@include('layout.footer')
