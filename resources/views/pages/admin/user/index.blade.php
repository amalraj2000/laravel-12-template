@extends('layouts.admin-dashboard')

@push('styles')
@endpush

@section('content')

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Total Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{UserHelper::getTotalUserCount()}}</h3>
                            </div>
                            <p class="mb-0"></p>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{UserHelper::getActiveUserCount()}}</h3>
                            </div>
                            <p class="mb-0"></p>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>In-Active Users</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">0</h3>
                            </div>
                            <p class="mb-0"></p>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="ti ti-user-cancel ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
              <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                          <span>-</span>
                          <div class="d-flex align-items-center my-2">
                              <h3 class="mb-0 me-2">0</h3>
                          </div>
                          <p class="mb-0"></p>
                      </div>
                      <span class="badge bg-label-danger rounded p-2">
                          <i class="ti ti-user-cancel ti-sm"></i>
                      </span>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">User list
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">Users List</li>
                    </ol>
                </div>
            </h4>
            <div id="buttons">
                <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#filter-form"
                        aria-expanded="false" aria-controls="filter-form">Filter</button>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary ">Create</a>
            </div>
            <div class="{{ (isset($_GET['name']) && $_GET['name'] != null) || (isset($_GET['email']) && $_GET['email'] != null) || (isset($_GET['mobile']) && $_GET['mobile'] != null) ? '' : 'collapse' }} }}"
                 id="filter-form">
                <form id="form-filter" class="dt_adv_search" method="GET">
                    <div class="row g-1 mb-md-1 mt-2">
                        <div class="col-md-4">
                            <input type="text" value="{{ Request::get('name') != null ? Request::get('name') : '' }}"
                                   name="name" id="name" class="form-control dt-input dt-first_name" data-column="1"
                                   placeholder="Name" data-column-index="0" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" value="{{ Request::get('email') != null ? Request::get('email') : '' }}"
                                   name="email" id="email" class="form-control dt-input dt-full-name" data-column="1"
                                   placeholder="E-mail" data-column-index="0" />
                        </div>
                        <div class="col-md-4">
                            <input type="text"
                                   value="{{ Request::get('mobile') != null ? Request::get('mobile') : '' }}" name="mobile"
                                   id="mobile" class="form-control dt-input dt-full-name" data-column="1"
                                   placeholder="Mobile" data-column-index="0" />
                        </div>
                    </div>
                    <br />
                    <button type="button" id="resetForm" class="btn btn-sm btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-filter"></i>Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                    <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>Status</th>
                        <th class="action-th">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if (!empty($users))
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-3">
                                                    <span class="avatar-initial rounded-circle bg-label-primary">
                                                        {{ ucfirst(substr($user->first_name, 0, 1)) }}
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="text-black"
                                               href="{{ route('admin.profile.index', $user->id) }}">
                                                {{ ucfirst($user->first_name)  }}
                                            </a>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </div>
                                    </div>

                                </td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    @if (UserConstants::STATUS_ACTIVE == $user->status)
                                        <span class="badge bg-label-success">
                                                {{ UserConstants::STATUS[$user->status] }}
                                            </span>
                                    @else
                                        <span class="badge bg-label-danger">
                                                {{ UserConstants::STATUS[$user->status] }}
                                            </span>
                                    @endif
                                </td>
                                <td class="action-td">
                                    <div class="action-td-div">
                                        <a href="{{ route('admin.user.show', $user->id) }}" class="text-body"
                                           data-bs-toggle="tooltip" data-bs-placement="bottom"
                                           data-bs-original-title="View profile"><i
                                                    class="ti ti-eye ti-sm mx-2"></i></a>
                                        <a href="javascript:;"
                                           data-href="{{ route('admin.user.destroy', [$user->id]) }}"
                                           class="text-body delete-record" data-bs-toggle="tooltip"
                                           data-bs-placement="bottom" data-bs-original-title="Delete"><i
                                                    class="ti ti-trash ti-sm mx-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var App = {
                initialize: function() {
                    $('#resetForm').on('click', App.resetFilterForm);
                    var datatable = $('#dataTable1').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": false,
                        "ordering": false,
                        "info": true,
                        "autoWidth": false,
                    });
                    $(document).on('click', '.delete-record', function(e) {
                        e.preventDefault();
                        var row = datatable.rows($(this).parents('tr'));
                        var url = $(this).data('href');
                        console.log(url);
                        App.deleteItem(row, url);
                    })
                    App.dataScript();
                },
                resetFilterForm: function() {
                    $('#name').val('');
                    $('#email').val('');
                    $('#mobile').val('');
                },
                deleteItem: function(row, url) {
                    console.log("hi");
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to delete this User!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url,
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(data) {
                                    if (data.status) {
                                        row.remove().draw();
                                        window.location.reload(true);
                                    }
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                        }
                    })

                },
                dataScript: function() {
                    let borderColor, bodyBg, headingColor;
                    var dt_user_table = $('.datatables-users'),
                        select2 = $('.select2'),
                        statusObj = {
                            1: {
                                title: 'Pending',
                                class: 'bg-label-warning'
                            },
                            2: {
                                title: 'Active',
                                class: 'bg-label-success'
                            },
                            3: {
                                title: 'Inactive',
                                class: 'bg-label-secondary'
                            }
                        };

                    if (isDarkStyle) {
                        borderColor = config.colors_dark.borderColor;
                        bodyBg = config.colors_dark.bodyBg;
                        headingColor = config.colors_dark.headingColor;
                    } else {
                        borderColor = config.colors.borderColor;
                        bodyBg = config.colors.bodyBg;
                        headingColor = config.colors.headingColor;
                    }
                    if (dt_user_table.length) {
                        var dt_user = dt_user_table.DataTable({
                            language: {
                                sLengthMenu: '_MENU_',
                                search: '',
                                searchPlaceholder: 'Search..'
                            },
                            // For responsive popup
                            responsive: {
                                details: {
                                    display: $.fn.dataTable.Responsive.display.modal({
                                        header: function(row) {
                                            var data = row.data();
                                            return 'Details of ' + data['full_name'];
                                        }
                                    }),
                                    type: 'column',
                                    renderer: function(api, rowIdx, columns) {
                                        var data = $.map(columns, function(col, i) {
                                            return col.title !==
                                            '' // ? Do not show row in modal popup if title is blank (for check box)
                                                ?
                                                '<tr data-dt-row="' +
                                                col.rowIndex +
                                                '" data-dt-column="' +
                                                col.columnIndex +
                                                '">' +
                                                '<td>' +
                                                col.title +
                                                ':' +
                                                '</td> ' +
                                                '<td>' +
                                                col.data +
                                                '</td>' +
                                                '</tr>' :
                                                '';
                                        }).join('');

                                        return data ? $('<table class="table"/><tbody />')
                                            .append(data) : false;
                                    }
                                }
                            },
                        });
                    }
                }
            };
            App.initialize();
        })
    </script>
@endpush
