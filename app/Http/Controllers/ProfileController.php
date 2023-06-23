<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employees;
use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index()
    {
        // Get total number of employees
        $totalEmployees = Employees::count();

        // Calculate this month's attendance percentage
        $thisMonth = Carbon::now()->month;
        $thisMonthAttendance = Salary::whereMonth('created_at', $thisMonth)->where('is_salary_calculated', 1)->count();
        $thisMonthAttendancePercentage = ($thisMonthAttendance / $totalEmployees) * 100;

        // Calculate last month's attendance percentage
        $lastMonth = Carbon::now()->subMonth()->month;
        $lastMonthAttendance = Salary::whereMonth('created_at', $lastMonth)->where('is_salary_calculated', 1)->count();
        $lastMonthAttendancePercentage = ($lastMonthAttendance / $totalEmployees) * 100;

        $salaries = Salary::where('is_salary_calculated', 1)->paginate(10);

        return view('/dashboard', compact('totalEmployees', 'thisMonthAttendancePercentage', 'lastMonthAttendancePercentage', 'salaries'));
    }

    public function show(){
        $employees = Employees::all();
        return view('employees', compact('employees'));
    }

    public function editemployee(Employees $employee)
    {
        return view('edit', compact('employee'));
    }

    public function updateemployee(Request $request, Employees $employee)
    {

        $employee->update($request->all());
        // dd($employee);

        return redirect('employees')->with('success', 'Employee updated successfully.');
    }

    public function deleteemployee(Employees $employee)
    {
        $employee->delete();

        return redirect()->route('employees')->with('success', 'Employee deleted successfully.');
    }

    public function createemployee()
    {
        return view('createemployee');
    }

    public function storeemployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'base_salary' => 'required|numeric',
        ]);

        Employees::create($request->all());

        return redirect()->route('employees')->with('success', 'Employee created successfully.');
    }

    public function createsalary()
    {
    $employees = Employees::all();

    return view('createsalary', compact('employees'));
    }

    public function storesalary(Request $request)
    {
    $request->validate([
        'employee_id' => 'required',
        'month' => 'required',
        'year' => 'required',
        'total_working_days' => 'required',
        'total_leave_taken' => 'required',
        'overtime' => 'required',
    ]);

    $existingSalary = Salary::where([
        'employee_id' => $request->employee_id,
        'month' => $request->month,
        'year' => $request->year,
    ])->exists();

    if ($existingSalary) {
        return redirect()->back()->with('error', 'Salary for the selected employee, month, and year already exists.');
    }

    Salary::create([
        'employee_id' => $request->employee_id,
        'month' => $request->month,
        'year' => $request->year,
        'total_working_days' => $request->total_working_days,
        'total_leave_taken' => $request->total_leave_taken,
        'overtime' => $request->overtime,
    ]);

    return redirect()->route('createsalary')->with('success', 'Salary created successfully.');
    }


    // public function salarydetails()
    // {
    //     $salaries = Salary::where('is_salary_calculated', 1)->paginate(10);

    //     return view('dashboard', compact('salaries'));
    // }

}
