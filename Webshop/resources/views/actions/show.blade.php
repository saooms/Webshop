@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
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
                    <main class="article"> {{--style="background-image: url()">
                        --}}
                        <img src="{{asset('img/'.$article->categories->title. '.jpg')}}" alt="type">
                        <div class="product">
                            <div>
                                <div class="panel-heading">
                                    <h5>{{$article->name}}</h5>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    {{$article->description}}
                                </div>
                            </div>
                            <div>
                                <div class="w3-right">
                                    <h4>${{$article->price}}</h4>
                                    <button class="w3-btn w3-yellow">add to card</button>
                                </div>
                            </div>
                        </div>
                    
                    </main>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
