@extends('layout.common')

@section('title', 'English Diary')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection

@include('layout.header')

@section('content')
<div class="create_diary">
    <h1>日記を書く</h1>
    {{-- <form class="store_diary" method="post" action="{{ route('store') }}"> --}}
    <form class="store_diary" method="post">
        @csrf
        <div class="create_diary_body">
            <div class="create_diary_translate">
                <input type="button" value="TRANSLATE">
            </div>
            <div class="sentence">
                <label for="body">JAPANESE</label>
                <textarea name="sentence" id="sentence" cols="30" rows="10" value="{{ old('sentence') }}">{{ isset($sentence) ? $sentence : '' }}</textarea>
            </div>
            <img class="arrow_down" src="{{ asset('/images/arrow-down.svg') }}" alt="">
            <div class="sentence_en">
                <label for="body">ENGLISH</label>
                <textarea name="sentence_en" id="sentence_en" cols="30" rows="10">{{ isset($chat_response) ? $chat_response : '' }}</textarea>
            </div>
        </div>
        <div class="create_diary_submit">
            <input type="submit" value="日記を書く">
        </div>
    </form>
</div>
@endsection

@include('layout.footer')
