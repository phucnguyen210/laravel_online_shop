@include('includes.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-9 pt-4">
        <div class="container" id="quick_cart">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="">
                                
                                @if(count($cartItems) > 0)
                                    @foreach($cartItems as $cartItem)
                                        <tr">
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset($cartItem['img']) }}" width="50" height="50">
                                                    <h2>{{ $cartItem['name'] }}</h2>
                                                </div>
                                            </td>
                                            <td>{{ $cartItem['price'] }}$</td>
                                            <td>
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    {{-- <div class="input-group-btn">
                                                        <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 btn-decrease">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div> --}}
                                                    <input type="number" value="{{ $cartItem['quantity'] }}" class="form-control form-control-sm border-0 text-center cart_quantity_update"  data-id="{{$cartItem['id']}}" min="1">
                                                    {{-- <div class="input-group-btn">
                                                        <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 btn-increase">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div> --}}
                                                </div>
                                            </td>
                                            <td class="item-total">{{ $cartItem['price'] * $cartItem['quantity'] }}$</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $cartItem['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Giỏ hàng của bạn đang trống</td>
                                    </tr>
                                @endif
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">            
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summary</h2>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div id="cart-total">
                                    {{$subtotal}}$
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div>Shipping</div>
                                <div>$20</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div id="grand-total">
                                    {{ $total }}$
                                </div>
                            </div>
                            <div class="pt-5">
                                <a href="{{route('checkout')}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>     
                    <div class="input-group apply-coupon mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control">
                        <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function cart(){
        $.ajax({
            url: '{{url(route('cart'))}}',
            method: 'GET',
            success:function(data){
                $('#quick_cart').html(data);
            }
        });
    }

    $(document).on('input','.cart_quantity_update', function(){
        var quantity = $(this).val();
        var id = $(this).data('id');
        var _token = $('input[name="_token"]').val();
        // alert(quantity);
        // alert(id);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: 'POST',
            data: {quantity:quantity, id:id, _token: _token},
            success:function(){
                cart();
            }
        });
    });

    
</script>
@include('includes.footer')
