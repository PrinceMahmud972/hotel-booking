@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('expense.form') }}" class="btn btn-primary btn-sm">Add New Expense</a><br><br>
        <div class="card mb-4">
            <!--------- Success Message Show--------->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            @endif
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Expense Name</th>
                        <th scope="col">Expense Amount</th>
                        <th scope="col">Expense Note</th>
                        <th scope="col">Date(Y-m-d)</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_data as $data)
                        <tr>
                            <th scope="row">{{ $loop->index+1; }}</th>
                            <td>{{ $data->expense_name }}</td>
                            <td>{{ $data->expense_amount }}</td>
                            <td>{{ $data->expense_note }}</td>
                            <td>{{ $data->expense_date }}</td>
                            <td>
                                <img style="height:80px; widht:100px; object-fit:cover" src="{{ asset($data -> expense_doc) }}" alt="">
                            </td>
                            @if (Auth::user()->role == '1')
                            <td>
                                <a href="{{ route('expense.view', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('expense.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('expense.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            @else
                            <td>
                                <a href="{{ route('expense.view', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection