<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Change Password
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
                        <form  class="form-horizontal" wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="current password" name="current_password" class="form-control input-md" wire:model="current_password">
                                     @error('current_password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">new Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="new password" name="new_password" class="form-control input-md"  wire:model="password">
                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">confirm Password</label>
                                <div class="col-md-4">
                                    <input type="password" placeholder="confirm password" name="confirm_password" class="form-control input-md"  wire:model="password_confirmation">
                                     @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
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
