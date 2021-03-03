<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $congratulation->created_at }}</span>
        </div>
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex flex-row">
            <div class="w-100 profile-single-review-content">
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
                <div class="profile-single-review-review">
                    @if($congratulation->category)
                        <span>{{ $congratulation->category->title }}</span>
                    @endif
                        <p>
                            @if($congratulation->video)
                                <video class="videoPreview" controls>
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
                            {{ $congratulation->body }}
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>