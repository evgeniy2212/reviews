<div class="modal fade successModalDialog" id="successModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span>
                Thanks for your review!
            </span>
            <span>
                You can always find this review under the “Reviews” section of your account, where you’ll be able to change, delete, or reply whenever you like.
            </span>
            <span>
                We look forward to seeing your next review!
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
