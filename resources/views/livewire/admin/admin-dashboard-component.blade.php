<div class="content">   
    <style>
        .content {
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Revenue</span>
                    <span class="icon-stat-value">${{$totalRevenu}}</span>
                  </div>   
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>    
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Sales</span>
                    <span class="icon-stat-value">{{$totalSales}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>   
              </div>
            </div>
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Today Revenue</span>
                    <span class="icon-stat-value">${{$todayRevenu}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Today Sales</span>
                    <span class="icon-stat-value">{{$todaySales}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>    
              </div>    
            </div>    
          </div>   
          {{--  --}}
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       Last Orders
                        </div>    
                        <div class="panel-body"> 
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th><span>{{__('order_no')}}</span></th>
                                        <th><span>{{__('order_date')}}</span></th>
                                        <th><span>{{__('first_name')}}</span></th>
                                        <th><span>{{__('last_name')}}</span></th>
                                        <th><span>{{__('subtotal')}}</span></th>
                                        <th><span>{{__('tax')}}</span></th>
                                        <th><span>{{__('discount')}}</span></th>
                                        <th><span>{{__('total')}}</span></th>
                                        <th><span>{{__('mobile')}}</span></th>
                                        <th><span>{{__('email')}}</span></th>
                                        <th><span>{{__('zipcode')}}</span></th>
                                        <th><span>{{__('status')}}</span></th>
                                        <th><span>{{__('action')}}</span></th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @forelse ($orders as $item )

                                    <tr class="cell-1">
                                        <td class="text-center">{{$item->id}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->firstname}}</td>
                                        <td>{{$item->lastname}}</td>
                                        <td>${{number_format($item->subtotal,2)}}</td>
                                        <td>${{number_format($item->tax,2)}}</td>
                                        <td>${{number_format($item->discount,2)}}</td>
                                        <td>${{number_format($item->total,2)}}</td>
                                        <td>{{$item->mobile}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->zipcode}}</td>
                                        <td class="text-center">
                                            {!!$item->status()!!}
                                        </td>
                                        <td>

                                              
                                                    <a href="{{route('user.orderDetails',['id'=>$item->id])}}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="edit">
                                                        <i class="fa fa-eye fa-2x text-success"></i>
                                                    </a>
                                               

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">{{__('no_data_found')}}</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>    
                    </div>    
                </div>    
            </div>    
    </div>    
</div>
