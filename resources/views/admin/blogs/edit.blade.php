@extends('admin.layout')

@section('cssAndJs')
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    <script src="{{ asset('filepond/filepond.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
@endsection

@section('main')
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.posts.update', [$blog->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header text-center">
                <h5>Edit Blog</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Blog Content</label>
                    {{-- <textarea class="form-control" name="content" id="content" rows="5">{{ $blog->content }}</textarea> --}}
                    <input type="hidden" name="content" id="content" value="{{ $blog->content }}">

                </div>

                <div class="mb-3">
                    <div id="editor">
                        {{ $blog->content }}
                        {{-- {!! $blog->content !!} --}}
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row m-0 p-0">
                        <div class="col-10 p-0">
                            <label for="name" class="form-label">Blog Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="col-2">
                            Current Image
                            <img src="{{ url('storage/media/' . $blog->image) }}" alt=""
                                style="width:100%;height:100px;object-fit:cover">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="author_id" class="form-label">Blog's Author</label>
                    <select name="author_id" id="author_id" class="mt-2">
                        @foreach ($authors as $author)
                            <option value={{ $author->id }} @if ($author->id == $blog->author_id) selected @endif>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="slider" class="form-label">Slider</label>
                    <select name="slider" id="slider" class="mt-2">
                        <option value='0' @if ($blog->slider == 0) selected @endif>No</option>
                        <option value='1' @if ($blog->slider == 1) selected @endif>Yes</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label">Categories</label>
                    <select id="categories" name="categories[]" multiple autocomplete="on">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, $blog->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                <label for="categories" class="form-label">categories</label>
                <select id="categories" name="categories[]" multiple autocomplete="on">
                    @foreach ($categories as $category)

                        @foreach ($blog->categories as $cate)
                            <option
                            value='{{$category->id}}'>
                            @if ($category->id == $cate->id) selected @endif
                                {{$category->name}}
                            </option>
                        @endforeach

                    @endforeach
                </select>
            </div> --}}


                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-secondary w-50">Update blog</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/dashboard/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        new TomSelect("#categories", {

        });

        new TomSelect("#slider", {

        });

        new TomSelect("#author_id", {

        });

        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            var content = quill.root.innerHTML;
            document.getElementById('content').value = content;
        });
    </script>
@endsection
