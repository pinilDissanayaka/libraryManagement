<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsPaperController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\WishListController;




Route::get('/', function () {
    return view('index');
})->name('index');

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

});

require __DIR__.'/auth.php';

// Commit made 365 days ago
// Commit made 365 days ago
// Commit made 365 days ago
// Commit made 364 days ago
// Commit made 364 days ago
// Commit made 364 days ago
// Commit made 363 days ago
// Commit made 363 days ago
// Commit made 363 days ago
// Commit made 362 days ago
// Commit made 361 days ago
// Commit made 361 days ago
// Commit made 361 days ago
// Commit made 360 days ago
// Commit made 360 days ago
// Commit made 359 days ago
// Commit made 358 days ago
// Commit made 358 days ago
// Commit made 358 days ago
// Commit made 357 days ago
// Commit made 357 days ago
// Commit made 356 days ago
// Commit made 356 days ago
// Commit made 355 days ago
// Commit made 355 days ago
// Commit made 355 days ago
// Commit made 354 days ago
// Commit made 354 days ago
// Commit made 354 days ago
// Commit made 353 days ago
// Commit made 353 days ago
// Commit made 352 days ago
// Commit made 352 days ago
// Commit made 352 days ago
// Commit made 351 days ago
// Commit made 350 days ago
// Commit made 349 days ago
// Commit made 349 days ago
// Commit made 349 days ago
// Commit made 348 days ago
// Commit made 348 days ago
// Commit made 348 days ago
// Commit made 347 days ago
// Commit made 347 days ago
// Commit made 347 days ago
// Commit made 346 days ago
// Commit made 345 days ago
// Commit made 345 days ago
// Commit made 345 days ago
// Commit made 344 days ago
// Commit made 344 days ago
// Commit made 344 days ago
// Commit made 343 days ago
// Commit made 343 days ago
// Commit made 342 days ago
// Commit made 342 days ago
// Commit made 341 days ago
// Commit made 340 days ago
// Commit made 340 days ago
// Commit made 339 days ago
// Commit made 339 days ago
// Commit made 338 days ago
// Commit made 338 days ago
// Commit made 337 days ago
// Commit made 337 days ago
// Commit made 337 days ago
// Commit made 336 days ago
// Commit made 335 days ago
// Commit made 335 days ago
// Commit made 334 days ago
// Commit made 334 days ago
// Commit made 333 days ago
// Commit made 332 days ago
// Commit made 331 days ago
// Commit made 331 days ago
// Commit made 331 days ago
// Commit made 330 days ago
// Commit made 329 days ago
// Commit made 329 days ago
// Commit made 329 days ago
// Commit made 328 days ago
// Commit made 327 days ago
// Commit made 326 days ago
// Commit made 325 days ago
// Commit made 325 days ago
// Commit made 324 days ago
// Commit made 324 days ago
// Commit made 323 days ago
// Commit made 323 days ago
// Commit made 322 days ago
// Commit made 322 days ago
// Commit made 321 days ago
// Commit made 320 days ago
// Commit made 320 days ago
// Commit made 319 days ago
// Commit made 319 days ago
// Commit made 319 days ago
// Commit made 318 days ago
// Commit made 318 days ago
// Commit made 317 days ago
// Commit made 317 days ago
// Commit made 317 days ago
// Commit made 316 days ago
// Commit made 316 days ago
// Commit made 315 days ago
// Commit made 315 days ago
// Commit made 315 days ago
// Commit made 314 days ago
// Commit made 313 days ago
// Commit made 313 days ago
// Commit made 312 days ago
// Commit made 311 days ago
// Commit made 310 days ago
// Commit made 310 days ago
// Commit made 309 days ago
// Commit made 309 days ago
// Commit made 308 days ago
// Commit made 308 days ago
// Commit made 308 days ago
// Commit made 307 days ago
// Commit made 307 days ago
// Commit made 307 days ago
// Commit made 306 days ago
// Commit made 306 days ago
// Commit made 306 days ago
// Commit made 305 days ago
// Commit made 305 days ago
// Commit made 304 days ago
// Commit made 304 days ago
// Commit made 303 days ago
// Commit made 302 days ago
// Commit made 302 days ago
// Commit made 301 days ago
// Commit made 301 days ago
// Commit made 301 days ago
// Commit made 300 days ago
// Commit made 300 days ago
// Commit made 299 days ago
// Commit made 298 days ago
// Commit made 298 days ago
// Commit made 297 days ago
// Commit made 297 days ago
// Commit made 297 days ago
// Commit made 296 days ago
// Commit made 295 days ago
// Commit made 295 days ago
// Commit made 295 days ago
// Commit made 294 days ago
// Commit made 293 days ago
// Commit made 293 days ago
// Commit made 292 days ago
// Commit made 291 days ago
// Commit made 291 days ago
// Commit made 290 days ago
// Commit made 289 days ago
// Commit made 289 days ago
// Commit made 288 days ago
// Commit made 288 days ago
// Commit made 288 days ago
// Commit made 287 days ago
// Commit made 287 days ago
// Commit made 286 days ago
// Commit made 286 days ago
// Commit made 285 days ago
// Commit made 285 days ago
// Commit made 285 days ago
// Commit made 284 days ago
// Commit made 284 days ago
// Commit made 284 days ago
// Commit made 283 days ago
// Commit made 283 days ago
// Commit made 282 days ago
// Commit made 282 days ago
// Commit made 281 days ago
// Commit made 280 days ago
// Commit made 280 days ago
// Commit made 280 days ago
// Commit made 279 days ago
// Commit made 279 days ago
// Commit made 279 days ago
// Commit made 278 days ago
// Commit made 278 days ago
// Commit made 277 days ago
// Commit made 277 days ago
// Commit made 276 days ago
// Commit made 276 days ago
// Commit made 275 days ago
// Commit made 275 days ago
// Commit made 274 days ago
// Commit made 273 days ago
// Commit made 273 days ago
// Commit made 273 days ago
// Commit made 272 days ago
// Commit made 271 days ago
// Commit made 271 days ago
// Commit made 271 days ago
// Commit made 270 days ago
// Commit made 270 days ago
// Commit made 269 days ago
// Commit made 269 days ago
// Commit made 268 days ago
// Commit made 268 days ago
// Commit made 268 days ago
// Commit made 267 days ago
// Commit made 267 days ago
// Commit made 267 days ago
// Commit made 266 days ago
// Commit made 266 days ago
// Commit made 265 days ago
// Commit made 265 days ago
// Commit made 265 days ago
// Commit made 264 days ago
// Commit made 264 days ago
// Commit made 263 days ago
// Commit made 262 days ago
// Commit made 262 days ago
// Commit made 262 days ago
// Commit made 261 days ago
// Commit made 261 days ago
// Commit made 260 days ago
// Commit made 260 days ago
// Commit made 260 days ago
// Commit made 259 days ago
// Commit made 259 days ago
// Commit made 259 days ago
// Commit made 258 days ago
// Commit made 258 days ago
// Commit made 258 days ago
// Commit made 257 days ago
// Commit made 257 days ago
// Commit made 257 days ago
// Commit made 256 days ago
// Commit made 256 days ago
// Commit made 255 days ago
// Commit made 255 days ago
// Commit made 255 days ago
// Commit made 254 days ago
// Commit made 253 days ago
// Commit made 253 days ago
// Commit made 253 days ago
// Commit made 252 days ago
// Commit made 252 days ago
// Commit made 252 days ago
// Commit made 251 days ago
// Commit made 251 days ago
// Commit made 250 days ago
// Commit made 250 days ago
// Commit made 250 days ago
// Commit made 249 days ago
// Commit made 248 days ago
// Commit made 247 days ago
// Commit made 246 days ago
// Commit made 246 days ago
// Commit made 245 days ago
// Commit made 245 days ago
// Commit made 245 days ago
// Commit made 244 days ago
// Commit made 244 days ago
// Commit made 243 days ago
// Commit made 243 days ago
// Commit made 243 days ago
// Commit made 242 days ago
// Commit made 241 days ago
// Commit made 240 days ago
// Commit made 240 days ago
// Commit made 239 days ago
// Commit made 238 days ago
// Commit made 238 days ago
// Commit made 238 days ago
// Commit made 237 days ago
// Commit made 236 days ago
// Commit made 235 days ago
// Commit made 235 days ago
// Commit made 235 days ago
// Commit made 234 days ago
// Commit made 234 days ago
// Commit made 234 days ago
// Commit made 233 days ago
// Commit made 233 days ago
// Commit made 232 days ago
// Commit made 231 days ago
// Commit made 231 days ago
// Commit made 231 days ago
// Commit made 230 days ago
// Commit made 230 days ago
// Commit made 230 days ago
// Commit made 229 days ago
// Commit made 228 days ago
// Commit made 228 days ago
// Commit made 227 days ago
// Commit made 227 days ago
// Commit made 226 days ago
// Commit made 226 days ago
// Commit made 226 days ago
// Commit made 225 days ago
// Commit made 225 days ago
// Commit made 225 days ago
// Commit made 224 days ago
// Commit made 224 days ago
// Commit made 224 days ago
// Commit made 223 days ago
// Commit made 223 days ago
// Commit made 223 days ago
// Commit made 222 days ago
// Commit made 222 days ago
// Commit made 221 days ago
// Commit made 221 days ago
// Commit made 220 days ago
// Commit made 219 days ago
// Commit made 218 days ago
// Commit made 217 days ago
// Commit made 217 days ago
// Commit made 216 days ago
// Commit made 216 days ago
// Commit made 216 days ago
// Commit made 215 days ago
// Commit made 214 days ago
// Commit made 214 days ago
// Commit made 213 days ago
// Commit made 212 days ago
// Commit made 212 days ago
// Commit made 211 days ago
// Commit made 210 days ago
// Commit made 210 days ago
// Commit made 210 days ago
// Commit made 209 days ago
// Commit made 208 days ago
// Commit made 208 days ago
// Commit made 208 days ago
// Commit made 207 days ago
// Commit made 207 days ago
// Commit made 207 days ago
// Commit made 206 days ago
// Commit made 206 days ago
// Commit made 206 days ago
// Commit made 205 days ago
// Commit made 205 days ago
// Commit made 204 days ago
// Commit made 204 days ago
// Commit made 204 days ago
// Commit made 203 days ago
// Commit made 203 days ago
// Commit made 202 days ago
// Commit made 202 days ago
// Commit made 201 days ago
// Commit made 201 days ago
// Commit made 200 days ago
// Commit made 200 days ago
// Commit made 199 days ago
// Commit made 199 days ago
// Commit made 199 days ago
// Commit made 198 days ago
// Commit made 198 days ago
// Commit made 198 days ago
// Commit made 197 days ago
// Commit made 197 days ago
// Commit made 196 days ago
// Commit made 195 days ago
// Commit made 195 days ago
// Commit made 195 days ago
// Commit made 194 days ago
// Commit made 193 days ago
// Commit made 192 days ago
// Commit made 192 days ago
// Commit made 192 days ago
// Commit made 191 days ago
// Commit made 191 days ago
// Commit made 191 days ago
// Commit made 190 days ago
// Commit made 189 days ago
// Commit made 189 days ago
// Commit made 188 days ago
// Commit made 188 days ago
// Commit made 187 days ago
// Commit made 186 days ago
// Commit made 186 days ago
// Commit made 186 days ago
// Commit made 185 days ago
// Commit made 185 days ago
// Commit made 185 days ago
// Commit made 184 days ago
// Commit made 183 days ago
// Commit made 182 days ago
// Commit made 182 days ago
// Commit made 181 days ago
// Commit made 180 days ago
// Commit made 179 days ago
// Commit made 179 days ago
// Commit made 178 days ago
// Commit made 177 days ago
// Commit made 177 days ago
// Commit made 177 days ago
// Commit made 176 days ago
// Commit made 175 days ago
// Commit made 175 days ago
// Commit made 174 days ago
// Commit made 174 days ago
// Commit made 173 days ago
// Commit made 173 days ago
// Commit made 172 days ago
// Commit made 172 days ago
// Commit made 171 days ago
// Commit made 170 days ago
// Commit made 170 days ago
// Commit made 169 days ago
// Commit made 168 days ago
// Commit made 168 days ago
// Commit made 168 days ago
// Commit made 167 days ago
// Commit made 167 days ago
// Commit made 167 days ago
// Commit made 166 days ago
// Commit made 165 days ago
// Commit made 164 days ago
// Commit made 164 days ago
// Commit made 163 days ago
// Commit made 163 days ago
// Commit made 163 days ago
// Commit made 162 days ago
// Commit made 162 days ago
// Commit made 161 days ago
// Commit made 160 days ago
// Commit made 160 days ago
// Commit made 160 days ago
// Commit made 159 days ago
// Commit made 159 days ago
// Commit made 158 days ago
// Commit made 157 days ago
// Commit made 157 days ago
// Commit made 156 days ago
// Commit made 156 days ago
// Commit made 156 days ago
// Commit made 155 days ago
// Commit made 155 days ago
// Commit made 154 days ago
// Commit made 154 days ago
// Commit made 154 days ago
// Commit made 153 days ago
// Commit made 152 days ago
// Commit made 151 days ago
// Commit made 151 days ago
// Commit made 151 days ago
// Commit made 150 days ago
// Commit made 150 days ago
// Commit made 149 days ago
// Commit made 149 days ago
// Commit made 148 days ago
// Commit made 148 days ago
// Commit made 147 days ago
// Commit made 147 days ago
// Commit made 147 days ago
// Commit made 146 days ago
// Commit made 146 days ago
// Commit made 146 days ago
// Commit made 145 days ago
// Commit made 144 days ago
// Commit made 144 days ago
// Commit made 143 days ago
// Commit made 142 days ago
// Commit made 142 days ago
// Commit made 142 days ago
// Commit made 141 days ago
// Commit made 141 days ago
// Commit made 141 days ago
// Commit made 140 days ago
// Commit made 140 days ago
// Commit made 139 days ago
// Commit made 139 days ago
// Commit made 138 days ago
// Commit made 138 days ago
// Commit made 138 days ago
// Commit made 137 days ago
// Commit made 137 days ago
// Commit made 136 days ago
// Commit made 135 days ago
// Commit made 134 days ago
// Commit made 133 days ago
// Commit made 132 days ago
// Commit made 131 days ago
// Commit made 131 days ago
// Commit made 131 days ago
// Commit made 130 days ago
// Commit made 130 days ago
// Commit made 130 days ago
// Commit made 129 days ago
// Commit made 129 days ago
// Commit made 129 days ago
// Commit made 128 days ago
// Commit made 127 days ago
// Commit made 127 days ago
// Commit made 127 days ago
// Commit made 126 days ago
// Commit made 125 days ago
// Commit made 124 days ago
// Commit made 124 days ago
// Commit made 123 days ago
// Commit made 122 days ago
// Commit made 121 days ago
// Commit made 120 days ago
// Commit made 120 days ago
// Commit made 120 days ago
// Commit made 119 days ago
// Commit made 118 days ago
// Commit made 118 days ago
// Commit made 117 days ago
// Commit made 117 days ago
// Commit made 117 days ago
// Commit made 116 days ago
// Commit made 115 days ago
// Commit made 115 days ago
// Commit made 115 days ago
// Commit made 114 days ago
// Commit made 114 days ago
// Commit made 113 days ago
// Commit made 113 days ago
// Commit made 113 days ago
// Commit made 112 days ago
// Commit made 112 days ago
// Commit made 111 days ago
// Commit made 111 days ago
// Commit made 110 days ago
// Commit made 110 days ago
// Commit made 109 days ago
// Commit made 108 days ago
// Commit made 108 days ago
// Commit made 107 days ago
// Commit made 107 days ago
// Commit made 107 days ago
// Commit made 106 days ago
// Commit made 106 days ago
// Commit made 105 days ago
// Commit made 105 days ago
// Commit made 104 days ago
// Commit made 103 days ago
// Commit made 103 days ago
// Commit made 102 days ago
// Commit made 102 days ago
// Commit made 101 days ago
// Commit made 100 days ago
// Commit made 100 days ago
// Commit made 99 days ago
// Commit made 98 days ago
// Commit made 97 days ago
// Commit made 97 days ago
// Commit made 97 days ago
// Commit made 96 days ago
// Commit made 96 days ago
// Commit made 95 days ago
// Commit made 95 days ago
// Commit made 94 days ago
// Commit made 94 days ago
// Commit made 93 days ago
// Commit made 92 days ago
// Commit made 92 days ago
// Commit made 92 days ago
// Commit made 91 days ago
// Commit made 90 days ago
// Commit made 90 days ago
// Commit made 90 days ago
// Commit made 89 days ago
// Commit made 88 days ago
// Commit made 88 days ago
// Commit made 88 days ago
// Commit made 87 days ago
// Commit made 87 days ago
// Commit made 87 days ago
// Commit made 86 days ago
// Commit made 85 days ago
// Commit made 85 days ago
// Commit made 84 days ago
// Commit made 84 days ago
// Commit made 84 days ago
// Commit made 83 days ago
// Commit made 82 days ago
// Commit made 81 days ago
// Commit made 81 days ago
// Commit made 81 days ago
// Commit made 80 days ago
// Commit made 79 days ago
// Commit made 79 days ago
// Commit made 78 days ago
// Commit made 78 days ago
// Commit made 77 days ago
// Commit made 77 days ago
// Commit made 77 days ago
// Commit made 76 days ago
// Commit made 76 days ago
// Commit made 75 days ago
// Commit made 74 days ago
// Commit made 74 days ago
// Commit made 74 days ago
// Commit made 73 days ago
// Commit made 72 days ago
// Commit made 71 days ago
// Commit made 71 days ago
// Commit made 70 days ago
// Commit made 69 days ago
// Commit made 69 days ago
// Commit made 68 days ago
// Commit made 68 days ago
// Commit made 67 days ago
// Commit made 66 days ago
// Commit made 66 days ago
// Commit made 65 days ago
// Commit made 65 days ago
// Commit made 65 days ago
// Commit made 64 days ago
// Commit made 63 days ago
// Commit made 62 days ago
// Commit made 62 days ago
// Commit made 62 days ago
// Commit made 61 days ago
// Commit made 60 days ago
// Commit made 60 days ago
// Commit made 59 days ago
// Commit made 58 days ago
// Commit made 58 days ago
// Commit made 57 days ago
// Commit made 57 days ago
// Commit made 57 days ago
// Commit made 56 days ago
// Commit made 56 days ago
// Commit made 56 days ago
// Commit made 55 days ago
// Commit made 55 days ago
// Commit made 54 days ago
// Commit made 54 days ago
// Commit made 53 days ago
