<nav class="navbar navbar-expand-lg">
    <h3>Nav Bar</h3>
</nav>
{{-- <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="{{ route('index') }}">
    <img class="logo_dark" style="width: 250px;" src={{ asset('images/defaults/bnaglaBazar9.png') }} alt="logo" />

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
      <span class="ion-android-menu"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
          <li class="dropdown">
              <a class="nav-link" href="{{ route('index') }}">Home</a>
          </li>
          <li>
              <a class=" nav-link nav_item" href="{{ route('products') }}">Products</a>
          </li>
          <li class="dropdown dropdown-mega-menu">
              <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Category</a>
              <div class="dropdown-menu">
                  <ul class="mega-menu d-lg-flex">
                    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                    <li class="mega-menu-col col-lg-3">
                        <ul>
                            <li class="dropdown-header">{{ $parent->name }}</li>
                            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                                <li><a class="dropdown-item nav-link nav_item" href="{{ route('categories.show', $child->id) }}">{{ $child->name }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    @endforeach


                  </ul>
                  <div class="d-lg-flex menu_banners">
                      <div class="col-sm-4">
                          <div class="header-banner">
                              <img src="https://images.unsplash.com/photo-1489367874814-f5d040621dd8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=729&q=80" alt="menu_banner1">
                              <div class="banne_info">
                                  <h6>10% Off</h6>
                                  <h4>New Arrival</h4>
                                  <a href="{{ route('products') }}">Shop now</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="header-banner">
                              <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80" alt="menu_banner2">
                              <div class="banne_info">
                                  <h6>15% Off</h6>
                                  <h4>Men's Fashion</h4>
                                  <a href="{{ route('categories.show', 3) }}">Shop now</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="header-banner">
                              <img src="https://images.unsplash.com/photo-1472162072942-cd5147eb3902?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="menu_banner3">
                              <div class="banne_info">
                                  <h6>23% Off</h6>
                                  <h4>Kids Fashion</h4>
                                  <a href="{{ route('categories.show', 17) }}">Shop now</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </li>
          <li>
              <a class="nav-link nav_item" href="{{ route('contact') }}">Contact Us</a>
          </li>

      </ul>
  </div>

  <ul class="navbar-nav attr-nav align-items-center">
      <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
          <div class="search_wrap">
              <span class="close-search"><i class="ion-ios-close-empty"></i></span>
              <form action="{!! route('search') !!}" method="get">
                  <input type="text" placeholder="Search Products" class="form-control" name="search" id="search_input">
                  <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
              </form>
          </div><div class="search_overlay"></div>
      </li>
      <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count" id="cart_count">{{ App\Models\Cart::totalItems() }}</span></a>
          <div class="cart_box dropdown-menu dropdown-menu-right">
              <ul class="cart_list">
                  @php
                        $total_price = 0;
                  @endphp
                @foreach (App\Models\Cart::totalCarts() as $cart)
                    <li>
                        <a href="#" class="item_remove"><i class="ion-close"></i></a>
                        <a href="{{ route('products.show', $cart->product->slug) }}">
                            @if ($cart->product->images->count() > 0)
                                <img src="{{ asset('images/'. $cart->product->images->first()->image) }}">
                             @endif
                            {{ $cart->product->title }}
                        </a>
                        <span class="cart_quantity"> {{ $cart->product_quantity }} X <span class="cart_amount"> <span class="price_symbole">$</span></span>{{ $cart->product->price }}</span>
                    </li>
                    @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                    @endphp
                @endforeach
              </ul>
              <div class="cart_footer">
                  <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>

                    {{ $total_price }}
                    </p>
                  <p class="cart_buttons"><a href="{{ route('carts') }}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="{{ route('checkouts') }}" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
              </div>
          </div>
      </li>
  </ul>
</nav> --}}