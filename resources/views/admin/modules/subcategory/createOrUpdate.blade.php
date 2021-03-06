@extends('layouts.admin.app')
@section('title',  @edit ? 'Sub Category Update' : 'Sub Category Create' )

@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Sub Category {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Sub Category</li>
                <li class="breadcrumb-item active">Sub Category {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="card">
        <div class="card-header">
            {{-- form validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- form validation errors end --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Sub Category {{ @$edit ? 'Update' : 'Create' }} Form <a href="@route('admin.subcategory.index')" class="btn btn-sm btn-success"><i class="ri-list-unordered"></i></a></h5>
            @if (@$edit)
                <form action="@route('admin.subcategory.update', @$edit->sub_category_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('admin.subcategory.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Sub Category Name <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="name" value="{{ @$edit->name }}"
                        placeholder="type here Sub Category Name">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="">Select Category <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" id="">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->category_id }}"{{ $cat->category_id == @$edit->category_id ? 'Selected' : "" }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 col-lg-12 my-2">
                    <label for="" class="form-label">Sub Category Image <span class="text-danger">*</span></label>
                    <input  {{ @$edit ? '' : 'required' }}  type="file" name="image" multiple class="form-control">
                    @isset($edit)
                    <div class="my-2">
                        <label for="">Already Image Seleted</label>
                        <img src="{{ asset($edit->image) }}" height="40px" width="40px" alt="">
                    </div>
                    @endisset
                </div>
            </section>
            <br><br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>


@section('js')
@endsection
@endsection

