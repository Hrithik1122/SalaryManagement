<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div class="ml-auto">
                <a href="{{ url('/employees') }}" class="btn btn-primary">Employees</a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{route ('updateemployee', $employee->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="title" class="form-control" placeholder="Enter Name here..." value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" id="title" class="form-control" placeholder="Enter Email here..." value="{{$employee->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Mobile</label>
                        <input type="text" name="mobile" id="title" class="form-control" placeholder="Enter Mobile here..." value="{{$employee->mobile}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" id="title" class="form-control" placeholder="Enter Address here..." value="{{$employee->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Base Salary</label>
                        <input type="text" name="base_salary" id="title" class="form-control" placeholder="Enter Base Salary here..." value="{{$employee->base_salary}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
