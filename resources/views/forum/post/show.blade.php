@extends ('dashboard.template.layout', ['breadcrumbs_append' => [trans('forum::posts.view')]])


@section ('content')
@include('dashboard.forum.partials.alerts')
<div class="content-wrapper container">
            <div class="page-header">
              <h3 class="page-title">{{ trans('forum::posts.edit') }} ({{ $thread->title }})</h3>
              <a href="{{ Forum::route('thread.show', $thread) }}" class="btn btn-secondary btn-lg btn-rounded">{{ trans('forum::threads.view') }}</a>
      
            </div>
    <div id="post">
        <hr>
        @include ('dashboard.forum.post.partials.list', ['post' => $post, 'single' => true])
    </div>
</div>
@stop
