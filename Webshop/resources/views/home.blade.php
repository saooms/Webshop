@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <div class="links">
                        <a href="{{route('home')}}">all</a>
                        <a href="{{route('category', 'fire')}}">fire</a>
                        <a href="{{route('category', 'water')}}">water</a>
                        <a href="{{route('category', 'grass')}}">grass</a>
                        <a href="{{route('category', 'flight')}}">flight</a>
                        <a href="{{route('category', 'ghost')}}">ghost</a>
                    </div>
                    <hr>
                    <main class="articles">
                        @if(count($articles) > 0)
                            @foreach ($articles as $article)
                                <div class="panel panel-default item w3-btn" onclick="location.href = '{{route('article.show', [$article->categories->title, $article->id])}}'">
                                <div class="panel-heading">
                                    <h5>{{$article->name}}</h5>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    {{$article->categories->title}}
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
