<div>

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.attributes')}}" class="nav-link active">{{__('product Attributes')}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="store" enctype="multipart/form-data">

                           

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{__('name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" wire:model="name"
                                       >
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
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
