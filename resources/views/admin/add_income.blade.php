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
            <div class="col-md-6">
                <h1>Income List</h1>

                <!-- Example Category List -->
                <ul class="list-group">
                    <!-- Example category items -->
                    @foreach ($incomesList as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->income }}
                        <span>{{ $category->date}}</span>
                        <span>
                            
                            <a href="{{ route('income.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('income.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        </div>
</x-layout-admin>
