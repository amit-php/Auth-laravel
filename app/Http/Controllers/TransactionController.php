<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_Id = Auth::id();
        $transactions = Transaction::with('category')->where('user_id','=',$user_Id)->get();
        return view('admin.expense_list',compact('transactions')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::all();
        return view('admin.add_expense',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'type' => 'required|integer|exists:categories,id', // referencing the 'categories' table
        ]);
        $validatedData['user_id'] = Auth::id();
        try {
            // Create the 800.00category using validated data
            Transaction::create($validatedData);

            // Redirect with success message
            return redirect()->route('expense.index')->with('success', 'Expenses added successfully.');

        } catch (QueryException $e) {
            // Handle query exception and redirect with error message
            return redirect()->back()->withErrors(['name' => 'There is something problem.'])->withInput();
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
