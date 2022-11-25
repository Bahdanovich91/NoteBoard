<div class="comment">
    <form action="{{ route('store_comment', $data->id) }}" method="POST">
        @csrf

        <div class="form-group mt-2">
            <label for="comment">Comment</label>
            <input class="form-control" type="text" id="text" name="text" placeholder="Your Comment">
        </div>
        <button type="submit" class="mt-2">Save comment</button>
    </form>

    @include('inc.comments.comments')

</div>
