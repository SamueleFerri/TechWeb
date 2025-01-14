<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileAdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LikeAlbumsController;
use App\Http\Controllers\LikeCoursesController;
use App\Http\Controllers\LikeGadgetsController;
use App\Http\Controllers\BagController;
use App\Http\Controllers\BagAlbumsController;
use App\Http\Controllers\BagCoursesController;
use App\Http\Controllers\BagGadgetsController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/albums', function () {
    return view('albums');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/bag', function () {
    return view('bag');
})->middleware(['auth', 'verified'])->name('bag');

Route::get('/order', function () {
    return view('order');
})->middleware(['auth', 'verified'])->name('order');

Route::get('/likes', function () {
    return view('likes');
})->middleware(['auth', 'verified'])->name('likes');

Route::get('/gadgets', function () {
    return view('gadgets');
});

Route::post('/empty-cart', function (Request $request) {
    try {
        $totaleOrdine = $request->input('parametro');
        $userId = auth::id();

        $carrello = DB::table('carrelli')
            ->where('user_id', $userId)
            ->first();

        if (!$carrello) {
            throw new \Exception('Carrello non trovato.');
        }

        DB::table('ordini')->insert([
            'carrelli_id' => $carrello->id,
            'data' => now()->toDateString(),
            'totale_ordine' => $totaleOrdine
        ]);

        $carrello = DB::table('ordini')
            ->where('carrelli_id', $carrello->id)
            ->orderBy('id', 'desc') 
            ->first();

        DB::table('notifiche')->insert([
            'user_id' => $userId,
            'tipologia' => "Nuovo Ordine",
            'note' => "Id Ordine: " . $carrello->id,
            'stato' => true
        ]);

        // Svuota i carrelli
        DB::table('albums_in_carrelli')->truncate();
        DB::table('corsi_in_carrelli')->truncate();
        DB::table('gadgets_in_carrelli')->truncate();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        Log::error('Errore in /empty-cart: ' . $e->getMessage());
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
})->middleware(['auth', 'verified'])->name('empty-cart');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile-admin', [ProfileAdminController::class, 'edit'])->name('profile.edit_admin');
    Route::patch('/profile-admin', [ProfileAdminController::class, 'update'])->name('profile.update_admin');
    Route::delete('/profile-admin', [ProfileAdminController::class, 'destroy'])->name('profile.destroy_admin');
});

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/admin/notifications', function () {
    return view('admin.notifications');
})->middleware(['auth', 'admin'])->name('notifications');

// Mostra gli articoli preferiti
Route::get('/like', [LikeController::class, 'showLikes'])->name('like.show');
// Rimuovi un elemento dai preferiti
Route::post('/like/remove', [LikeController::class, 'removeFromLikes'])->name('like.remove');

// Mostra gli articolii in carrelli
Route::get('/bag', [BagController::class, 'showBags'])->name('bag.show');
// Rimuovi un elemento dai carrelli
Route::post('/bag/remove', [BagController::class, 'removeFromBags'])->name('bag.remove');

/* Route::post('/like-album', [LikeAlbumsController::class, 'toggleLike'])->name('like.albums.toggle');
Route::post('/like-corso', [LikeCoursesController::class, 'toggleLike'])->name('like.courses.toggle');
Route::post('/like-gadget', [LikeGadgetsController::class, 'toggleLike'])->name('like.gadgets.toggle');
Route::post('/bag-album', [BagAlbumsController::class, 'toggleBag'])->name('bag.albums.toggle');
 */
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/like-album', [LikeAlbumsController::class, 'toggleLike'])->name('like.albums.toggle');
    Route::post('/like-corso', [LikeCoursesController::class, 'toggleLike'])->name('like.courses.toggle');
    Route::post('/like-gadget', [LikeGadgetsController::class, 'toggleLike'])->name('like.gadgets.toggle');
    Route::post('/bag-album', [BagAlbumsController::class, 'toggleBag'])->name('bag.albums.toggle');
    Route::post('/bag-corso', [BagCoursesController::class, 'toggleBag'])->name('bag.courses.toggle');
    Route::post('/bag-gadget', [BagGadgetsController::class, 'toggleBag'])->name('bag.courses.toggle');
});