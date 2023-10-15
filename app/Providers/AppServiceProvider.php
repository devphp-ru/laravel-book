<?php

namespace App\Providers;

use App\Http\Controllers\SiteController;
use App\Models\Book;
use App\Models\Category;
use App\Services\Books\BookServiceInterface;
use App\Services\Books\Commands\CommandQueryBookHandler;
use App\Services\Books\ReadBookService;
use App\Services\Books\Repositories\Eloquent\ReadEloquentBookRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	$this->registerBindings();

        view()->composer('layouts.default', function ($view) {
			$view->with('categories', Category::get());
		});
    }

	/**
	 * Регистрация в контейнере зависимостей
	 */
    private function registerBindings(): void
	{
		$this->app->when(SiteController::class)
			->needs(BookServiceInterface::class)
			->give(function () {
				return new ReadBookService(
					new CommandQueryBookHandler(
						new ReadEloquentBookRepository(
							new Book()
						)
					)
				);
			});
	}

}
