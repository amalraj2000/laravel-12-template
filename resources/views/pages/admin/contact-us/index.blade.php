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
                            <span>Total Messages</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">{{ContactUsHelper::getTotalMessageCount()}}</h3>
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
                            <span>--</span>
                            <div class="d-flex align-items-center my-2">
                                <h3 class="mb-0 me-2">0</h3>
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
                            <span>--</span>
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
                          <span>--</span>
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
            <h4 class="card-title">Contact Us Requests 
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact Us Requests</li>
                        <li class="breadcrumb-item active">Contact Us Requests List</li>
                    </ol>
                </div>
            </h4>
        </div>
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table">
                    <thead class="table-light">
                    <tr>
                      <th>Customer Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Created On</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if (!empty($contacts))
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->customer_name}}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>{{$contact->messages}}</td>
                           
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-upgrade-plan" role="document">
          <div class="modal-content">
            <div class="modal-header bg-transparent">
              <h5 class="modal-title" id="exampleModalLabel">Message</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="message-content"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary mt-2" data-bs-dismiss="modal">Close</button>
            </div>
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
