<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EchantillonController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfResultController;
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

Route::middleware(['auth', 'role:accueil'])->group(function () {
Route::match(['get', 'post'], '/dashboard', [HomeController::class, 'dashboard'])//tant que l'utilisateur n'est pas connecté il va rester sur la page login car il n'est pas authentifier d'où le middleware('auth)
->name('page_dashboard');

});
/*Route::get('/about', function () {
    return view('home.about');
})->name('page_about');*/






Route::get('/logout', [LoginController::class, 'logout'])->name('page_logout');
Route::post('/exist_email', [LoginController::class, 'existEmail'])->name('page_existEmail');
Route::match(['get', 'post'], '/activation_code/{token}', [LoginController::class, 'ActivationCodefunc'])
->name('page_activation');
Route::get('/userchecker', [LoginController::class, 'userchecker'])->name('page_userchecker');
Route::get('/resendcode/{token}',[LoginController::class, 'resend_code'])->name('page_resendcode');
Route::get('/rendezvous/create', [RendezVousController::class, 'create'])->name('rendezvous.create');
Route::post('/rendezvous/store', [RendezVousController::class, 'store'])->name('rendezvous.store');
Route::match(['get', 'post'], '/rendezvous/delete', [RendezVousController::class, 'supprimerdv'])
->name('page_suppressionrdv');
Route::match(['get', 'post'], '/rendezvous/delete2', [RendezVousController::class, 'supprimerdv2'])
->name('page_suppressionrdv2');
Route::match(['get', 'post'], '/rendezvous/change', [RendezVousController::class, 'changerdv'])
->name('page_modifierrdv');
Route::post('/rendezvous/change2', [RendezVousController::class, 'update'])->name('page_modifierrdv2');



/*Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('page_login');
Route::match(['get', 'post'], '/register', [LoginController::class, 'register'])->name('page_register');*/






Route::middleware(['auth', 'role:assist'])->group(function () {
Route::get('/rendezvouslist', [RendezVousController::class, 'index'])->name('rendezvous.index');
Route::get('/rendezvouslistall', [RendezVousController::class, 'indexall'])->name('rendezvousall.index');
});




Route::middleware(['auth', 'role:labo'])->group(function () {

Route::get('/Menu_patient', [PatientController::class, 'menu'])->name('menupatient');
Route::match(['get', 'post'], '/listpatient', [PatientController::class, 'indexpatients'])->name('page_listpatient');
Route::match(['get', 'post'], '/listpatientrechercher', [PatientController::class, 'rechercherpatient'])->name('page_listpatientrechercher');
Route::match(['get', 'post'], '/createpatient', [PatientController::class, 'fristviewpat'])->name('page_createpatient');
Route::match(['get', 'post'], '/createpatientreussi', [PatientController::class, 'nouveaupatient'])->name('page_createreussipatient');
Route::get('/delete_patient', [PatientController::class, 'delete'])->name('page_supprimepatient');
Route::match(['get', 'post'], '/delet2_patient', [PatientController::class, 'deletepatient'])->name('page_supprime2_patient');
Route::match(['get', 'post'], '/updateview_patient', [PatientController::class, 'returnviewupdatepat'])->name('page_viewupdatpatient');
Route::match(['get', 'post'], '/update_patient', [PatientController::class, 'rechByCode'])->name('page_updatpatient');
Route::match(['get', 'post'], '/update_patient2', [PatientController::class, 'updatepat'])->name('page_updatpatient2');






Route::match(['get', 'post'], '/listech', [EchantillonController::class, 'indexech'])->name('page_listech');
Route::match(['get', 'post'], '/listechrechercher', [EchantillonController::class, 'rechercherech'])->name('page_listechrechercher');
Route::match(['get', 'post'], '/Affiche_echantillon', [EchantillonController::class, 'afficheech'])->name('page_afficheech');
Route::match(['get', 'post'], '/Affiche_ech_Cree', [EchantillonController::class, 'echcreer'])->name('page_afficheechcreer');
Route::match(['get', 'post'], '/Delete_sample', [EchantillonController::class, 'affichedeleteech'])->name('page_affichedeleteech');
Route::match(['get', 'post'], '/Delete_sample2', [EchantillonController::class, 'supprimeech'])->name('page_deleteech');
Route::match(['get', 'post'], '/updatepate', [EchantillonController::class, 'rechByCode'])->name('page_updateech');
Route::match(['get', 'post'], '/updatepate2', [EchantillonController::class, 'echchanger'])->name('page_updateech2');
Route::match(['get', 'post'], '/Afficheupdateech', [EchantillonController::class, 'afficheupdateech'])->name('page_afficheupdateechFDEZQFDSQSQSQ');




Route::match(['get', 'post'], '/listexam', [ExamController::class, 'indexexam'])->name('page_listexam');
Route::match(['get', 'post'], '/listexamrechercher', [ExamController::class, 'rechercherexam'])->name('page_listexamrechercher');
Route::match(['get', 'post'], '/Affiche_exam', [ExamController::class, 'afficheexam'])->name('page_affichexam');
Route::match(['get', 'post'], '/Affiche_exam_Cree', [ExamController::class, 'examcreer'])->name('page_afficheexamcreer');
Route::match(['get', 'post'], '/Delete_exam', [ExamController::class, 'affichedeleteexam'])->name('page_affichedeleteexam');
Route::match(['get', 'post'], '/Delete_exam2', [ExamController::class, 'supprimeexam'])->name('page_deleteexam');
Route::match(['get', 'post'], '/afficheupdateexam', [ExamController::class, 'afficheupdateexam'])->name('page_afficheupdateexam');
Route::match(['get', 'post'], '/updatepate_exam', [ExamController::class, 'rechByCode'])->name('page_updateexam');
Route::match(['get', 'post'], '/updatepate2_exam', [ExamController::class, 'examchanger'])->name('page_updateexam2');




Route::match(['get', 'post'], '/listresult', [ResultController::class, 'indexresult'])->name('page_listresult');
Route::match(['get', 'post'], '/listresultrechercher', [ResultController::class, 'rechercherresult'])->name('page_listresultrechercher');
Route::match(['get', 'post'], '/Affiche_result', [ResultController::class, 'afficheresult'])->name('page_afficheresult');
Route::match(['get', 'post'], '/Affiche_result_Cree', [ResultController::class, 'resultcreer'])->name('page_afficheresultcreer');
Route::match(['get', 'post'], '/Delete_result', [ResultController::class, 'affichedeleteresult'])->name('page_affichedeleteresult');
Route::match(['get', 'post'], '/Delete_result2', [ResultController::class, 'supprimeresult'])->name('page_deleteresult');
Route::match(['get', 'post'], '/afficheupdateresult', [ResultController::class, 'afficheupdateresult'])->name('page_afficheupdateresult');
Route::match(['get', 'post'], '/updatepate_result', [ResultController::class, 'rechByCode'])->name('page_updateresult');
Route::match(['get', 'post'], '/updatepate2_result', [ResultController::class, 'resultchanger'])->name('page_updateresult2');
});







Route::middleware(['auth','role:admin'])->group (function(){

Route::get('/Leschoix',[AdminController::class,'allusers'])->name('page_leschoix');
Route::get('/Leschoix2',[AdminController::class,'membres'])->name('page_membres');
Route::post('/Leschoix3',[AdminController::class,'trienom'])->name('page_trienom');
Route::match(['get', 'post'],'/Addmember',[AdminController::class,'addmembre'])->name('page_addmembre');
Route::match(['get', 'post'],'/Member',[AdminController::class,'defmembre'])->name('page_ajoutmembre');
Route::match(['post','get'],'/Gestion_Role',[AdminController::class,'afficherole'])->name('page_gererrole');
Route::match(['get', 'post'],'/Role',[AdminController::class,'defrole'])->name('page_ajoutrole');
});
// Ajoutez d'autres routes selon vos besoins

Route::get('/ex', function () {
    return view('result.rechpatient');
})->name('page_ex');

Route::match(['get', 'post'],'/pdfrechresult_patient',[PdfResultController::class,'rechresultpatients'])->name('page_rechresult_patient');
Route::match(['get', 'post'],'/pdfresultat',[PdfResultController::class,'lesaffichages'])->name('page_pdfresultat');
Route::match(['get', 'post'],'/pdfexport',[PdfResultController::class,'pdfexport'])->name('page_pdfexport');





