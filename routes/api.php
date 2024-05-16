use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);
