<x-layout>
    <x-slot:title>regester</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4"> <!-- Control form width with Bootstrap classes -->
                <div class="login-container bg-white p-4 rounded shadow-sm">
                    <h2 class="text-center mb-4">Signup</h2>
                    <form action="{{route('regesterSave')}}" method="POST">
                        @csrf
                    <div class="mb-3">
                            <label for="name" class="form-label">Name </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name">
                            @error('name')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter your email">
                            @error('email')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter your password">
                            @error('password')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" placeholder="Enter your password">
                            @error('password_confirmation')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">signup</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
