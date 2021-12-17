@extends('layouts.app')
@section('title', 'Books')
@section('header', 'Books')
@section('menu', 'Book')
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
                    <h3 class="card-title">{{ __('List Data Books') }}</h3>
                </div>
                <div class="box-header mt-2 ml-4">
                    <a href="{{ route('books.create') }}" class="btn btn-primary" role="button" title="Add Data"><i
                            class="nav-icon far fa-plus-square"></i> Add Book</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Images</th>
                                <th>Book Code</th>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th width="19%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($book->image)
                                            <img src="{{ $book->Img }}" alt="{{ $book->title }}" class="img-thumbnail"
                                                width="100px" height="100px">
                                        @else
                                            <img src="{{ asset('storage/images/no-image.png') }}"
                                                alt="{{ $book->title }}" class="img-thumbnail" width="100px"
                                                height="100px">
                                        @endif
                                    </td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->IsReturned }}</td>
                                    {{-- <td>{{ $book->stock }}</td> --}}
                                    <td>{!! $book->BookStatus !!}</td>
                                    <td>
                                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-folder">
                                            </i> View</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-pencil-alt">
                                            </i> Edit</a>
                                        <button class="btn btn-danger btn-sm" aria-label="Delete" type="submit"
                                            onclick="deleteAlert('{{ $book->id }}', 'Delete Book {{ $book->name }}')"><i
                                                class="fas fa-trash">
                                            </i> Delete</button>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            class="d-inline" id="Delete{{ $book->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="1%">#</th>
                                <th>Images</th>
                                <th>Book Code</th>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th width="19%">Action</th>
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
