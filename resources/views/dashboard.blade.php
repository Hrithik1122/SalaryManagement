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
                    <div>Total Employee: {{$totalEmployees}}</div>
                <div>This Month Attendance Percentage: {{ $thisMonthAttendancePercentage }}%</div>
                <div>Last Month Attendance Percentage: {{ $lastMonthAttendancePercentage }}%</div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Total Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaries as $salary)
                            <tr>
                                <td>{{ $salary->employee->name }}</td>
                                <td>{{ $salary->total_salary_made }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $salaries->links() }}
            </div>
        </div>
    </div>
    
</x-app-layout>
