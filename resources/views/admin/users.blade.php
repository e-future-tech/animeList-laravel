@extends('layouts.admin')

@section('content')
<div class="container">

    <table class="table table-striped rounded-3 shadow overflow-hidden">
        <thead>
            <tr>
                <th scope="col" class="bg-dark text-light">No</th>
                <th scope="col" class="bg-dark text-light">Name</th>
                <th scope="col" class="bg-dark text-light">Email</th>
                <th scope="col" class="bg-dark text-light">Email verified at</th>
                <th scope="col" class="bg-dark text-light">Role</th>
                <th class="bg-dark"></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $result as $key => $item )
            <tr>
                <th scope="col">{{ $key }}</th>
                <td class="col text-capitalize">{{ $item->name }}</td>
                <td class="col">{{ $item->email }}</td>
                <td class="col">{{ $item->email_verified_at }}</td>
                <td class="col text-uppercase">{{ $item->role }}</td>
                <td>
                    <a href="/admin/user/{{ $item->user_id }}" class="btn btn-warning text-dark py-1 px-3 rounded-5">Edit</a>

                    <button class="btn btn-danger py-1 px-3 rounded-5" data-bs-toggle="modal" data-bs-target="#deleteDrop">Delete</button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-light" id="staticBackdropLabel">Warning</h5>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete this user: {{ $item->name }} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="/admin/user/delete/{{ $item->user_id }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




    @session('Success')
    <div class="alert alert-success position-absolute bottom-0 end-0 m-3">{{ session('Success') }}</div>
    @endsession
    @session('Failed')
    <div class="alert alert-danger position-absolute bottom-0 end-0 m-3">{{ session('Failed') }}</div>
    @endsession

</div>
@endsection