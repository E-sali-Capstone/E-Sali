{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('dashboard.template.layout')
@section ('content')
        <div class="content-wrapper container">
            <div class="page-header">
              <h3 class="page-title">Forum Posts</h3>
               @can ('createCategories')
                    @if(Auth::user()->user_type ==  "Admin")
                    <button type="button" class="btn btn-primary btn-sm btn-fw float-right" data-open-modal="create-category">
                        {{ trans('forum::categories.create') }}
                    </button>
                    @endif
                    @include ('dashboard.forum.category.modals.create')
                @endcan
        </div>
    @foreach ($categories as $category)
        @include ('dashboard.forum.category.partials.list', ['titleClass' => 'lead'])
    @endforeach
@stop
