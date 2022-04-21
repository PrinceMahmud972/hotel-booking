@extends('backend.admin_master')
@section('backend_content')
    <div class="row">
        <div class="card col-md-10 col-sm-12">
            <div class="card-header">
                <h2>Expense Information Details
                    <a href="{{ route('expense') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </h2>
                
                <hr>
            </div>
           <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Expense Name: </strong> {{ $expense_data->expense_name }}</li>
                    <li class="list-group-item"><strong>Expense Amount:</strong> {{ $expense_data->expense_amount }} TK</li>
                    <li class="list-group-item"><strong>Expense Date:</strong> {{ $expense_data->expense_date }}</li>
                    <li class="list-group-item"><strong>Prepared By:</strong> {{ $expense_data->prepared_by }}</li>
                    <li class="list-group-item"><strong>Created Date:</strong> {{ date('d-m-Y h:i:s A', strtotime($expense_data->created_at)) }}</li>
                    <li class="list-group-item"><strong>Updated Date:</strong> {{ date('d-m-Y h:i:s A', strtotime($expense_data->updated_at)) }}</li>
                    <li class="list-group-item"><strong>Expense Note:</strong> <br> {{ $expense_data->expense_note }}</li>
                </ul>
           </div>
           <div class="card-footer">
               <strong>Expense Receipt:</strong>
               <hr>
               <img src="{{ asset($expense_data->expense_doc) }}" height="400px" width="100%" style="object-fit: contain" alt="">
           </div>
        </div>
    </div>
@endsection