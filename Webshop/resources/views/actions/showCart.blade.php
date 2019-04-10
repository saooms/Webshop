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
                    <a href="{{route('home')}}">all</a>
                    <a href="{{route('category', 'fire')}}">fire</a>
                    <a href="{{route('category', 'water')}}">water</a>
                    <a href="{{route('category', 'grass')}}">grass</a>
                    <a href="{{route('category', 'flight')}}">flight</a>
                    <a href="{{route('category', 'ghost')}}">ghost</a>
                </div>
                <hr>
                <main class="articles">
                    @if($articles != null)
                        @foreach ($articles->items as $article)
                            <div class="w3-display-container">
                                <div class="panel panel-default item w3-btn" onclick="location.href = '{{route('article.show', [$article['item']->categories->title, $article['item']->id])}}'">
                                    <div class="panel-heading">
                                        <h5>{{$article['item']->name}}</h5>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        {{$article['item']->categories->title}}
                                    </div>
                                    <div class="card-footer">
                                        <p>total: ${{$article['price']}} </p>
                                    </div>
                                    
                                </div>
                                <div class="w3-display-right butts">
                                    <div>
                                        <button class="btn sec w3-hover-grey" onclick="location.href = '{{route('add', $article['item']->id)}}'">+</button> <p style="text-align: center">{{$article['QTY']}}</p> <button class="btn sec w3-hover-grey" onclick="location.href = '{{route('remove', $article['item']->id)}}'">-</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                    <p class="alert alert-primary">there are no items in your cart!</p>
                            
                    @endif
                </main>
            </div>
            <div class="card-footer w3-display-container">
                @if($articles != null)
                    <p class="w3-left">total: ${{$articles->totalPrice()}}</p>

                    <button class="btn w3-yellow w3-display-right w3-hover-green" onclick="location.href = '/Webshop/Webshop/public/placeOrder'">purchase</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
