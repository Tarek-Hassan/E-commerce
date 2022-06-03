<div class="container">
    <div class="row">
  
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Profile
                </div>    
                <form wire:submit.prevent="updateProfile"  enctype="multipart/form-data">
                <div class="panel-body"> 
                    <div class="col-md-4">
                        @if (optional($user->profile)->image||$new_img)
                            {{-- <img src="{{asset(optional($user->profile)->image)}}" width="100%" /> --}}
                            <img src="{{asset(($new_img ? $new_img->temporaryUrl() : optional($user->profile)->image))}}" width="100%" />
                        @else
                            <img src="{{asset('assets/images/profile.png')}}" width="100%" />
                        @endif
                        <label for="image">image</label>
                        <input type="file" wire:model="new_img" />
                        @error('new_img') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b><input type="text" wire:model.lazy="name"/></p>
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                        <p><b>Email: </b>{{$email}}</p>
                        {{-- <p><b>Email: </b><input type="email" wire:model.lazy="email"/></p>
                        @error('email') <span class="error">{{ $message }}</span> @enderror --}}
                        <p><b>phone: </b><input type="text" wire:model.lazy="mobile"/></p>
                        @error('mobile') <span class="error">{{ $message }}</span> @enderror
                        <hr/>
                        <p><b>line1: </b><input type="text" wire:model.lazy="line1"/></p>
                        @error('line1') <span class="error">{{ $message }}</span> @enderror
                        <p><b>line2: </b><input type="text" wire:model.lazy="line2"/></p>
                        @error('line2') <span class="error">{{ $message }}</span> @enderror
                        <p><b>city: </b><input type="text" wire:model.lazy="city"/></p>
                        @error('city') <span class="error">{{ $message }}</span> @enderror
                        <p><b>province: </b><input type="text" wire:model.lazy="province"/></p>
                        @error('province') <span class="error">{{ $message }}</span> @enderror
                        <p><b>country: </b><input type="text" wire:model.lazy="country"/></p>
                        @error('country') <span class="error">{{ $message }}</span> @enderror
                        <p><b>zipcode: </b><input type="text" wire:model.lazy="zipcode"/></p>
                        @error('zipcode') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>  
                
                <div class="text-right m-5">
                        <button type="submit" class=" float-right btn btn-primary">{{__('update')}}</button>
                    </div>
               
            </form>  
            </div>    
        
    </div>    
</div>