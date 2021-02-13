<div class="single-review">
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
            <div class="like-container-right">
                <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="likes"
                       id="like-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"
                       @auth @else disabled @endauth/>
            </div>
            <div class="like-container-left">
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
    </div>
    <div class="single-review-content">
        <div class="single-review-name">
            <div class="single-review-logo-name">
                <span>{{ $review->full_name }}</span>
                @if($review->logo->count())
                    <img src="{{ asset($review->logo->first()->getImageUrl()) }}" height="50px" width="50px"/>
                @endif
                <div class="single-review-user-geoposition">
                    <i>{{ $review->getFullGeoposition() }}</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                    <div>
                        <img src="{{ App\Services\CongratsService::getUserCongratulation($review->user) }}" height="25px" width="20px"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-review-review">
            @if($review->characteristics->isNotEmpty())
                <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
            @endif
            <p>
                @if($review->video)
                    <video class="videoPreview" controls>
                        <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                        {{--<source src="movie.ogg" type="video/ogg">--}}
                        Your browser does not support the video tag.
                    </video>
                @else
                    <img src="{{ asset('storage/images/default_img_video.png') }}"
                         alt="photo"
                         class="videoPreview">
                @endif
                @if($review->image)
                    <img src="{{ $review->image->getResizeImageUrl() }}"
                         alt=""
                         data-full-size-src="{{ $review->image->getImageUrl() }}"
                         class="reviewImage previewImage"
                         style="cursor: pointer;"
                         id="myImg">
                @else
                    <img src="{{ asset('storage/images/default_img.png') }}"
                         alt=""
                        class="previewImage">
                @endif
                {{ $review->review }}
            </p>
            <div class="w-100">
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
                @auth()
                    <div class="review-textarea" data-review-id="{{ $review->id }}">
                        <div class="col-md-8">
                            <textarea name="review"
                                      type="text"
                                      id="review-text"
                                      placeholder="@lang('service/index.review_text_placeholder')"
                                      style="overflow:hidden"></textarea>
                        </div>
                        <div class="col-md-4 comment-buttons">
                            <button class="otherButton" id="addCommentButton-{{ $review->id }}">
                                Add Comment
                            </button>
                            @if(auth()->user()->id !== $review->user_id)
                                <button class="otherButton" id="sendReviewMessageButton-{{ $review->id }}" data-tooltip="You have the option to send a private message to the author of the review.">
                                    Send mail
                                </button>
                            @endauth
                        </div>
                    </div>
                @else
                        <div class="review-textarea" id="review-for-guest" data-review-id="{{ $review->id }}">
                            <div class="col-md-9">
                                <p style="color: #dc3545">Log in to your account and leave your comment!</p>
                            </div>
                        </div>
                @endauth
                <div class="col-md-4 offset-8">
                    <button class="otherButton" style="white-space: nowrap" id="commentButton-{{ $review->id }}" data-comments="{{ $review->comments->count() }}">
                        Show Comments ({!! $review->comments->count() !!})
                    </button>
                </div>
                <div class="col-md-4 offset-8">
                    @auth()
                        @if(auth()->user()->id !== $review->user_id)
                            <a type="button"
                               href=""
                               {{ auth()->user()->complains->contains($review->id) ? 'disabled' : '' }}
                               data-toggle="modal"
                               class="otherButton" style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                               id="complainButton-{{ $review->id }}"
                               data-review="{{ $review->id }}"
                               data-target="#complainModal">Complain{{ auth()->user()->complains->contains($review->id) ? ' in process' : '' }}</a>
                        @endauth
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
