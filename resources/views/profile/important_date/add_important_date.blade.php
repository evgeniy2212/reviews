<form method="POST" action="{{ route('profile-important-date.store') }}" enctype="multipart/form-data" novalidate="" id="importantDateForm">
    @csrf
    <div class="importantDateTitle">
        <span>@lang('service/profile.important_date.create.title')</span>
    </div>
    <div class="d-flex flex-row align-items-center congratulation-info-container">
        <div class="col-md-5">
            <div class="d-flex flex-row align-items-center flex-grow-1">
                <div class="col-md-3">
            <span class="create-congratulation-label text-center">
                @lang('service/profile.congratulation.create.person_name')
            </span>
                </div>
                <div>
                    <input id="name"
                           type="text"
                           class="form-control input"
                           name="name"
                           minlength="3"
                           value="{{ empty($congratulation) ? old('name') : $congratulation->name }}"
                           placeholder="@lang('register.first_name')"
                           required
                           autocomplete="name">
                </div>
                <div>
                    <input id="second_name"
                           type="text"
                           class="form-control input"
                           name="second_name"
                           minlength="3"
                           value="{{ empty($congratulation) ? old('second_name') : $congratulation->second_name }}"
                           placeholder="@lang('register.last_name')"
                           required
                           autocomplete="second_name">
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="d-flex flex-row align-items-center flex-grow-1">
                <div>
            <span class="create-congratulation-label">
                @lang('register.country')
            </span>
                </div>
                <div class="col-md-3">
                    <select class="select"
                            id="selectCountry"
                            name="country_id"
                            data-country="{{ old('country') }}"
                            required>
                        <option disabled {{ empty($congratulation) ? 'selected' : '' }} value="">{{ trans('service/index.select_item', ['item' => 'country']) }}</option>
                        @foreach($countries as $id => $country)
                            <option value="{{ $id }}" {{ (!empty($congratulation) && ($congratulation->region->country->id == $id)) ? 'selected' : '' }}>{!! $country !!}</option>
                        @endforeach
                    </select>
                </div>
                <div>
            <span class=create-congratulation-label" id="registerLabel">
                {{ empty($congratulation) ? __('register.state') : $congratulation->region->region_naming }}
            </span>
                </div>
                <div class="col-md-3">
                    <select class="select required"
                            id="selectRegion"
                            name="region_id"
                            disabled
                            required>
                        <option selected value="{{ empty($congratulation) ? '' : $congratulation->region->id }}">{{ empty($congratulation) ? trans('service/index.select_item', ['item' => 'region']) : $congratulation->region->region }}</option>
                        <option value="1">@lang('service/index.person')</option>
                        <option value="2">@lang('service/index.company')</option>
                        <option value="3">@lang('service/index.goods')</option>
                        <option value="3">@lang('service/index.vacations')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input id="city"
                           type="text"
                           class="form-control input"
                           name="city"
                           minlength="3"
                           value="{{ empty($congratulation) ? old('city') : $congratulation->city }}"
                           required
                           placeholder="@lang('register.city_town')"
                           autocomplete="city">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-center" style="width: 100%">
        <div class="col-md-3">
            <button type="submit" id="importantDateButton" class="otherButton submitImportantDateButton">
                Save
            </button>
        </div>
    </div>
</form>
