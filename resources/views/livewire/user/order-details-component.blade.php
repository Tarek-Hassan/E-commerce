<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('user.orders')}}" class="nav-link active">{{__('orders')}} </a>
                        </li>
                    </ul>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Order Details
                            </div>
                            @if ($order->status=='ordered')                               
                                <div class="col-md-6">
                                    <button class="btn btn-danger" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click.prevent="cancelOrder" > Cancel Order</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Order No.</th>
                                <td>{{$order->id}}</td>
                                <th>Order DATE</th>
                                <td>{{$order->created_at}}</td>
                                <th>Status</th>
                                <td>{!!$order->status()!!}</td>
                                <th>{{$order->status." DATE"}}</th>
                                <td>{{$order->statusDate()}}</td>
                                
                            </tr>
                        
                        </table>
                       
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order Items
                    </div>
                    <div class="panel-body">
                        				
                        <div class="wrap-iten-in-cart">
                            
                                <h3 class="box-title">Products Name</h3>
                                <ul class="products-cart">
                                    @foreach ($order->orderItems as $item )
                        
                                        <li class="pr-cart-item">
                                            <div class="product-image">
                                                <figure><img src="{{asset($item->product->image)}}" alt="{{$item->product->name}}"></figure>
                                            </div>
                                            <div class="product-name">
                                                <a class="link-to-product" href="{{route('product.detail',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                            </div>
                                            <div class="price-field produtc-price"><p class="price">${{$item->price}}</p></div>
                                            <div class="quantity">
                                                
                                              <h5> {{$item->quantity}}</h5>

                                            </div>
                                            <div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity}}</p></div>
                                            @if ($order->status=='delivered' && !$item->status)
                                                <div class="price-field sub-total"><p class="price"><a href="{{route('user.orderReview',['id'=>$item->id])}}">Write Review</a></p></div>
                                            @endif
                                        </li>

                                    @endforeach							
                                </ul>
                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">${{$order->tax}}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">discount</span><b class="index">${{$order->discount}}</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">${{$order->total}}</b></p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Billing Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$order->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>line1</th>
                                <td>{{$order->line1}}</td>
                                <th>line2</th>
                                <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                                <th>city</th>
                                <td>{{$order->city}}</td>
                                <th>province</th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th>country</th>
                                <td>{{$order->country}}</td>
                                <th>zipcode</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($order->is_shipping_different)
            
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Shipping Address
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{optional($order->shipping)->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{optional($order->shipping)->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{optional($order->shipping)->mobile}}</td>
                                <th>Email</th>
                                <td>{{optional($order->shipping)->email}}</td>
                            </tr>
                            <tr>
                                <th>line1</th>
                                <td>{{optional($order->shipping)->line1}}</td>
                                <th>line2</th>
                                <td>{{optional($order->shipping)->line2}}</td>
                            </tr>
                            <tr>
                                <th>city</th>
                                <td>{{optional($order->shipping)->city}}</td>
                                <th>province</th>
                                <td>{{optional($order->shipping)->province}}</td>
                            </tr>
                            <tr>
                                <th>country</th>
                                <td>{{optional($order->shipping)->country}}</td>
                                <th>zipcode</th>
                                <td>{{optional($order->shipping)->zipcode}}</td>
                            </tr>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{optional($order->transaction)->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{optional($order->transaction)->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{optional($order->transaction)->created_at}}</td>
                            </tr>
                           
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

