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
                            <span class="shortcut">How to create a shortcut on the Mac (Safari)</span>
                            <ol style="display: none">
                                <li>Open <strong>Safari on</strong> your iOS device.</li>
                                <li>Navigate to the website that you want to save as a home screen<strogn>shortcut</strogn>.</li>
                                <li>Tap the Share button <strong>on</strong> the menu bar. ...</li>
                                <li>Tap <strong>on</strong> Add to Home Screen.</li>
                                <li><strong>On</strong> the next page you will give the <strong>shortcut</strong> a name and confirm the web address.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut 0n the Mac (Chrome)</span>
                            <ol style="display: none">
                                <li>Go to your desktop and open "Finder." Close any other open windows — this could prevent you from <strong>adding</strong> the icon to your desktop.</li>
                                <li>Select the "Applications" folder <strong>on</strong> the left side of the window.</li>
                                <li>Locate the Google <strong>Chrome</strong> icon.</li>
                                <li>Click and drag the icon onto your desktop.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut on the iPad (Safari)</span>
                            <ol style="display: none">
                                <li>Open the web page in your browser.</li>
                                <li>Tap the icon featuring a <strong>right-pointing arrow coming out of a box</strong> along the top of the Safari window to open a drop-down menu.</li>
                                <li>Select <strong>“Add to Home Screen”</strong> icon option.</li>
                                <li>Select <strong>“Add”</strong> option in right hand upper corner of window.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a website shortcut on android (Chrome)</span>
                            <ol style="display: none">
                                <li>Launch “Chrome” app.</li>
                                <li>Open the <strong>website</strong> or <strong>web</strong> page you want to pin to your home screen.</li>
                                <li>Tap the menu icon (3 dots in upper right-hand corner) and tap Add to home screen.</li>
                                <li>You will be able to enter a name for the <strong>shortcut</strong> and then Chrome will add it to your home screen.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Chromebook</span>
                            <ol style="display: none">
                                <li>Open web page (Reviews4result.com) in your browser.</li>
                                <li>Click the three-dot icon in the top-right corner of your browser window.</li>
                                <li>Go to <strong>“More Tools”</strong>.</li>
                                <li>Click <strong>“Create shortcut”</strong>.</li>
                                <li>Name your shortcut (Reviews4result).</li>
                                <li>Click <strong>“Create”</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to Create a shortcut to the Microsoft Edge Chromium</span>
                            <ol style="display: none">
                                <li>Open web page Reviews4result.com in your browser.</li>
                                <li>Select the web site address by holding left mouse button.</li>
                                <li>Press and hold “ctrl” and “c” buttons.</li>
                                <li>Minimize browser.</li>
                                <li>Right click on the desktop select “New” and then click “Shortcut”.</li>
                                <li>Press and hold “ctrl” and “v” buttons.</li>
                                <li>Click “Next”.</li>
                                <li>Name your shortcut (Reviews4result).</li>
                                <li>Click “Finish”.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Windows 10 (Google Chrome browser)</span>
                            <ol style="display: none">
                                <li>Open web page (Reviews4result.com) in your browser.</li>
                                <li>Click the <strong>three-dot</strong> icon in the top-right corner of your browser window.</li>
                                <li>Go to <strong>“More Tools”</strong>.</li>
                                <li>Click <strong>“Create shortcut”</strong>.</li>
                                <li>Click <strong>“Create”</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Windows 10 (Explorer browser)</span>
                            <ol style="display: none">
                                <li>Open web page Reviews4result.com in your browser.</li>
                                <li>Right-click in any blank space on the <strong>web page</strong>.</li>
                                <li>From the context menu which pops up, select <strong>Create shortcut</strong>.</li>
                                <li>You will get a dialogue box asking you Do you want to put a <strong>shortcut</strong> to this <strong>website</strong> on your <strong>desktop</strong>?.</li>
                                <li>Click Yes.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Windows 8 (Google Chrome browser)</span>
                            <ol style="display: none">
                                <li>Open web page (Reviews4result.com) in your browser.</li>
                                <li>Click the <strong>three-dot</strong> icon in the top-right corner of your browser window.</li>
                                <li>Go to <strong>“More Tools”</strong>.</li>
                                <li>Click <strong>“Create shortcut”</strong>.</li>
                                <li>Click <strong>“Create”</strong>.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Windows 8 (Explorer browser)</span>
                            <ol style="display: none">
                                <li>Open web page Reviews4result.com in your browser.</li>
                                <li>Select the web site address by holding left mouse button.</li>
                                <li>Press and hold “ctrl” and “c” buttons.</li>
                                <li>Minimize browser.</li>
                                <li>Right click on the desktop select “New” and then click “Shortcut”.</li>
                                <li>Press and hold “ctrl” and “v” buttons.</li>
                                <li>Click “Next”.</li>
                                <li>Name your shortcut (Reviews4result).</li>
                                <li>Click “Finish”.</li>
                            </ol>
                        </li>
                        <li>
                            <span class="shortcut">How to create a shortcut to the Windows 7 (Google Chrome browser)</span>
                            <ol style="display: none">
                                <li>Open web page (Reviews4result.com) in your browser.</li>
                                <li>Click the three-dot icon in the top-right corner of your browser window.</li>
                                <li>Go to <strong>“More Tools”</strong>.</li>
                                <li>Click <strong>“Create shortcut”</strong>.</li>
                                <li>Name your shortcut (Reviews4result).</li>
                                <li>Click <strong>“Create”</strong>.</li>
                            </ol>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
