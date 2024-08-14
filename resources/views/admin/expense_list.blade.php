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
    
        <table class="table table-striped table-hover" id="transactionsTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Expense Type</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            
            <tbody id="expenseTable">
                <!-- Sample Data Row -->
                @foreach ($transactions as $item)
                <tr>
                    <td>{{$item->description}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
                    <td>{{$item->amount}}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <th>Total:</th>
                    <th>Rs. 255</th>
                 
                </tr>
                <!-- Repeat the rows as needed or dynamically generate with PHP/Blade -->
            </tbody>
        </table>
    </div>
</x-layout-admin>
