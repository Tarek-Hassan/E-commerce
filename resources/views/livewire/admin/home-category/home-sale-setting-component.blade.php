<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">

            <div class="rounded">

                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.homeSaleSetting') }}"
                            class="nav-link active">{{ __('homeSaleSetting') }} </a>
                    </li>
                </ul>
                <div class="table-responsive table-borderless">

                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>{{ __('success') }}
                            </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif

                    <form action="" wire:submit.prevent="update" enctype="multipart/form-data">


                        <div class="form-group col-md-6" wire:ignore>
                            <label for="sale_date">{{ __('sale_date') }}</label>
                            <input type="text" class="form-control " id="sale_date" name="sale_date"
                                wire:model="sale_date">
                                @error('sale_date') <span class="error">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">{{ __('status') }}</label>
                            <select class="form-control" name="status" wire:model.lazy="status">
                                <option value="1"> {{ __('active') }}</option>
                                <option value="0"> {{ __('in_active') }}</option>
                            </select>
                            @error('status') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit"
                                class="btn btn-default">{{ __('save') }}</button>
                        </div>


                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
 @push('scripts')
<script>
    $(function(){
        $('#sale_date').datetimepicker({
            format: 'Y-MM-DD h:m:s',

        }).on('dp.change',function(e){
            let data=$('#sale_date').val();
            @this.set('sale_date',data);
        });
    });
</script>
@endpush 

