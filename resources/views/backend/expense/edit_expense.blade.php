@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Expense Data</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}</strong>
                <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('expense.update', $all_data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="expenseName">Expense Name<span class="text-danger">*</span></label>
                        <input type="text" name="expense_name" value="{{ $all_data->expense_name }}" class="form-control" id="expenseName" required/>
                    </div>
                    <div class="form-group">
                        <label for="expenseAmount">Expense Amount<span class="text-danger">*</span></label>
                        <input type="text" name="expense_amount" value="{{ $all_data->expense_amount }}" class="form-control" id="expenseAmount" />
                    </div>
                    <div class="form-group">
                        <label for="expenseNote">Expense Note<span class="text-danger">*</span></label>
                        <textarea name="expense_note" class="form-control" id="" cols="15" rows="5">{{ $all_data->expense_note }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="expenseDocument">Attach Expense Document <span class="text-danger">*</span></label>
                        <input type="file" name="expense_doc_new" class="form-control" id="expenseDocument" />
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($all_data->expense_doc) }}" style="height: 200px; width:250px" alt="">
                    </div>
                    <div class="form-group">
                        <label for="preparedBy">Prepared By<span class="text-danger"></span></label>
                        <input type="text" name="prepared_by" value="{{ Auth::user()->name }}" class="form-control" id="preparedBy" readonly />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection