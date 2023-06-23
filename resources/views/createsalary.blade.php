<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div class="ml-auto">
                <a href="{{ route('employees') }}" class="btn btn-primary">Employees</a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Create Employees Salary</h2>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{route ('storesalary') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employee_id">Employee Name <span style="color: red">*</span></label>
                            <select name="employee_id" id="employee_id" class="form-control" required>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="month">Month <span style="color: red">*</span></label>
                            <input type="text" name="month" id="month" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year <span style="color: red">*</span></label>
                            <input type="text" name="year" id="year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_working_days">Total Working Days <span style="color: red">*</span></label>
                            <input type="number" name="total_working_days" id="total_working_days" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_leave_taken">Total Leave Taken <span style="color: red">*</span></label>
                            <input type="number" name="total_leave_taken" id="total_leave_taken" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="overtime">Overtime <span style="color: red">*</span></label>
                            <input type="number" name="overtime" id="overtime" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
