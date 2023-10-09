@section('header')
<header class="header">
    <div class="header_nav">
        <h1><a href="/">English Diary</a></h1>
        <ul class="header_nav_menu">
            <li><a href="/create">CREATE</a></li>
            {{-- <li><a href="{{ route('history', 1) }}">HISTORY</a></li> --}}
            <li><a href="{{ route('history', ['id' => $latestId]) }}">HISTORY</a></li>
        </ul>
    </div>
</header>
<style>
    header.header {
        background: #F9F9F9;
    }
    .header_nav  {
        display: flex;
        justify-content: space-between;
        margin: 0 150px;
        align-items: center;
    }
    ul.header_nav_menu {
        display: flex;
    }
    li {
        margin-left: 25px;
        list-style: none;
    }
    .header_nav_menu li a {
        text-decoration: none;
        color: #000;
        cursor: pointer;
        font-size: 18px
    }
    body {
        margin: 0;
    }

    .header_nav a {
        color: #000;
    }
</style>
@endsection
