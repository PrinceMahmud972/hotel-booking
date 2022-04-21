<?php

namespace App\Http\Controllers\Backend;

use App\Models\Expnese;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ExpenseController extends Controller
{
    /**
     *  show all expense list
     */
    public function index()
    {
        $all_data = Expnese::latest()->get();
        return view('backend.expense.index', compact('all_data'));
    }
    /**
     *  create  expense form 
     */
    public function showExpenseForm()
    {
        return view('backend.expense.create_expense');
    }
    /**
     * store expense form data
     */
    public function storeExpenseData(Request $request)
    {
        $validateData = $request->validate([
            'expense_name'  => 'required',
            'expense_amount'   => 'required',
            'expense_note'  => 'required',
            'expense_doc'  => 'required',
        ]);

        $expenseData = new Expnese();

        //image file upload process
        $image = $request -> file('expense_doc');
        $name_gen = hexdec(uniqid()).'.'.$image -> getClientOriginalExtension();
        Image::make($image) -> resize(970,1000) -> save('upload/images/expense/'.$name_gen);
        $save_url = 'upload/images/expense/'.$name_gen;

        $expenseData->expense_name = $request->expense_name;
        $expenseData->expense_amount = $request->expense_amount;
        $expenseData->expense_note = $request->expense_note;
        $expenseData->expense_doc = $save_url;
        // $expenseData->expense_date = Carbon::now();
        $expenseData->expense_date = date('Y-m-d H:i:s');
        $expenseData->prepared_by = Auth::user()->name;
        $expenseData->save();
        return redirect()->route('expense')->with('success', 'Expense Data Added Successful');
    }
    /**
     *  delete expense data
     */
    public function expenseDataDelete(Request $request, $id)
    {
        $employee_data = Expnese::findOrFail($id);
        unlink($employee_data->expense_doc);
        Expnese::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data Deleted Successful');
    }
    /***
     * Expense data edit
     */
    public function editExpenseData($id)
    {
        $all_data = Expnese::findOrFail($id);
        return view('backend.expense.edit_expense', compact('all_data'));
    }
    /**
     *  Update expense Data
     */
    public function updateExpenseData(Request $request, $id)
    {
        $validateData = $request->validate([
            'expense_name'   => 'required',
            'expense_amount'   => 'required',
            'expense_note'   => 'required',
        ]);

        $expense_doc_new = $request -> file('expense_doc_new');

        if($expense_doc_new){

            $expense_data = Expnese::findOrFail($id);

            $image = $request->file('expense_doc_new');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,1000)->save('upload/images/expense/'.$name_gen);
            $save_url = 'upload/images/expense/'.$name_gen;

            //delete old photo
            $old_image = $expense_data->expense_doc;
            unlink($old_image);

            $expense_data->expense_name = $request->expense_name;
            $expense_data->expense_amount = $request->expense_amount;
            $expense_data->expense_note = $request->expense_note;
            $expense_data->expense_doc = $save_url;
            $expense_data->expense_date = Carbon::now();
            $expense_data->prepared_by = Auth::user()->name;
            $expense_data->update();
            return redirect()-> route('expense')->with("success",'Data Updated Successful with Image');
        }else{
            $expense_data = Expnese::findOrFail($id);
            $expense_data->expense_name = $request->expense_name;
            $expense_data->expense_amount = $request->expense_amount;
            $expense_data->expense_note = $request->expense_note;
            $expense_data->expense_date = Carbon::now();
            $expense_data->prepared_by = Auth::user()->name;
            $expense_data->update();
            return redirect()-> route('expense') -> with("success",'Data Updated Successful');
        }
    }
    /**
     *  view expense data
     */
    public function viewExpenseData($id)
    {
        $expense_data = Expnese::findOrFail($id);
        return view('backend.expense.view',compact('expense_data'));
    }
}
