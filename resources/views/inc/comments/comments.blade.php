<div class="container">
    <h3>All comments</h3>
    @foreach ($comment as $comments)
        <div>
            <p>{{ $comments->text }}</p>
            <a href="{{ route('comment_delete', [$comments->id, $data->id]) }}">
                <button>Delete</button>
            </a>
        </div>
    @endforeach
</div>
