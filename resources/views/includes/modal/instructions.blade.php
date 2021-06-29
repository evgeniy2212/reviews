<div class="modal fade" id="instructionModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal content-->
            <div class="instruction-title">
                Watch the helpful tutorials to learn new and interesting ways to use this site`s features</span>
            </div>
            <div class="instruction-videos">
                <div class="col-md-3 instruction-preview">
                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"
                         alt=""
                         class="previewInstructionImage">
                    <a class="otherButton"
                       type="button"
                       target="_blank"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       id="instruction-video1">
                        Play Video
                    </a>
                </div>
                <div class="col-md-3 instruction-preview">
                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"
                         alt=""
                         class="previewInstructionImage">
                    <a class="otherButton"
                       type="button"
                       target="_blank"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       id="instruction-video2">
                        Play Video
                    </a>
                </div>
                <div class="col-md-3 instruction-preview">
                    <img src="{{ asset('storage/images/default_images/instructions/test_video_preview.jpg') }}"
                         alt=""
                         class="previewInstructionImage">
                    <a class="otherButton"
                       type="button"
                       href="https://www.youtube.com/watch?v=Yl_FJAOcFgQ"
                       target="_blank"
                       id="instruction-video3"
                       data-dismiss="modal">
                        Play Video
                    </a>
                </div>
            </div>
            <div class="instruction-control">
                <div class="col-md-4">
                    <button class="otherButton" type="submit" data-dismiss="modal">
                        Close
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="otherButton"
                            type="button"
                            data-dismiss="modal"
                            id="dontShowAgainInstruction">
                        Close and Don`t Show Again
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
