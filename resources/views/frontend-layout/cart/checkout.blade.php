@extends('frontend-layout.frontend-auth')
@section('title','Check Out')
@section('content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form class="checkOutForm">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                           <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="address1">
                            </div>

                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <select id="state-dropdown" name="state_id" class="form-control">
                                    <option value="">-- Select State --</option>
                                    @foreach ($states as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div><br/><br/>

                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <select id="city-dropdown" name="city_id" class="form-control">
                                    <option value="">-- Select City --</option>
                                </select>
                            </div><br/><br/>

                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zipcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="ordernote"
                                       placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php
                                    $total=0;
                                    @endphp
                                    @foreach($carts as $cart)
                                    <li>{{$cart->product->name}} <span>  ₹ {{$cart->product->price * $cart->qty}}</span></li>
                                        @php
                                            $total+=$cart->product->price * $cart->qty;
                                        @endphp
                                    @endforeach
                                </ul>
{{--                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>--}}
                                <div class="checkout__order__total">Total <span>₹ {{$total}}</span></div>

                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $(".checkOutForm").validate({
                rules:
                    {
                        address:
                            {
                                required: true
                            },

                    },
                messages:
                    {
                        address:
                            {
                                required: "Address is required"
                            },

                    },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                    $('.help-block').css('color', 'red');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $('.site-btn').on('click',function (e){
                e.preventDefault();
                if ($(".checkOutForm").valid()) {
                $.ajax({

                    type: "POST",

                    url: "{{route('orderPlaced')}}",

                    data: new FormData($('.checkOutForm')[0]),

                    processData: false,

                    contentType: false,

                    success: function(data) {

                        if (data.status === 'success') {

                            location.reload();

                            toastr["success"]("Order Placed Successfully", "Success");



                        } else if (data.status === 'error') {
                            location.reload();

                            toastr["error"]("Something went wrong", "Error");

                        }  else if (data.status === 'type_code'){

                            toastr["error"]("Duplicate code!", "Error");

                            $('.change_button').prop('disabled', false);

                            $('.change_button').find('.change_spin').addClass('d-none');
                        }
                        else if (data.status === 'email_exists') {
                            toastr["error"]("Duplicate Email!", "Error");
                            // location.reload();
                            $('.change_button').prop('disabled', false);
                            $('.change_button').find('.change_spin').addClass('d-none');
                        }

                    },
                    error :function( data ) {
                        console.log(data.status)
                        if(data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors.errors, function (key, value) {
                                console.log(key+ " " +value);
                                $('#'+key).addClass('is-invalid');
                                $('#'+key).parent().append('<div id="'+key+'-error" class="error invalid-feedback ">'+value+'</div>');
                            });

                        }

                    }

                });
                } else {
                    e.preventDefault();
                }
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('front/api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $("#city-dropdown").niceSelect('update');
                    }
                });
            });

        });
    </script>
@endpush
