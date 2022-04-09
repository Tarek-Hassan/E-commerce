<div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
              
                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.categories')}}" class="nav-link active">{{__('Categories')}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="storeCategory">
                            <div class="form-group col-md-6">
                                <label for="name">{{__('name')}}</label>
                                <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">{{__('slug')}}</label>
                                <input type="text" class="form-control" id="slug" name="slug" wire:model="slug">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>