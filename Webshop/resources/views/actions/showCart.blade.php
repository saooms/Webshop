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
                <main class="articles">
                        @if($articles != 0)
                            @foreach ($articles as $article)
                                <div class="w3-display-container">
                                    <div class="panel panel-default item w3-btn" onclick="location.href = '{{$article['item']->categories->title}}/{{$article['item']->id}}'">
                                        <div class="panel-heading">
                                            <h5>{{$article['item']->name}}</h5>
                                        </div>
                                        <hr>
                                        <div class="panel-body">
                                            {{$article['item']->categories->title}}
                                        </div>
                                        
                                    </div>
                                    <div class="w3-display-right butts">
                                        <div>
                                            <button class="btn sec w3-hover-grey" onclick="location.href = '/Webshop/Webshop/public/add/{{$article['item']->id}}'">+</button> <p style="text-align: center">{{$article['QTY']}}</p> <button class="btn sec w3-hover-grey" onclick="location.href = '/Webshop/Webshop/public/remove/{{$article['item']->id}}'">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
 
                        @else
                        <p class="alert alert-primary">there are no items in your cart!</p>
                                
                        @endif
                        </div>
                    </div>
                
                </main>
            </div>
            <div class="card-footer">
                <p>total:</p>
            </div>
        </div>
    </div>
</div>
@endsection
