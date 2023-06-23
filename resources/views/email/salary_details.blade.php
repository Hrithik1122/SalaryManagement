{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary Management</title>
</head>
<body>

    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sint numquam temporibus voluptate at doloribus dolorem consectetur reprehenderit explicabo unde esse, assumenda voluptatibus odit cumque, ea a quae porro placeat.</p>
    <p>Thank You:</p>

</body>
</html> --}}

@component('mail::message')
# Salary Details

Dear {{ $salary->employee->name }},

Here are the details of your salary for the month of {{ $salary->month }} {{ $salary->year }}:

- Total Working Days: {{ $salary->total_working_days }}
- Total Leaves Taken: {{ $salary->total_leave_taken }}
- Overtime Hours: {{ $salary->overtime }}
- Total Salary Made: {{ $salary->total_salary_made }}

Thank you for your hard work!

Regards,
Your Company
@endcomponent
