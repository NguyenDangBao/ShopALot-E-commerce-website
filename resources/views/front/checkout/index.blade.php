

@extends('front.layout.master')
@section('title', 'Check Out')

@section('body')

<!--    Shopping cart section begin-->
<section class="checkout-section spad">
    <div class="container">
        <form action=""  method="Post" class="checkout-form">
            @csrf
            <div class="row">

                @if(Cart::count()>0)
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="./account/login" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                            <div class="col-lg-6">
                                <label for="fir">First Name <span></span></label>
                                <input type="text" id="fir" name="first_name" value="{{Auth::user()->name ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">last Name <span></span></label>
                                <input type="text" id="last" name="last_name">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name<span></span></label>
                                <input type="text" id="cun-name" name="company_name" value="{{Auth::user()->company_name ?? ''}}" >
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span></span></label>
                                <input type="text" id="cun" name="country" value="{{Auth::user()->country ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span></span></label>
                                <input type="text" id="street" name="street_address" class="street-first" value="{{Auth::user()->street_address ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode/ ZIP(optional) <span></span></label>
                                <input type="text" id="zip" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City <span></span></label>
                                <input type="text" id="town" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address <span></span></label>
                                <input type="text" id="email" name="email" value="{{Auth::user()->email ?? ''}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span></span></label>
                                <input type="text" id="phone" name="phone" value="{{Auth::user()->phone ?? ''}}">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach($carts as $cart)
                                        <li class="fw-normal">{{$cart->name}} x {{$cart->qty}} <span>${{$cart->price * $cart->qty}}</span></li>

                                    @endforeach
                                    <li class="fw-normal">Subtotal <span>${{$subtotal}}</span></li>
                                    <li class="total-price">Total <span>${{$total}}</span></li>
                                </ul>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            COD
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                           Online Payment
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">
                                        Place Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h4>Your Cart is Empty.</h4>
                    </div>

                @endif
            </div>
        </form>
    </div>
</section>
    <!--    Shopping cart section End-->

@endsection
