@extends('fontend.master')
@section('title','Add to Cart')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="order">
                            <h2 class="h1 order-title text-center">Your Order</h2>
                            <form action="#" method="post" class="cart-main">
                                <table class="shop_table cart">
                                    <thead class="cart-product-wrap-title-main">
                                        <tr>
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $product)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <div class="cart-product__item">
                                                    <div class="cart-product-content">
                                                        <h5 class="cart-product-title">{{$product->name}}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity">
                                                    {{$product->qty}}
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <h5 class="total amount">{{$product->total()}}</h5>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="cart_item total">
                                            <td class="product-thumbnail">
                                                <div class="cart-product-content">
                                                    <h5 class="cart-product-title">Total:</h5>
                                                </div>
                                            </td>
                                            <td class="product-quantity">
                                            </td>
                                            <td class="product-subtotal">
                                                <h5 class="total amount">{{Cart::total()}}</h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="cheque">
                                    <div class="logos">
                                        <a href="#" class="logos-item">
                                            <img src="{{asset('fontend/img/visa.png')}}" alt="Visa">
                                        </a>
                                        <a href="#" class="logos-item">
                                            <img src="{{asset('fontend/img/mastercard.png')}}" alt="MasterCard">
                                        </a>
                                        <a href="#" class="logos-item">
                                            <img src="{{asset('fontend/img/discover.png')}}" alt="DISCOVER">
                                        </a>
                                        <a href="#" class="logos-item">
                                            <img src="{{asset('fontend/img/amex.png')}}" alt="Amex">
                                        </a>
                                        <span style="float: right;">
                                            <form action="{{ route('paid') }}" method="POST">
                                              <script
                                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                              data-key="pk_test_51Gx4RHGN82mlZ9FRpFQJX53WYhxxiNUDyANdIU7JTBOp2VE9UqCU7Me2YLu0pGdbhmFCfhBU670F9cTdzcKVH6s200EvaEy45p"
                                              data-amount="999"
                                              data-name="Stripe.com"
                                              data-description="Widget"
                                              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                              data-locale="auto"
                                              data-zip-code="true">
                                          </script>
                                      </form>
                                  </span>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Books products grid -->
</div>
@endsection
