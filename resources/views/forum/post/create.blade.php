@extends ('dashboard.template.layout')

@section ('content')
<div class="content-wrapper container">
            <div class="page-header">
              <h3 class="page-title">{{ trans('forum::general.new_reply') }} ({{ $thread->title }})</h3>
            </div>
    <div id="create-post">

        @if ($post !== null && !$post->trashed())
            <p>{{ trans('forum::general.replying_to', ['item' => $post->authorName]) }}:</p>

            @include ('forum.post.partials.quote')
        @endif

        <hr />

        <form method="POST" action="{{ Forum::route('post.store', $thread) }}">
            {!! csrf_field() !!}
            @if ($post !== null)
                <input type="hidden" name="post" value="{{ $post->id }}">
            @endif

            <div class="mb-3">
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="text-end">
                <a href="{{ url()->previous() }}" class="btn btn-link btn-sm">{{ trans('forum::general.cancel') }}</a>
                <button type="submit" class="btn btn-primary px-5 btn-rounded btn-sm">{{ trans('forum::general.reply') }}</button>
            </div>
        </form>
    </div>
</div>
@stop
