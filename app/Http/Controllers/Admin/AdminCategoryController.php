<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
		$categories = Category::orderByDesc('id')->paginate(10);

		return view('admin.categories.index', [
			'paginator' => $categories,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
    	$item = new Category();
        $result = $item::create($request->only($item->getFillable()));

        if (!$result) {
        	return back()->withErrors(['errors' => 'Ошибка сохранения.']);
		}

        return redirect()
			->route('categories.index')
			->with(['success' => 'Успешно сохранено.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', [
        	'item' => $category,
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $result = $category->update($request->only($category->getFillable()));

        if (!$result) {
        	return back()->withErrors(['errors' => 'Ошибка сохранения.'])->withInput();
		}

        return redirect()
			->route('categories.index')
			->with(['success' => 'Успешно сохранено.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
		if ($category->books->count()) {
			return back()->withErrors(['errors' => 'Нельзя удалить категорию с товарами.']);
		}

        $result = $category->delete();

        if (!$result) {
        	return back()->withErrors(['errors' => 'Ошибка удаления.']);
		}

        return redirect()
			->route('categories.index')
			->with(['success' => 'Успешно удалено.']);
    }
}
