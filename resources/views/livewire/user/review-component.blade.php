<div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content-item " id="review">
									
                    <div class="wrap-review-form">
                        
                        <div id="comments">
                            <h2 class="woocommerce-Reviews-title">Add Review For <span>{{optional($orderItem->product)->name}}</span></h2>
                            <ol class="commentlist">
                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                    <div id="comment-20" class="comment_container"> 
                                        <img alt="" src="{{asset(optional($orderItem->product)->image)}}" height="80" width="80">
                                        <div class="comment-text">
                                            <div class="star-rating">
                                                <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                                            </div>
                                                <p class="meta"> 
                                                    <strong class="woocommerce-review__author">{{optional($orderItem->product)->name}}</strong>   
                                                </p>

                                            {{-- @foreach ($orderItem->reviews as $review )
                                                
                                                <p class="meta"> 
                                                    <strong class="woocommerce-review__author">admin</strong> 
                                                    <span class="woocommerce-review__dash">–</span>
                                                    <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$review->created_at}}</time>
                                                </p>
                                                <div class="description">
                                                    <p>{{$review->comment}}</p>
                                                </div>
                                            @endforeach --}}
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div><!-- #comments -->

                        <div id="review_form_wrapper">
                            <div id="review_form">
                                @if (Session::has('success_message'))
                                    <div class="alert alert-success">
                                        <strong>{{__('success')}} </strong>{{Session::get('success_message')}}
                    
                                    </div>
                                @endif
                                <div id="respond" class="comment-respond"> 

                                    <form id="commentform" wire:submit.prevent="addReview" class="comment-form" novalidate="">
                                       
                                        <div class="comment-form-rating">
                                            <span>Your rating</span>
                                            <p class="stars">
                                                
                                                <label for="rated-1"></label>
                                                <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                                <label for="rated-2"></label>
                                                <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                                <label for="rated-3"></label>
                                                <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                                <label for="rated-4"></label>
                                                <input type="radio" id="rated-4" name="rating" value="4"wire:model="rating">
                                                <label for="rated-5"></label>
                                                <input type="radio" id="rated-5" name="rating" value="5" wire:model="rating" checked="checked">
                                            </p>
                                            @error('rating') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                      
                                        <p class="comment-form-comment">
                                            <label for="comment">Your review <span class="required">*</span>
                                            </label>
                                            <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                            @error('comment') <span class="error">{{ $message }}</span> @enderror
                                        </p>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                        </p>
                                    </form>

                                </div><!-- .comment-respond-->
                            </div><!-- #review_form -->
                        </div><!-- #review_form_wrapper -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
