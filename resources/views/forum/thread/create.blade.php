@extends('dashboard.template.layout')

@section ('content')
<div class="content-wrapper container">
            <div class="page-header">
              <h3 class="page-title">{{ trans('forum::threads.new_thread') }} ({{ $category->title }})</h3>
            </div>
    <div id="create-thread">
        <form method="POST" action="{{ Forum::route('thread.store', $category) }}">
            @csrf
            <div class="mb-3">
                <label for="title">{{ trans('forum::general.title') }}</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
            <div class="mb-3">
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            </div>
            <div class="text-end">
                <a href="{{ URL::previous() }}" class="btn btn-link btn-sm">{{ trans('forum::general.cancel') }}</a>
                <button type="submit" class="btn btn-primary px-5 btn-rounded btn-sm">{{ trans('forum::general.create') }}</button>
            </div>
        </form>
    </div>
</div>
@stop
