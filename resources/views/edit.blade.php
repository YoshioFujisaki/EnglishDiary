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
{{-- @foreach ($diarys as $diary) --}}
<div class="created_date">
    {{-- <h2>2023.10.05</h2> --}}
    <h2>{{ $diarys->created_at->format('Y.m.d') }}</h2>
</div>
{{-- @endforeach --}}
<div class="edit_diary">
    <form class="edit_diary" method="post">
        @csrf
        <div class="edit_diary_body">
            <div class="sentence">
                <div class="sentence_header">
                    <label for="body">JAPANESE</label>
                    <a href="" class="hidden">
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence" id="sentence" cols="30" rows="10" value="{{ old('sentence') }}"
                    readonly>{{ $diarys->sentence }}</textarea>
            </div>
            <div class="sentence_en">
                <div class="sentence_header">
                    <label for="body">ENGLISH</label>
                    <a href="" class="hidden">
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence_en" id="sentence_en" cols="30" rows="10"
                    readonly>{{ $diarys->sentence_en }}</textarea>
            </div>
        </div>
        <div class="edit_diary_submit">
            <input type="submit" value="日記を更新">
        </div>

    </form>
</div>
@endsection

@include('layout.footer')
