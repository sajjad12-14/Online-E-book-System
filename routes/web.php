 <?php
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompetitionSubmissionController as AdminCompetitionSubmissionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompetitionSubmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferBookController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/hero-slider', [AdminController::class, 'heroSlider'])
        ->name('admin.hero-slider');

    Route::get('/hero-slider/create', [AdminController::class, 'createHeroSlider'])
        ->name('admin.hero-slider.create');

    Route::post('/hero-slider/store', [AdminController::class, 'storeHeroSlider'])
        ->name('admin.hero-slider.store');

    Route::get('/hero-slider/edit/{id}', [AdminController::class, 'editHeroSlider'])
        ->name('admin.hero-slider.edit');

    Route::post('/hero-slider/update/{id}', [AdminController::class, 'updateHeroSlider'])
        ->name('admin.hero-slider.update');

    Route::get('/hero-slider/delete/{id}', [AdminController::class, 'deleteHeroSlider'])
        ->name('admin.hero-slider.delete');

    Route::get('/hero-slider/status/{id}', [AdminController::class, 'changeHeroSliderStatus'])
        ->name('admin.hero-slider.status');

    Route::get('/books', [BookController::class, 'index'])
        ->name('admin.books');

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('admin.books.create');

    Route::post('/books/store', [BookController::class, 'store'])
        ->name('admin.books.store');

    Route::get('/books/edit/{id}', [BookController::class, 'edit'])
        ->name('admin.books.edit');

    Route::post('/books/update/{id}', [BookController::class, 'update'])
        ->name('admin.books.update');

    Route::get('/books/delete/{id}', [BookController::class, 'delete'])
        ->name('admin.books.delete');

    Route::get('/books/status/{id}', [BookController::class, 'changeStatus'])
        ->name('admin.books.status');

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('admin.categories');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('admin.categories.create');

    Route::post('/categories/store', [CategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])
        ->name('admin.categories.edit');

    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])
        ->name('admin.categories.update');

    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])
        ->name('admin.categories.delete');

    Route::get('/categories/status/{id}', [CategoryController::class, 'changeStatus'])
        ->name('admin.categories.status');

    Route::get('/authors', [AuthorController::class, 'index'])
        ->name('admin.authors');

    Route::get('/authors/create', [AuthorController::class, 'create'])
        ->name('admin.authors.create');

    Route::post('/authors/store', [AuthorController::class, 'store'])
        ->name('admin.authors.store');

    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])
        ->name('admin.authors.edit');

    Route::post('/authors/update/{id}', [AuthorController::class, 'update'])
        ->name('admin.authors.update');

    Route::get('/authors/delete/{id}', [AuthorController::class, 'delete'])
        ->name('admin.authors.delete');

    Route::get('/authors/status/{id}', [AuthorController::class, 'changeStatus'])
        ->name('admin.authors.status');

    Route::get('/competitions', [AdminController::class, 'competitions'])
        ->name('admin.competitions');

    Route::get('/admin/orders', [AdminController::class, 'orders'])
        ->name('admin.orders');

    Route::get('/admin/orders/{id}', [AdminController::class, 'orderDetails'])
        ->name('admin.orders.details');

    Route::post('/admin/orders/status/{id}', [AdminController::class, 'updateOrderStatus'])
        ->name('admin.orders.status');

    Route::get('/messages', [AdminController::class, 'messages'])
        ->name('admin.messages');

    Route::get('/settings', [AdminController::class, 'settings'])
        ->name('admin.settings');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('admin.orders');

    Route::get('/orders/{id}', [OrderController::class, 'show'])
        ->name('admin.orders.details');

    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus'])
        ->name('admin.orders.status');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])
        ->name('admin.orders.delete');

    Route::get('/competition-submissions',
        [AdminCompetitionSubmissionController::class, 'index'])
        ->name('admin.competition.submissions');

    Route::get('/competition-submissions/show/{id}',
        [AdminCompetitionSubmissionController::class, 'show'])
        ->name('admin.competition.submissions.show');

    Route::post('/competition-submissions/status/{id}',
        [AdminCompetitionSubmissionController::class, 'changeStatus'])
        ->name('admin.competition.submissions.status');

    Route::get('/competition-submissions/delete/{id}',
        [AdminCompetitionSubmissionController::class, 'delete'])
        ->name('admin.competition.submissions.delete');

    Route::post('/competition-submissions/winner/{id}',
        [AdminCompetitionSubmissionController::class, 'makeWinner'])
        ->name('admin.competition.submissions.winner');

    Route::get('/contacts',
        [AdminContactController::class, 'index'])
        ->name('admin.contacts');

    Route::get('/contacts/show/{id}',
        [AdminContactController::class, 'show'])
        ->name('admin.contacts.show');

    Route::get('/contacts/delete/{id}',
        [AdminContactController::class, 'delete'])
        ->name('admin.contacts.delete');

});

Route::get('/register',
    [AuthController::class, 'register'])
    ->name('register');

Route::post('/register',
    [AuthController::class, 'registerStore'])
    ->name('register.store');

Route::get('/login',
    [AuthController::class, 'login'])
    ->name('login');

Route::post('/login',
    [AuthController::class, 'loginCheck'])
    ->name('login.check');

Route::post('/logout',
    [AuthController::class, 'logout'])
    ->name('logout');

Route::post('/admin/logout', function () {

    Auth::logout();

    session()->invalidate();
    session()->regenerateToken();

    return redirect()->route('login');

})->name('admin.logout');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');

    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');

});

Route::get('/thank-you', function () {

    return view('User.thank-y');
})->name('thank.you');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.place');

Route::get('/checkout', [CartController::class, 'checkout'])
    ->name('checkout');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');
Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/', [Usercontroller::class, 'Home']);

Route::get('/popular-books', [Usercontroller::class, 'popularBooks'])
    ->name('popular.books');

Route::get('/best-selling-books', [Usercontroller::class, 'bestSellingBooks'])
    ->name('best.selling.books');

Route::get('/offer-books', [OfferBookController::class, 'index'])
    ->name('offer.books');

Route::get('/book/{slug}', [Usercontroller::class, 'bookDetails'])
    ->name('book.details');

Route::get('/competitions', [Usercontroller::class, 'competitions'])
    ->name('competitions');
Route::get('/competition/{slug}', [Usercontroller::class, 'competitionDetails'])
    ->name('competition.details');

Route::get('/competition/{slug}/submit',
    [CompetitionSubmissionController::class, 'create'])
    ->name('competition.submit');

Route::post('/competition/submit',
    [CompetitionSubmissionController::class, 'store'])
    ->name('competition.submit.store');
Route::get('/competition/{slug}/submit',
    [CompetitionSubmissionController::class, 'create'])
    ->name('competition.submit');

Route::get('/winner/{id}', [Usercontroller::class, 'winnerProfile'])
    ->name('winner.profile');
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/about', function () {
    return view('User.about');
})->name('about');
Route::get('/blog', function () {
    return view('User.blog');
})->name('blog');
Route::get('/books', [HomeController::class, 'books'])->name('books');
