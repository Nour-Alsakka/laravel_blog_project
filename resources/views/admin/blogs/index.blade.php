@extends('admin.layout')

@section('main')
    <a class="btn btn-secondary" href="{{ url('/dashboard/posts/create') }}">
        <i class="fa-solid fa-plus-square mx-2"></i>Add Blog</a>

    <div class="card my-4">
        <div class="card-header text-center">
            <h5>Blogs Table</h5>
        </div>
        <div class="card-body">

            <table id="myTable" class="display">

                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>
                                <img src="{{ url('storage/media/' . $blog->image) }}" alt=""
                                    style="width:100px;height:100px;object-fit:cover">
                            </td>
                            <td><a href="{{ route('dashboard.posts.show', [$blog->id]) }}">{{ $blog->title }}</a></td>
                            <td>{!! substr($blog->content, 0, 50) !!}...</td>
                            <td>
                                @if ($blog->author->image)
                                    <img src="{{ url('storage/media/' . $blog->author->image) }}"
                                        style="width: 50px; height:50px;border-radius:50px;margin-right: 4px"
                                        alt="">

                                @else
                                <img class="img-fluid " src="{{ asset('images/user.png') }}" style="width: 50px; height:50px;border-radius:50px;margin-right: 4px">
                                @endif
                                {{ $blog->author->name }}
                            </td>
                            <!-- <td>{{ $blog->author_name }}</td> -->
                            <td>
                                <form action="{{ route('dashboard.posts.destroy', [$blog->id]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ url('dashboard/posts/' . $blog->id . '/edit') }}" class="btn btn-success ">
                                        <i class="fa-solid fa-edit mx-2 text-white"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fa-solid fa-trash mx-2 text-white"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
@endsection
