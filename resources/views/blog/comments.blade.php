@foreach($comments as $comment)
<div class="comment-list__item ms-{{ $level ?? 0 }}">
    <div class="d-flex align-items-start gap-16">
        <!-- User Image -->
        <div class="flex-shrink-0">
            <?php
        if(empty($comment->user->profile_img)){
            ?> <img src="{{url('/')}}/assets/images/user-list/user.png" alt="" class="w-60-px h-60-px rounded-circle object-fit-cover"><?php
        }else{
            ?> <img src="{{asset('storage/'.$comment->user->profile_img)}}" alt="" class="w-60-px h-60-px rounded-circle object-fit-cover"><?php
        }?>
        </div>

        <!-- Comment Content -->
        <div class="flex-grow-1 border-bottom pb-20 mb-20 border-dashed">
            <h6 class="text-lg mb-1">
                {{ $comment->user->name ?? 'Guest' }}
            </h6>

            <span class="text-neutral-500 text-sm">
                {{ $comment->created_at->format('d M Y, h:i A') }}
            </span>

            <p class="text-neutral-600 text-md my-12">
                {{ $comment->comment }}
            </p>

            <!-- Actions -->
            <div class="d-flex align-items-center gap-8">
                <a href="javascript:void(0)" onclick="@auth openReplyForm({{ $comment->id }}) @else showLoginPopup() @endauth" 
                   class="btn btn-sm btn-primary-600 text-xxs px-8 py-6">
                    <i class="ri-reply-line"></i> Reply
                </a>
            </div>

            <!-- Reply Form -->
            <div id="reply-form-{{ $comment->id }}" class="d-none mt-3">
                <form method="POST" action="{{ route('comment.store') }}">
                    @csrf

                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                    <textarea name="comment" class="form-control" rows="2" placeholder="Write your reply..." required></textarea>

                    <button type="submit" class="btn btn-sm btn-success mt-2" >
                        Submit
                    </button>
                </form>
            </div>

            <!-- Recursive Replies -->
            @if($comment->replies && $comment->replies->count())
                @include('blog.comments', [
                    'comments' => $comment->replies,
                    'level' => ($level ?? 0) + 4
                ])
            @endif
        </div>
    </div>
</div>
@endforeach



<script>
function openReplyForm(id) {
    let currentForm = document.getElementById('reply-form-' + id);

    // Agar ye form already open hai → close kar do
    if (!currentForm.classList.contains('d-none')) {
        currentForm.classList.add('d-none');
        return;
    }

    // Pehle sab forms close karo
    document.querySelectorAll('[id^="reply-form-"]').forEach(el => {
        el.classList.add('d-none');
    });

    // Ab selected form open karo
    currentForm.classList.remove('d-none');
}
</script>