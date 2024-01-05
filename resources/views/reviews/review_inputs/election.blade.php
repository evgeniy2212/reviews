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
                {!! __(__('service/index.select_item', ['item' => 'position'])) !!}
            </span>
        </div>
        <div class="col-md-2 mb-2 mb-md-0">
            <select class="select required"
                    id="position"
                    name="position"
                    required>
                <option selected value="{{ empty($review) ? '' : $review->position }}">{{ empty($review) ? ucfirst(__('service/index.position')) : $review->position }}</option>
                <option>President</option>
                <option>Vice President</option>
                <option>Senators</option>
                <option>Representatives</option>
                <option>Governors</option>
                <option>State Legislators</option>
                <option>Mayors</option>
                <option>City Council Members</option>
                <option>County Commissioners</option>
                <option>School Board Members</option>
                <option>Judges</option>
                <option>Sheriffs</option>
                <option>District Attorneys (DAs)</option>
                <option>State Attorneys General</option>
                <option>Secretaries of State</option>
                <option>Treasurers</option>
                <option>Auditors or Comptrollers</option>
                <option>State Insurance Commissioners</option>
                <option>Public Service Commissioners</option>
                <option>Coroners or Medical Examiners</option>
                <option>Soil and Water Conservation District Supervisors</option>
                <option>City and County Clerks</option>
            </select>
        </div>
        <div>
            <span class="create-review-label">
                {!! __(__('service/index.select_item', ['item' => 'status'])) !!}
            </span>
        </div>
        <div class="col-md-2 mb-2 mb-md-0">
            <select class="select required"
                    id="status"
                    name="status"
                    required>
                <option selected value="{{ empty($review) ? '' : $review->status }}">{{ empty($review) ? ucfirst(__('service/index.status')) : $review->status }}</option>
                <option>Candidat</option>
                <option>Elected</option>
            </select>
        </div>

        <!-- Year -->
        <div>
            <span class="create-review-label">
                {!! __(__('service/index.select_item', ['item' => 'year'])) !!}
            </span>
        </div>
        <div class="col-md-2 mb-2 mb-md-0">
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

