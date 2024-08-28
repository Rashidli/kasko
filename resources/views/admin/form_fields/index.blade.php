@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <h4 class="card-title">Form Fields</h4>
                            <a href="{{route('forms.form_fields.create', $form->id)}}" class="btn btn-primary">+</a>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Label</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($form_fields as $form_field)
                                        <tr>
                                            <th scope="row">{{$form_field->id}}</th>
                                            <td>{{$form_field->name}}</td>
                                            <td>{{$form_field->type}}</td>
                                            <td>{{$form_field->translate('az')->label}}</td>
                                            <td>{{$form_field->is_active ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a href="{{route('forms.form_fields.edit', [$form->id, $form_field->id])}}" class="btn btn-primary" style="margin-right: 15px">Edit</a>
                                                <form action="{{route('forms.form_fields.destroy', [$form->id, $form_field->id])}}" method="post" style="display: inline-block">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $form_fields->links('admin.vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')
