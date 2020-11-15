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
            <div class="">
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
                       placeholder="@lang('service/profile.banner_title')"
                       autocomplete="off">
            </div>
        </div>
        <div class="singleBannerControl">
            <button type="submit"
                    id="bannerPublishButton{{ $banner->id }}"
                    class="otherButton"
                    name="is_published"
{{--                    value="{{ ($banner->is_published && !$banner->user->is_admin) ? 0 : 1 }}">--}}
                    value="{{ $banner->is_published ? 0 : 1 }}">
{{--                @if($banner->is_published && !$banner->user->is_admin)--}}
                @if($banner->is_published)
                    @lang('service/admin.unpublish')
                @else
                    @lang('service/admin.publish')
                @endif
            </button>
        </div>
    </div>
</form>

