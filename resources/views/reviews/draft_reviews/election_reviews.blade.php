<div class="single-review">
    <div class="single-review-info">
        <span class="single-review-info__date">01-12-2024</span>
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
                <span>Donald Trump</span>
                <div class="single-review-user-geoposition">
                    <i>USA, FL</i>
                </div>
            </div>
            <div>
                <div class="single-review-user-name">
                    <i>Avi Raf</i>
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
                        <img src="{{ asset('storage/images/default_images/draft_reviews/trump_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/Trump.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                One insightful individual remarked, "Everything is learned by comparison." During the tenure of President Donald Trump, notable improvements were observed. He prioritized the well-being of the people, boosted the economy, and safeguarded the interests of the United States. Despite these positive actions, the Democratic Party seemingly opposed him. His initiative to construct a wall along the Mexico border faced opposition, leading to significant challenges at the border.
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
        <span class="single-review-info__date">01-14-2024</span>
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
                <span>Joe Biden</span>
                <div class="single-review-user-geoposition">
                    <i>USA, Washington. D.C. White House</i>
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
                        <img src="{{ asset('storage/images/default_images/draft_reviews/joe_biden_98.jpg') }}"
                             alt=""
                             data-full-size-src="{{ asset('storage/images/default_images/draft_reviews/Biden.JPG') }}"
                             class="reviewImage previewImage"
                             style="cursor: pointer;"
                             id="myImg">
                </span>
                President Joe Biden has been in office for over three years now. While I'm eager to identify positive aspects of his presidency, my search has yielded little. I initially considered awarding only one star, but ultimately gave two, holding out hope that there may be commendable achievements that I am unaware of.
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
