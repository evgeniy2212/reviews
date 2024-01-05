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
        <div>
            <span class="create-review-label">
                {{ __('service/index.select_item', ['item' => 'category']) }}
            </span>
        </div>
        <div class="col-md-4 mb-2 mb-md-0">
            <select class="select required"
                    id="category"
                    name="category"
                    required>
                <option selected value="{{ empty($review) ? '' : $review->category }}">{{ empty($review) ? ucfirst(__('service/index.category')) : $review->category }}</option>
                <option>Bond</option>
                <option>FaceBook Account</option>
                <option>Festival</option>
                <option>Humore Artist</option>
                <option>Movie</option>
                <option>Museum</option>
                <option>Museum</option>
                <option>News Channel</option>
                <option>Parade</option>
                <option>Singer</option>
                <option>Social Network</option>
                <option>Theatre Musical</option>
                <option>TV Channel</option>
                <option>TV Show</option>
                <option>Web Site</option>
                <option>You Tube Channel</option>
            </select>
        </div>

        <!-- Year -->
        <div>
            <span class="create-review-label">
                {!! __(__('service/index.select_item', ['item' => 'year'])) !!}
            </span>
        </div>
        <div class="col-md-4 mb-2 mb-md-0">
            <select class="select required"
                    id="year"
                    name="year"
                    required>
                <option selected value="{{ empty($review) ? '' : $review->year }}">{{ empty($review) ? ucfirst(__('service/index.year')) : $review->year }}</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
            </select>
        </div>
    </div>
</div>

