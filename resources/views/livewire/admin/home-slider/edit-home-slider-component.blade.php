<div>

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.homeSliders')}}" class="nav-link active">{{__('homeSliders')}} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.homeSliders')}}" class="nav-link ">{{$title}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="update" enctype="multipart/form-data">

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">{{__('new_image')}}</label>
                                    <input type="file" class="input-file" name="new_image"  wire:model="new_image" />
                                </div>
                                @if ($new_image)
                                    <div class="form-group col-md-4">
                                            
                                        <img src="{{asset($new_image->temporaryUrl())}}" />
                                    </div>
                                @else 
                                    <div class="form-group col-md-4">
                                        
                                        <img src="{{asset($image)}}" />
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('title')}}</label>
                                    <input type="text" class="form-control" id="title" name="title" wire:model.lazy="title"
                                        wire:keyup="generateSlug">
                                    @error('title') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subtitle">{{__('subtitle')}}</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" wire:model.lazy="subtitle">
                                    @error('subtitle') <span class="error">{{ $message }}</span> @enderror

                                </div>
                              
                            </div>

                            <div class="row">
                               
                                
                                <div class="form-group col-md-4">
                                    <label for="link">{{__('link')}}</label>
                                    <input type="text" class="form-control" id="link" name="link" wire:model.lazy="link">
                                    @error('link') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">{{__('price')}}</label>
                                    <input type="number" step="any" min="0" class="form-control" id="price"
                                        name="price" wire:model.lazy="price">
                                    @error('price') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="status">{{__('status')}}</label>
                                    <select class="form-control" name="status" wire:model.lazy="status">
                                        <option value="1"> {{__('yes')}}</option>
                                        <option value="0"> {{__('no')}}</option>
                                    </select>
                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

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
</div>

