<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

  <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: #ddd;
            padding: 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #575d63;
            color: white;
        }
        .main-content {
            margin-left: 250px; /* Same as the width of the sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

        <h3 class="text-center text-white">My Dashboard</h3>
        <a href="{{route('expense.index')}}">Expenses</a>
        <a href="{{route('type.index')}}">Expense Category</a>
        <a href="{{route('expense.create')}}">Add Expense</a>
        <a href="{{route('income.create')}}">Add Income</a>
        <a href="#settings">Settings</a>
        <a><form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <!-- Display success message -->
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
      {{$slot}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

<script>
    /* Initialization of datatables */
    $(document).ready(function ($) {
        $('.transactionsTable').DataTable();
    });
</script>
</body>
</html>
