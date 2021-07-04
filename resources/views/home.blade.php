@extends('layouts.app')

@section('content')
    <audio
        id="audio"
        src="{{ asset('storage/sounds/keys.mp3') }}">
    </audio>
    <div class="container-fluid">
        <div class="container">
            <div class="content-place home-content-place">
                <div class="home">
                    <span class="home-title">
                        Welcome to the @lang('service/index.site_name')!
                    </span>
                    <p class="home-main-content home-point-content">
                        We’re excited to welcome you to our site! If this is your first visit, we hope you’ll find it useful, interesting, and worth coming back for time and time again.
                    </p>
                    <p class="home-main-content home-point-content">
                        The goal of this site is to be a convenient and indispensable resource for your everyday life.
                    </p>
                    <p class="home-main-content home-point-content">
                        Although there are other review sites on the web, Reviews4Results offers what no one else can. Our
                        innovative approach sets us apart as a one-stop site that delivers reviews on everything in your life, from
                        people and places to goods and governments. Here’s what sets us apart:
                    </p>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Review Everything.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                Reviews4Results is the only site of its kind where you can leave or find feedback about everything in your life, without exception. By reading and writing reviews on such a massive scale all in one place, you’ll save yourself from making dozens of accounts, remembering credentials, wasting time, and tabbing back-and-forth. Why not get it all in one place!?
                            </span>
                        </div>
                    </div>
                    <div class="home-point" id="test1">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Review People.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                You can write and read reviews about any person on Earth, from your neighbor to your president, and everyone in between.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Review Companies.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                You can write and read reviews of not just companies, but also  government departments. Reviews4Results is the only site where you can evaluate the work of any existing government department, amplifying your voice to your fellow citizens.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Review Products.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                You can write and read reviews of every product on the market, without exception. By reviewing our users’ reviews before purchasing a product, you can be assured of their quality, longevity, usability, and more, saving you money and frustration in the long run.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Review Vacations.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                You can write or read reviews of any vacation or travel destination. Here, you and other users can share information about peak seasons, natural disasters, local traditions, and many other topics.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Privacy.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                Your privacy is of the utmost importance to us, so we give you the choice of how to sign each review. You can choose to be identified by your full name, a nickname, or just “User”.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Optional Communication.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                Once you leave a review, you can choose to have us notify the recipient and give them the opportunity to contact you to resolve any misunderstanding privately.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Congratulations.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                In addition to reviewing people, you can congratulate anyone you want on any occasion. Send your parents an anniversary wish, congratulate your best friend on their wedding, or just let someone know you’re thinking about them! And to help you never miss an important date, we’ve introduced a “Reminder” option to notify you about upcoming and recurring events.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Reminders.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                With a little help from Reviews4Results, you’ll never again forget to send congratulations on time! The process couldn’t be simpler — all you have to do is enter the name of the person being congratulated, as well as the date and type of congratulation. You’ll only need to do this once, and we’ll send you an automatic reminder via email at any of these intervals that you choose:
                            </span>
                            <ul>
                                <li class="home-point-show home-list">1 week before</li>
                                <li class="home-point-show home-list">3 days before</li>
                                <li class="home-point-show home-list">1 day before</li>
                                <li class="home-point-show home-list">the day of</li>
                            </ul>
                            <span class="home-point-content home-point-show">or all of the above</span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Photo & Video.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                No matter what type of review or congratulations you submit, it can always be improved by a photo or video! Make your congratulations more exciting with a video of you celebrating. Or give yourself more credibility by including a photo or video to back up your reviews.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Complaint Process.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                If you come across text or images or our site that contain offensive content, you can notify site administrators by simply clicking the “Complain” button, and we’ll resolve it promptly.
                            </span>
                        </div>
                    </div>
                    <div class="home-point">
                        <img src="{{ asset('storage/images/home_new_image.jpg') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            Editing & Deleting Reviews.
                        </span>
                        <div>
                            <span class="home-point-content home-point-show">
                                Your submissions will remain on our website until you choose to correct or delete them. The editing process is easy and intuitive, putting you in full control of everything you write.
                            </span>
                        </div>
                    </div>
                    <p class="home-point-content home-point-show">
                        We hope you find Reviews4Results to be the all-in-one review site you’ve been looking for! Thank you for sharing your time and opinions to help make the world a better place. Now get out there and start reviewing!
                    </p>
                    <p class="home-title">
                        The @lang('service/index.site_name') Team
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
