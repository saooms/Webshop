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
                    @if($order != null)
                        @foreach ($order->orderDetails as $detail)
                            <div class="w3-display-container">
                                <div class="panel panel-default item w3-btn" onclick="location.href = '/Webshop/Webshop/public/{{$detail->article->categories->title}}/{{$detail->article->id}}'">
                                    <div class="panel-heading">
                                        <h5>{{$detail->article->name}}</h5>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        {{$detail->article->categories->title}}
                                    </div>
                                    <div class="card-footer">
                                        <p>total: ${{$detail->article->price}} </p>
                                    </div>
                                    
                                </div>
                                <div class="w3-display-right">
                                    <div>
                                        <p style="text-align: center">${{$detail->article->price}} * {{$detail->QTY}}</p>
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
                <p>total: ${{$order->totalPrice}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
