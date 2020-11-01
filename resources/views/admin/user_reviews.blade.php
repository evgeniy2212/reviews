@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\BannerCategory::FILTERS as $filterName => $filters)
                <div class="col-md-4 d-flex flex-row justify-content-around">
                    <div>
                        <label for="bannerFilter">
                            {!! $filterName !!}
                        </label>
                    </div>
                    <div>
                        <select class="select filter-select"
                                id="bannerFilter-{!! $filterName !!}"
                                name="{!! $filterName !!}">
                            @foreach($filters as $key => $value)
                                <option value="{!! $key !!}"
                                        {{ (array_key_exists($filterName, $paginateParams) && $paginateParams[$filterName] === $key)
                                            ? 'selected'
                                            : ''}}>
                                    {!! $key !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="singleUser">
            {{--<div class="singleUserControl">--}}
                {{--<button type="submit"--}}
                        {{--id="userPublishButton{{ $user->id }}"--}}
                        {{--class="otherButton"--}}
                        {{--name="is_blocked"--}}
                        {{--value="{{ $user->is_blocked ? 0 : 1 }}">--}}
                    {{--@if($user->is_blocked)--}}
                        {{--@lang('service\admin.unhold')--}}
                    {{--@else--}}
                        {{--@lang('service\admin.hold')--}}
                    {{--@endif--}}
                {{--</button>--}}
                {{--<a type="button"--}}
                   {{--class="otherButton"--}}
                   {{--href="{{ route('admin.users_reviews.show', $user->id) }}">@lang('service\admin.user.reviews')</a>--}}
            {{--</div>--}}
            <div class="singleUserInfo">
                <div class="singleUserInfoColumn">
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service\admin.user.name')</span> <span>{!! $user->full_name !!}</span>
                    </div>
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service\admin.user.pseudonym')</span> <span>{!! empty($user->nickname) ? ' - ' : $user->nickname !!}</span>
                    </div>
                </div>
                <div class="singleUserInfoColumn">
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service\admin.user.address')</span> <span>{!! $user->full_address !!}</span>
                    </div>
                    <div>
                        <span class="singleUserInfoItemNaming">@lang('service\admin.user.email')</span> <span>{!! $user->email !!}</span>
                    </div>
                </div>
            </div>
        </div>
        @forelse($reviews as $review)
            @include('admin.includes.single_user_review')
        @empty
            <span>Review is EMPTY.</span>
        @endforelse
        @if($reviews->total() > $reviews->count())
            <div class="container-fluid">
                <div class="pagination-container">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        {{ $reviews->appends($paginateParams)->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
