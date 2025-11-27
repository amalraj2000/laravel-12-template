@extends('layouts.admin-dashboard', ['title' => 'User Details'])
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">User / View /</span> Profile</h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('web_components/assets/img/avatars/15.png') }}" height="100"
                                width="100" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2">{{$userDetails->first_name}}</h4>
                                <span class="badge bg-label-secondary mt-1">Author</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                        <div class="d-flex align-items-start me-4 mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-checkbox ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">1.23k</p>
                                <small>Tasks Done</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-3 gap-2">
                            <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-briefcase ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-medium">568</p>
                                <small>Projects Done</small>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 small text-uppercase text-muted">Details</p>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <span class="fw-medium me-1">Username:</span>
                                <span>{{$userDetails->last_name}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Email:</span>
                                <span>{{$userDetails->email}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Status:</span>
                                @if (UserConstants::STATUS_ACTIVE == $userDetails->status)
                                <span class="badge bg-label-success">
                                    {{ UserConstants::STATUS[$userDetails->status]}}
                                </span>
                            @else
                            <span class="badge bg-label-danger">
                                    {{ UserConstants::STATUS[$userDetails->status]}}
                                </span>
                            @endif
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Role:</span>
                                <span>Author</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Tax id:</span>
                                <span>Tax-8965</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Contact:</span>
                                <span>{{$userDetails->mobile}}</span>
                            </li>
                            <li class="mb-2 pt-1">
                                <span class="fw-medium me-1">Languages:</span>
                                <span>French</span>
                            </li>
                            <li class="pt-1">
                                <span class="fw-medium me-1">Country:</span>
                                <span>England</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                                data-bs-toggle="modal">Edit</a>
                            <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
            <!-- Plan Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="badge bg-label-primary">Standard</span>
                        <div class="d-flex justify-content-center">
                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
                            <h1 class="mb-0 text-primary">99</h1>
                            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
                        </div>
                    </div>
                    <ul class="ps-3 g-2 my-3">
                        <li class="mb-2">10 Users</li>
                        <li class="mb-2">Up to 10 GB storage</li>
                        <li>Basic Support</li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center mb-1 fw-medium text-heading">
                        <span>Days</span>
                        <span>65% Completed</span>
                    </div>
                    <div class="progress mb-1" style="height: 8px">
                        <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <span>4 days remaining</span>
                    <div class="d-grid w-100 mt-4">
                        <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                            Upgrade Plan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Plan Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link " href={{route('admin.view-data',$userDetails->id)}}><i
                            class="ti ti-user-check ti-xs me-1"></i>Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.view-notification',$userDetails->id)}}"><i
                            class="ti ti-bell ti-xs me-1"></i>Notifications</a>
                </li>
            </ul>
            <!--/ User Pills -->

            <!-- Project table -->
            <div class="card mb-4">
                 <!-- Notifications -->
                 <h5 class="card-header pb-1">Recent Devices</h5>
                 <div class="card-body">
                   <span>Change to notification settings, the user will get the update</span>
                 </div>
                 <div class="table-responsive">
                   <table class="table table-striped border-top">
                     <thead>
                       <tr>
                         <th class="text-nowrap">Type</th>
                         <th class="text-nowrap text-center">Email</th>
                         <th class="text-nowrap text-center">Browser</th>
                         <th class="text-nowrap text-center">App</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td class="text-nowrap">New for you</td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck2" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck3" checked />
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td class="text-nowrap">Account activity</td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck5" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck6" checked />
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td class="text-nowrap">A new browser used to sign in</td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck8" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck9" />
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td class="text-nowrap">A new device is linked</td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck11" />
                           </div>
                         </td>
                         <td>
                           <div class="form-check d-flex justify-content-center">
                             <input class="form-check-input" type="checkbox" id="defaultCheck12" />
                           </div>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
                 <div class="card-body">
                   <button type="submit" class="btn btn-primary me-2">Save changes</button>
                   <button type="reset" class="btn btn-label-secondary">Discard</button>
                 </div>
                 <!-- /Notifications -->
            </div>
            <!-- /Project table -->

           
        </div>
        <!--/ User Content -->
    </div>

    <!-- Modal -->
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit User Information</h3>
                        <p class="text-muted">Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ route('admin.user.update', $userDetails->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">First Name</label>
                            <input type="text"  id="first_name" name="first_name"
                                class="form-control" placeholder="John" value="{{ old('first_name', $userDetails->first_name) }}"/>
                                <span class="text-danger error-first_name " id="error-first_name"></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="form-control" value="{{ old('last_name', $userDetails->last_name) }}"  placeholder="">
                                <span class="text-danger error-last_name " id="error-last_name"></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Email</label>
                            <input type="text" id="email" name="email" value="{{ old('email', $userDetails->email) }}" class="form-control"
                                placeholder="" />
                                <span class="text-danger error-email " id="error-email"></span>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserStatus">Status</label>
                            <select id="status" name="status" class="select2 form-select"
                                aria-label="Default select example">
                                <option value="" selected disabled>Select status</option>
                                @foreach (UserConstants::STATUS as $key => $status)
                                    <option value="{{ $key }}" {{ (old('status', $userDetails->status) == $key ) ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-status" id="error-status"></span>
                        </div>
 
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                            
                                <input type="text" id="mobile" name="mobile"
                                    class="form-control phone-number-mask" placeholder="" value="{{ old('mobile', $userDetails->mobile) }}" />
                                    <span class="text-danger error-mobile" id="error-mobile"></span>
                           
                        </div>
       
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserCountry">Country</label>
                            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select"
                                data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->

    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Upgrade Plan</h3>
                        <p>Choose the best plan for user.</p>
                    </div>
                    <form id="upgradePlanForm" class="row g-3" onsubmit="return false">
                        <div class="col-sm-8">
                            <label class="form-label" for="choosePlan">Choose Plan</label>
                            <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                                <option selected>Choose Plan</option>
                                <option value="standard">Standard - $99/month</option>
                                <option value="exclusive">Exclusive - $249/month</option>
                                <option value="Enterprise">Enterprise - $499/month</option>
                            </select>
                        </div>
                        <div class="col-sm-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Upgrade</button>
                        </div>
                    </form>
                </div>
                <hr class="mx-md-n5 mx-n3" />
                <div class="modal-body">
                    <p class="mb-0">User current plan is standard plan</p>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex justify-content-center me-2">
                            <sup class="h6 pricing-currency pt-1 mt-3 mb-0 me-1 text-primary">$</sup>
                            <h1 class="display-5 mb-0 text-primary">99</h1>
                            <sub class="h5 pricing-duration mt-auto mb-2 text-muted">/month</sub>
                        </div>
                        <button class="btn btn-label-danger cancel-subscription mt-3">Cancel Subscription</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Add New Credit Card Modal -->
@endsection
@push('scripts')
<script src="https://unpkg.com/read-smore@2.0.4/dist/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
           var App = {
            initialize: function () {
                $(document).on('submit','#editUserForm', function(e) {
                    e.preventDefault();
                    $.blockUI();
                    var url = $('#editUserForm').attr('action');
                    var user_data = $('#editUserForm').serialize();
                    $.ajax({
                        type: 'put',
                        url:url,
                        data:user_data,
                        success: function (data) {
                            $.unblockUI();
                            toastr.success('profile updated successfully');
                            location.reload(true);
                        },
                        error: function(res) {
                            $.unblockUI();
                            let error = res.responseJSON;
                            if (error.errors) {
                                App.showValidationError(error.errors);
                            }
                        }
                    });
                })
               
            },

            showValidationError:function(error){
                console.log('aasssd');
                $('.text-danger').html('');
                $.each(error, function( index, value ) {
                    var arr = index.split('.');
                    if($.isArray(arr)){
                        index = arr[0]
                        if(index=='audio'){
                            $('.error-'+index);
                        }
                    }
                    console.log('#error-'+index,value[0]);
                    $('#error-'+index).html(value[0]);
                });
            },

       
        };
        App.initialize();
    })

</script>
@endpush


