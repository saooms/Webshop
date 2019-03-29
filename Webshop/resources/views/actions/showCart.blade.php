@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>

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
                <main class="article">
                        @if(count($articles) > 0)
                            @foreach ($articles as $article)
                                <div class="panel panel-default item w3-btn" onclick="location.href = '{{$article->categories->title}}/{{$article->id}}'">
                                    <div class="panel-heading">
                                        <h5>{{$article->name}}</h5>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        {{$article->categories->title}}
                                    </div>
                                    <div class="w3-display-right">
                                        <div><button class="btn" onclick="location.href = '/Webshop/Webshop/public/add/{{$article->id}}'">+</button> <p style="text-align: center">{{$qty}}</p> <button class="btn" onclick="location.href = '/Webshop/Webshop/public/remove/{{$article->id}}'">-</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
