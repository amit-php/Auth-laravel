<x-layout-admin>
    <x-slot:title>add category</x-slot>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <h1>Add New Category</h1>

                <form action="{{route('type.store')}}" method="POST">
                    @csrf
                    <!-- Replace with your own form submission URL -->
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control h-35 @error('name') is-invalid @enderror" id="name" name="name" required>
                        @error('name')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <button class="btn btn-primary mt-2 text-cente" type="submit">Add Category</button>
                </form>
            </div>
            <!-- Category List Column -->
            <div class="col-md-6">
                <h1>Category List</h1>

                <!-- Example Category List -->
                <ul class="list-group">
                    <!-- Example category items -->
                    @foreach ($all_Category as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <span>
                            <a href="{{ route('type.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('type.destroy', $category->id) }}" method="POST" style="display: inline;">
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
