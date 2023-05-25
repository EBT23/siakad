<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


        Route::get('/', [AuthController::class,'Login'])->name('login');
        Route::get('/register', [AuthController::class,'register'])->name('register');
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');


        //ROLE
        Route::get('role-page', [AdminController::class,'role'])->name('role');
        Route::post('role-post', [AdminController::class, 'tambah_role'])->name('role.post');
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
        Route::post('krs/{id}', [AdminController::class, 'edit_krs'])->name('krs.edit');
	    Route::delete('hapus_krs/{id}', [AdminController::class, 'hapus_krs'])->name('krs.hapus');

       
        //ABSENSI
        Route::get('absensi', [AdminController::class,'absensi'])->name('absensi');
        
        //NILAI
        Route::get('nilai', [AdminController::class,'nilai'])->name('nilai');
        Route::get('tambahnilai', [AdminController::class,'tambah_nilai'])->name('nilai.post');





        

