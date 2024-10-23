<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ShopSecureController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PalmaresController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// DashboardController secure
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [DashboardController::class, 'users_admin'])->name('users');
    Route::get('/team_admin', [DashboardController::class, 'team_admin'])->name('team_admin');
    Route::get('/team_admin_add', [DashboardController::class, 'team_admin_add'])->name('team_admin_add');
    Route::get('/staff_add', [DashboardController::class, 'staff_add'])->name('staff_add');
    Route::get('/actuality_admin', [DashboardController::class, 'actuality_admin'])->name('actuality_admin');
    Route::get('/actuality_admin_add', [DashboardController::class, 'actuality_admin_add'])->name('actuality_admin_add');
    Route::get('/shop_admin_add', [DashboardController::class, 'shop_admin_add'])->name('shop_admin_add');
    Route::get('/shop_update/{id}', [DashboardController::class, 'shop_update'])->name('shop_update');
    Route::put('/update_shop/{id}', [DashboardController::class, 'update_shop'])->name('update_shop');
    Route::get('/match_admin', [DashboardController::class, 'match_admin'])->name('match_admin');
    Route::get('/match_admin_add', [DashboardController::class, 'match_admin_add'])->name('match_admin_add');
    Route::get('/match_admin_update/{id}', [DashboardController::class, 'match_admin_update'])->name('match_admin_update');
    Route::put('/update_match/{id}', [DashboardController::class, 'update_match'])->name('update_match');
    Route::delete('/delete_match/{id}', [DashboardController::class, 'delete_match'])->name('delete_match');
    Route::get('/profile', [GetController::class, 'profile'])->name('profile');
    Route::get('/profile_update', [GetController::class, 'profile_update'])->name('profile_update');
    Route::put('/update_profile', [DashboardController::class, 'update_profile'])->name("update_profile");
    Route::get('/actu_update/{id}', [DashboardController::class, 'actu_update'])->name('actu_update');
    Route::put('/update_actu/{id}', [DashboardController::class, 'update_actu'])->name('update_actu');
    Route::get('/ticket_shop/{id}', [DashboardController::class, 'ticket_shop'])->name('ticket_shop');
    Route::get('/ticket_detail/{id}', [DashboardController::class, 'ticket_detail'])->name('ticket_detail');
});

Route::get('/login', [GetController::class, 'login'])->name('login');
Route::get('/', [GetController::class, 'home'])->name('home');
Route::get('/actu/{id}', [GetController::class, 'actu'])->name('actu');
Route::get('/match/{id}', [GetController::class, 'match'])->name('match');
Route::get('/team', [GetController::class, 'team'])->name('team');
Route::get('/team_detail/{id}', [GetController::class, 'team_detail'])->name('team_detail');
Route::get('/signin', [GetController::class, 'signin'])->name('signin');
Route::get('/contact', [GetController::class, 'contact'])->name('contact');
Route::get('/shop', [GetController::class, 'shop'])->name('shop');
Route::get('/shop_collection', [GetController::class, 'shop_collection'])->name('shop_collection');
Route::get('/shop_collection_detail/{id}', [GetController::class, 'shop_collection_detail'])->name('shop_collection_detail');
Route::get('/checkout', [GetController::class, 'checkout'])->name('checkout');
Route::get('/donation_checkout', [GetController::class, 'donation_checkout'])->name('donation_checkout');
Route::get('/not_found', [GetController::class, 'not_found'])->name('not_found');

// ShopController secure
Route::middleware('auth')->group(function () {
    Route::get('/shop_admin', [ShopSecureController::class, 'shop_admin'])->name('shop_admin');
    Route::post('/insert_article', [ShopSecureController::class, 'insert_article'])->name('insert_article');
    Route::get('/category', [ShopSecureController::class, 'category'])->name('category');
    Route::get('/category_add', [ShopSecureController::class, 'category_add'])->name('category_add');
    Route::get('/category_update/{id}', [ShopController::class, 'category_update'])->name('category_update');
    Route::get('/size', [ShopSecureController::class, 'size'])->name('size');
    Route::get('/size_add', [ShopSecureController::class, 'size_add'])->name('size_add');
    Route::get('/color', [ShopSecureController::class, 'color'])->name('color');
    Route::get('/color_add', [ShopSecureController::class, 'color_add'])->name('color_add');
});

// ShopController
Route::controller(ShopController::class)->group(function () {
    Route::delete('/delete_article/{id}', 'delete_article')->name('delete_article');
    Route::post('/insert_category', 'insert_category')->name('insert_category');
    Route::delete('/delete_category/{id}', 'delete_category')->name('delete_category');
    Route::put('/update_category/{id}', 'update_category')->name('update_category');
    Route::post('/insert_size', 'insert_size')->name('insert_size');
    Route::delete('/delete_size/{id}', 'delete_size')->name('delete_size');
    Route::post('/insert_color', 'insert_color')->name('insert_color');

    Route::get('/cart/{id}', 'cart')->name('cart');
    Route::get('/delete_cart/{id}', 'delete_cart')->name('delete_cart');
});

// TeamController secure
Route::middleware('auth')->group(function () {
    Route::get('/team_category', [TeamController::class, 'team_category'])->name('team_category');
    Route::get('/team_category_add', [TeamController::class, 'team_category_add'])->name('team_category_add');
    Route::get('/player_category', [TeamController::class, 'player_category'])->name('player_category');
    Route::get('/player_category_add', [TeamController::class, 'player_category_add'])->name('player_category_add');
    Route::get('/staff_category_add', [TeamController::class, 'staff_category_add'])->name('staff_category_add');
    Route::get('/team_update/{id}', [TeamController::class, 'team_update'])->name('team_update');
    Route::put('/update_team/{id}', [TeamController::class, 'update_team'])->name('update_team');
});

// TeamController
Route::controller(TeamController::class)->group(function () {
    Route::post('/insert_team', 'insert_team')->name('insert_team');
    Route::post('/insert_staff', 'insert_staff')->name('insert_staff');
    Route::delete('/delete_team/{id}', 'delete_team')->name('delete_team');
    Route::post('/insert_team_category', 'insert_team_category')->name('insert_team_category');
    Route::delete('/delete_team_category/{id}', 'delete_team_category')->name('delete_team_category');
    Route::post('/insert_player_category', 'insert_player_category')->name('insert_player_category');
    Route::delete('/delete_player_category', 'delete_player_category')->name('delete_player_category');
    Route::post('/insert_staff_category', 'insert_staff_category')->name('insert_staff_category');
    Route::delete('/delete_staff_category/{id}', 'delete_staff_category')->name('delete_staff_category');
});

// PostController
Route::controller(PostController::class)->group(function () {
    Route::delete('/delete_actu/{id}', 'delete_actu')->name('delete_actu');
});

// PalmaresController secure
Route::middleware('auth')->group(function () {
    Route::get('/trophy', [PalmaresController::class, 'trophy'])->name('trophy');
    Route::get('/trophy_add', [PalmaresController::class, 'trophy_add'])->name('trophy_add');
    Route::get('/palmares', [PalmaresController::class, 'palmares'])->name('palmares');
    Route::get('/palmares_add', [PalmaresController::class, 'palmares_add'])->name('palmares_add');
});

Route::controller(PalmaresController::class)->group(function () {
    Route::post('/insert_trophy', 'insert_trophy')->name('insert_trophy');
    Route::delete('/delete_trophy/{id}', 'delete_trophy')->name('delete_trophy');
    Route::post('/insert_palmares', 'insert_palmares')->name('insert_palmares');
    Route::delete('/delete_palmares/{id}', 'delete_palmares')->name('delete_palmares');
});

// StripeController
Route::controller(StripeController::class)->group(function () {
    Route::post('/pay', 'pay')->name('pay');
    Route::post('/donate', 'donate')->name('donate');
});

Route::post('/sendmail', [PostController::class, 'sendEmail'])->name('sendmail');
Route::post('/connexion', [PostController::class, 'connexion'])->name('connexion');
Route::post('/inscription', [PostController::class, 'inscription'])->name('inscription');
Route::get('/logout', [PostController::class, 'logout'])->name('logout');

Route::post('/insert_actu', [PostController::class, 'insert_actu'])->name('insert_actu');
Route::post('/insert_match', [MatchController::class, 'insert_match'])->name('insert_match');

Route::get('/nbr_user', [GetController::class, 'nbr_user']);

Route::middleware('auth')->group(function () {
    Route::get('/invoice/{id}', [GetController::class, 'invoice'])->name('invoice');
});

//  TicketController
Route::middleware('auth')->group(function () {
    Route::get('/ticket', [TicketController::class, 'ticket'])->name('ticket');
    Route::get('/ticket_add', [TicketController::class, 'ticket_add'])->name('ticket_add');
    Route::get('/ticket_category', [TicketController::class, 'ticket_category'])->name('ticket_category');
    Route::get('/ticket_category_add', [TicketController::class, 'ticket_category_add'])->name('ticket_category_add');
    Route::post('/add_ticket_category', [TicketController::class, 'add_ticket_category'])->name('add_ticket_category');
    Route::get('/ticket_category_update/{id}', [TicketController::class, 'ticket_category_update'])->name('ticket_category_update');
    Route::put('/update_ticket_category/{id}', [TicketController::class, 'update_ticket_category'])->name('update_ticket_category');
    Route::delete('/delete_ticket_category/{id}', [TicketController::class, 'delete_ticket_category'])->name('delete_ticket_category');
    Route::get('/place_add', [TicketController::class, 'place_add'])->name('place_add');
    Route::post('/add_place', [TicketController::class, 'add_place'])->name('add_place');
    Route::get('/place_update/{id}', [TicketController::class, 'place_update'])->name('place_update');
    Route::put('/update_place/{id}', [TicketController::class, 'update_place'])->name('update_place');
    Route::delete('/delete_place/{id}', [TicketController::class, 'delete_place'])->name('delete_place');

    Route::get('/stade', [TicketController::class, 'stade'])->name('stade');
    Route::get('/stade_add', [TicketController::class, 'stade_add'])->name('stade_add');
    Route::post('/add_stade', [TicketController::class, 'add_stade'])->name('add_stade');
    Route::get('/stade_update/{id}', [TicketController::class, 'stade_update'])->name('stade_update');
    Route::put('/update_stade/{id}', [TicketController::class, 'update_stade'])->name('update_stade');

    Route::get('/ticket_cart', [TicketController::class, 'ticket_cart'])->name('ticket_cart');
    Route::get('/ticket_checkout', [TicketController::class, 'ticket_checkout'])->name('ticket_checkout');
});
