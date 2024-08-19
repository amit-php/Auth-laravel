<x-layout-admin>
    <x-slot:title>blance</x-slot>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h3>Blance sheet ({{$date}})</h3>
            </div>
            
        </div>
    
        <table class="table table-striped table-hover transactionsTable" >
            <thead class="thead-dark">
                <tr>
                    <tr>
                        <th scope="col">Sr no.</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Expense Type</th>
                        <th scope="col">Amount</th>
                    </tr>
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
                 @foreach ($transactions as $k=>$item)
                <tr>
                    <td>{{++$k}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
                    <td>{{$item->amount}}</td>
                </tr>
                @endforeach
                <!-- Repeat the rows as needed or dynamically generate with PHP/Blade -->
            </tbody>
        </table>
        <div class="row">
            <div class="col-4">
            <h3>Total income : {{$totalincome}}</h3>
            </div>
            <div class="col-4">
            <h3>Total expense : {{$totalexpance}}</h3>
            </div>
            <div class="col-4">
                <h3>Total Blance : {{$blance}}</h3>
                </div>
        </div>
    </div>
</x-layout-admin>
