@extends('profile.index')

@section('profile_message_content')
    <div class="profile-review-place">
        {{--<div class="review-filters">--}}
            {{--@foreach($filters as $filter)--}}
                {{--<div class="col-md-3 d-flex flex-row justify-content-around">--}}
                    {{--<div>--}}
                        {{--<label for="country">--}}
                            {{--{!! $filter->format_name !!}--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<select class="select filter-select"--}}
                                {{--id="filter-{!! $filter->slug !!}"--}}
                                {{--name="{!! $filter->slug !!}">--}}
                            {{--<option value="" selected>All</option>--}}
                            {{--@foreach($filter->filter_values as $value)--}}
                                {{--<option value="{!! $value->slug !!}"--}}
                                        {{--{{ (array_key_exists($filter->slug, $paginateParams) && $paginateParams[$filter->slug] === $value->slug)--}}
                                            {{--? 'selected'--}}
                                            {{--: ''}}>--}}
                                    {{--{!! $value->format_value !!}--}}
                                {{--</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
        @foreach($reviews as $review)
            @include('profile.single_message')
        @endforeach
        @if($reviews->total() > $reviews->count())
            <div class="container-fluid">
                <div class="pagination-container">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
