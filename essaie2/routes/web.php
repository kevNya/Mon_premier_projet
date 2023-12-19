<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EchantillonController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
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

Route::get('/', [HomeController::class, 'home'])->name('page_ac');
/*Route::get('/', function () {
    return view('home.home');
})->name('page_accueil');SYNTAXE POUR NOMMER UNE ROUTE QU'ON VA UTILISER DANS LE FICHIER NAV*/



Route::get('/about', [HomeController::class, 'about'])->name('page_about');
Route::match(['get', 'post'], '/dashboard', [HomeController::class, 'dashboard'])
->middleware('auth')//tant que l'utilisateur n'est pas connecté il va rester sur la page login car il n'est pas authentifier d'où le middleware('auth)
->name('page_dashboard');
/*Route::get('/about', function () {
    return view('home.about');
})->name('page_about');*/






Route::get('/logout', [LoginController::class, 'logout'])->name('page_logout');
Route::post('/exist_email', [LoginController::class, 'existEmail'])->name('page_existEmail');
Route::match(['get', 'post'], '/activation_code/{token}', [LoginController::class, 'ActivationCodefunc'])
->name('page_activation');
Route::get('/userchecker', [LoginController::class, 'userchecker'])->name('page_userchecker');
Route::get('/resendcode/{token}',[LoginController::class, 'resend_code'])->name('page_resendcode');

/*Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('page_login');
Route::match(['get', 'post'], '/register', [LoginController::class, 'register'])->name('page_register');*/







Route::get('/rendezvouslist', [RendezVousController::class, 'index'])->name('rendezvous.index');
Route::get('/rendezvouslistall', [RendezVousController::class, 'indexall'])->name('rendezvousall.index');
Route::get('/rendezvous/create', [RendezVousController::class, 'create'])->name('rendezvous.create');
Route::post('/rendezvous/store', [RendezVousController::class, 'store'])->name('rendezvous.store');
Route::match(['get', 'post'], '/rendezvous/delete', [RendezVousController::class, 'supprimerdv'])
->name('page_suppressionrdv');
Route::match(['get', 'post'], '/rendezvous/delete2', [RendezVousController::class, 'supprimerdv2'])
->name('page_suppressionrdv2');
Route::match(['get', 'post'], '/rendezvous/change', [RendezVousController::class, 'changerdv'])
->name('page_modifierrdv');
Route::post('/rendezvous/change2', [RendezVousController::class, 'update'])->name('page_modifierrdv2');




Route::get('/Menu_patient', [PatientController::class, 'menu'])->middleware('auth')->name('menupatient');
Route::match(['get', 'post'], '/listpatient', [PatientController::class, 'indexpatients'])->middleware('auth')->name('page_listpatient');
Route::match(['get', 'post'], '/listpatientrechercher', [PatientController::class, 'rechercherpatient'])->middleware('auth')->name('page_listpatientrechercher');
Route::match(['get', 'post'], '/createpatient', [PatientController::class, 'fristviewpat'])->middleware('auth')->name('page_createpatient');
Route::match(['get', 'post'], '/createpatientreussi', [PatientController::class, 'nouveaupatient'])->middleware('auth')->name('page_createreussipatient');
Route::get('/delete_patient', [PatientController::class, 'delete'])->middleware('auth')->name('page_supprimepatient');
Route::match(['get', 'post'], '/delet2_patient', [PatientController::class, 'deletepatient'])->middleware('auth')->name('page_supprime2_patient');
Route::match(['get', 'post'], '/updateview_patient', [PatientController::class, 'returnviewupdatepat'])->middleware('auth')->name('page_viewupdatpatient');
Route::match(['get', 'post'], '/update_patient', [PatientController::class, 'rechByCode'])->middleware('auth')->name('page_updatpatient');
Route::match(['get', 'post'], '/update_patient2', [PatientController::class, 'updatepat'])->middleware('auth')->name('page_updatpatient2');


Route::match(['get', 'post'], '/listech', [EchantillonController::class, 'indexech'])->middleware('auth')->name('page_listech');
Route::match(['get', 'post'], '/listechrechercher', [EchantillonController::class, 'rechercherech'])->middleware('auth')->name('page_listechrechercher');




Route::match(['get', 'post'], '/listexam', [ExamController::class, 'indexexam'])->middleware('auth')->name('page_listexam');
Route::match(['get', 'post'], '/listexamrechercher', [ExamController::class, 'rechercherexam'])->middleware('auth')->name('page_listexamrechercher');




Route::match(['get', 'post'], '/listresult', [ResultController::class, 'indexresult'])->middleware('auth')->name('page_listresult');
Route::match(['get', 'post'], '/listresultrechercher', [ResultController::class, 'rechercherresult'])->middleware('auth')->name('page_listresultrechercher');


// Ajoutez d'autres routes selon vos besoins

/*Route::get('/listech', function () {
    return view('echantillechantillonliston.');
})->name('page_listech');*/
