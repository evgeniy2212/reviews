<div class="edit-review-buttons flex-wrap">
    <div class="col-12 col-md-2 mb-2 mb-md-0">
        <input type="hidden"
               name="redirectToMain"
               value="{{ 'true' }}"
        >
        <button data-toggle="modal"
                type="submit"
                id="editReview"
                class="loginButton submitReviewButton">
            Save
        </button>
    </div>
    <div class="col-12 col-md-2 mb-2 mb-md-0">
        <button data-toggle="modal"
                type="submit"
                id="editReview"
                data-action="{{ route('preupdating-review', $review->id) }}"
                class="loginButton submitReviewButton">
            View and Save
        </button>
    </div>
    <div class="col-12 col-md-2">
        <a role="button" href="{{ route('reviews', ['review_item' => $slug]) }}" class="" id="cancelButton">
            Cancel
        </a>
    </div>
</div>
