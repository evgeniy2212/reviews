<div class="col-12 mb-2 mb-lg-0">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap flex-lg-nowrap">
        <!-- Gender -->
        <div>
            <span class="create-review-label">
                {!! ucfirst(__('service/index.gender')) !!}
            </span>
        </div>
        <div class="col-md-1 mb-2 mb-md-0">
            <select class="select"
                    id="selectGender"
                    name="gender"
                    data-country="{{ old('gender') }}"
                    required>
                <option disabled {{ empty($review) ? 'selected' : '' }} value="">{{ ucfirst(__('service/index.gender')) }}</option>
                @foreach(\App\Entity\Gender::forSelector() as $id => $gender)
                    <option value="{{ $id }}" {{ (!empty($review) && ($review->gender == $id)) ? 'selected' : '' }}>{!! $gender !!}</option>
                @endforeach
            </select>
        </div>

        <!-- Association -->
        <div>
            <span class="create-review-label">
                {!!  ucfirst(__('service/index.association')) !!}
            </span>
        </div>
        <div class="col-md-2 mb-2 mb-md-0">
            <select class="select required"
                    id="association"
                    name="association"
                    required>
                <option selected value="{{ empty($review) ? '' : $review->association }}">{{ empty($review) ? ucfirst(__('service/index.association')) : $review->association }}</option>
                <option>College League</option>
                <option>Professional League</option>
            </select>
        </div>

        <!-- Category -->
        <div>
            <span class="create-review-label">
                {!! ucfirst(__('service/index.category')) !!}
            </span>
        </div>
        <div class="col-md-2 mb-2 mb-md-0">
                <select class="select required"
                        id="category"
                        name="category"
                        required>
                    <option selected value="{{ empty($review) ? '' : $review->category }}">{{ empty($review) ?  ucfirst(__('service/index.category')) : $review->category }}</option>
                    <option>Baseball League</option>
                    <option>Basketball</option>
                    <option>Football</option>
                    <option>Ice Hockey</option>
                    <option>Lacrosse</option>
                    <option>Soccer</option>
                    <option>Softball</option>
                    <option>Volleyball</option>
                </select>
        </div>

        <!-- League -->
        <div>
            <span class="create-review-label">
                {!! ucfirst(__('service/index.league')) !!}
            </span>
        </div>
        <div class="col-md-1 mb-2 mb-md-0">
                <select class="select required"
                        id="league"
                        name="league"
                        disabled
                        required>
                    <option selected value="{{ empty($review) ? '' : $review->league }}">{{ empty($review) ? ucfirst(__('service/index.league')) : $review->league }}</option>
                </select>
        </div>

        <!-- Team -->
        <div>
            <span class="create-review-label">
                {!! ucfirst(__('service/index.team')) !!}
            </span>
        </div>
        <div class="col-md-1 mb-2 mb-md-0">
                <select class="select required"
                        id="team"
                        name="team"
                        disabled
                        required>
                    <option selected value="{{ empty($review) ? '' : $review->team }}">{{ empty($review) ? ucfirst(__('service/index.team')) : $review->team }}</option>
                </select>
        </div>

        <!-- Year -->
        <div>
            <span class="create-review-label">
                {!! ucfirst(__('service/index.year')) !!}
            </span>
        </div>
        <div class="col-md-1 mb-2 mb-md-0">
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

