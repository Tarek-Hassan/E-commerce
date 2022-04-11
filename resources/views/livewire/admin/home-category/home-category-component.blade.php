<div>

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">

                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.homeCategories')}}" class="nav-link active">{{__('homeCategories')}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>{{__('success')}} </strong>{{Session::get('success_message')}}
            
                            </div>
                        @endif
                        <form action="" wire:submit.prevent="update" enctype="multipart/form-data">

                            

                                <div class="form-group col-md-6" wire:ignore>
                                    <label for="sel_categories">{{__('sel_categories')}}</label>
                                    <select class="sel_categories form-control"  name="categories[]" wire:model="select_categories" multiple >
                                        @foreach ( $categories as $category )
                                            <option value="{{$category->id}}"> {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="no_of_products">{{__('no_of_products')}}</label>
                                    <input type="number"  min="1" class="form-control" id="no_of_products"
                                        name="no_of_products" wire:model.lazy="no_of_products">
                                </div>
                            

                            
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-default">{{__('update')}}</button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @push('scripts')
<script>
    $(document).ready(function(){
        $('.sel_categories').on('change',function(e){
            let data=$('.sel_categories').val();
            @this.set('select_categories',data);
          

        });
    });
</script>
@endpush 

