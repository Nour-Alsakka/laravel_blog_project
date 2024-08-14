@extends('admin.layout')

@section('main')
    <a class="btn btn-primary" href="{{ route('dashboard.blogs.create') }}">add blog</a>
    {{-- <a class="btn" href="{{ url('dashboard/blogs/create') }}">add blog</a> --}}
    <table id="myTable" class="display">
        <thead>

            <tr>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">author</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($blogs as $blog)
                <tr>
                    <td class="col-2">
                        <img src="{{ url('storage/media/' . $blog->image) }}" alt=""
                            style="width: 40px;object-fit:cover">
                    </td>
                    <td class="col-4">{{ $blog->title }}</td>
                    <td class="col-4">{{ $blog->content }}</td>
                    <td class="col-4">{{ $blog->author->name }}</td>
                    <td class="col-2">delete</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
@endsection
