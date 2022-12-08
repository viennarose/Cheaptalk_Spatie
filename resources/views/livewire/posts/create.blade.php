<div>
    <div class="">
        <div class="col-md-4 offset-md-4 mt-5">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card mt-3">

                <div class="card-header text-dark text-center bg-info">
                    <h3 class="card-title" style="font-weight:400; font-size:20px; ">Create Your Post</h3>

                </div>
                <div class="card-body">

                        {{ csrf_field() }}

                        <input type="hidden" wire:model='user_id' name="user_id" id="email" value="{{ auth()->user()->id }}">

                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select wire:model='category_id' name="category_id" id="category_id" class="form-select" required>
                                <option hidden="true">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="post">Your Post</label>
                            <textarea type="text" name="post" wire:model='post' id="post" class="form-control" placeholder="Type something here..."
                                required></textarea>
                            @error('post')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">

                            <button class="btn text-light" style="background-color:#2c70b1;"
                                wire:click='createPost'>{{ __('Post') }}</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
