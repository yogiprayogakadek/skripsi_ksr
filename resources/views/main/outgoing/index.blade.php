@extends('template.master')

@section('page-title', 'Medicine Out')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Data Medicine Out
                        </div>
                        {{-- @can('operator') --}}
                        <div class="col-6 d-flex align-items-center">
                            <div class="m-auto"></div>
                            <a href="{{ route('outgoing.create') }}">
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="nav-icon fa fa-plus font-weight-bold"></i> Add
                                </button>
                            </a>
                            {{-- <a href="{{ route('outgoing.print') }}"> --}}
                            <button type="button" class="btn btn-outline-success ml-2 btn-print">
                                <i class="nav-icon fa fa-print font-weight-bold"></i> Print
                            </button>
                            {{-- </a> --}}
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped" id="tableData">
                        <thead>
                            <th>No</th>
                            <th>Out Date</th>
                            <th>Description</th>
                            {{-- <th>Status</th> --}}
                            {{-- @can('operator') --}}
                            <th>Action</th>
                            {{-- @endcan --}}
                        </thead>
                        <tbody>
                            @foreach ($outgoingMedicines as $outgoingMedicine)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $outgoingMedicine->outgoing_date }}</td>
                                    <td>{{ $outgoingMedicine->description }}</td>
                                    {{-- <td>
                                        <span
                                            class="badge {{ $outgoingMedicine->is_active == true ? 'badge-primary' : 'badge-danger' }}">{{ $outgoingMedicine->is_active == true ? 'Active' : 'Inactive' }}</span>
                                    </td> --}}
                                    {{-- @can('operator') --}}
                                    {{-- <td>
                                        <a href="{{ route('outgoing.edit', $outgoingMedicine->id) }}">
                                            <button class="btn btn-edit btn-primary">
                                                <i class="fa fa-pencil text-white mr-2 pointer"></i> Edit
                                            </button>
                                        </a>
                                        <button class="btn btn-detail btn-success" data-id="{{ $outgoingMedicine->id }}">
                                            <i class="fa fa-eye text-white mr-2 pointer"></i> Detail
                                        </button>
                                    </td> --}}

                                    <td>
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <a href="{{ route('outgoing.edit', $outgoingMedicine->id) }}">
                                                    <button class="btn btn-edit btn-primary">
                                                        <i class="fa fa-pencil text-white mr-2 pointer"></i> Edit
                                                    </button>
                                                </a>
                                                <button class="btn btn-detail btn-success ml-4" data-id="{{ $outgoingMedicine->id }}">
                                                    <i class="fa fa-eye text-white mr-2 pointer"></i> Detail
                                                </button>
                                            </div>
                                            <div class="col-8">
                                                <form method="POST"
                                                    action="{{ route('outgoing.delete', $outgoingMedicine->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-delete btn-danger"
                                                        data-id="{{ $outgoingMedicine->id }}">
                                                        <i class="fa fa-trash-alt text-white mr-2 pointer"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- @endcan --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail</h5>
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered" id="outgoingTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Medicine Name</th>
                                <th>Batch Number</th>
                                <th>Expired Date</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPrint" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Print Report</h5>
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                </div>
                <form action="{{route('outgoing.print')}}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="start">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{date_format(date_create(now()), 'Y-m-d')}}" max="{{date('Y-m-d')}}">
                        </div>
                        <div class="col-6">
                            <label for="end">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{date_format(date_create(now()), 'Y-m-d')}}" max="{{date('Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary pull-right" type="submit">Print</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>
        function assets(url) {
            var url = '{{ url("") }}/' + url;
            return url;
        }
        $(document).ready(function() {

            @if (session('status') == 'success')
                localStorage.clear();
            @endif
            @if (session('status'))
                Swal.fire(
                    "{{ session('title') }}",
                    "{{ session('message') }}",
                    "{{ session('status') }}",
                );
            @endif
            var table = $('#tableData').DataTable({
                language: {
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    },
                    info: "Showing _START_ to _END_ from _TOTAL_ data",
                    infoEmpty: "Showing 0 to 0 from 0 data",
                    lengthMenu: "Showing _MENU_ data",
                    search: "Search:",
                    emptyTable: "Data doesn't exists",
                    zeroRecords: "Data doesn't match",
                    loadingRecords: "Loading..",
                    processing: "Processing...",
                    infoFiltered: "(filtered from _MAX_ total data)"
                },
                lengthMenu: [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"]
                ],
                order: [
                    [0, 'desc']
                ],
                "rowCallback": function(row, data, index) {
                    // Set the row number as the first cell in each row
                    $('td:eq(0)', row).html(index + 1);
                }
            });

            // Update row numbers when the table is sorted
            table.on('order.dt search.dt', function() {
                table.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
                });
            }).draw();

            $('.btn-detail').click(function() {
                let outgoingId = $(this).data('id');
                let list = '';
                $('#modal').modal('show');

                $('#outgoingTable tbody').empty()
                $.get("/outgoing/detail/" + outgoingId, function(data) {
                    $.each(data, function(index, outgoing) {
                        list += '<tr>';
                        list += '<td>' + (index + 1) + '</td>';
                        list += '<td>' + '<img src='+assets(outgoing.medicine.image)+' class="img-thumbnail" width="100px">' + '</td>';
                        list += '<td>' + outgoing.medicine.name + '</td>';
                        list += '<td>' + outgoing.batch.batch_number + '</td>';
                        list += '<td>' + outgoing.batch.expired_date + '</td>';
                        list += '<td>' + outgoing.quantity + '</td>';
                        list += '</tr>';
                    });
                    $('#outgoingTable tbody').append(list)
                });
            });

            $('body').on('click', '.btn-print', function() {
                $('#modalPrint').modal('show');
            })

            $("body").on("click", ".btn-delete", function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: "Delete this item?",
                    text: "Data will be deleted",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, deleted!",
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
