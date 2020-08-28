@extends('layouts.user')

@section('content.body.user')
    <v-card class="mt-4 mt-md-5 mt-lg-8 mt-xl-9 w-100">
        <v-card-title>Account</v-card-title>
        <v-card-subtitle>Update your account info</v-card-subtitle>
        <v-divider></v-divider>
        <v-card-text>
            <form method="POST">
                @csrf
                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field
                            type="text"
                            name="username"
                            label="Username"
                            value="{{ old('username') ?: $user->username }}"
                            @error('username')
                            error
                            error-messages="{{ $message }}"
                            @enderror
                            persistent-hint
                        >
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-text-field
                            id="email"
                            type="email"
                            label="Email Address"
                            hint="You cannot change email"
                            value="{{ $user->email }}"
                            persistent-hint
                            readonly
                            disabled
                        >
                        </v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6" class="d-flex align-start">
                        <v-checkbox label="Change password" dense class="mt-0" v-model="showPasswordForm"></v-checkbox>
                        <input type="checkbox" class="d-none"
                               name="change_password"
                               :checked="showPasswordForm"
                               :value="showPasswordForm ? 'on' : ''"
                        >
                    </v-col>
                    <v-col cols="6">
                        <input type="file" class="d-none" id="avatar-file">
                        <input type="hidden" name="avatar">
                        <v-btn color="indigo darken-2" small @click="openCropperDialog()">
                            <v-icon small>fas fa-image</v-icon>
                            <span class="ml-2">Avatar</span>
                        </v-btn>
                        @error('avatar')
                        <div class="error--text mt-2">Bad image format</div>
                        @enderror
                    </v-col>
                </v-row>
                <v-row v-if="showPasswordForm">
                    <v-col cols="12" md="6" lg="4">
                        <v-text-field
                            type="password"
                            name="new_password"
                            label="New Password"
                            value="{{ old('new_password') ?: '' }}"
                            @error('new_password')
                            error
                            error-messages="{{ $message }}"
                            @enderror
                            persistent-hint
                        >
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" md="6" lg="4">
                        <v-text-field
                            type="password"
                            name="new_password_confirmation"
                            label="New Password confirm"
                            value="{{ old('new_password_confirmation') ?: '' }}"
                            @error('new_password_confirmation')
                            error
                            error-messages="{{ $message }}"
                            @enderror
                            persistent-hint
                        >
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" md="8" lg="4">
                        <v-text-field
                            type="password"
                            name="password"
                            label="Password"
                            value="{{ old('password') ?: '' }}"
                            @error('password')
                            error
                            error-messages="{{ $message }}"
                            @enderror
                            hint="Your old password"
                            persistent-hint
                        >
                        </v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field
                            type="text"
                            name="name"
                            label="Name"
                            value="{{ old('name') ?: ($user->detail ? $user->detail->name : '') }}"
                            @error('name')
                            error
                            error-messages="{{ $message }}"
                            @enderror
                            persistent-hint
                        >
                        </v-text-field>
                    </v-col>
                    <v-col cols="7" md="4">
                        <v-menu
                            v-model="menu"
                            :close-on-content-click="false"
                            :nudge-right="40"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Birth date"
                                    name="birth_date"
                                    @error('birth_date')
                                    error
                                    error-messages="{{ $message }}"
                                    @enderror
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="date" @input="menu = false" no-title></v-date-picker>
                        </v-menu>
                    </v-col>
                    <v-col cols="5" md="2">
                        <v-select label="gender" name="gender"
                                  value="{{ ($user->detail && $user->detail->gender) ? $user->detail->gender : '' }}"
                                  :items="{{ json_encode([
                                    ['text' => 'None', 'value' => ''],
                                    ['text' => 'Male', 'value' => 'M'],
                                    ['text' => 'Female', 'value' => 'F']
                                  ]) }}"
                        >
                        </v-select>
                    </v-col>
                </v-row>
                <div class="w-100 d-flex justify-end">
                    <v-btn color="indigo darken-2 mt-5 ml-5" type="submit">Update</v-btn>
                </div>
            </form>
        </v-card-text>
    </v-card>
    <v-dialog v-model="cropperDialog" max-width="500px" eager>
        <v-card>
            <v-card-title>Crop Image</v-card-title>
            <v-card-subtitle>Crop Image to a square</v-card-subtitle>
            <v-card-title>
                <div class="w-100">
                    <img :src="cropperSrc" class="w-100" id="cropper-preview">
                </div>
            </v-card-title>
            <v-card-actions class="justify-end">
                <v-btn text color="blue" @click.stop="cropAndCloseCropperDialog()">Crop</v-btn>
                <v-btn text @click.stop="closeCropperDialog()">Cancel</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
@endsection

@scopedstyle('user.user-update')
<link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
@endscopedstyle
@section('vue')
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script src="{{ asset('js/use.js') }}"></script>
    <script>
        const app = new Vue({
            el: '#app',
            vuetify,
            setup() {
                return {
                    ...useApplicationBase(),
                    ...useChangePassword(),
                    ...useDatePicker(),
                    ...useCropImage(),
                };
            },
        });

        function useDatePicker() {
            const menu = ref(false);
            const date = ref("{{ ($user->detail && $user->detail->birth_date) ? $user->detail->birth_date : (old('birth_date') ?: '') }}");
            return {
                menu,
                date,
            };
        }

        function useChangePassword() {
            const showPasswordForm = ref({{ old('change_password') ? 'true' : 'false' }});

            return {
                showPasswordForm,
            };
        }

        function useCropImage() {
            const cropperSrc = ref('');
            const cropperDialog = ref(false);
            const croppedData = ref('');

            let cropper;
            const width = 250;
            const height = 250;


            function openCropperDialog() {
                const file = document.getElementById('avatar-file');
                file.addEventListener('change', function () {
                    if (file.files[0]) {
                        const fileReader = new FileReader();
                        fileReader.onload = function (e) {
                            const preview = document.getElementById('cropper-preview');
                            preview.addEventListener('load', () => {
                                if (preview.getAttribute('src')) {
                                    cropper = new Cropper(preview, {
                                        viewMode: 2,
                                        aspectRatio: width / height,
                                    });
                                }
                            }, {once: true});
                            cropperSrc.value = e.target.result;
                            cropperDialog.value = true;
                        };
                        fileReader.readAsDataURL(file.files[0]);
                    }
                }, {once: true});
                file.click();
            }

            function cropAndCloseCropperDialog() {
                const canvas = cropper.getCroppedCanvas({width, height});
                const base64DataUrl = canvas.toDataURL(getMIME(cropperSrc.value));
                document.getElementById('user-avatar').setAttribute('src', base64DataUrl);
                document.querySelector('[name=avatar]').setAttribute('value', base64DataUrl);
                closeCropperDialog();
            }

            function closeCropperDialog() {
                cropperDialog.value = false;
                cropper.destroy();
            }

            function getMIME(url) {
                const regex = new RegExp('data:(.*);base64', 'i');
                const result = regex.exec(url);
                if (result != null) {
                    return result[1];
                } else {
                    const ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                    return 'image/' + ext;
                }
            }

            return {
                cropperDialog,
                openCropperDialog,
                closeCropperDialog,
                cropAndCloseCropperDialog,
                croppedData,
                cropperSrc,
            };
        }
    </script>
@endsection
<script>
    // $(function () {
    //     const width = 250;
    //     const height = 250;
    //     const $image = $('#modal-crop-image-preview');
    //
    //     $('#modal-crop-image').on('shown.bs.modal', function () {
    //         $image.cropper({
    //             aspectRatio: width / height,
    //             viewMode: 2,
    //         });
    //     }).on('hidden.bs.modal', function () {
    //         $image.cropper('destroy');
    //     });
    //
    //     $('#crop-button').on('click', function () {
    //         const canvas = $image.cropper('getCroppedCanvas', {height, width});
    //         const base64DataUrl = canvas.toDataURL(getMIME($image.attr('src')));
    //         $('#user-avatar').attr('src', base64DataUrl);
    //         $('[name=avatar]').val(base64DataUrl);
    //     });
    //
    //     $('#pick-avatar').on('click', function () {
    //         $('#avatar-file').trigger('click');
    //     });
    //
    //     $('#avatar-file').on('change', function (event) {
    //         if ($(this)[0].files.length > 0) {
    //             const file = $(this)[0].files[0];
    //             const fileReader = new FileReader();
    //             fileReader.onload = function (e) {
    //                 $('#modal-crop-image-preview').attr('src', e.target.result);
    //                 $('#modal-crop-image').modal('show');
    //             };
    //             fileReader.readAsDataURL(file);
    //         }
    //     });
    // });


</script>
