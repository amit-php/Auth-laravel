<x-layout-admin>
    <x-slot:title>edit income</x-slot>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <h1>Edit income</h1>

                <form action="{{ route('income.update', $incomes->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Replace with your own form submission URL -->
                    <div class="form-group">
                        <label for="name">Incomes:</label>
                        <input type="text" class="form-control h-35 @error('income') is-invalid @enderror" id="name" value="{{ $incomes->income }}" name="income" >
                        @error('income')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Date:</label>
                        <input type="date" class="form-control h-35 @error('date') is-invalid @enderror" id="date" value="{{ $incomes->date }}" name="date" >
                        @error('date')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <button class="btn btn-primary mt-2 text-cente" type="submit">update</button>
                </form>
            </div>
           
        </div>
        </div>
</x-layout-admin>
