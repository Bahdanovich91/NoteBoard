@if($comment)
    <div class="container">
        <h3>All comments</h3>
            @foreach ($comment as $comments)
                    <div>
                        <p>{{ $comments->text }}</p>
                    </div>
            @endforeach
    </div>
@endif
