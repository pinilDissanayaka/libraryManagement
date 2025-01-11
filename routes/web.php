<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsPaperController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\NoticeController;




Route::get('/', [HomeController::class, 'index'])->name('index');

// 'user (auth)' middleware group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'indexUser'])->name('user_dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile_edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile_update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile_destroy');

    Route::get('/user-books', [BookController::class, 'getAllBooksUser'])->name('user_books');
    Route::get('/{book}/user-view-book', [BookController::class, 'viewBookUser'])->name('user_view_book');

    Route::get('/user-newspapers', [NewsPaperController::class, 'getAllNewsPapersUser'])->name('user_newspapers');

    Route::get('/user-magazines', [MagazineController::class, 'getAllMagazinesUser'])->name('user_magazines');

    Route::get('/user-reservation', [ReservationController::class, 'reservationsUser'])->name('user_reservations');
    Route::get('/user-make-reservation', [ReservationController::class, 'makeReservationsUser'])->name('user_make_reservations');
    Route::post('/user-get-book', [ReservationController::class, 'getBookUser'])->name('user_get_book');
    Route::post('/user-store-reservation', [ReservationController::class, 'storeReservationBookUser'])->name('user_store_reservations');
    Route::delete('/{id}/user-delete-reservation', [ReservationController::class, 'deleteReservationUser'])->name('user_delete_reservation');
    Route::get('/{reservation}/user-view-reservation', [ReservationController::class, 'viewReservationUser'])->name('user_view_reservation');

    Route::get('/user-transactions', [TransactionController::class, 'getTransactionsUser'])->name('user_transactions');

    Route::post('/user-add-wishlist', [WishListController::class, 'addWishlistUser'])->name('user_add_wishlist');
    Route::get('/user-get-wishlist', [WishListController::class, 'wishlistUser'])->name('user_get_wishlist');
    Route::delete('/{id}/user-remove-wishlist', [WishListController::class, 'removeFromWishlistUser'])->name('user_remove_wishlist');



});


// 'admin' middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [HomeController::class, 'indexAdmin'])->name('admin_dashboard');

    Route::get('/admin-books', [BookController::class, 'getAllBooksAdmin'])->name('admin_books');
    Route::get('/admin-add-book', [BookController::class, 'addBookAdmin'])->name('admin_addBook');
    Route::post('/admin-add-book', [BookController::class, 'storeBookAdmin'])->name('admin_store_book');
    Route::get('/{book}/admin-edit-book', [BookController::class, 'editBookAdmin'])->name('admin_edit_book');
    Route::put('{book}/admin-update-book', [BookController::class, 'updateBookAdmin'])->name('admin_update_book');
    Route::delete('/{id}/admin-delete-book', [BookController::class, 'deleteBookAdmin'])->name('admin_delete_book');
    Route::get('/{book}/admin-view-book', [BookController::class, 'viewBookAdmin'])->name('admin_view_book');

    Route::get('/admin-users', [UserController::class, 'getAllUsersAdmin'])->name('admin_users');
    Route::get('/admin-add-users', [UserController::class, 'addUserAdmin'])->name('admin_addUser');
    Route::post('/admin-add-user', [UserController::class, 'storeUserAdmin'])->name('admin_store_user');
    Route::delete('/{id}/admin-delete-user', [UserController::class, 'deleteUserAdmin'])->name('admin_delete_user');

    Route::get('/admin-newspapers', [NewsPaperController::class, 'getAllNewsPapersAdmin'])->name('admin_newsPapers');
    Route::get('/admin-add-newspaper', [NewsPaperController::class, 'addNewsPaperAdmin'])->name('admin_addNewsPaper');
    Route::post('/admin-add-newspaper', [NewsPaperController::class, 'storeNewsPaperAdmin'])->name('admin_store_newsPaper');
    Route::get('/{newsPaper}/admin-edit-newspaper', [NewsPaperController::class, 'editNewsPaperAdmin'])->name('admin_edit_newspaper');
    Route::put('{newsPaper}/admin-update-newspaper', [NewsPaperController::class, 'updateNewsPaperAdmin'])->name('admin_update_newspaper');
    Route::delete('/{id}/admin-delete-newspaper', [NewsPaperController::class, 'deleteNewsPaperAdmin'])->name('admin_delete_newspaper');
    Route::get('/{newsPaper}/admin-view-newspaper', [NewsPaperController::class, 'viewNewsPaperAdmin'])->name('admin_view_newspaper');


    Route::get('/admin-magazines', [MagazineController::class, 'getAllMagazinesAdmin'])->name('admin_magazines');
    Route::get('/admin-add-magazine', [MagazineController::class, 'addMagazineAdmin'])->name('admin_addMagazine');
    Route::post('/admin-add-magazine', [MagazineController::class, 'storeMagazineAdmin'])->name('admin_store_magazine');
    Route::get('/{magazine}/admin-edit-magazine', [MagazineController::class, 'editMagazineAdmin'])->name('admin_edit_magazine');
    Route::put('{magazine}/admin-update-magazine', [MagazineController::class, 'updateMagazineAdmin'])->name('admin_update_magazine');
    Route::delete('/{id}/admin-delete-magazine', [MagazineController::class, 'deleteMagazineAdmin'])->name('admin_delete_magazine');

    Route::get('/admin-transactions', [TransactionController::class, 'getAllTransactionsAdmin'])->name('admin_transactions');
    Route::get('/admin-issue-book', [TransactionController::class, 'createIssueBook'])->name('admin_issue_book');
    Route::post('/admin-get-book', [TransactionController::class, 'getBook'])->name('admin_get_book');
    Route::post('/admin-issue-book', [TransactionController::class, 'storeIssueBookAdmin'])->name('admin_store_issue_book');
    Route::get('/admin-return-book', [TransactionController::class, 'createReturnedBook'])->name('admin_return_book');
    Route::post('/admin-get-transaction', [TransactionController::class, 'getTransactionAdmin'])->name('admin_get_transaction');
    Route::post('/admin-return-book', [TransactionController::class, 'storeReturnedBookAdmin'])->name('admin_store_return_book');

    Route::get('/admin-get-fine-details', [FineController::class, 'showFineDetailsAdmin'])->name('admin_get_fine_details');
    Route::post('/admin-store-paid-fine', [FineController::class, 'storePaidFineAdmin'])->name('admin_store_paid_fine');
    Route::get('/admin-get-fine-history', [FineController::class, 'getFineHistoryAdmin'])->name('admin_get_fine_history');

    Route::get('/admin-notices', [NoticeController::class, 'getAllNoticesAdmin'])->name('admin_notices');
    Route::get('/admin-add-notice', [NoticeController::class, 'addNoticeAdmin'])->name('admin_addNotice');
    Route::post('/admin-add-book', [NoticeController::class, 'storeNoticeAdmin'])->name('admin_store_notice');
    Route::get('/{notice}/admin-view-notice', [NoticeController::class, 'viewNoticeAdmin'])->name('admin_view_notice');
    Route::get('/{notice}/admin-edit-notice', [NoticeController::class, 'editNoticeAdmin'])->name('admin_edit_notice');
    Route::put('{notice}/admin-update-notice', [NoticeController::class, 'updateNoticeAdmin'])->name('admin_update_notice');
});

require __DIR__.'/auth.php';

