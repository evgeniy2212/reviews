<div class="single-review {{ $congratulation->is_published ? '' : 'singleBlockedReview' }}">
    <div class="adminSingleReviewInfo">
        <div>
            <span>{{ $congratulation->created_at }}</span>
        </div>
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex flex-wrap justify-content-center">
            <div class="adminSingleReviewContent">
                <div class="single-review-name">
                    <div class="single-review-logo-name">
                        <span>{{ $congratulation->full_name }}</span>
                        <div class="single-review-user-geoposition">
                            <i>{{ $congratulation->getFullGeoposition() }}</i>
                        </div>
                    </div>
                    <div>
                        <div class="single-review-user-name">
                            <i>{{ $congratulation->user->getUserSign($congratulation->user_sign) }}</i>
                            <div>
                                <img src="{{ App\Services\CongratsService::getUserCongratulation($congratulation->user) }}" height="25px" width="20px"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-single-congratulation">
                    @if($congratulation->category)
                        <span class="congratulation-category">{{ $congratulation->category->title }}</span>
                    @endif
                    <p>
                        <span class="single-review-holder">
                            @if($congratulation->video)
                                <video controls class="videoPreview">
                                <source src="{{ $congratulation->video->getVideoUrl() }}" type="video/mp4">
                                {{--<source src="movie.ogg" type="video/ogg">--}}
                                Your browser does not support the video tag.
                            </video>
                            @else
                                <img src="{{ asset('storage/images/default_img_video.png') }}"
                                     alt="photo"
                                     class="videoPreview">
                            @endif
                            @if($congratulation->image)
                                <img src="{{ $congratulation->image->getResizeImageUrl('congratulations') }}"
                                     alt=""
                                     data-full-size-src="{{ $congratulation->image->getImageUrl() }}"
                                     class="reviewImage previewImage"
                                     style="cursor: pointer;"
                                     id="myImg">
                            @else
                                <img src="{{ asset('storage/images/default_img.png') }}"
                                     alt=""
                                     class="previewImage">
                            @endif
                        </span>
                        {{ $congratulation->body }}
                    </p>
                </div>
            </div>
            <div class="adminSingleReviewButton">
                <form method="POST" action="{{ route('admin.user_congratulations.update', ['user_congratulation' => $congratulation->id]) }}" enctype="multipart/form-data" novalidate="" id="adminReviewForm{{ $congratulation->id }}" style="width: 100%">
                    @method('PATCH')
                    @csrf
                    <button type="submit"
                            id="reviewPublishButton{{ $congratulation->id }}"
                            class="otherButton"
                            name="is_published"
                            value="{{ $congratulation->is_published ? 0 : 1 }}">
                        @if($congratulation->is_published)
                            @lang('service/admin.hold')
                        @else
                            @lang('service/admin.unhold')
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
