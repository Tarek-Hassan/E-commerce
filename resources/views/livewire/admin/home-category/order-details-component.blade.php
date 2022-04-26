<div>
    <div class="wrap-address-billing">
        <h3 class="box-title">Shipping  Address</h3>
            <div class="billing-address">
                <p class="row-in-form">
                    <label for="fname">first name<span>*</span></label>
                    <input  type="text" wire:model.lazy="firstname"  value="" placeholder="Your name">
                   
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span>*</span></label>
                    <input  type="text" wire:model.lazy="lastname" value="" placeholder="Your last name">
                    
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                    <input  type="email" wire:model.lazy="email" value="" placeholder="Type your email">
                   
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span>*</span></label>
                    <input  type="number" wire:model.lazy="mobile" value="" placeholder="10 digits format">
                    
                </p>
                <p class="row-in-form">
                    <label for="line1">line1:</label>
                    <input  type="text" wire:model.lazy="line1" value="" placeholder="Street at apartment number">
                     
                </p>
                <p class="row-in-form">
                    <label for="line2">line2:</label>
                    <input  type="text" wire:model.lazy="line2" value="" placeholder="Street at apartment number">
                   
                </p>
                <p class="row-in-form">
                    <label for="country">Country<span>*</span></label>
                    <input  type="text" wire:model.lazy="country" value="" placeholder="United States">
                   
                </p>
            
                <p class="row-in-form">
                    <label for="province">province<span>*</span></label>
                    <input  type="text" wire:model.lazy="province" value="" placeholder="province name">
                     
                </p>
                <p class="row-in-form">
                    <label for="city">Town / City<span>*</span></label>
                    <input  type="text" wire:model.lazy="city" value="" placeholder="City name">
                     
                </p>
                <p class="row-in-form">
                    <label for="zip-code">Postcode / ZIP:</label>
                    <input  type="number" wire:model.lazy="zipcode" value="" placeholder="Your postal code">
                   
                </p>
            </div>
    </div>
</div>
