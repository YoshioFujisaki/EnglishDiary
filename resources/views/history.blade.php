@extends('layout.common')

@section('title', 'English Diary')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection

@include('layout.header')


@section('content')
<div class="arrow">
    <a href="">
        <img class="prev" src="{{ asset('/images/arrow-down.svg') }}" alt="">
    </a>
    <a href="">
        <img class="next" src="{{ asset('/images/arrow-down.svg') }}" alt="">
    </a>
</div>
<div class="created_date">
    <h2>2023.10.05</h2>
</div>
<div class="edit_diary">
    <form class="edit_diary" method="post">
        @csrf
        <div class="edit_diary_body">
            <div class="sentence">
                <div class="sentence_header">
                    <label for="body">JAPANESE</label>
                    <a href="">
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence" id="sentence" cols="30" rows="10"
                    value="{{ old('sentence') }}" readonly>{{ isset($sentence) ? $sentence : '' }}</textarea>
                <div class="edit_diary_translate hidden">
                    <input type="button" value="TRANSLATE">
                </div>
            </div>
            <div class="sentence_en">
                <div class="sentence_header">
                    <label for="body">ENGLISH</label>
                    <a href="">
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence_en" id="sentence_en" cols="30"
                    rows="10" readonly>{{ isset($chat_response) ? $chat_response : '' }}</textarea>
                <div class="edit_diary_submit hidden">
                    <input type="submit" value="日記を更新">
                </div>
            </div>
        </div>

    </form>
</div>
@endsection

@include('layout.footer')
