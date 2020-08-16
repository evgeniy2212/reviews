<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                &#9733;
                &#9733;
                &#9733;
                &#9733;
                &#9734;
            </div>
        </div>
        <div>
            <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
            <input data-review-id="{{ $review->id }}"
                   data-reaction-name="likes"
                   id="like-{{ $review->id }}"
                   class="like-reaction"
                   type="image"
                   src="{{ asset('images/positive_like.png') }}"
                   @auth @else disabled @endauth
            />
            <label for="dislike-{{ $review->id }}">{{ $review->dislikes }}</label>
            <input data-review-id="{{ $review->id }}"
                   data-reaction-name="dislikes"
                   id="dislike-{{ $review->id }}"
                   class="like-reaction"
                   type="image"
                   src="{{ asset('images/negative_like.png') }}"
                   @auth @else disabled @endauth
            />
        </div>
    </div>
    <div class="single-review-content">
        <div class="single-review-name">
            {{ $review->name }}
        </div>
        <div class="single-review-review">
            <p>
                {{ $review->review }}
            </p>
        </div>
    </div>
</div>
