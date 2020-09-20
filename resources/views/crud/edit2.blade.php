@extends(crudView('base'))

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Edit') }}</div>
                        <div class="card-body">
                            <br>
                            @include('crud::partials.alert')
                            <form method="POST" action="{{$crud->route('update' , $crud->row->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @foreach ($crud->getFields() as $field)
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                @isset($field['label'])<strong>{{$field['label']}}:</strong>@endisset
                                                @include('crud::fields.'.$field['type'], ['field' => $field , 'class' => 'form-control'])
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-block btn-success"
                                                type="submit">{{ __('Save') }}</button>
                                        <a href="{{ $crud->route('index') }}"
                                           class="btn btn-block btn-primary">{{ __('Return') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @stack('fields_scripts')
@endsection

@section('style')
    @stack('fields_css')
@endsection


