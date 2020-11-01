<div class="modal fade successModalDialog" id="successModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                Thank you for your review.
            </span>
            <span>
                We would like to inform you that you can always find this review in your account in the "Reviews" section, where you will be able to change, delete or reply if you want to do this.
                We look forward to your next review on our website.
            </span>
            <span>
                ReviewsOnTheWeb.com team.
            </span>
            <div class="d-flex flex-row justify-content-center">
                <div class="col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('success_review_creating'))
    <script>
        $(document).ready(function() {
            $('#successModal').modal();
        });
    </script>
@endif
