<div class="modal fade" id="deleteLogoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <!-- Modal content-->
                <form action="{{ route("admin.delete_logo", ':id') }}"
                      data-action="{{ route("admin.delete_logo", ':id') }}"
                      id="deleteLogoForm"
                      method="post">
                    <div>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p >Are you sure that you want to <b>DELETE</b></p>
                        <p>"<span id="reviewName"></span>" and the same "<span id="reviewCategoryName"></span>"?</p>
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
