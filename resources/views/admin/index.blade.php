@extends('admin.layout')

@section('main')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">عدد المنشورات</div>
                <div class="card-body">{{ $blogs_count }}</div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">عدد الكتاب</div>
                <div class="card-body">{{ $authors_count }}</div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">عدد التصنيفات</div>
                <div class="card-body">{{ $categories_count }}</div>
            </div>
        </div>
    </div>
    <div class="card  my-5">
        <div class="card-header text-center">عدد المنشورات لكل تصنيفة</div>
        <div class="card-body row">

            @foreach ($categories as $category)
                <div class="col-lg-3">{{ $category->name }} -> {{ $category->blogs_num }}</div>
            @endforeach
        </div>
    </div>
    <div class="card  my-5">
        <div class="card-header text-center">عدد المنشورات لكل كاتب</div>
        <div class="card-body row">

            @foreach ($authors as $author)
                <div class="col-lg-3">{{ $author->name }} -> {{ $author->blogs_num }}</div>
            @endforeach
        </div>
    </div>
@endsection
