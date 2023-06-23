<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Salary;
use App\Models\Employees;
use App\Mail\SalaryDetails;
use Illuminate\Support\Facades\Mail;

class CalculateSalaries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculate-salaries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $salaries = Salary::with('employee')->where('is_salary_calculated', 0)->get();

        foreach ($salaries as $salary) {
        $perDaySalary = $salary->employee->base_salary / $salary->total_working_days;
        $totalSalary = $perDaySalary * ($salary->total_working_days - $salary->total_leave_taken + $salary->overtime / 8);

        $salary->update([
            'total_salary_made' => $totalSalary,
            'is_salary_calculated' => 1,
        ]);

        \Log::info("Salary Calculated Successfully...");
        
        // Send email notification
        // \Mail::to($salary->employee->email)->queue(new SalaryDetails($salary));
        Mail::to($salary->employee->email)->send(new SalaryDetails($salary));

        }  
    }
}
