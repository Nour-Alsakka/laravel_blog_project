@extends('admin.layout')

@section('main')
    <a class="btn btn-primary" href="{{ route('dashboard.categories.create') }}">add category</a>
    {{-- <a class="btn" href="{{ url('dashboard/blogs/create') }}">add blog</a> --}}
    <table id="myTable" class="display">
        <thead>

            <tr>
                <th scope="col">image</th>
                <th scope="col">name</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                    <td class="col-2">
                        <img src="{{ url('storage/media/' . $category->image) }}" alt=""
                            style="width: 40px;object-fit:cover">
                    </td>
                    <td class="col-4">{{ $category->name }}</td>
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
