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
                    <input type="submit" value="TRANSLATE">
                </div>
                <div class="sentence">
                    <label for="body">JAPANESE</label>
                    <textarea name="sentence" id="sentence" cols="30" rows="10"
                        value="{{ old('sentence') }}">{{ isset($sentence) ? $sentence : '' }}</textarea>
                </div>
                <img class="arrow_down" src="{{ asset('/images/arrow-down.svg') }}" alt="矢印">
                <div class="sentence_en">
                    <label for="body">ENGLISH</label>
                    <textarea name="sentence_en" id="sentence_en" cols="30"
                        rows="10">{{ isset($chat_response) ? $chat_response : '' }}</textarea>
                </div>
            </div>
            <div class="create_diary_submit">
                <input type="submit" value="日記を書く">
            </div>
        </form>
</div>
<script>
    // JavaScriptコードを追加
$(document).ready(function() {
    $('.store_diary').on('submit', function(event) {
        event.preventDefault(); // フォームのデフォルトの送信を防止
        var sentence = $('#sentence').val(); // 入力された日本語の文を取得

        // Chat GPTに翻訳を要求するAjaxリクエスト
        $.ajax({
            type: 'POST',
            url: '{{ route('chat_gpt-chat') }}', // Chat GPT翻訳用のルートを指定
            data: { _token: '{{ csrf_token() }}', sentence: sentence },
            success: function(response) {
                $('#sentence_en').val(response.translation); // 翻訳結果を表示
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

</script>
@endsection

@include('layout.footer')
