<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomesList = Income::all();
        return view('admin.add_income',compact('incomesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $incomesList = Income::all();
       return view('admin.add_income',compact('incomesList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'income' => 'required|numeric|min:0',
            'date' => 'required|date'
        ]);
        $validatedData['user_id'] = Auth::id();
        try {
            Income::create($validatedData);
            return redirect()->route('income.index')->with('success', 'Income added successfully.');

        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['name' => 'There is something problem.'])->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $incomes = Income::find($id);
      return view('admin.edit_income',compact('incomes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'income' => 'required|numeric|min:0' . $id,
            'date' => 'required|date'
        ]);
       
        try {
            $income = Income::find($id);
            $income->income = $request->income;
            $income->date = $request->date;
            $income->save();

            return redirect()->route('income.index')->with('success', 'Income updated successfully.');
        } catch (QueryException $e) {
            // Handle query exception and redirect with error message
            return redirect()->back()->withErrors(['name' => 'There is something problem.'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       // Find the category by ID
       $incomes = Income::find($id);

       // Check if the category exists
       if ($incomes) {
           // Delete the category
           $incomes->delete();

           // Return a success message
           return redirect()->route('income.index')->with('success', 'Income deleted successfully.');
       } else {
           // Return an error message if the category doesn't exist
           return redirect()->route('type.index')->with('error', 'Income not found.');
       }
    }
}
