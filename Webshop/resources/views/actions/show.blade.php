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
                <main class="article">
                    <img src="{{asset('img/'.$article->categories->title. '.jpg')}}" alt="type">
                    <div class="product">
                        <div>
                            <div class="panel-heading">
                                <h5>{{$article->name}}</h5>
                            </div>
                            <hr>
                            <div class="panel-body description">
                                {{$article->description}}
                            </div>
                        </div>
                        <div>
                            <div class="w3-right">
                                <h4>${{$article->price}}</h4>
                                <button class="w3-btn w3-yellow" onclick="location.href = '{{route('add',$article->id)}}'">add to cart</button>
                            </div>
                            @if ($item != null)
                                <div class="w3-display-right">
                                    <div><button class="btn" onclick="location.href = '{{route('add',$article->id)}}'">+</button> <p style="text-align: center">{{$item['QTY']}}</p> <button class="btn" onclick="location.href = '{{route('remove',$article->id)}}'">-</button>
                                </div> 
                            @endif
                            
                        </div>
                    </div>
                
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
