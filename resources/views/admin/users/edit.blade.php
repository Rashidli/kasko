@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <h4 class="card-title mb-4">İstifadəçi redaktə et</h4>
                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad</label>
                                    <input class="form-control" value="{{ $user->name }}" type="text" name="name" id="name">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="surname" class="form-label">Soyad</label>
                                    <input class="form-control" value="{{ $user->surname }}" type="text" name="surname" id="surname">
                                    @error('surname') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Ata adı</label>
                                    <input class="form-control" value="{{ $user->father_name }}" type="text" name="father_name" id="father_name">
                                    @error('father_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="indentity" class="form-label">Şəxsiyyət vəsiqəsi nömrəsi</label>
                                    <input class="form-control" value="{{ $user->indentity }}" type="text" name="indentity" id="indentity">
                                    @error('indentity') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Doğum tarixi</label>
                                    <input class="form-control" value="{{ $user->birthday }}" type="date" name="birthday" id="birthday">
                                    @error('birthday') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">Vəzifə</label>
                                    <input class="form-control" value="{{ $user->position }}" type="text" name="position" id="position">
                                    @error('position') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input class="form-control" value="{{ $user->phone }}" type="text" name="phone" id="phone">
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" value="{{ $user->email }}" type="email" name="email" id="email">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Şifrə (əgər dəyişmək istəyirsinizsə)</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Rol</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="role-{{ $role->id }}"
                                                       value="{{ $role->name }}"
                                                @foreach($user->roles as $r) {{ $r->name == $role->name ? 'checked' : '' }} @endforeach>
                                                <label class="form-check-label" for="role-{{ $role->id }}">
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100">Yenilə</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>
@include('admin.includes.footer')
