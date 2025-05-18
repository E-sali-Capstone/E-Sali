@extends ('dashboard.template.layout')

@section ('content')
<div class="content-wrapper container">
    <div class="page-header">
        <h3 class="page-title">{{ trans('forum::posts.edit') }} ({{ $thread->title }})</h3>
    </div>
    <div id="edit-post">
        <hr>
        @if ($post->parent)
            <h3>{{ trans('forum::general.response_to', ['item' => $post->parent->authorName]) }}...</h3>

            @include ('dashboard.forum.post.partials.list', ['post' => $post->parent, 'single' => true])
        @endif
        <form method="POST" action="{{ Forum::route('post.update', $post) }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <textarea name="content" class="form-control">{{ old('content') !== null ? old('content') : $post->content }}</textarea>
            </div>

            <div class="text-end">
                <a href="{{ URL::previous() }}" class="btn btn-link">{{ trans('forum::general.cancel') }}</a>
                <button type="submit" class="btn btn-primary px-5 btn-rounded btn-sm">{{ trans('forum::general.save') }}</button>
            </div>
        </form>
    </div>
</div>
@stop
