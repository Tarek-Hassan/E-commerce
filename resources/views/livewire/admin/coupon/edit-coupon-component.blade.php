<div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
              
                <div class="rounded">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.coupons')}}" class="nav-link active">{{__('coupons')}} </a>
                        </li>
                    </ul>
                    <div class="table-responsive table-borderless">
                        <form action="" wire:submit.prevent="update">
                            <div class="form-group col-md-6">
                                <label for="code">{{__('code')}}</label>
                                <input type="text" class="form-control" id="code" name="code" wire:model.lazy="code">
                                @error('code') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6" wire:ignore>
                                <label for="expire_date">{{__('expire_date')}}</label>
                                <input type="text" class="form-control" id="expire_date"  name="expire_date" wire:model="expire_date">
                                @error('expire_date') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">{{__('type')}}</label>
                                <select  class="form-control" name="type" wire:model.lazy="type">
                                    <option value="fixed">{{__('fixed')}}</option>
                                    <option value="percent">{{__('percent')}}</option>
                                </select>
                                @error('type') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="value">{{__('value')}}</label>
                                <input type="number" min="0" class="form-control" id="value" name="value" wire:model.lazy="value">
                                @error('value') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cart_value">{{__('cart_value')}}</label>
                                <input type="number" min="0" class="form-control" id="cart_value" name="cart_value" wire:model.lazy="cart_value">
                                @error('cart_value') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-default">{{__('create')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script>
    $(function(){
        $('#expire_date').datetimepicker({
            format: 'Y-MM-DD',

        }).on('dp.change',function(e){
            let data=$('#expire_date').val();
            @this.set('expire_date',data);
        });
    });
</script>
@endpush 
