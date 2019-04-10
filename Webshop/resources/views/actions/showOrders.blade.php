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
                <main class="">
                    @if($orders != null)
                        @foreach ($orders as $order)
                            <button class="w3-btn" onclick="location.href = '{{route('orders.show',$order->id)}}'">
                                <p>order NR: {{$order->id}}</p>
                                <p>price: ${{$order->totalPrice}}</p>
                                <hr>
                                <p>order placed at: {{$order->created_at}}</p> 
                            </button>
                        @endforeach

                    @else
                    <p class="alert alert-primary">you have no running orders</p>
                            
                    @endif
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
