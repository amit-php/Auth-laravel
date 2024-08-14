<x-layout-admin>
    <x-slot:title>add income</x-slot>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <h1>Add New Income</h1>

                <form action="{{route('income.store')}}" method="POST">
                    @csrf
                    <!-- Replace with your own form submission URL -->
                    <div class="form-group">
                        <label for="name">Add income:</label>
                        <input type="number" class="form-control h-35 @error('income') is-invalid @enderror" id="income" name="income" required>
                        @error('income')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Add date:</label>
                        <input type="date" class="form-control h-35 @error('date') is-invalid @enderror" id="income" name="date" required>
                        @error('income')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <button class="btn btn-primary mt-2 text-cente" type="submit">Add Category</button>
                </form>
            </div>
            <!-- Category List Column -->
            
        </div>
        </div>
</x-layout-admin>
