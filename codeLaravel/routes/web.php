<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/index');
});

Route::get('index', [PagesController::class, 'index'])->name('index');
Route::get('profiledetail', [PagesController::class, 'profiledetail'])->name('profiledetail');
Route::get('project', [PagesController::class, 'project'])->name('project');
Route::get('project/{id}/details', [PagesController::class, 'projectdetail'])->name('projectdetail');
Route::get('contract', [PagesController::class, 'contract'])->name('contract');
Route::post('/contact', [PagesController::class, 'sendMail']);
Route::get('knowledge', [PagesController::class, 'knowledge'])->name('knowledge');
Route::get('knowledge/{id}/details', [PagesController::class, 'detailknowledge'])->name('knowledge.details');
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if ($request->username === 'quockhoa53' && $request->password === '050308022003') {
        session(['logged_in' => true]);
        return redirect()->route('admin.profile');
    }

    return back()->withErrors([
        'password' => 'Thông tin đăng nhập không chính xác!',
    ]);
});

Route::middleware(['ensureLoggedIn'])->prefix('admin')->group(function () {
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile/update', [AdminController::class, 'update'])->name('admin.profile.update');

    // Quản lý dự án
    Route::get('project', [AdminController::class, 'project'])->name('admin.project');
    Route::post('project/createproject', [AdminController::class, 'createproject'])->name('admin.project.createproject');
    Route::get('project/{id}/details', [AdminController::class, 'detailproject'])->name('admin.project.details');
    Route::get('project/edit/{id}', [AdminController::class, 'editproject'])->name('admin.project.edit');
    Route::put('project/update/{id}', [AdminController::class, 'updateproject'])->name('admin.project.update');
    Route::delete('project/{id}/delete', [AdminController::class, 'deleteproject'])->name('admin.project.delete');

    Route::get('knowledge', [AdminController::class, 'knowledge'])->name('admin.knowledge');
    Route::post('/admin/knowledgetype/create', [AdminController::class, 'createtypeknowledge'])->name('admin.knowledgeType.create');
    Route::post('knowledge/create', [AdminController::class, 'createknowledge'])->name('admin.knowledge.create');
    Route::get('knowledge/{id}/details', [AdminController::class, 'detailknowledge'])->name('admin.knowledge.details');
    Route::get('knowledge/{id}/edit', [AdminController::class, 'editKnowledge'])->name('admin.knowledge.edit');
    Route::post('knowledge/{id}/update', [AdminController::class, 'updateKnowledge'])->name('admin.knowledge.update');
    Route::delete('knowledge/{id}/delete', [AdminController::class, 'deleteknowledge'])->name('admin.knowledge.delete');
    Route::post('logout', function () {
        session()->forget('logged_in');
        return redirect('/login');
    })->name('logout');
});

Route::post('/upload-handler', [ImageUploadController::class, 'uploadImage']);




