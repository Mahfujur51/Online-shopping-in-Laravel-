<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart text-center">${{Cart::total()}}</h4>
                            <br>

                            <div class="btn btn-small btn--dark">
                                <a href="{{ route('cart') }}" class="text-white">View Cart</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>
