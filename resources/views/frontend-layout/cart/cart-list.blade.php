@extends('frontend-layout.frontend-auth')
@section('title','Cart List')
@section('content')
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @forelse($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img height="100" src="{{$cart->product->productImages()->first() ? asset($cart->product->productImages()->first()->image) : Null}}" alt="">
                                    <h5>{{$cart->product->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ₹ {{$cart->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty" data-product_id="{{$cart->product_id}}">
                                            <input type="text" class="cartQty_{{$cart->product_id}}" data-id="{{$cart->id}}" data-product_id="{{$cart->product_id}}" value="{{$cart->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total ">
                                    ₹ <label class="cart_total_{{$cart->product_id}}">{{$cart->qty * $cart->product->price}}</label>
                                    @php
                                        $total+=$cart->qty * $cart->product->price;
                                    @endphp
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close" data-id="{{$cart->product_id}}"></span>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span class="total_amount">₹ {{$total}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {

            $('.dec').on("click", function (e) {

                var id = $(this).closest(".pro-qty").data('product_id');
                $.ajax({

                    type: "POST",

                    url: "{{route('front.addCart')}}",

                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                        'type': 'dec'
                    },

                    cache: false,

                    success: function (data) {

                        if (data.status === 'success') {
                            if (data.cart == null) {
                                location.reload();
                            } else {
                                $('.cartQty_'+id).val('')
                                $('.cartQty_'+id).val(data.cart.qty)
                                $('.cart_total_'+id).text("")
                                $('.cart_total_'+id).text(data.cart.qty * data.cart.price)
                                $('.total_amount').text("")
                                $('.total_amount').text(data.total)
                            }


                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        } else if (data.status === 'type_code') {

                            toastr["error"]("Duplicate code!", "Error");

                            $('.change_button').prop('disabled', false);

                            $('.change_button').find('.change_spin').addClass('d-none');
                        } else if (data.status === 'email_exists') {
                            toastr["error"]("Duplicate Email!", "Error");
                            // location.reload();
                            $('.change_button').prop('disabled', false);
                            $('.change_button').find('.change_spin').addClass('d-none');
                        }

                    },
                    error: function (data) {
                        console.log(data.status)
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key + " " + value);
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parent().append('<div id="' + key + '-error" class="error invalid-feedback ">' + value + '</div>');
                            });

                        }

                    }

                });
            });
            $('.inc').on("click", function (e) {
                var id =$(this).closest(".pro-qty").data('product_id');

                $.ajax({

                    type: "POST",

                    url: "{{route('front.addCart')}}",

                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                        'type': 'inc'
                    },

                    cache: false,

                    success: function (data) {

                        if (data.status === 'success') {
                            if (data.cart == null) {
                                location.reload();
                            } else {
                                $('.cartQty_'+id).val('')
                                $('.cartQty_'+id).val(data.cart.qty)
                                $('.cart_total_'+id).text("")
                                $('.cart_total_'+id).text(data.cart.qty * data.cart.price)
                                $('.total_amount').text("")
                                $('.total_amount').text(data.total)
                            }

                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        } else if (data.status === 'type_code') {

                            toastr["error"]("Duplicate code!", "Error");

                            $('.change_button').prop('disabled', false);

                            $('.change_button').find('.change_spin').addClass('d-none');
                        } else if (data.status === 'email_exists') {
                            toastr["error"]("Duplicate Email!", "Error");
                            // location.reload();
                            $('.change_button').prop('disabled', false);
                            $('.change_button').find('.change_spin').addClass('d-none');
                        }

                    },
                    error: function (data) {
                        console.log(data.status)
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key + " " + value);
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parent().append('<div id="' + key + '-error" class="error invalid-feedback ">' + value + '</div>');
                            });

                        }

                    }

                });
            });
            $('.icon_close').on("click", function (e) {
                // alert($(this).data('id'))
                var id =$(this).data('id');

                $.ajax({

                    type: "POST",

                    url: "{{route('front.addCart')}}",

                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': id,
                        'type': 'del'
                    },

                    cache: false,

                    success: function (data) {

                        if (data.status === 'success') {
                            if (data.cart == null) {
                                location.reload();
                            } else {
                                $('.cartQty_'+id).val('')
                                $('.cartQty_'+id).val(data.cart.qty)
                                $('.cart_total_'+id).text("")
                                $('.cart_total_'+id).text(data.cart.qty * data.cart.price)
                            }

                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        } else if (data.status === 'type_code') {

                            toastr["error"]("Duplicate code!", "Error");

                            $('.change_button').prop('disabled', false);

                            $('.change_button').find('.change_spin').addClass('d-none');
                        } else if (data.status === 'email_exists') {
                            toastr["error"]("Duplicate Email!", "Error");
                            // location.reload();
                            $('.change_button').prop('disabled', false);
                            $('.change_button').find('.change_spin').addClass('d-none');
                        }

                    },
                    error: function (data) {
                        console.log(data.status)
                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key + " " + value);
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parent().append('<div id="' + key + '-error" class="error invalid-feedback ">' + value + '</div>');
                            });

                        }

                    }

                });
            });
        });
    </script>
@endpush
