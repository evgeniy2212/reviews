<div class="col-12 col-lg-5 mb-2 mb-lg-0">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap reviews-heading flex-lg-nowrap">
        <div style="white-space:nowrap">
            <span class="create-review-label text-center">
                @lang('register.first_name')
            </span>
        </div>
        <div class="mb-2 mb-sm-0">
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
<div class="col-12 col-lg-7">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap flex-lg-nowrap">
        <!-- Category -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {{ __('service/index.select_item', ['item' => 'category']) }}
            </span>
            <select class="select required"
                    id="category"
                    name="category"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->category }}">{{ empty($review) ? __(__('service/index.select_item', ['item' => 'category'])) : $review->category }}</option>
            </select>
        </div>

        <!-- Year -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! __(__('service/index.select_item', ['item' => 'year'])) !!}
            </span>
            <select class="select required"
                    id="year"
                    name="year"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->year }}">{{ empty($review) ? __(__('service/index.select_item', ['item' => 'year'])) : $review->year }}</option>
            </select>
        </div>
    </div>
</div>

