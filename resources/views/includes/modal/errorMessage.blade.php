<div class="modal fade errorModalDialog" id="errorMessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($errors->any())
                <span>{!! $errors->first() !!}</span>
            @else
                <span>Error</span>
            @endif
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

@if(session()->has('errors'))
    <script>
        $(document).ready(function() {
            $('#errorMessage').modal();
        });
    </script>
@endif
