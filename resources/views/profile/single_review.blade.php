<div class="single-review {{ $review->is_published ? '' : 'singleBlockedReview' }}">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                @for($i=1;$i < 6; $i++)
                    @if($i <= $review->rating)
                        &#9733;
                    @else
                        &#9734;
                    @endif
                @endfor
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around w-100">
            <div>
                <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="likes"
                       id="like-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"
                       @auth @else disabled @endauth/>
            </div>
            <div>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="dislikes"
                       id="dislike-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/negative_like.png') }}"
                       @auth @else disabled @endauth/>
                <label for="dislike-{{ $review->id }}">{{ $review->dislikes }}</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center w-100">
            <img id="congratulation-img" src="{{ App\Services\CongratsService::getUserCongratulation($review->user) }}" height="35px" width="30px"/>
        </div>
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex flex-row">
            <div class="profile-single-review-content">
                <div class="single-review-name">
                    <div class="single-review-logo-name">
                        <span>{{ $review->full_name }}</span>
                        @if($review->logo->count())
                            <img src="{{ asset($review->logo->first()->getImageUrl()) }}" height="50px" width="50px"/>
                        @endif
                    </div>
                    <div>
                        <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                    </div>
                </div>
                <div class="profile-single-review-review">
                    @if($review->characteristics->isNotEmpty())
                        <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
                    @endif
                        <p>
                            @if($review->video)
                                <video width="135" height="100" controls>
                                    <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                                    {{--<source src="movie.ogg" type="video/ogg">--}}
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="{{ asset('storage/images/default_img_video.png') }}"
                                     alt="photo"
                                     width="135"
                                     height="100">
                            @endif
                            @if($review->image)
                                <img src="{{ $review->image->getResizeImageUrl() }}"
                                     alt=""
                                     data-full-size-src="{{ $review->image->getImageUrl() }}"
                                     class="reviewImage"
                                     style="cursor: pointer;"
                                     id="myImg"
                                     width="100"
                                     height="100">
                            @else
                                <img src="{{ asset('storage/images/default_img.png') }}"
                                     alt=""
                                     width="100"
                                     height="100">
                            @endif
                            {{ $review->review }}
                        </p>
                </div>
            </div>
            <div class="profile-single-review-button {{ $review->is_published ?: 'profile-single-review-blocked' }}">
                @if(!$review->is_published)
                    <span>Review blocked due to complaints.</span>
                @else
                    <a type="button"
                        href="{{ route('profile-reviews.edit', $review->id) }}">
                        Edit
                    </a>
                    <a data-toggle="modal"
                       type="button"
                       id="profileCommentButton-{{ $review->id }}">
                        Reply
                    </a>
                    <a data-toggle="modal"
                       type="button"
                       class="deleteReview"
                       data-review-id="{{ $review->id }}"
                       data-review-name="{{ $review->full_name }}"
                       data-target="#deleteReviewModal">
                        Delete
                    </a>
                @endif
            </div>
        </div>
        @if(!$review->is_published)
            <div class="w-25">
                <a type="button"
                   class="otherButton"
                   id="profileComplaintButton-{{ $review->id }}"
                   data-complains="{{ $review->complains->count() }}">
                    Complains ({!! $review->complains->count() !!})
                </a>
            </div>
        @endif
        <div class="w-100 profile-review-item">
            @foreach($review->complains as $complain)
                <div class="complain" style="display: none">
                    <span>{!! $complain->full_name !!}</span>
                    <span>{!! $complain->pivot->msg !!}</span>
                </div>
            @endforeach
            @foreach($review->comments as $comment)
                <div class="comment" style="display: none">
                    <span>{!! $comment->body !!}</span>
                    <div class="d-flex flex-row justify-content-around w-25">
                        <div>
                            <label for="comment-like-{!! $comment->id !!}">{!! $comment->likes !!}</label>
                            <input id="comment-like-{!! $comment->id !!}"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-comment-id="{!! $comment->id !!}"
                                   data-reaction-name="likes"
                                   src="{{ asset('images/positive_like.png') }}"
                                   @auth @else disabled @endauth/>
                        </div>
                        <div>
                            <input id="comment-dislike-{!! $comment->id !!}"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-comment-id="{!! $comment->id !!}"
                                   data-reaction-name="dislikes"
                                   src="{{ asset('images/negative_like.png') }}"
                                   @auth @else disabled @endauth/>
                            <label for="comment-dislike-{!! $comment->id !!}">{!! $comment->dislikes !!}</label>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="comment-example" style="display: none">
                    <span></span>
                    <div class="d-flex flex-row justify-content-around w-25">
                        <div>
                            <label for="comment-like"></label>
                            <input id="comment-like"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-review-id=""
                                   data-reaction-name="likes"
                                   src="{{ asset('images/positive_like.png') }}"
                                   @auth @else disabled @endauth/>
                        </div>
                        <div>
                            <input id="comment-dislike"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-review-id=""
                                   data-reaction-name="dislikes"
                                   src="{{ asset('images/negative_like.png') }}"
                                   @auth @else disabled @endauth/>
                            <label for="comment-like"></label>
                        </div>
                    </div>
                </div>
            <div class="review-textarea" data-review-id="{{ $review->id }}">
                <div class="col-md-9">
                        <textarea name="review"
                                  type="text"
                                  id="review-text"
                                  placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                </div>
                <div class="col-md-3">
                    <button class="otherButton" id="addCommentButton-{{ $review->id }}">
                        Add Comment
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
