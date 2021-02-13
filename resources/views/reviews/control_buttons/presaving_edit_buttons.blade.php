<div class="edit-review-buttons">
    <div class="col-md-2">
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
    <div class="col-md-2">
        <button data-toggle="modal"
                type="submit"
                id="editReview"
                data-action="{{ route('preupdating-review', $review->id) }}"
                class="loginButton submitReviewButton">
            View and Save
        </button>
    </div>
    <div class="col-md-2">
        <a role="button" href="{{ route('reviews', ['review_item' => $slug]) }}" class="" id="cancelButton">
            Cancel
        </a>
    </div>
</div>
