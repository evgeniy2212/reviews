<div class="modal fade" id="ignismyModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

            <div class="modal-body">
                <div class="thank-you-pop">
                    {{--<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">--}}
                    <h1>{{ session()->get('success') }}</h1>
                </div>

            </div>

        </div>
    </div>
</div>
