<div class="col-md-5">
    <div class="d-flex align-items-center flex-grow-1">
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('service/index.review_goods_name_label')
            </span>
        </div>
        <div>
            <input id="name"
                   type="text"
                   class="form-control input"
                   name="name"
                   minlength="3"
                   value="{{ empty($review) ? old('name') : $review->name }}"
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
                   value="{{ empty($review) ? old('email') : $review->email }}"
                   placeholder="@lang('service/index.review_default_placeholder')"
                   autocomplete="email">
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="d-flex align-items-center flex-grow-1">
        <div style="white-space:nowrap">
            <span class="create-review-label">
                @lang('service/index.select_review_category_good')
            </span>
        </div>
        <div>
            <select class="select"
                    id="selectCategoryGood"
                    name="category_by_review_id"
                    required>
                <option {{ empty($review) ? 'selected' : '' }} disabled value="">{{ trans('service/index.select_item', ['item' => 'category']) }}</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}" {{ (!empty($review) && ($review->category_by_review->id == $id)) ? 'selected' : '' }}>{!! $category !!}</option>
                @endforeach
            </select>
        </div>
        <div style="white-space:nowrap">
            <span class="create-review-label" id="registerLabel">
                @lang('service/index.select_review_group_good')
            </span>
        </div>
        <div class="col-md-3">
            <select class="select required"
                    id="selectGroup"
                    name="review_group_id"
                    disabled
                    required>
                <option disabled selected value="{{ empty($review) ? '' : $review->category_group->id }}">{{ empty($review) ? __(trans('service/index.select_item', ['item' => 'category'])) : $review->category_group->name }}</option>
                <option value="1">@lang('service/index.person')</option>
                <option value="2">@lang('service/index.company')</option>
                <option value="3">@lang('service/index.goods')</option>
                <option value="3">@lang('service/index.vacations')</option>
            </select>
        </div>
    </div>
</div>
