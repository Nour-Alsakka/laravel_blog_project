@extends('admin.layout')

@section('main')
    <a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">
        <i class="fa-solid fa-plus-square mx-2"></i> اضافة كاتب</a>

    <div class="card my-4">
        <div class="card-header text-center">
            <h5>Authors Table</h5>
        </div>
        <div class="card-body">

            <table id="myTable" class="display">

                <thead>
                    <tr>
                        <th scope="col">الصورة</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">عدد المنشورات</th>
                        <th scope="col">الوصف</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>
                                @if ($author->image)
                                    <img src="{{ url('storage/media/' . $author->image) }}" alt=""
                                        style="width:100px">
                                @else
                                    <img class="img-fluid " src="{{ asset('images/user.png') }}" style="width:100px">
                                @endif
                            </td>
                            <td>{{ $author->name }}</td>
                            <td><a href="{{ url('dashboard/authors/' . $author->id . '/blogs') }}" class="btn btn-primary ">
                                    {{ $author->blogs_num }}</td>
                            </a>
                            <td>{{ $author->description }}</td>
                            <td>
                                @if ($author->email === 'admin@admin.com')
                                    <a href="{{ url('dashboard/authors/' . $author->id . '/edit') }}"
                                        class="btn btn-primary ">
                                        <i class="fa-solid fa-edit mx-2 text-white"></i>
                                    </a>
                                @else
                                    <form action="{{ route('dashboard.authors.destroy', [$author->id]) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="{{ url('dashboard/authors/' . $author->id . '/edit') }}"
                                            class="btn btn-primary ">
                                            <i class="fa-solid fa-edit mx-2 text-white"></i>
                                        </a>

                                        <button type="submit" onclick="return confirm('Are you sure? If you delete then all related blogs will delete.')" class="btn btn-danger ">
                                            <i class="fa-solid fa-trash mx-2 text-white"></i>
                                        </button>
                                    </form>
                                @endif

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
