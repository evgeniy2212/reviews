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
                {!! __(__('service/index.select_item', ['item' => 'position'])) !!}
            </span>
            <select class="select required"
                    id="position"
                    name="position"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->position }}">{{ empty($review) ? trans('service/index.position', ['item' => 'position']) : $review->position }}</option>
            </select>
        </div>
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! __(__('service/index.select_item', ['item' => 'status'])) !!}
            </span>
            <select class="select required"
                    id="status"
                    name="status"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->status }}">{{ empty($review) ? trans('service/index.status', ['item' => 'status']) : $review->status }}</option>
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
                <option selected value="{{ empty($review) ? '' : $review->year }}">{{ empty($review) ? trans('service/index.year', ['item' => 'year']) : $review->year }}</option>
            </select>
        </div>
    </div>
</div>

