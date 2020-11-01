<div class="modal fade successModalDialog" id="successMessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            @if(session()->has('success'))
                @foreach (session()->get('success') as $message)
                    <span>{!! $message !!}</span>
                @endforeach
            @endif
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

@if(session()->has('success'))
    <script>
        $(document).ready(function() {
            $('#successMessage').modal();
        });
    </script>
@endif
