<div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.products')}}" class="nav-link ">{{__('products')}} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.products')}}" class="nav-link active">{{__('edit')}} </a>
                        </li>
                    </ul>
                    
                        <form action="" wire:submit.prevent="update" enctype="multipart/form-data">

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">{{__('product_imge')}}</label>
                                    <input type="file" class="input-file" name="new_img"   wire:model="new_img" />
                                    @error('new_img') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if ($new_img || $image)
                                    <div class="form-group col-md-4">
                                        <img src="{{asset(($new_img ? $new_img->temporaryUrl() : $image))}}" />
                                    </div>
                              
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">{{__('product_gallary')}}</label>
                                    <input type="file" class="input-file" name="image" multiple wire:model="galary_images" />
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if ($galary_images)
                                <div class="form-group col-md-4">
                                    @foreach ($galary_images as $image)
                                    <img src="{{asset($image->temporaryUrl())}}"  width="120px"/> 
                                    @endforeach
                                </div>
                               
                                @elseif($images)
                                <div class="form-group col-md-4">
                                    @foreach ($images as $image)
                                    <img src="{{asset($image)}}"  width="120px"/> 
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{__('name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                                        wire:keyup="generateSlug">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug">{{__('slug')}}</label>
                                    <input type="text" class="form-control" id="slug" name="slug" wire:model="slug">
                                    @error('slug') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="stock_status">{{__('stock_status')}}</label>
                                    <select class="form-control" name="stock_status" wire:model="stock_status">
                                        <option value="instock"> {{__('instock')}}</option>
                                        <option value="outofstock"> {{__('outofstock')}}</option>
                                    </select>
                                    @error('stock_status') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="category">{{__('category')}}</label>
                                    <select class="form-control" name="category_id" wire:model="category_id">
                                        <option> {{__('select_Category')}}</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sub_category">{{__('sub_category')}}</label>
                                    <select class="form-control" name="sub_category_id" wire:model="sub_category_id">
                                        <option> {{__('select_sub_category')}}</option>
                                        @foreach ($subcategories as $sub_category)
                                        <option value="{{$sub_category->id}}"> {{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="regular_price">{{__('regular_price')}}</label>
                                    <input type="number" step="any" min="0" class="form-control" id="regular_price"
                                        name="regular_price" wire:model="regular_price">
                                        @error('regular_price') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sale_price">{{__('sale_price')}}</label>
                                    <input type="number" step="any" min="0" class="form-control" id="sale_price"
                                        name="sale_price" wire:model="sale_price">
                                        @error('sale_price') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="quantity">{{__('quantity')}}</label>
                                    <input type="number" min="1" class="form-control" id="quantity" name="quantity"
                                        wire:model="quantity">
                                        @error('quantity') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="SKU">{{__('SKU')}}</label>
                                    <input type="text" class="form-control" id="SKU" name="SKU" wire:model="SKU">
                                    @error('SKU') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="featured">{{__('featured')}}</label>
                                    <select class="form-control" name="featured" wire:model="featured">
                                        <option value="1"> {{__('yes')}}</option>
                                        <option value="0"> {{__('no')}}</option>
                                    </select>
                                    @error('featured') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="short_description">{{__('short_description')}}</label>
                                    <textarea type="text" class="form-control" id="short_description"
                                        name="short_description" wire:model="short_description" row="3"></textarea>
                                    </div>
                                    @error('short_description') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="description">{{__('description')}}</label>
                                    <textarea class="form-control " name="description" id="description" wire:model="description"
                                        row="3"></textarea>
                                    </div>
                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="attribute">{{__('attribute')}}</label>
                                    <select class="form-control"   wire:model.lazy="attr">
                                        <option> {{__('select_attribute')}}</option>
                                        @foreach ($attributes as $attribute)
                                            <option value="{{$attribute->id}}"> {{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>

                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info mt-2" wire:click.prevent="add"> Add</button>
                                </div>
                            </div>
                            @foreach ($inputs as $key => $value )
                                <div class="row">
    
                                    <div class="row col-md-5">
                                        <label for="attributes">{{$attributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                        <input type="text"class="form-control"  placeholder="{{$attributes->where('id',$attribute_arr[$key])->first()->name}}"
                                            wire:model="attribute_values.{{$value}}">
                                    
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-info mt-2" wire:click.prevent="removeAttribute('{{$key}}')"> remove</button>
                                    </div>
                                    
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-default">{{__('update')}}</button>
                                </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

<script>
     tinymce.init({
      selector: 'textarea#short_description',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
      setup:function(editor){
        editor.on('Change',function(e){
              tinyMCE.triggerSave();
              let sd=$('#short_description').val();
              @this.set('short_description',sd);
          });


      }
    });
     tinymce.init({
      selector: 'textarea#description',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
      setup:function(editor){
        editor.on('Change',function(e){
              tinyMCE.triggerSave();
              let d=$('#description').val();
              @this.set('description',d);
          });


      }
    });

</script>
@endpush


