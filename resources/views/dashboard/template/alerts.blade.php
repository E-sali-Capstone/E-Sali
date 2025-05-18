@if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <ul>
                               @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                               @endforeach
                               </ul>
                            </div>
                           @else
                                @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                                                    {{ session('success') }}
                            </div>
                            @endif
                           @if (session('error'))
                     <div class="alert alert-danger alert-dismissable">
                           {{ session('error') }}
                    </div>
             @endif
     @endif