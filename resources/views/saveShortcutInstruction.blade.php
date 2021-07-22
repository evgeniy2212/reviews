@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place">
                <div class="col-md-3" style="width: 200px">
                    <a type="button" class="otherButton" href="{{ asset('files/reviews4info.zip') }}" download="reviews4info">Upload shortcut</a>
                </div>
                <div class="col-md-12">
                    <ul id="shortcutInstructionModal">
                        <li>
                            <span class="shortcut">How to create a shortcut on Mac (Safari)</span>
                            <ol style="display: none">
                                <li>Open <strong>Safari</strong>.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Tap the <strong>Share</strong> button the menu bar.</li>
                                <li>Tap on <strong>Add to Home Screen</strong>.</li>
                                <li>On the next page, give the shortcut a name and confirm the web address.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on Mac (Chrome)</span>
                            <ol style="display: none">
                                <li>Go to your desktop and open <strong>Finder</strong>. Close any other open windows (those could prevent you from adding the icon to your desktop).</li>
                                <li>Select the <strong>Applications</strong> folder on the left side of the window.</li>
                                <li>Locate the Google <strong>Chrome</strong> icon.</li>
                                <li>Click and drag the icon onto your desktop.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on iPhone/iPad (Safari)</span>
                            <ol style="display: none">
                                <li>Open <strong>Safari</strong>.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Tap the icon featuring a <strong>right-pointing arrow coming out of a box</strong> along the top of the Safari window to open a drop-down menu.</li>
                                <li>Select <stron>Add to Home Screen</stron> icon option.</li>
                                <li>Select <strong>Add</strong> option in upper right-hand corner of window.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on Android (Chrome)</span>
                            <ol style="display: none">
                                <li>Launch <strong>Chrome</strong> app.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Tap the icon featuring <strong>3 dots</strong> in the upper right-hand corner and tap <strong>Add</strong> to home screen.</li>
                                <li>You will be able to enter a name for the shortcut before adding it to your home screen.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on PC/Chromebook (Chrome)</span>
                            <ol style="display: none">
                                <li>Launch <strong>Chrome</strong>.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Tap the icon featuring <strong>3 dots</strong> in the upper right-hand corner.</li>
                                <li>Go to <strong>More Tools</strong>.</li>
                                <li>Click <strong>Create shortcut</strong>.</li>
                                <li>Name your shortcut.</li>
                                <li>Click <strong>Create</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on PC (Windows 10)</span>
                            <ol style="display: none">
                                <li>Open <strong>Explorer</strong>.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Right-click in any blank space on the webpage.</li>
                                <li>From the context menu that pops up, select <strong>Create Shortcut</strong>.</li>
                                <li>You will get a dialogue box asking “Do you want to put a shortcut to this website on your desktop?” Click <strong>Yes</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on PC (Windows 8, Chrome)</span>
                            <ol style="display: none">
                                <li>Open <strong>Chrome</strong>.</li>
                                <li>Navigate to <a href="{{ route('home') }}">reviews4results.com</a>.</li>
                                <li>Tap the icon featuring <strong>3 dots</strong> in the upper right-hand corner.</li>
                                <li>Go to <strong>More Tools</strong>.</li>
                                <li>Click <strong>Create shortcut</strong>.</li>
                                <li>Name your shortcut.</li>
                                <li>Click <strong>Create</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on PC (Windows 8)</span>
                            <ol style="display: none">
                                <li>Right click on the desktop and select <strong>New</strong>, then click <strong>Shortcut</strong>.</li>
                                <li>Enter "reviews4results.com"</li>
                                <li>Click <strong>Next</strong>.</li>
                                <li>Name your shortcut.</li>
                                <li>Click <strong>Finish</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on PC (Windows 7, Chrome)</span>
                            <ol style="display: none">
                                <li>Open <strong>Chrome</strong>.</li>
                                <li>Enter <a href="{{ route('home') }}">reviews4results.com</a></li>
                                <li>Tap the icon featuring <strong>3 dots</strong> in the upper right-hand corner.</li>
                                <li>Go to <strong>More Tools</strong>.</li>
                                <li>Click <strong>Create shortcut</strong>.</li>
                                <li>Name your shortcut.</li>
                                <li>Click <strong>Create</strong>.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
