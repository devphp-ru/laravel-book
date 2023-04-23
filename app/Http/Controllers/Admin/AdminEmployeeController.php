<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SendMail;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminEmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index(): View
	{
		$employees = Employee::orderByDesc('id')->paginate(10);

		return view('admin.employees.index', [
			'paginator' => $employees,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(): View
	{
		return view('admin.employees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreEmployeeRequest  $request
	 * @return RedirectResponse
	 */
	public function store(StoreEmployeeRequest $request): RedirectResponse
	{
		$request->merge(['password' => Hash::make($request->input('password'))]);

		$item = new Employee();
		$result = $item::create($request->only($item->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранения.']);
		}

		SendMail::send($request);

		return redirect()
			->route('employees.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Employee $employee
	 * @return View
	 */
	public function edit(Employee $employee): View
	{
		return view('admin.employees.edit', [
			'item' => $employee,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateEmployeeRequest $request
	 * @param  Employee $employee
	 * @return RedirectResponse
	 */
	public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
	{
		$password = !empty($request->input('password'))
			? Hash::make($request->input('password'))
			: $employee->password;

		$request->merge(['password' => $password]);

		$result = $employee->update($request->only($employee->getFillable()));

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка сохранинея'])->withInput();
		}

		return redirect()
			->route('employees.index')
			->with(['success' => 'Успешно сохранено.']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Employee $employee
	 * @return RedirectResponse
	 */
	public function destroy(Employee $employee): RedirectResponse
	{
		$result = $employee->delete();

		if (!$result) {
			return back()->withErrors(['errors' => 'Ошибка удаления.']);
		}

		return redirect()
			->route('employees.index')
			->with(['success' => 'Успешно удалено.']);
	}
}
