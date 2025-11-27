@extends('layouts.admin-dashboard')
@section('content')
    <section class="content">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> Create User</h4>

        <!-- Create Deal Wizard -->
        <div id="wizard-create-deal" class="bs-stepper vertical mt-2">
            <div class="bs-stepper-header">

{{--                <div class="step card-btn {{ $formType=='basic'? 'active' : '' }}" data-url="{{ (!empty($user) && $user->id>0? route('admin.user.student-form', ['basic',$user->id]) : '#') }}" >--}}
                <div class="step card-btn" data-url="" >
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="ti ti-users ti-sm" ></i></span>
                        <span class="bs-stepper-label">
              <span class="bs-stepper-title">Basic Details</span>
            </span>
                    </button>
                </div>

                <div class="line" ></div>

{{--                <div class="step card-btn {{ $formType=='video'? 'active' : '' }}" data-url="{{ (!empty($user) && $user->id>0? route('admin.user.student-form', ['video',$user->id]) : '#') }}" >--}}
                <div class="step card-btn" data-url="" >

                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="ti ti-id ti-sm" ></i></span>
                        <span class="bs-stepper-label">
                <span class="bs-stepper-title">Other information</span>
            </span>
                    </button>
                </div>

            </div>

            <div class="bs-stepper-content">

{{--                @if($formType=='basic')--}}
                    <div class="content active">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">User Details</h5>
                        </div>
                        <br />

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">First Name<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('first_name')style="border: 1px solid red" @enderror>
                                  <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                              class="ti ti-user"></i></span>
                                            <input type="text" class="form-control"
                                                   id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder=""
                                                   @error('first_name')aria-describedby="first_name-error" aria-invalid="true" @enderror
                                            />
                                        </div>
                                        @error('first_name')
                                        <span id="first_name-error" class="error invalid-feedback"
                                              style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6  col-12">
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Last Name<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('last_name')style="border: 1px solid red" @enderror>
                                  <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                              class="ti ti-user"></i></span>
                                            <input type="text" class="form-control"
                                                   id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder=""
                                                   @error('last_name')aria-describedby="last_name-error" aria-invalid="true" @enderror
                                            />
                                        </div>
                                        @error('last_name')
                                        <span id="last_name-error" class="error invalid-feedback"
                                              style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6  col-12">
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email <span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('email')style="border: 1px solid red" @enderror>
                                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                            <input type="text" id="email"
                                                   class="form-control" name="email"
                                                   value="{{ old('email') }}" placeholder="" />
                                        </div>
                                        @error('email')
                                        <div id="email-error" class="error invalid-feedback" style="display: block;">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6  col-12">
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Mobile No.<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('mobile')style="border: 1px solid red" @enderror>
                                  <span id="basic-icon-default-phone2" class="input-group-text"><i
                                              class="ti ti-phone"></i></span>
                                            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                                   class="form-control phone-mask6+" placeholder=""
                                                   @error('mobile')aria-describedby="mobile-error" aria-invalid="true" @enderror
                                            />
                                        </div>
                                        @error('mobile')
                                        <span id="mobile-error" class="error invalid-feedback"
                                              style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-password">Password<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('password')style="border: 1px solid red" @enderror>
                                  <span id="basic-icon-default-password2" class="input-group-text"><i
                                              class="ti ti-lock"></i></span>
                                            <input type="password" id="password" name="password" placeholder=""
                                                   value="{{ old('password') }}"
                                                   class="form-control"
                                                   @error('password')aria-describedby="password-error" aria-invalid="true" @enderror
                                            />
                                        </div>
                                        @error('password')
                                        <span id="password-error" class="error invalid-feedback"
                                              style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-password">Confirm Password<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" @error('password_confirmation')style="border: 1px solid red" @enderror>
                                  <span id="basic-icon-default-password2" class="input-group-text"><i
                                              class="ti ti-key"></i></span>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                   class="form-control"
                                                   value="{{ old('password_confirmation') }}" placeholder=""  />
                                        </div>
                                        @error('password_confirmation')
                                        <span id="password_confirmation-error" class="error invalid-feedback"
                                              style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-card-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        <!-- /Create Deal Wizard -->
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('.card-btn').click(function(){
                var url = $(this).data('url');
                if(url!='#')
                    document.location = url;
            });

            // var stepper = new Stepper($('.bs-stepper')[0]);
            var App = {
                initialize: function () {
                    App.dataScript();
                    $(document).on('click', '.btn-card-block', function() {
                        $.blockUI({
                            message: '<div class="spinner-border text-white" role="status"></div>',

                            css: {
                                backgroundColor: 'transparent',
                                border: '1'
                            },
                            overlayCSS: {
                                opacity: 0.5
                            }
                        });

                    });
                },
                dataScript:function() {
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
                        select2.each(function () {
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
                            var $icon = "<i class='" + $(option.element).data('icon') + " me-2'></i>" + option.text;

                            return $icon;
                        }
                        select2Icons.wrap('<div class="position-relative"></div>').select2({
                            templateResult: renderIcons,
                            templateSelection: renderIcons,
                            escapeMarkup: function (es) {
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