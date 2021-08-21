<div class="modal fade successModalDialog" id="reviewModerationModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                Thank you for your review.
            </span>
            <span>
                Your review has been sent for moderation
            </span>
            <span>
                ReviewsOnTheWeb.com team.
            </span>
            <div class="d-flex justify-content-center">
                <div class="col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('review_moderation'))
    <script>
        $(document).ready(function() {
            $('#reviewModerationModal').modal();
        });
    </script>
@endif
