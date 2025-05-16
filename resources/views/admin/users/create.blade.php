@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">İstifadəçi əlavə et</h4>
                            <form action="{{ route('users.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="surname" class="form-label">Soyad</label>
                                    <input class="form-control" type="text" name="surname" id="surname" value="{{old('surname')}}">
                                    @error('surname') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Ata adı</label>
                                    <input class="form-control" type="text" name="father_name" id="father_name" value="{{old('father_name')}}">
                                    @error('father_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="indentity" class="form-label">Şəxsiyyət vəsiqəsi nömrəsi</label>
                                    <input class="form-control" type="text" name="indentity" id="indentity" value="{{old('indentity')}}">
                                    @error('indentity') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Doğum tarixi</label>
                                    <input class="form-control" type="date" name="birthday" id="birthday" value="{{old('birthday')}}">
                                    @error('birthday') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="position" class="form-label">Vəzifə</label>
                                    <input class="form-control" type="text" name="position" id="position" value="{{old('position')}}">
                                    @error('position') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input class="form-control" type="text" name="phone" id="phone" value="{{old('phone')}}">
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Şifrə</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Rol</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="role-{{ $role->id }}" value="{{ $role->name }}">
                                                <label class="form-check-label" for="role-{{ $role->id }}">
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100">Əlavə et</button>
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
