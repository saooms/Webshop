@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{$category[0]->categories->title}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <div class="links">
                        <a href="/Webshop/Webshop/public/home">all</a>
                        <a href="/Webshop/Webshop/public/fire">fire</a>
                        <a href="/Webshop/Webshop/public/water">water</a>
                        <a href="/Webshop/Webshop/public/grass">grass</a>
                        <a href="/Webshop/Webshop/public/flight">flight</a>
                        <a href="/Webshop/Webshop/public/ghost">ghost</a>
                    </div>
                    <hr>
                    <main class="articles">
                        @if(count($category) > 0)
                            @foreach ($category as $article)
                            <div class="panel panel-default item w3-btn" onclick="location.href = '{{$article->categories->title}}/{{$article->id}}'">
                                <div class="panel-heading">
                                    <h5>{{$article->name}}</h5>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    {{$article->description}}
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
