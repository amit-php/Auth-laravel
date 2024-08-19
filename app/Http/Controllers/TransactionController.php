<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Income;
use App\Models\BalanceSheet;
use Carbon\Carbon;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_Id = Auth::id();
      $expenses = Transaction::select(
        DB::raw('YEAR(date) as year'),
        DB::raw('MONTH(date) as month'),
        DB::raw('SUM(amount) as total_expense')
       )
        ->where('user_id', $user_Id)
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        //
        $incomes = Income::select(
            DB::raw('YEAR(date) as year'),
            DB::raw('MONTH(date) as month'),
            DB::raw('SUM(income) as total_income')
           )
            ->where('user_id', $user_Id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
      
        $result = [];

// Combine the income and expense data
foreach ($incomes as $income) {
    foreach ($expenses as $expense) {
        if ($income['year'] == $expense['year'] && $income['month'] == $expense['month']) {
            $balance = $income['total_income'] - $expense['total_expense'];
           // $date = DateTime::createFromFormat('!Y-m', "$income['year']-$income['month']");
            $dateString = $income['month'].'/'.$income['year'];
            $date = Carbon::createFromFormat('m/Y', $dateString);
            $result[] = [
               
                "date" => $date->format('M, Y'),
                "total_income" => $income['total_income'],
                "total_expense" => $expense['total_expense'],
                "balance" => number_format($balance, 2)
            ];
        }
    }
}
return view('admin.expense_list',compact('result')); 
// Output the result
//return $result;
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
    public function show($date,Request $request)
    {
        $totalincome = $request->query('in');
        $totalexpance = $request->query('e');
        $blance = $totalincome - $totalexpance ;
       // $date = $date;
        //echo $income;
        $user_Id = Auth::id();
        $dates = Carbon::createFromFormat('M, Y', $date);
        $month = $dates->format('m'); // July
        $year = $dates->format('Y');
      
        $transactions = Transaction::with('category')
            ->where('user_id', $user_Id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();
            return view('admin.blance_details', compact('transactions','date','totalincome','totalexpance','blance'));
            //return $transactions;
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
