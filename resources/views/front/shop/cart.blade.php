
@extends('front.layout.master')
@section('title', 'Cart')

@section('body')


    <!--    shopping cart section Begin-->
    <div class="shopping-cart">
        <div class="container">
            <div class="row">

                @if(Cart::count() > 0)
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i onclick="confirm('Are you sure to delete all items in cart?') === true  ? destroyCart() :''"
                                         style="cursor: pointer"  class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)
                                <tr data-rowid="{{$cart->rowId}}">
                                    <td class="cart-pic first-row">
                                        <img style="height:170px;"
                                             src="front/img/products/{{ $cart->options->images[0]->path }}" alt="">
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>{{$cart->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">${{ number_format($cart->price, 2) }}</td>
                                    <td class="qua-col first-row">
                                        <div  class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $cart->qty }}" data-rowid="{{$cart->rowId}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{number_format($cart->price * $cart->qty, 2)}}</td>
                                    <td class="close-td first-row">
                                        <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update Cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>${{$total}}</span></li>
                                    <li class="cart-total">Total <span>${{$subtotal}}</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                <div class="col-lg-12">
                    <h4>Your Cart is empty</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--    shopping cart section End-->


@endsection
