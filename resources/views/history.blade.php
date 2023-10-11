@extends('layout.common')

@section('title', 'English Diary')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', 'インデックスページの説明文です')
@section('pageCss')
<link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection

@include('layout.header')


@section('content')
@if(Session::has('err_msg'))
    <div class="alert alert-danger">
        {{ Session::get('err_msg') }}
    </div>
@endif

@if(Session::has('success_msg'))
    <div class="alert alert-success">
        {{ Session::get('success_msg') }}
    </div>
@endif


<div class="arrow">
    @if ($diarys->id > $firstId)
        <a href="{{ route('history', $diarys->id - 1 ) }}">
            <img class="prev" src="{{ asset('/images/arrow-down.svg') }}" alt="">
        </a>
        <a class="double_prev_link" href="{{ route('history', $firstId ) }}">
            <img class="double_prev" src="{{ asset('/images/double_arrow.png') }}" alt="">
        </a>
    @endif
    @if ($diarys->id < $latestId)
        <a href="{{ route('history', $diarys->id + 1) }}">
            <img class="next" src="{{ asset('/images/arrow-down.svg') }}" alt="">
        </a>
        <a class="double_next_link" href="{{ route('history', $latestId ) }}">
            <img class="double_next" src="{{ asset('/images/double_arrow.png') }}" alt="">
        </a>
    @endif
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
                    <a href="{{ route('history-edit', $diarys->id ) }}">
                        {{-- <a href=""> --}}
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence" id="sentence" cols="30" rows="10"
                    value="{{ old('sentence') }}" readonly>{{ $diarys->sentence }}</textarea>
            </div>
            <div class="sentence_en">
                <div class="sentence_header">
                    <label for="body">ENGLISH</label>
                    <a href="{{ route('history-edit', $diarys->id) }}">
                        {{-- <a href=""> --}}
                        <img class="edit_img" src="{{ asset('/images/edit.png') }}" alt="編集">
                    </a>
                </div>
                <textarea name="sentence_en" id="sentence_en" cols="30"
                    rows="10" readonly>{{ $diarys->sentence_en }}</textarea>
            </div>
        </div>

    </form>
</div>
@endsection

@include('layout.footer')
