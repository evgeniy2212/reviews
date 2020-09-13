<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                @for($i=1;$i < 6; $i++)
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
    <div class="single-review-content">
        <div class="single-review-name">
            <div>
                {{ $review->full_name }}
            </div>
            <div>
                <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
            </div>
        </div>
        <div class="single-review-review">
            @if($review->characteristics->isNotEmpty())
                <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
            @endif
            <span>
                {{ $review->review }}
            </span>
            <div class="w-100">
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
                <div class="col-md-2 offset-10">
                    <button class="otherButton" id="commentButton-{{ $review->id }}">
                        Reply
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
