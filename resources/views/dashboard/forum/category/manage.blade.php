@extends('dashboard.template.layout')

@section ('content')
<div class="content-wrapper container">
            <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap  pb-2 mb-3 border-bottom  ">
                <strong>Thread Categories</strong>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        @can ('createCategories')
                            <button type="button" class="btn btn-primary btn-sm btn-rounded btn-fw float-left mb-2" data-open-modal="create-category" data-backdrop="static" data-keyboard="false">
                                Create New
                            </button>
                            @include ('dashboard.forum.category.modals.create')
                        @endcan
                    </div>
                  </div>
            </div>
                    <div class="card-body">
                    <p class="text-body-secondary small">Define and manage clear topics for discussion, ensuring community can easily navigate and find relevant discussions.</p>

                    <div class="v-manage-categories">
                        <draggable-category-list :categories="categories"></dramodalggable-category-list>
                        <transition name="fade">
                            <div v-show="changesApplied" class="alert alert-success mt-3" role="alert">
                                {{ trans('forum::general.changes_applied') }}
                            </div>
                        </transition>

                        <div class="text-end py-3">
                            <button type="button" class="btn btn-primary btn-rounded btn-fw px-5" :disabled="isSavingDisabled" @click="onSave">
                                {{ trans('forum::general.save') }}
                            </button>
                        </div>
                    </div>
                    </div>
            </div>


</div>
    <script type="text/x-template" id="draggable-category-list-template">
        <draggable tag="ul" class="list-group" :list="categories" group="categories" :invertSwap="true" :emptyInsertThreshold="14">
            <li class="list-group-item" v-for="category in categories" :data-id="category.id" :key="category.id">
                <a class="float-end btn btn-sm btn-danger ml-2 btn-rounded text-white" :href="`${category.route}#modal=delete-category`">{{ trans('forum::general.delete') }}</a>
                <a class="float-end btn btn-sm btn-link ml-2" :href="`${category.route}#modal=edit-category`">{{ trans('forum::general.edit') }}</a>
                <strong :style="{ color: category.color }">@{{ category.title }}</strong>
                <div class="text-muted">@{{ category.description }}</div>

                <draggable-category-list :categories="category.children"></draggable-category-list>
            </li>
        </draggable>
    </script>

    <script>
    var draggableCategoryList = {
        name: 'draggable-category-list',
        template: '#draggable-category-list-template',
        props: ['categories']
    };

    new Vue({
        el: '.v-manage-categories',
        name: 'ManageCategories',
        components: {
            draggableCategoryList
        },
        data: {
            categories: @json($categories),
            isSavingDisabled: true,
            changesApplied: false
        },
        watch: {
            categories: {
                handler: function (categories) {
                    this.isSavingDisabled = false;
                },
                deep: true
            }
        },
        methods: {
            onSave ()
            {
                this.isSavingDisabled = true;
                this.changesApplied = false;

                var payload = { categories: this.categories };
                axios.post('{{ route('forum.bulk.category.manage') }}', payload)
                    .then(response => {
                        this.changesApplied = true;
                        setTimeout(() => this.changesApplied = false, 3000);
                    })
                    .catch(error => {
                        this.isSavingDisabled = false;
                        console.log(error);
                    });
            }
        }
    });
    </script>
@stop
