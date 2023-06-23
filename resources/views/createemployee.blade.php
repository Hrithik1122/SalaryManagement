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
                    <h2>Create Employees</h2>
                <form action="{{route ('storeemployee') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="name">Name <span style="color: red">*</span></label>
                        <input type="text" name="name" id="title" class="form-control" placeholder="Enter Name here..." required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email <span style="color: red">*</span></label>
                        <input type="text" name="email" id="title" class="form-control" placeholder="Enter Email here..." required>
                    </div>
                    <div class="form-group">
                        <label for="name">Mobile <span style="color: red">*</span></label>
                        <input type="text" name="mobile" id="title" class="form-control" placeholder="Enter Mobile here..." required>
                    </div>
                    <div class="form-group">
                        <label for="name">Address <span style="color: red">*</span></label>
                        <input type="text" name="address" id="title" class="form-control" placeholder="Enter Address here..." required>
                    </div>
                    <div class="form-group">
                        <label for="name">Base Salary <span style="color: red">*</span></label>
                        <input type="text" name="base_salary" id="title" class="form-control" placeholder="Enter Base Salary here..." required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
