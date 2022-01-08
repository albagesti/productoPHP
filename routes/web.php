<?php
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ClassController;

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin/admin', '/admin/admin');
});


//CRUD TEACHERS

Route::get('teachers', [TeachersController::class, 'index'])
    ->name('auth.admin');

Route::post('teachers/create', [TeachersController::class, 'store'])
    ->name('auth.admin');

Route::get('teachers/edit/{id_teacher}', [TeachersController::class, 'edit'])
    ->name('auth.admin');

Route::put('teachers/edit/{id_teacher}', [TeachersController::class, 'update'])
    ->name('auth.admin');

Route::get('teachers/delete/{id_teacher}', [TeachersController::class, 'delete'])
    ->name('auth.admin');


//CRUD CURSOS

Route::get('cursos', [CoursesController::class, 'index'])->name('auth.admin');

Route::get('cursos/create', [CoursesController::class, 'create'])->name('auth.admin');

Route::post('cursos', [CoursesController::class, 'store'])->name('auth.admin');

Route::get('cursos/edit/{id_course}', [CoursesController::class, 'edit'])->name('auth.admin');

Route::put('cursos/edit/{id_course}', [CoursesController::class, 'update'])->name('auth.admin');

Route::get('/cursos/delete/{id_course}', [CoursesController::class, 'delete'])->name('auth.admin');

Route::get('/cursos/alumnos/{id_course}', [CoursesController::class, 'studentsEnroll'])->name('auth.admin');

Route::post('/cursos/alumnos/remove', [CoursesController::class, 'studentRemove'])->name('auth.admin');

Route::post('/cursos/alumnos/add', [CoursesController::class, 'studentAdd'])->name('auth.admin');

// CLASES

Route::get('clases',[ClassController::class, 'index'])->name('auth.admin');

Route::get('clases/create', [ClassController::class, 'create'])->name('auth.admin');

Route::post('clases', [ClassController::class, 'store'])->name('auth.admin');

Route::get('clases/edit/{id_class}', [ClassController::class, 'edit'])->name('auth.admin');

Route::put('clases/edit/{id_class}', [ClassController::class, 'update'])->name('auth.admin');

Route::get('clases/delete/{id_class}', [ClassController::class, 'delete'])->name('auth.admin');

Route::get('clases/horario/{id_class}', [ClassController::class, 'horario'])->name('auth.admin');

Route::put('clases/horario/{id_class}', [ClassController::class, 'sethorario'])->name('auth.admin');

Route::get('clases/alumnos/{id_class}', [ClassController::class, 'alumnos'])->name('auth.admin');

Route::get('perfil', function () {
    return view('perfil');
});
//

Route::get('/alumno', [AlumnoController::class, 'index']);

Route::get('/alumno/curso/{id_course}', [AlumnoController::class, 'show']);
