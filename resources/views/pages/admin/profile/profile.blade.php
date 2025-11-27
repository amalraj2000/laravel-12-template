@extends('layouts.admin-dashboard')
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->

                <hr class="my-0" />

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update', $detail->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ ProfileHelper::getProfileImageFromFile($detail->profile_image, AuthConstants::GUARD_ADMIN) }}"
                                alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" name="profile_image"
                                        hidden accept="image/*" />
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name<span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('firstName')is-invalid @enderror" type="text"
                                    id="firstName" name="firstName" value="{{ $detail->first_name }}"
                                    @error('firstName')aria-describedby="firstName-error" aria-invalid="true" @enderror
                                    autofocus />
                                @error('firstName')
                                    <span id="firstName-error" class="error invalid-feedback"
                                        style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ $detail->last_name }}" />
                            </div>
                            {{--                            <div class="col-12 col-md-6"> --}}
                            {{--                                <label class="form-label" for="modalEditUserCountry">Gender<span class="text-danger">*</span></label> --}}
                            {{--                                <select id="select2BasicGender" name="gender" id="gender" class="select2 form-select form-select-lg @error('gender')is-invalid @enderror" data-allow-clear="true" --}}
                            {{--                                        @error('gender') aria-describedby="gender-error" aria-invalid="true" @enderror> --}}
                            {{--                                    <option value="" disabled selected>--Select--</option> --}}
                            {{--                                    <option value="{{ UserConstants::MALE }}" {{ UserConstants::MALE == $detail->gender ? 'selected' : ''}}>Male</option> --}}
                            {{--                                    <option value="{{ UserConstants::FEMALE }}" {{ UserConstants::FEMALE == $detail->gender ? 'selected' : '' }}>Female</option> --}}
                            {{--                                    <option value="{{ UserConstants::OTHER }}" {{ UserConstants::OTHER == $detail->gender ? 'selected' : '' }}>Other</option> --}}
                            {{--                                </select> --}}
                            {{--                                @error('gender') --}}
                            {{--                                <span id="gender-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span> --}}
                            {{--                                @enderror --}}
                            {{--                            </div> --}}
                            {{--                            <div class="mb-3 col-md-6"> --}}
                            {{--                                <label class="form-label" for="mobile">Mobile<span class="text-danger">*</span></label> --}}
                            {{--                                <div class="input-group"> --}}
                            {{--                                    <select id="select2" name="code"  class="select2 form-select form-select-lg" data-allow-clear="true" --}}
                            {{--                                            @error('code') aria-describedby="code-error" aria-invalid="true" @enderror> --}}
                            {{--                                        <option value="" disabled selected>- Select -</option> --}}
                            {{--                                        @foreach ($countries as $key => $country) --}}
                            {{--                                            <option value="{{ $country->code }}" {{$detail->country_code == $country->code ? 'selected' : '' }}>{{ $country->code }}</option> --}}
                            {{--                                        @endforeach --}}
                            {{--                                    </select> --}}
                            {{--                                    <input --}}
                            {{--                                            type="text" --}}
                            {{--                                            id="mobile" --}}
                            {{--                                            name="mobile" --}}
                            {{--                                            class="form-control @error('mobile')is-invalid @enderror" --}}
                            {{--                                            value="{{ $detail->mobile }}" @error('mobile')aria-describedby="mobile-error" aria-invalid="true" @enderror/> --}}
                            {{--                                    @error('code') --}}
                            {{--                                    <span id="code-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span> --}}
                            {{--                                    @enderror --}}
                            {{--                                    @error('mobile') --}}
                            {{--                                    <span id="mobile-error" class="error invalid-feedback" style="display: block;">{{ $message }}</span> --}}
                            {{--                                    @enderror --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}

                            <div class="col-md-6  col-12">
                                <div class="mb-1">
                                    <label class="form-label">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mobile')is-invalid @enderror"
                                        id="mobile" name="mobile" value="{{ $detail->mobile }}"
                                        placeholder="Enter Mobile"
                                        @error('mobile')aria-describedby="mobile-error" aria-invalid="true" @enderror>
                                    @error('mobile')
                                        <span id="mobile-error" class="error invalid-feedback"
                                            style="display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
                                <input class="form-control @error('email')is-invalid @enderror" type="text"
                                    id="email" name="email" value="{{ $detail->email }}" />
                                @error('email')
                                    <span id="email-error" class="error invalid-feedback"
                                        style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

            <div class="card">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update-password', $detail->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="current_password" class="form-label">Current Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('current_password1')is-invalid @enderror" type="text"
                                    id="current_password" name="current_password1" value="{{ old('current_password1') }}"
                                    @error('current_password1') aria-describedby="current_password1-error" aria-invalid="true" @enderror />
                                @error('current_password1')
                                    <span id="current_password1-error" class="error invalid-feedback"
                                        style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="new_password" class="form-label">New Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('new_password')is-invalid @enderror" type="password"
                                    id="new_password" name="new_password" value="{{ old('new_password') }}"
                                    @error('new_password')aria-describedby="new_password-error" aria-invalid="true" @enderror />
                                @error('new_password')
                                    <span id="new_password-error" class="error invalid-feedback"
                                        style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="confirm_password" class="form-label">Confirm Password<span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('confirm_password')is-invalid @enderror" type="password"
                                    id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}"
                                    @error('confirm_password')aria-describedby="confirm_password-error" aria-invalid="true" @enderror />
                                @error('confirm_password')
                                    <span id="confirm_password-error" class="error invalid-feedback"
                                        style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary deactivate-account">Change password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            var App = {
                initialize: function() {
                    App.dataScript();
                },

                dataScript: function() {
                    // Update/reset user image of account page
                    let accountUserImage = document.getElementById('uploadedAvatar');
                    const fileInput = document.querySelector('.account-file-input'),
                        resetFileInput = document.querySelector('.account-image-reset');

                    if (accountUserImage) {
                        const resetImage = accountUserImage.src;
                        fileInput.onchange = () => {
                            if (fileInput.files[0]) {
                                accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                            }
                        };
                        resetFileInput.onclick = () => {
                            fileInput.value = '';
                            accountUserImage.src = resetImage;
                        };
                    }

                    $(".datepicker").flatpickr();
                    const selectPicker = $('.selectpicker'),
                        select2 = $('.select2'),
                        select2Icons = $('.select2-icons');

                    // Bootstrap Select
                    // --------------------------------------------------------------------
                    if (selectPicker.length) {
                        selectPicker.selectpicker();
                    }

                    // Select2
                    // --------------------------------------------------------------------

                    // Default
                    if (select2.length) {
                        select2.each(function() {
                            var $this = $(this);
                            $this.wrap('<div class="position-relative"></div>').select2({
                                placeholder: 'Select',
                                dropdownParent: $this.parent()
                            });
                        });
                    }

                    // Select2 Icons
                    if (select2Icons.length) {
                        // custom template to render icons
                        function renderIcons(option) {
                            if (!option.id) {
                                return option.text;
                            }
                            var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" +
                                option.text;

                            return $icon;
                        }
                        select2Icons.wrap('<div class="position-relative"></div>').select2({
                            templateResult: renderIcons,
                            templateSelection: renderIcons,
                            escapeMarkup: function(es) {
                                return es;
                            }
                        });
                    }
                }
            };
            App.initialize();
        })
    </script>
@endpush
