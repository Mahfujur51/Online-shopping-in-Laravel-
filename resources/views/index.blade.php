@extends('fontend.master')
@section('title','Shop Page')
@section('content')

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">Udemy E-commerce tutorial</h4>
                    <p class="heading-text">Buy books, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="books-item">
                        <div class="books-item-thumb">
                            <img src="{{asset($product->image)}}" height="200" width="150" alt="book">
                            <div class="new">New</div>
                            <div class="sale">Sale</div>
                            <div class="overlay overlay-books"></div>
                        </div>

                        <div class="books-item-info">
                            <a href="{{ route('singleProduct',$product->id) }}">
                            <h5 class="books-title">{{$product->title}}</h5>

                                </a>
                            <div class="books-price"> Price :{{$product->price}}$</div>
                        </div>

                        <a href="{{ route('addcartsmall',$product->id) }}" class="btn btn-small btn--dark add">
                            <span class="text">Add to Cart</span>
                            <i class="seoicon-commerce"></i>
                        </a>

                    </div>
                </div>
                  @endforeach
            </div>

            <div class="row pb120">

                <div class="col-md-4 offset-md-4">
                    {{$products->links()}}

                </div>

            </div>
        </div>
        </div>
    </div>
@endsection
