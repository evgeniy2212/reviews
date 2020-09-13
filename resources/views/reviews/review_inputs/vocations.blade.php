<div class="col-md-5">
    <div class="d-flex flex-row align-items-center flex-grow-1">
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('service/index.review_vocations_name_label')
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
        <div style="white-space:nowrap">
            <span class="create-review-label">
                @lang('service/index.select_review_category_vocation')
            </span>
        </div>
        <div>
            <select class="select"
                    name="category_by_review_id"
                    required>
                <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => 'category']))</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{!! $category !!}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span class="create-review-label">
                @lang('register.country')
            </span>
        </div>
        <div class="col-md-3">
            <select class="select"
                    name="country_id"
                    required>
                <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => 'country']))</option>
                @foreach($countries as $id => $country)
                    <option value="{{ $id }}">{!! $country !!}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
