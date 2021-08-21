<div class="profile-single-comment">
    <div class="single-comment-info">
        <div>
            <span>{{ $comment->created_at }}</span>
        </div>
        <div class="w-75">
            <a href="{{ route('show-review', ['review' => $comment->review->id]) }}"
               type="button"
               class="otherButton">
                Show Review
            </a>
        </div>
    </div>
    <div class="profile-single-comment-item">
        <div class="w-100 d-flex">
            <div class="profile-single-review-content">
                <div class="profile-single-comment-body">
                    <form class="form-horizontal w-100 h-100" method="POST" id="commentForm-{{ $comment->id }}" novalidate="" action="{{ route('profile-comments.update', $comment->id) }}">
                        @method('PATCH')
                        @csrf
                        <textarea name="body"
                                  class="form-control comment-textarea"
                                  type="text"
                                  disabled
                                  required>{!! $comment->body !!}</textarea>
                    </form>
                </div>
            </div>
            <div class="profile-single-comment-button">
                <a type="button"
                   id="enableEditCommentButton-{{ $comment->id }}"
                   data-form="commentForm-{{ $comment->id }}">
                    Edit
                </a>
                <a data-toggle="modal"
                   type="button"
                   class="deleteComment"
                   data-review-id="{{ $comment->id }}"
                   data-target="#deleteCommentModal">
                    Delete
                </a>
                <a type="button"
                   id="saveCommentButton-{{ $comment->id }}"
                   style="display: none"
                   data-form="commentForm-{{ $comment->id }}">
                    Save
                </a>
                <a type="button"
                   id="cancelSaveCommentButton-{{ $comment->id }}"
                   style="display: none"
                   data-form="commentForm-{{ $comment->id }}">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>
