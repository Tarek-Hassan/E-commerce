<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                       
                        @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong>{{Session::get('success_message')}}
        
                        </div>
                    @endif
                        @if (Session::has('error_message'))
                        <div class="alert alert-danger">
                            <strong>Error </strong>{{Session::get('error_message')}}
        
                        </div>
                    @endif
                        <div class="table-responsive">
                            <div class="col-md-12 text-right mb-5">
                            <a href="{{route('admin.addproduct')}}" class="btn btn-primary">{{__('create_new')}}</a>
                            </div>
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th><span>#</span></th>
                                        <th><span>Image</span></th>
                                        <th><span>Name</span></th>
                                        <th><span>Slug</span></th>
                                        <th><span>Stock</span></th>
                                        <th><span>price</span></th>
                                        <th><span>Category</span></th>
                                        <th><span>Date</span></th>
                                        <th><span>Action</span></th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @forelse ($items as $item )

                                    <tr class="cell-1">
                                        <td class="text-center">{{$item->id}}</td>
                                        <td><img src="{{asset($item->image)}}" alt=""></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td class="text-center">
                                            {!!$item->status()!!}
                                        </td>
                                        <td>{{number_format($item->regular_price,2)}}</td>
                                        <td>{{optional($item->category)->name}}</td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                        <td>

                                              
                                                    <a href="{{route('admin.editproduct',['slug'=>$item->slug])}}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="edit">
                                                        <i class="far fa-edit fa-2x text-success"></i>
                                                    </a>



                                                    <a href="#" wire:click.prevent="destroyproduct({{$item->id}})" >
                                                        <i class="fa-solid fa-2x fa-trash-can text-danger"></i>
                                                    </a>
                                               

                                           
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">No Product</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="wrap-pagination-info">
                                {{$items->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

