@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Developer Level</h6>
        </div>
        <div class="card-body">
            <div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($levels as $key => $level)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $level->level }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('developer.level.edit', ['id' => $level->id]) }}">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal" onclick="confirmDelete({{ $level->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Logout Modal-->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete it.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('developer.level.delete') }}"  onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                    <form id="delete-form" action="{{ route('developer.level.delete') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" id="level_id" name="id" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-specific-scripts')

    <!-- Page level plugins -->
    <script src="{{ asset('public/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('public/js/demo/datatables-demo.js') }}"></script>

    <script>
        function confirmDelete(id)
        {
            $("#level_id").val(id);
        }
    </script>
@endpush