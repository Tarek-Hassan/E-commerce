<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Setting
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>{{__('success')}} </strong>{{Session::get('success_message')}}
                            </div>
                        @endif
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger">
                                <strong>{{__('error')}}  </strong>{{Session::get('error_message')}}
        
                            </div>
                        @endif
                        <form  class="form-horizontal" wire:submit.prevent="store">
                            <div class="form-group">
                                <label class="col-md-4 control-label">email</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="email" name="email" class="form-control input-md" wire:model="email">
                                     @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">phone</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="phone" name="phone" class="form-control input-md" wire:model="phone">
                                     @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">phone2</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="phone2" name="phone2" class="form-control input-md" wire:model="phone2">
                                     @error('phone2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">address</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="address" name="address" class="form-control input-md" wire:model="address">
                                     @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">map</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="map" name="map" class="form-control input-md" wire:model="map">
                                     @error('map') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">twitter</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="twitter" name="twitter" class="form-control input-md" wire:model="twitter">
                                     @error('twitter') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">facebook</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="facebook" name="facebook" class="form-control input-md" wire:model="facebook">
                                     @error('facebook') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">pinterest</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="pinterest" name="pinterest" class="form-control input-md" wire:model="pinterest">
                                     @error('pinterest') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">instagram</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="instagram" name="instagram" class="form-control input-md" wire:model="instagram">
                                     @error('instagram') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">youtube</label>
                                <div class="col-md-4">
                                    <input type="link" placeholder="youtube" name="youtube" class="form-control input-md" wire:model="youtube">
                                     @error('youtube') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <label class="col-md-4 control-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
