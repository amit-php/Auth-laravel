<x-layout>
    <x-slot:title>login</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4"> <!-- Control form width with Bootstrap classes -->
                <div class="login-container bg-white p-4 rounded shadow-sm">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{route('logincheck')}}" method="POST">
                        @csrf
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
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="register-link mt-3 text-center">
                        <a href="{{route('signup')}}">Don't have an account? Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
