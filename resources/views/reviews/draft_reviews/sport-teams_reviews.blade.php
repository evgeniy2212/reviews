<div class="single-review">
    <div class="single-review-info">
        <span class="single-review-info__date">11-25-2023</span>
        <div class="review-stars">
            @for($i=1;$i < 6; $i++)
                @if($i <= 5)
                    &#9733;
                @else
                    &#9734;
                @endif
            @endfor
        </div>
        <div class="d-flex justify-content-around w-100">
            <div class="like-container-right">
                <label for="like-1">1</label>
                <input data-review-id="1"
                       data-reaction-name="likes"
                       id="like-1"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"/>
            </div>
            <div class="like-container-left">
                <input data-review-id="1"
                       data-reaction-name="dislikes"
                       id="dislike-1"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/negative_like.png') }}"/>
                <label for="dislike-1">1</label>
            </div>
        </div>
    </div>
    <div class="single-review-content">
        <div class="single-review-name">
            <div class="single-review-logo-name">
                <span>New York Yankees</span>
                <div class="single-review-user-geoposition">
                    <i>USA, NY, New York City</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>Brain W.</i>
                    <div>
                        <img src="{{ asset('storage/images/default_images/congratulations/congratulation_1.png') }}" height="25px" width="20px"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-review-review">
            <p>
                <span class="single-review-holder">
                        <img src="{{ asset('storage/images/default_img_video.png') }}"
                             alt="photo"
                             class="videoPreview">
                        <img src="{{ asset('storage/images/default_images/draft_reviews/yankees_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/yankees.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                The New York Yankees are a top-tier baseball team. As a passionate fan, I am enthusiastic about declaring that they are the epitome of professionalism. They outshine the Boston Red Sox by a significant margin.
            </p>
            <div class="w-100">
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
                    <button class="otherButton" style="white-space: nowrap"
                            id="commentButton-1"
                            data-comments="0">
                        @lang('service/index.reviews.show_comments') (0)
                    </button>
                </div>
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
                    <a type="button"
                       href="#"
                       class="otherButton"
                       style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                       data-tooltip="{{ __('service/index.complain_message') }}"
                       id="complainButton-1">@lang('service/index.complain')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-review">
    <div class="single-review-info">
        <span class="single-review-info__date">12-11-2023</span>
        <div class="review-stars">
            @for($i=1;$i < 6; $i++)
                @if($i <= 2)
                    &#9733;
                @else
                    &#9734;
                @endif
            @endfor
        </div>
        <div class="d-flex justify-content-around w-100">
            <div class="like-container-right">
                <label for="like-2">1</label>
                <input data-review-id="2"
                       data-reaction-name="likes"
                       id="like-2"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"/>
            </div>
            <div class="like-container-left">
                <input data-review-id="2"
                       data-reaction-name="dislikes"
                       id="dislike-2"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/negative_like.png') }}"/>
                <label for="dislike-2">1</label>
            </div>
        </div>
    </div>
    <div class="single-review-content">
        <div class="single-review-name">
            <div class="single-review-logo-name">
                <span>Boston Red Sox</span>
                <div class="single-review-user-geoposition">
                    <i>USA, MA. Boston</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>Mike H.</i>
                    <div>
                        <img src="{{ asset('storage/images/default_images/congratulations/congratulation_1.png') }}" height="25px" width="20px"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-review-review">
            <p>
                <span class="single-review-holder">
                        <img src="{{ asset('storage/images/default_img_video.png') }}"
                             alt="photo"
                             class="videoPreview">
                        <img src="{{ asset('storage/images/default_images/draft_reviews/boston_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/boston.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                The New York Yankees may not be the best team; the ultimate team is the Boston Red Sox, deserving five stars, while the Yankees earn not more than three stars. This is the way it is and will remain.
            </p>
            <div class="w-100">
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
                    <button class="otherButton" style="white-space: nowrap"
                            id="commentButton-1"
                            data-comments="0">
                        @lang('service/index.reviews.show_comments') (0)
                    </button>
                </div>
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
                    <a type="button"
                       href="#"
                       class="otherButton"
                       style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                       data-tooltip="{{ __('service/index.complain_message') }}"
                       id="complainButton-1">@lang('service/index.complain')</a>
                </div>
            </div>
        </div>
    </div>
</div>
