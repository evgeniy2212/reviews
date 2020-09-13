<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                @for($i=0;$i < 5; $i++)
                    @if($i < $review->rating)
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
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex flex-row">
            <div class="profile-single-review-content">
                <div class="single-review-name">
                    <div>
                        {{ $review->full_name }}
                    </div>
                    <div>
                        <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                    </div>
                </div>
                <div class="profile-single-review-review">
                    @if($review->characteristics->isNotEmpty())
                        <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
                    @endif
                    <span>
                {{ $review->review }}
            </span>
                </div>
            </div>
            <div class="profile-single-review-button">
                <a type="button"
                   href="{{ route('profile-reviews.edit', $review->id) }}">
                    Edit
                </a>
                <a data-toggle="modal"
                   type="button"
                   id="commentButton-{{ $review->id }}">
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
            </div>
        </div>
        <div class="w-100 profile-review-item">
            @foreach($review->comments as $comment)
                <div class="comment">
                    <span>
                        {!! $comment->body !!}
                    </span>
                </div>
            @endforeach
            <div class="review-textarea" data-review-id="{{ $review->id }}">
                <div class="col-md-9">
                        <textarea name="review"
                                  type="text"
                                  id="review-text"
                                  placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                </div>
                <div class="col-md-3">
                    <button class="otherButton" id="addCommentButton-{{ $review->id }}">
                        Add Review
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
