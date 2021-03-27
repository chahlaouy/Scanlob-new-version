<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CommandsController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/nos-offres', [HomeController::class, 'products'])->name('products');
Route::get('/nos-carte', [HomeController::class, 'getCart'])->name('visit-cards');
Route::get('/nos-accessoire', [HomeController::class, 'getAccessoire'])->name('accessoire');
Route::get('/offre/{id}', [HomeController::class, 'getOffer']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/profile/{id}', [HomeController::class, 'getProfile'])->name('profile');
Route::get('/apropos', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/term', [HomeController::class, 'term'])->name('term');

/** google login */
Route::get('/redirect', [UserAuthController::class, 'redirectToProvider'])->name('login.google');
Route::get('/login/google/callback', [UserAuthController::class, 'handleProviderCallback']);
/** facebook login */
Route::get('/redirect/facebook', [UserAuthController::class, 'redirectToProviderFaceBook'])->name('login.facebook');
Route::get('/login/facebook/callback', [UserAuthController::class, 'handleProviderCallbackFacebook']);

// User Routes

Route::get('/qr-code', [UserAuthController::class, 'qrCode'])->name('qr-code');
Route::post('/create', [UserAuthController::class, 'createUser'])->name('user.create');
Route::post('/check', [UserAuthController::class, 'check'])->name('user.check');
Route::post('/ajouter-avis/{id}', [ReviewController::class, 'createReview']);
Route::post('/verify-qr-ceode', [UserAuthController::class, 'verifyCode'])->name('verify.qr-code');

// Admin Routes

Route::post('/aymen/check', [AdminAuthController::class, 'check'])->name('admin.check');

Route::group(['middleware' => 'isLogged'], function(){
    
    //Routes for User
    
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/ajouter-info', [UserController::class, 'addUserInfo'])->name('user.addInfo');
    Route::get('/cartes', [UserController::class, 'cards'])->name('user.cards');
    Route::get('/mon-qr-code', [UserController::class, 'qrCode'])->name('user.qr-code');
    Route::get('/mes-avis', [UserController::class, 'reviews'])->name('user.reviews');
    Route::get('/deconnexion', [UserAuthController::class, 'logout'])->name('user.logout');

    // Cart controller
    Route::post('/ajouter-au-panier', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/panier', [CartController::class, 'getCart'])->name('cart.items');
    Route::get('/delete-item/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/checkout', [CartController::class, 'afterpayment'])->name('checkout.credit-card');


    
    // Routes for admin
    
    Route::get('/aymen/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/aymen/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/aymen/deconnexion', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    /**Commands controller */
    
    Route::get('/aymen/gestion-commands', [CommandsController::class, 'indexAdmin'])->name('admin.commands');
    Route::get('/aymen/command/{id}', [CommandsController::class, 'getCommand']);
    Route::get('/aymen/validate-command/{id}', [CommandsController::class, 'validateCommand']);
    Route::get('/aymen/commande-non-validee', [CommandsController::class, 'getNonValidCommand'])->name('admin.unvalidated-command');
    Route::get('/aymen/commande-validee', [CommandsController::class, 'getValidCommand'])->name('admin.validated-command');
    Route::get('/mes-commands', [CommandsController::class, 'indexUser'])->name('user.commands');
    Route::get('/command-details/{id}', [CommandsController::class, 'getCommandUser']);
    
    /** Offers controller */
    
    Route::get('/aymen/gestion-offre', [OffersController::class, 'offers'])->name('admin.offers');
    Route::get('/aymen/liste-des-offres', [OffersController::class, 'offerList'])->name('admin.offers-List');
    Route::get('/aymen/ajouter-offre', [OffersController::class, 'add'])->name('admin.add-offer');
    Route::post('/aymen/creation-offre', [OffersController::class, 'create'])->name('admin.offer-create');
    Route::get('/aymen/editer-offre/{id}', [OffersController::class, 'editOffer']);
    Route::post('/aymen/update-offre', [OffersController::class, 'update'])->name('admin.update-offer');
    Route::get('/aymen/confirmation/{id}', [OffersController::class, 'confirm']);
    Route::post('/aymen/supprimer-offre/{id}', [OffersController::class, 'delete']);

    /** Qrcode Controller */

    Route::get('/aymen/qr-code', [QrCodeController::class, 'index'])->name('admin.qr-code');
    Route::get('/aymen/qr-code-list', [QrCodeController::class, 'list'])->name('admin.qr-code-list');
    Route::get('/aymen/qr-code-generate', [QrCodeController::class, 'generate'])->name('admin.qr-code-generate');

    
});

Route::group(['middleware' => 'alreadyLoggedIn'], function(){

    // Routes for User
    
    Route::get('/connexion', [UserAuthController::class, 'login'])->name('user.login');
    Route::get('/inscription', [UserAuthController::class, 'register'])->name('user.register');

    /** reset password */

    Route::get('/forget-password', [UserAuthController::class, 'getEmail'])->name('user.get-email');
    Route::post('/forget-password', [UserAuthController::class, 'postEmail'])->name('user.post-email');
    
    Route::get('/reset-password/{token}', [UserAuthController::class, 'getPassword']);
    Route::post('/reset-password', [UserAuthController::class, 'updatePassword'])->name('user.update-password');


    // Routes for Admin
    
    Route::get('/aymen/connexion', [AdminAuthController::class, 'login'])->name('admin.login');
    

});
