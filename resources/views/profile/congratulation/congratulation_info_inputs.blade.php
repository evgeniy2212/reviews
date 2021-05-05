<div class="col-md-12">
    <div class="profile-congratulation-user-inputs">
        <div>
            <span class="create-congratulation-label">
                @lang('service/profile.congratulation.create.category')
            </span>
        </div>
        <div class="col-md-6">
            <select class="select"
                    id="selectCategoryCongrats"
                    name="congratulation_category_id"
                    data-country="{{ old('congratulation_category_id') }}"
                    required>
                <option disabled {{ empty($congratulation) ? 'selected' : '' }} value="">{{ trans('service/index.select_item', ['item' => 'category']) }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (!empty($congratulation) && ($congratulation->congratulation_category_id == $category->id)) ? 'selected' : '' }}>{!! $category->title !!}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
