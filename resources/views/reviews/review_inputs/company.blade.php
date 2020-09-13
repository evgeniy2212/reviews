<div class="col-md-5">
    <div class="d-flex flex-row align-items-center flex-grow-1">
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('service/index.review_company_name_label')
            </span>
        </div>
        <div>
            <input id="name"
                   type="text"
                   class="form-control input"
                   name="name"
                   minlength="3"
                   value="{{ old('name') }}"
                   placeholder="@lang('service/index.review_name_placeholder')"
                   required
                   autocomplete="name">
        </div>
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('register.e-mail')
            </span>
        </div>
        <div>
            <input id="email"
                   type="email"
                   class="form-control input"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="@lang('service/index.review_default_placeholder')"
                   autocomplete="email">
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="d-flex flex-row align-items-center flex-grow-1">
        <div>
            <span class="create-review-label">
                @lang('register.country')
            </span>
        </div>
        <div class="col-md-3">
            <select class="select"
                    id="selectCountry"
                    name="country"
                    required>
                <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => 'country']))</option>
                @foreach($countries as $id => $country)
                    <option value="{{ $id }}">{!! $country !!}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span class="create-review-label" id="registerLabel">
                @lang('register.state')
            </span>
        </div>
        <div class="col-md-3">
            <select class="select required"
                    id="selectRegion"
                    name="region_id"
                    disabled
                    required>
                <option selected value="">@lang(trans('service/index.select_item', ['item' => 'region']))</option>
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
                   value="{{ old('city') }}"
                   required
                   placeholder="@lang('register.city_town')"
                   autocomplete="city">
        </div>
    </div>
</div>