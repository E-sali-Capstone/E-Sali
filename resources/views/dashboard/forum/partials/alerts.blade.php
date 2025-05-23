@if (Session::has('alerts'))
    @foreach (Session::get('alerts') as $alert)
        @include ('dashboard.forum.partials.alert', $alert)
    @endforeach
@endif

@if (isset($errors) && !$errors->isEmpty())
    @foreach ($errors->all() as $error)
        @include ('dashboard.forum.partials.alert', ['type' => 'danger', 'message' => $error])
    @endforeach
@endif
