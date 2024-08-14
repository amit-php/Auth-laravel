<x-layout-admin>
    <x-slot:title>add expense</x-slot>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <div class="form-container">
                <h1>Add Expense</h1>

                <form action="{{route('expense.store')}}" method="POST" class="p-4 shadow-sm rounded bg-light">
                    @csrf
                
                    <!-- Amount -->
                    <div class="form-group mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" class="form-control @error('name') is-invalid @enderror" id="amount" name="amount" required placeholder="Enter amount" step="0.01">
                        @error('amount')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                
                    <!-- Date -->
                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required>
                        @error('date')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                
                    <!-- Expense Description -->
                    <div class="form-group mb-3">
                        <label for="expense" class="form-label">Expense Description:</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="expense" name="description"  placeholder="Enter expense description">
                        @error('description')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                   
                    <!-- Expense Type -->
                    <div class="form-group mb-4">
                        <label for="expense_type" class="form-label">Expense Type:</label>
                        <select class="form-control @error('type') is-invalid @enderror" id="expense_type" name="type" required>
                            <option value="">Select type</option>
                           @foreach ($categorys as $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                        @error('type')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Add Expense</button>
                </form>
                
    </div>
            </div>
            
        </div>
        </div>
</x-layout-admin>
