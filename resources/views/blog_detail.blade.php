@extends('app')
@section('title', 'Blog')
@section('mainbody')

    <div class="container">
        <div class="custom_blog_section">
            <div class="custom_page_heading">
                <h4>Blog Details</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset(parse_url($blog['image'])['path']) }}" width="100%">
                </div>
                <div class="col-md-12">
                    <br>
                    <h1 class="text-center">{{ $blog['title'] }}</h1>
                    {!! $blog['content'] !!}
                </div>
            </div>
        </div>
    </div>
@endsection

