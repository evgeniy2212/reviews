<div class="single-review">
    <div class="single-review-info">
        <span class="single-review-info__date">01-02-2023</span>
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
                <span>Oppenheimer 2023</span>
                <div class="single-review-user-geoposition">
                    <i>Movie</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>Robert M.</i>
                    <div>
                        <img src="{{ asset('images/default_images/congratulations/congratulation_1.png') }}" height="25px" width="20px"/>
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
                        <img src="{{ asset('storage/images/default_images/draft_reviews/openheimer_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/openheimer.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                I watched the movie "Oppenheimer," and it stands out as the best film of 2023. I highly recommend watching it; everything, from the performances of the actors to the storyline, is of exceptional quality.
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
        <span class="single-review-info__date">12-17-2023</span>
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
                <span>Mark Nordman</span>
                <div class="single-review-user-geoposition">
                    <i>Comedian</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>User</i>
                    <div>
                        <img src="{{ asset('images/default_images/congratulations/congratulation_1.png') }}" height="25px" width="20px"/>
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
                        <img src="{{ asset('storage/images/default_images/draft_reviews/nordman_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/nordman.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                Mark Normand is my favorite comedian. I consistently watch his performances with keen interest. After his shows, a positive atmosphere always lingers, leaving no space for any feelings of depression.
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
