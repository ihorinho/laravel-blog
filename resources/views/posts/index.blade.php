@extends('main')

@section('title', '| All Posts')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create')}}" class="btn btn-h1-spacing btn-primary btn-block">Create New Post</a>
    </div>   
</div>

<div class="row">
    <div class="col-md-12">
        <hr />
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created At</th>
                    <th scope="col">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort By
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="?sort_by=updated">Newest first</a>
                            <a class="dropdown-item" href="?sort_by=id">Id</a>
                            <a class="dropdown-item" href="?#">Clear filters</a>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td class="title">{{ $post->title }}</td>
                <td>{{ str_limit($post->body, 150) }}</td>
                <td class="created">{{ date('M j, y', strtotime($post->created_at)) }}</td>
                <td>
                    <div class="actions">                        
                        <a class="btn btn-outline-dark btn-action btn-block" href="{{ route('posts.show', $post->id) }}">View</a>
                        <a class="btn btn-outline-dark btn-action btn-edit" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">{!! $posts->links() !!}</div>
</div>
</div>
@endsection
