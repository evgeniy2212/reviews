<form method="POST" action="{{ route('profile-important-date.store') }}" enctype="multipart/form-data" novalidate="" id="importantDateForm">
    @csrf
    <div class="importantDateTitle">
        <span>@lang('service/profile.important_date.create.title')</span>
    </div>
    <div class="importantDateInfo">
        <input id="name"
               type="text"
               class="form-control input"
               name="name"
               minlength="3"
               value="{{ empty($importantDate) ? old('name') : $importantDate->name }}"
               placeholder="@lang('service/profile.important_date.create.person_name')"
               required
               autocomplete="name">
        <select class="select"
                id="importantDateType"
                name="important_date_type_id"
                required>
            <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => 'category']))</option>
            @foreach($importantDateTypes as $importantDateType)
                <option value="{{ $importantDateType->id }}">{!! $importantDateType->name !!}</option>
            @endforeach
        </select>
        <input type="text"
               class="form-control input datepicker"
               name="important_date_date"
               required
               placeholder="{{ __('service/index.datepicker_placeholder') }}"
               autocomplete="off">
        <span class="create-review-label">
            @lang('service/profile.important_date.create.remind_me')
        </span>
        <select class="select"
                id="remindPeriod"
                name="important_date_reminds[]"
                required>
            <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => '']))</option>
            @foreach(\App\Models\UserImportantDate::REMIND_PERIODS as $period)
                @if($period == 0)
                    <option value="{{ $period }}">@lang('service/profile.important_date.create.same_day')</option>
                @elseif(($period%7) == 0)
                    <option value="{{ $period }}">{{ $period/7 }} @lang(trans_choice('service/profile.important_date.create.period_weeks', (($period/7) < 20 ? ($period/7) : ($period/7) % 10)))</option>
                @else
                    <option value="{{ $period }}">{{ $period }} @lang(trans_choice('service/profile.important_date.create.period_days', ($period < 20 ? $period : $period % 10)))</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="d-flex flex-row justify-content-center" style="width: 100%">
        <div class="col-md-3">
            <button type="submit" id="importantDateButton" class="otherButton submitImportantDateButton">
                Save
            </button>
        </div>
    </div>
</form>
