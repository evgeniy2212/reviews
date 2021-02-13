<form method="POST" action="{{ route('admin.banners.update', ['banner' => $banner->id]) }}" enctype="multipart/form-data" novalidate="" id="adminBannerForm{{ $banner->id }}" style="width: 100%">
    @method('PATCH')
    @csrf
    <div class="singleBanner">
        <div class="singleBannerInfo">
            <div>
                <span>@lang('service/admin.banner_user_name', ['name' => $banner->user->full_name])</span>
            </div>
            <div class="singleBannerDatepicker">
                <div style="white-space:nowrap">
                <span class="create-review-label text-center">
                    @lang('service/profile.from')
                </span>
                </div>
                <div>
                    <input type="text"
                           class="form-control input datepicker"
                           name="from"
                           required
                           value="{{ \Carbon\Carbon::parse($banner->from)->format('m/d/Y') }}"
                           autocomplete="off">
                </div>
                <div style="white-space:nowrap">
                <span class="create-review-label text-center">
                    @lang('service/profile.to')
                </span>
                </div>
                <div>
                    <input type="text"
                           class="form-control input datepicker"
                           name="to"
                           required
                           value="{{ \Carbon\Carbon::parse($banner->to)->format('m/d/Y') }}"
                           autocomplete="off">
                </div>
            </div>
        </div>
        <div class="singleBannerContent">
            <div class="bannerImagePreview">
                <div class="w-100">
                    <label class="bannerFileUpload">
                        <input type="file"
                               id="imgBanner"
                               name="img"
                               class="form-control input"
                               required
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.upload')</span>
                    </label>
                </div>
                <div>
                <div>
                    <span class="create-review-label">
                        @lang('service/profile.banner_category')
                    </span>
                </div>
                <select class="select"
                        id="bannerCategory"
                        name="banner_category_id"
                        required>
                    <option disabled selected value="">{!! $banner->category->title !!}</option>
                    @foreach($bannerCategories as $id => $category)
                        <option value="{{ $id }}">{!! $category !!}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="bannerImagePreviewContainer">
                <div id="bannerImagePreview">
                    <img id="blah" src="{{ $banner->getImageUrl() }}" alt="your image" />
                </div>
                <input id="title"
                       type="text"
                       class="form-control input"
                       name="title"
                       maxlength="35"
                       placeholder="@lang('service/profile.banner_title')"
                       value="{{ $banner->title }}"
                       autocomplete="off">
                <input id="link"
                       type="text"
                       class="form-control input"
                       name="link"
                       maxlength="35"
                       placeholder="@lang('service/profile.banner_link')"
                       value="{{ $banner->link }}"
                       autocomplete="off">
            </div>
        </div>
        <div class="singleBannerControl">
            <div class="checkbox-item">
                <input type="checkbox"
                       class="custom-checkbox"
                       id="banner-{{ $banner->id }}"
                       name="is_published"
                       {{ $banner->is_published ? 'checked' : '' }}>
                <label for="banner-{{ $banner->id }}">@lang('service/profile.banner_published')</label>
            </div>
            <button type="submit"
                    id="bannerPublishButton{{ $banner->id }}"
                    class="otherButton">
                @lang('service/admin.update')
            </button>
        </div>
    </div>
</form>

