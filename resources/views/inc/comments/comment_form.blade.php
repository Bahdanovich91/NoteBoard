<div>
    <form action="{{ route('store_comment', $data->id) }}" method="POST">
        @csrf

        <div class="form-group mt-4">
            <label for="text">Add comment for selected note</label>
            <input class="form-control" type="text" id="text" name="text" placeholder="Your Comment">
        </div>
        <button type="submit" class="btn btn-success mt-2">Add comment</button>
    </form>

    @include('inc.comments.comments')

</div>
