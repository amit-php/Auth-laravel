<x-layout-admin>
    <x-slot:title>add category</x-slot>
    <div class="container mt-4">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <h1>Add New Category</h1>

                <form action="{{ route('type.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Replace with your own form submission URL -->
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" class="form-control h-35 @error('name') is-invalid @enderror" id="name" value="{{ $category->name }}" name="name" required>
                        @error('name')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                       @enderror
                    </div>
                    <button class="btn btn-primary mt-2 text-cente" type="submit">Add Category</button>
                </form>
            </div>
           
        </div>
        </div>
</x-layout-admin>
