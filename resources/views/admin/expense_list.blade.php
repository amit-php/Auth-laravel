<x-layout-admin>
    <x-slot:title>expenses</x-slot>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h3>Expenses</h3>
            </div>
            <div class="col text-right" id="customSearchContainer">
                <input type="text" class="form-control" id="search" placeholder="Search...">
            </div>
        </div>
    
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Income</th>
                    <th scope="col">Expense</th>
                    <th scope="col">Blance</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            
            <tbody id="expenseTable">
                <!-- Sample Data Row -->
                {{-- @foreach ($result as $item)
    <p>Date: {{ $item['date'] }}</p>
    <p>Month: {{ $item['month'] }}</p>
    <p>Total Income: {{ $item['total_income'] }}</p>
    <p>Total Expense: {{ $item['total_expense'] }}</p>
    <p>Balance: {{ $item['balance'] }}</p>
    <hr>
@endforeach --}}
                 @foreach ($result as $k=>$item)
                <tr>
                    <td>{{++$k}}</td>
                    <td>{{$item['date']}}</td>
                    <td>{{$item['total_income']}}</td>
                    <td>{{ $item['total_expense']}}</td>
                    <td>{{$item['balance']}}</td>
                    <td> <a href="{{ route('expense.show', ['expense' =>$item['date'] ]) }}?e={{ $item['total_expense'] }}&in={{ $item['total_income'] }}" class="btn btn-warning btn-sm">View details</a><td>
                    </tr>
                @endforeach
                <!-- Repeat the rows as needed or dynamically generate with PHP/Blade -->
            </tbody>
        </table>
    </div>
</x-layout-admin>
