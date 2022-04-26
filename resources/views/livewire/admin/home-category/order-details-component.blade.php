<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.orders')}}" class="nav-link active">{{__('orders')}} </a>
                        </li>
                    </ul>
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
                                <td>{{$order->shipping->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$order->shipping->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->shipping->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>line1</th>
                                <td>{{$order->shipping->line1}}</td>
                                <th>line2</th>
                                <td>{{$order->shipping->line2}}</td>
                            </tr>
                            <tr>
                                <th>city</th>
                                <td>{{$order->shipping->city}}</td>
                                <th>province</th>
                                <td>{{$order->shipping->province}}</td>
                            </tr>
                            <tr>
                                <th>country</th>
                                <td>{{$order->shipping->country}}</td>
                                <th>zipcode</th>
                                <td>{{$order->shipping->zipcode}}</td>
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
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                           
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

