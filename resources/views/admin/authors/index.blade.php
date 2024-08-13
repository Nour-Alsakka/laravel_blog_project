@extends('admin.layout')

@section('main')
    <a class="btn btn-primary" href="{{ route('dashboard.authors.create') }}">add blog</a>
    {{-- <a class="btn" href="{{ url('dashboard/blogs/create') }}">add blog</a> --}}
    <table id="myTable" class="display">
        <thead>

            <tr>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($authors as $author)
                <tr>
                    <td class="col-2">
                        <img src="{{ url('storage/media/' . $author->image) }}" alt=""
                            style="width: 40px;object-fit:cover">
                    </td>
                    <td class="col-4">{{ $author->name }}</td>
                    <td class="col-4">{{ $author->description }}</td>
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
