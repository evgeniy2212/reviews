<div class="col-12 mb-2 mb-lg-0">
    <div class="d-flex align-items-center flex-grow-1 flex-wrap flex-lg-nowrap">
        <!-- Gender -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! ucfirst(__('service/index.gender')) !!}
            </span>
            <select class="select"
                    id="selectGender"
                    name="gender"
                    data-country="{{ old('gender') }}"
                    disabled
                    required>
                <option disabled {{ empty($review) ? 'selected' : '' }} value="">@lang(trans('service/index.select_item', ['item' => 'gender']))</option>
                @foreach(\App\Entity\Gender::forSelector() as $id => $gender)
                    <option value="{{ $id }}" {{ (!empty($review) && ($review->gender == $id)) ? 'selected' : '' }}>{!! $gender !!}</option>
                @endforeach
            </select>
        </div>

        <!-- Association -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!!  ucfirst(__('service/index.association')) !!}
            </span>
            <select class="select required"
                    id="association"
                    name="association"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->association }}">{{ empty($review) ? trans('service/index.association', ['item' => 'association']) : $review->association }}</option>
            </select>
        </div>

        <!-- Category -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! ucfirst(__('service/index.category')) !!}
            </span>
            <select class="select required"
                    id="category"
                    name="category"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->category }}">{{ empty($review) ? trans('service/index.category', ['item' => 'category']) : $review->category }}</option>
            </select>
        </div>

        <!-- League -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! ucfirst(__('service/index.league')) !!}
            </span>
            <select class="select required"
                    id="league"
                    name="league"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->league }}">{{ empty($review) ? trans('service/index.league', ['item' => 'league']) : $review->league }}</option>
            </select>
        </div>

        <!-- Team -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! ucfirst(__('service/index.team')) !!}
            </span>
            <select class="select required"
                    id="team"
                    name="team"
                    disabled
                    required>
                <option selected value="{{ empty($review) ? '' : $review->team }}">{{ empty($review) ? trans('service/index.team', ['item' => 'team']) : $review->team }}</option>
            </select>
        </div>

        <!-- Year -->
        <div class="flex-grow-1 mb-2 mb-sm-0" style="white-space: nowrap;">
            <span class="create-review-label">
                {!! ucfirst(__('service/index.year')) !!}
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

