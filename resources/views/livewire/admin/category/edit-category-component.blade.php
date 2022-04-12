<div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
              
                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.categories')}}" class="nav-link active">{{__('Categories')}} </a>
                            <a href="#" class="nav-link active">{{$category->name}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="update">
                            <div class="form-group col-md-6">
                                <label for="name">{{__('name')}}</label>
                                <input type="text" class="form-control"   id="name" name="name" wire:model="name" wire:keyup="generateSlug">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">{{__('slug')}}</label>
                                <input type="text" class="form-control" id="slug"  name="slug" wire:model="slug">
                                @error('slug') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-default">{{__('update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
