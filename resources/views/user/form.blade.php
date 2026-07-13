<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">Role</label>

            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                <option value="">-- Pilih Role --</option>
                <option value="user" {{ old('role', $user?->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="staff" {{ old('role', $user?->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="admin" {{ old('role', $user?->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>

            {!! $errors->first('role', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="no_hp" class="form-label">{{ __('No Hp') }}</label>
            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                value="{{ old('no_hp', $user?->no_hp) }}" id="no_hp" placeholder="No Hp">
            {!! $errors->first('no_hp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">Password</label>

            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Password">

            {!! $errors->first('password', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
