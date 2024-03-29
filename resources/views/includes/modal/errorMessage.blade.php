<div class="modal fade errorModalDialog" id="errorMessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <span id="errorMessageContent" hidden></span>
            @if($errors->any())
                <span>{!! $errors->first() !!}</span>
            @else
                <span id="defaultErrorMessageContent">@lang('service/index.error')</span>
            @endif
            <div class="d-flex justify-content-center">
                <div class="col-md-3">
                    <button class="otherButton" type="button" data-dismiss="modal">
                        @lang('service/index.cancel')
                    </button>
                </div>
                <div class="col-md-3"
                     id="actionButtonContainer"
                     hidden>
                    <form action="{{ route("profile-reviews.update", ":id") }}"
                          id="actionModelForm"
                          method="post">
                        <input type="hidden"
                               id="actionModelFormValue"
                               name=""
                               value="">
                        {{ csrf_field() }}
                        <button class="otherButton"
                                type="submit"
                                id="actionButtonText">
                            @lang('service/index.cancel')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('errors'))
    <script>
        $(document).ready(function() {
            $('#errorMessage').modal();
        });
    </script>
@endif
