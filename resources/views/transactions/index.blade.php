@extends('layouts.app')
@section('title', 'Transactions')
@section('header', 'Transactions')
@section('menu', 'Transaction')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('List Data Transaction') }}</h3>
                </div>
                <div class="box-header mt-2 ml-4">
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary" role="button" title="Add Data"><i
                            class="nav-icon far fa-plus-square"></i> Add Transaction</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Transaction Code</th>
                                <th>Member Name</th>
                                <th>Book Name</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th width="17%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->transaction_code }}</td>
                                    <td>{{ $transaction->member->name }}</td>
                                    <td>{{ $transaction->book->title }}</td>
                                    <td>{{ $transaction->return_date }}</td>
                                    <td>{!! $transaction->status !!}</td>
                                    <td>
                                        <form action="{{ route('transactions.return', $transaction->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_returned" value="1">
                                            @if ($transaction->is_returned == 0)
                                                <button type="submit" class="btn btn-success btn-sm" title="Return Book"><i
                                                        class="nav-icon fas fa-check"></i>
                                                    Return</button>
                                            @else
                                                <button type="submit" class="btn btn-danger btn-sm" title="Return Book"
                                                    disabled><i class="nav-icon fas fa-times"></i>
                                                    Returned</button>
                                            @endif
                                            {{-- <button type="submit" class="btn btn-primary btn-sm" title="Returned"><i
                                                    class="nav-icon fas fa-undo-alt"></i> Return</button> --}}
                                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-business-time"></i>
                                                Extend</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="1%">#</th>
                                <th>Transaction Code</th>
                                <th>Member Name</th>
                                <th>Book Name</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th width="17%">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

@endsection


@push('page_scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["pageLength", "copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    @include('alert.delete')
@endpush
<!-- Page specific script -->
@endsection
