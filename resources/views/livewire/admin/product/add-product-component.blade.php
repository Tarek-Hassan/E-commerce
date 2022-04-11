<div>

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.products')}}" class="nav-link active">{{__('products')}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="store" enctype="multipart/form-data">

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">{{__('product_imge')}}</label>
                                    <input type="file" class="input-file" name="image"  wire:model="image" />
                                </div>
                                @if ($image)
                                    <div class="form-group col-md-4">
                                        
                                        <img src="{{asset($image->temporaryUrl())}}" />
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{__('name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                                        wire:keyup="generateSlug">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug">{{__('slug')}}</label>
                                    <input type="text" class="form-control" id="slug" name="slug" wire:model.lazy="slug">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock_status">{{__('stock_status')}}</label>
                                    <select class="form-control" name="stock_status" wire:model.lazy="stock_status">
                                        <option value="instock"> {{__('instock')}}</option>
                                        <option value="outofstock"> {{__('outofstock')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="category">{{__('category')}}</label>
                                    <select class="form-control" name="category_id" wire:model.lazy="category_id">
                                        <option> {{__('select_Category')}}</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="regular_price">{{__('regular_price')}}</label>
                                    <input type="number" step="any" min="0" class="form-control" id="regular_price"
                                        name="regular_price" wire:model.lazy="regular_price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sale_price">{{__('sale_price')}}</label>
                                    <input type="number" step="any" min="0" class="form-control" id="sale_price"
                                        name="sale_price" wire:model.lazy="sale_price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="quantity">{{__('quantity')}}</label>
                                    <input type="number" min="1" class="form-control" id="quantity" name="quantity"
                                        wire:model.lazy="quantity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="SKU">{{__('SKU')}}</label>
                                    <input type="text" class="form-control" id="SKU" name="SKU" wire:model.lazy="SKU">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="featured">{{__('featured')}}</label>
                                    <select class="form-control" name="featured" wire:model.lazy="featured">
                                        <option value="1"> {{__('yes')}}</option>
                                        <option value="0"> {{__('no')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="short_description">{{__('short_description')}}</label>
                                    <input type="text" class="form-control" id="short_description"
                                        name="short_description" wire:model.lazy="short_description">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">{{__('description')}}</label>
                                    <textarea class="form-control" name="description" wire:model.lazy="description"
                                        row="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-default">{{__('create')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

