<div class="container my-4">
    <h2 class="mb-4">Comments</h2>
    <div class="row">
        <div class="col-md-8">
            @error('newComment')
                <span class="error text-danger">{{ $message }}</span>
            @enderror

            <form action="" method="post" wire:submit.prevent="addComment">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="my-4 flex">
                    <div class="mb-3">
                        <label for="commentInput" class="form-label">Add Comment</label>
                        <textarea name="" id="" cols="10" rows="5" class="form-control"
                            wire:model.debounce.500ms="newComment">{{ $newComment }}</textarea>
                        <button class="bg-primary text-white">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-md-8">

            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="">{{ $comment->creator->name }}</h4>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="card-text">{{ $comment->body }}</p>
                        <a href="#" class="btn btn-danger btn-sm"
                            wire:click="remove({{ $comment->id }})">Delete</a>
                    </div>
                </div>
            @endforeach

            <!-- more comments... -->
        </div>
    </div>
</div>
