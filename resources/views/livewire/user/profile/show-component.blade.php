<div class="container">
    <div class="row">
  
        
            <div class="panel panel-default">
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
                <div class="panel-heading">
                    Profile
                </div>  

                <div class="panel-body"> 
                    <div class="text-right mb-5">
                        <a href="{{route('user.edit-profile')}}" class=" float-right btn btn-primary">{{__('Edit Profile')}}</a>
                    </div>
                    <div class="col-md-4">
                        {{-- @if (optional($user->profile)->image||$new_img) --}}
                        @if (optional($user->profile)->image)
                            <img src="{{asset(optional($user->profile)->image)}}" width="100%" />
                            {{-- <img src="{{asset(($new_img ? $new_img->temporaryUrl() : optional($user->profile)->image))}}" width="100%" /> --}}
                        @else
                            <img src="{{asset('assets/images/profile.png')}}" width="100%" />
                        @endif
                        {{-- <label for="image">image</label>
                        <input type="file" wire:model="new_img" />
                        @error('new_img') <span class="error">{{ $message }}</span> @enderror --}}
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b>{{$user->name}}</p>
                        <p><b>Email: </b>{{$user->email}}</p>
                        <p><b>phone: </b>{{optional($user->profile)->mobile}}</p>
                        <hr/>
                        <p><b>line1: </b>{{optional($user->profile)->line1}}</p>
                        <p><b>line2: </b>{{optional($user->profile)->line2}}</p>
                        <p><b>city: </b>{{optional($user->profile)->city}}</p>
                        <p><b>province: </b>{{optional($user->profile)->province}}</p>
                        <p><b>country: </b>{{optional($user->profile)->country}}</p>
                        <p><b>zipcode: </b>{{optional($user->profile)->zipcode}}</p>
                    </div>

                </div>    
            </div>    
        
    </div>    
</div>