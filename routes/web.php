<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
        Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('inbox-page', 'inbox')->name('inbox');

        //ROLE
        Route::get('role-page', [AdminController::class,'role'])->name('role');
        Route::post('role', [AdminController::class, 'tambah_role'])->name('role.post');
        Route::post('role/{id}', [AdminController::class, 'edit_role'])->name('role.edit');
	    Route::delete('hapus_role/{id}', [AdminController::class, 'hapus_role'])->name('role.hapus');

       //KELAS
        Route::get('kelas-page', [AdminController::class,'kelas'])->name('kelas');
        Route::post('kelas', [AdminController::class, 'tambah_kelas'])->name('kelas.post');
        Route::post('kelas/{id}', [AdminController::class, 'edit_kelas'])->name('kelas.edit');
	    Route::delete('hapus_kelas/{id}', [AdminController::class, 'hapus_kelas'])->name('kelas.hapus');

        //MAPEL
        Route::get('mapel-page', [AdminController::class,'mapel'])->name('mapel');
        Route::post('mapel', [AdminController::class, 'tambah_mapel'])->name('mapel.post');
        Route::post('mapel/{id}', [AdminController::class, 'edit_mapel'])->name('mapel.edit');
	    Route::delete('hapus_mapel/{id}', [AdminController::class, 'hapus_mapel'])->name('mapel.hapus');
        
        //MAPEL
        Route::get('jadwal_mapel', [AdminController::class,'jadwal_mapel'])->name('jadwal.mapel');
        Route::post('jadwal_mapel', [AdminController::class, 'tambah_jadwal_mapel'])->name('jadwal.mapel.post');
        Route::post('jadwal_mapel/{id}', [AdminController::class, 'edit_jadwal_mapel'])->name('jadwal.mapel.edit');
	    Route::delete('hapus_jadwal_mapel/{id}', [AdminController::class, 'hapus_jadwal_mapel'])->name('jadwal.mapel.hapus');
       
        //SEMESTER
        Route::get('semester-page', [AdminController::class,'semester'])->name('semester');
        Route::post('semester', [AdminController::class, 'tambah_semester'])->name('semester.post');
        Route::post('semester/{id}', [AdminController::class, 'edit_semester'])->name('semester.edit');
	    Route::delete('hapus_semester/{id}', [AdminController::class, 'hapus_semester'])->name('semester.hapus');

        //TAHUNAJARAN
        Route::get('thn_ajaran-page', [AdminController::class,'thn_ajaran'])->name('thn.ajaran');
        Route::post('thn_ajaran', [AdminController::class, 'tambah_thn_ajaran'])->name('thn.ajaran.post');
        Route::post('thn_ajaran/{id}', [AdminController::class, 'edit_thn_ajaran'])->name('thn.ajaran.edit');
	    Route::delete('hapus_thn_ajaran/{id}', [AdminController::class, 'hapus_thn_ajaran'])->name('thn.ajaran.hapus');
        
        //KRS
        Route::get('krs', [AdminController::class,'krs'])->name('krs');
        Route::post('krs', [AdminController::class, 'tambah_krs'])->name('krs.post');
	    Route::delete('hapus_krs/{id}', [AdminController::class, 'hapus_krs'])->name('krs.hapus');

       
        //ABSENSI
        Route::get('absensi', [AdminController::class,'absensi'])->name('absensi');
        
        //NILAI
        Route::get('nilai', [AdminController::class,'nilai'])->name('nilai');





        
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
        Route::get('login-page', 'login')->name('login');
        Route::get('register-page', 'register')->name('register');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
});
