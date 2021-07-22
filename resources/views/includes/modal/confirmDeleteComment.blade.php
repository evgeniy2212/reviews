<div class="modal fade" id="deleteCommentModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route("profile-comments.destroy", ":id") }}"
                      data-action="{{ route("profile-comments.destroy", ":id") }}"
                      id="deleteCommentForm"
                      method="post">
                    <div>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p >Are you sure you want to <b>DELETE</b> comment?</p>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="col-md-3">
                            <button class="otherButton" type="button" data-dismiss="modal">
                                No
                            </button>
                        </div>
                        <div class="col-md-3">
                            <button class="otherButton" type="submit">
                                Yes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
