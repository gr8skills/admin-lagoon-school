@extends('layouts.master')

@section('page-title')
    {{ ucwords($page->title ?? '') }}
@stop

@section('plugin-styles')
@stop

@section('page-styles')
@stop

@section('content-header')
    Edit {{ ucwords($page->title) }} page
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords($page->title ?? '') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('page-edit', $page->slug) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" readonly value="{{ ucwords($page->title) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" readonly value="{{ ucwords($page->category->name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="banner">Banner</label>
                            <input type="file" accept="image/*" class="form-control" id="banner" name="banner">
{{--                            <button class="btn btn-info"--}}
{{--                                    id="bannerFileButton"--}}
{{--                                    type="button"--}}
{{--                                    @if($page->footer_image !== null) disabled @endif>Pick a file</button>--}}
                        </div>

                        <div class="form-group">
                            <label for="footerImage">Footer image</label><br>
                            <input type="file" accept="image/*" class="form-control" id="footerImage" name="footerImage">
{{--                            <button class="btn btn-info"--}}
{{--                                    id="footerFileButton"--}}
{{--                                    type="button"--}}
{{--                                    @if($page->footer_image !== null) disabled @endif>Pick a file</button>--}}
                        </div>

                        <label for="summernote">Content</label>
                        <textarea id="summernote" name="content" required class="editor-height"></textarea>

                        <div class="mt-2 mb-5">
                            <button type="submit" class="btn btn-info">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-plugin')
@stop

@section('page-scripts')
    <script>
        $('#summernote').summernote('pasteHTML', {{ $page->content ?? '' }}).addClass('editor-height');

        $('#bannerFileButton').on('click', function (evt) {
            $('#banner').click();
        })

        $('#footerFileButton').on('click', function (evt) {
            $('#footerImage').click();
        });
    </script>
@endsection