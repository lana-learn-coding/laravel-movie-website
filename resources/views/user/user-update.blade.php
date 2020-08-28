@extends('layouts.user')

@section('content.body.user')
    <div class="card mt-4 mb-5">
        <div class="card-body">
            <h4 class="card-title">Account</h4>
            <h6 class="card-subtitle mb-3 text-muted">Update your account info</h6>
            <hr>
            <form method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        @include('components.form.input-group', ['name' => 'username', 'value' => $user->username])
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control bg-secondary text-white" id="email"
                               value="{{ $user->email }}" readonly disabled>
                        <small class="form-text text-muted">You cannot change your email</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-8 col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" data-toggle="collapse"
                                   data-target="#change-password-collapse" name="change_password"
                                {{ old('change_password') ? 'checked' : ''}}>
                            <label class="form-check-label" for="name">Change password</label>
                        </div>
                    </div>
                    <div class="form-group col-4 col-md-6">
                        <button id="pick-avatar" class="btn btn-info btn-sm" type="button"><i class="fas fa-image"></i>
                            Avatar
                        </button>
                        @error('avatar')
                        <span class="invalid-feedback d-block" role="alert">Bad image format</span>
                        @enderror
                        <input type="file" class="d-none" id="avatar-file">
                        <input type="text" class="d-none" name="avatar">
                    </div>
                </div>

                <div class="collapse {{ old('change_password') ? 'show' : '' }}"
                     id="change-password-collapse">
                    <div class="form-row">
                        <div class="col-md-6">
                            @include('components.form.input-group', ['name' => 'new_password', 'type' => 'password'])
                        </div>
                        <div class="col-md-6">
                            @include('components.form.input-group', ['name' => 'new_password_confirmation', 'type' => 'password'])
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            @include('components.form.input-group', ['name' => 'password', 'type' => 'password'])
                        </div>
                    </div>
                </div>

                <hr class="border-secondary">

                <div class="form-row">
                    <div class="col-12 col-md-6">
                        @include('components.form.input-group', ['name' => 'name', 'value' => $user->detail ? $user->detail->name : ''])
                    </div>
                    <div class="col-7 col-md-4">
                        @include('components.form.input-group', ['name' => 'birth_date', 'value' => $user->detail ? $user->detail->birth_date : ''])
                    </div>
                    <div class="form-group col-5 col-md-2">
                        <label for="inputPassword4">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="" {{ !($user->detail && $user->detail->gender) ?: 'selected' }}>None</option>
                            <option value="M" {{ ($user->detail && $user->detail->gender === 'M') ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="F" {{ ($user->detail && $user->detail->gender === 'F') ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-crop-image" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <img id="modal-crop-image-preview" class="w-100 rounded" src="#" alt="image-picker">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button id="crop-button" type="button" class="btn btn-success" data-dismiss="modal">Crop</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@scopedstyle('user.user-update')
<link rel="stylesheet" href="{{ asset('vendor/lib/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/lib/cropper/cropper.min.css') }}">
@endscopedstyle

@scopedscript('user.user-update')
<script src="{{ asset('vendor/lib/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('vendor/lib/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('vendor/lib/cropper/jquery-cropper.min.js') }}"></script>
<script>
    flatpickr('#birth_date', {
        enableTime: false,
        dateFormat: 'Y-m-d',
    });

    $(function () {
        const width = 250;
        const height = 250;
        const $image = $('#modal-crop-image-preview');

        $('#modal-crop-image').on('shown.bs.modal', function () {
            $image.cropper({
                aspectRatio: width / height,
                viewMode: 2
            });
        }).on('hidden.bs.modal', function () {
            $image.cropper('destroy');
        });

        $('#crop-button').on('click', function () {
            const canvas = $image.cropper('getCroppedCanvas', {height, width});
            const base64DataUrl = canvas.toDataURL(getMIME($image.attr('src')));
            $('#user-avatar').attr('src', base64DataUrl);
            $('[name=avatar]').val(base64DataUrl);
        })

        $('#pick-avatar').on('click', function () {
            $('#avatar-file').trigger('click');
        });

        $('#avatar-file').on('change', function (event) {
            if ($(this)[0].files.length > 0) {
                const file = $(this)[0].files[0];
                const fileReader = new FileReader();
                fileReader.onload = function (e) {
                    $('#modal-crop-image-preview').attr('src', e.target.result);
                    $('#modal-crop-image').modal('show');
                }
                fileReader.readAsDataURL(file);
            }
        });
    });

    function getMIME(url) {
        const regex = new RegExp('data:(.*);base64', 'i');
        const result = regex.exec(url);
        if (result != null) {
            return result[1];
        } else {
            const ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
            return 'image/' + ext
        }
    }
</script>
@endscopedscript
