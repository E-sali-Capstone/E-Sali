<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


Route::get('/landing-page/announcements', [App\Http\Controllers\LandingPageController::class, 'announcements'])->name('landing-page/announcements');
Route::get('/landing-page/view-announcement/{id}', [App\Http\Controllers\LandingPageController::class, 'viewAnnouncement'])->name('landing-page/view-announcement');
Route::get('/event-qr/{id}', [App\Http\Controllers\LandingPageController::class, 'eventQR'])->name('event-qr');
Route::get('/landing-page/polls', [App\Http\Controllers\LandingPageController::class, 'polls'])->name('landing-page/polls');
Route::get('/landing-page/gallery/{id}', [App\Http\Controllers\LandingPageController::class, 'gallery'])->name('landing-page/gallery');
Route::get('/landing-page', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing-page');
Route::get('/python', [App\Http\Controllers\LandingPageController::class, 'python'])->name('python');
Route::get('/landing-page/feedback', [App\Http\Controllers\LandingPageController::class, 'feedback'])->name('landing-page/feedback');
Route::post('/save-feedback', [App\Http\Controllers\FeedbacksController::class, 'submitFeedback'])->name('save-feedback');
Route::get('/test-feedback', [App\Http\Controllers\FeedbacksController::class, 'testFeedback'])->name('test-feedback');
Route::get('/landing-page/reports/{type}', [App\Http\Controllers\LandingPageController::class, 'reports'])->name('landing-page/reports');

Route::get('/test-translate', [App\Http\Controllers\FeedbacksController::class, 'testTranslate'])->name('test-translate');
Route::post('/check-number', [App\Http\Controllers\LandingPageController::class, 'checkNumber'])->name('check-number');
Route::post('/verify-otp', [App\Http\Controllers\LandingPageController::class, 'verifyOTP'])->name('verify-otp');

Route::get('/enter-otp/{id}', [App\Http\Controllers\LandingPageController::class, 'enterOTP'])->name('enter-otp');
Route::get('/error-attendance', [App\Http\Controllers\LandingPageController::class, 'errorAttendance'])->name('error-attendance');


Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing-page');


Route::group(['middleware' => ['auth' , 'verified']], function(){


        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/citizens', [App\Http\Controllers\CitizensController::class, 'index'])->name('citizens');
        Route::get('/feedbacks', [App\Http\Controllers\DashboardController::class, 'feedbacks'])->name('feedbacks');
        Route::get('/sitesettings', [App\Http\Controllers\WebSettingsController::class, 'index'])->name('sitesettings');
        Route::get('/accountsettings', [App\Http\Controllers\AccountSettingsController::class, 'index'])->name('accountsettings');
        Route::get('/polls', [App\Http\Controllers\PollController::class, 'index'])->name('polls');
        Route::get('/new-poll', [App\Http\Controllers\PollController::class, 'newPoll'])->name('new-poll');
        Route::get('/new-report', [App\Http\Controllers\ReportsController::class, 'newReport'])->name('new-report');
        Route::get('/view-poll/{id}', [App\Http\Controllers\PollController::class, 'viewPoll'])->name('view-poll');
        Route::get('/forum-insights/{id}', [App\Http\Controllers\ForumInsightsController::class, 'index'])->name('forum-insight');
        Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports');
        Route::get('/poll-responses/{id}', [App\Http\Controllers\PollController::class, 'viewAllResponses'])->name('poll-responses');

        Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faqs');
        Route::get('/new-faq', [App\Http\Controllers\FaqController::class, 'newFaq'])->name('new-faq');
        Route::get('/programs', [App\Http\Controllers\ProgramsCoursesController::class, 'index'])->name('programs');
        Route::get('/new-program', [App\Http\Controllers\ProgramsCoursesController::class, 'newProgram'])->name('new-program');
        Route::get('/announcements', [App\Http\Controllers\AnnouncementsController::class, 'index'])->name('announcements');
        Route::get('/new-announcement', [App\Http\Controllers\AnnouncementsController::class, 'newAnnouncement'])->name('new-announcement');
        Route::get('/edit-announcement/{id}', [App\Http\Controllers\AnnouncementsController::class, 'editAnnouncement'])->name('edit-announcement');
        Route::get('/delete-announcement/{id}', [App\Http\Controllers\AnnouncementsController::class, 'deleteAnnouncement'])->name('delete-announcement');


        Route::get('/edit-program/{id}', [App\Http\Controllers\ProgramsCoursesController::class, 'editProgram'])->name('edit-program');
        Route::get('/delete-program/{id}', [App\Http\Controllers\ProgramsCoursesController::class, 'deleteProgram'])->name('delete-program');
        Route::get('/delete-announcement-image/{id}/{any}', [App\Http\Controllers\AnnouncementsController::class, 'deleteImage'])->name('delete-announcement-image');
        Route::get('/delete-faq/{id}', [App\Http\Controllers\FaqController::class, 'deleteFaq'])->name('delete-faq');
        Route::get('/edit-faq/{id}', [App\Http\Controllers\FaqController::class, 'editFaq'])->name('edit-faq');
        Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
        Route::get('/new-gallery', [App\Http\Controllers\GalleryController::class, 'newGallery'])->name('new-gallery');
        Route::get('/edit-gallery/{id}', [App\Http\Controllers\GalleryController::class, 'editGallery'])->name('edit-gallery');
        Route::get('/delete-gallery-image/{id}/{any}', [App\Http\Controllers\GalleryController::class, 'deleteImage'])->name('delete-gallery-image');
        Route::get('/edit-report/{id}', [App\Http\Controllers\ReportsController::class, 'editReport'])->name('edit-report');


        //post routes
        Route::post('/save-program', [App\Http\Controllers\ProgramsCoursesController::class, 'saveProgram'])->name('save-program');
        Route::post('/save-announcement', [App\Http\Controllers\AnnouncementsController::class, 'saveAnnouncement'])->name('save-announcement');
        Route::post('/save-updated-announcement', [App\Http\Controllers\AnnouncementsController::class, 'saveUpdatedAnnouncement'])->name('save-updated-announcement');
        Route::post('/upload-photo', [App\Http\Controllers\AnnouncementsController::class, 'multipleUpload'])->name('upload-photo');
        Route::post('/save-updated-program', [App\Http\Controllers\ProgramsCoursesController::class, 'saveUpdatedProgram'])->name('save-updated-program');
        Route::post('/save-faq', [App\Http\Controllers\FaqController::class, 'saveFaq'])->name('save-faq');
        Route::post('/save-updated-faq', [App\Http\Controllers\FaqController::class, 'saveUpdatedFaq'])->name('save-updated-faq');
        Route::post('/save-settings', [App\Http\Controllers\WebSettingsController::class, 'saveSettings'])->name('save-settings');
        Route::post('/update-account', [App\Http\Controllers\AccountSettingsController::class, 'updateAccount'])->name('update-account');
        Route::post('/update-student-account', [App\Http\Controllers\AccountSettingsController::class, 'updateStudentAccount'])->name('update-student-account');

        Route::post('/save-poll', [App\Http\Controllers\PollController::class, 'savePoll'])->name('save-poll');
        Route::post('/save-updated-poll', [App\Http\Controllers\PollController::class, 'saveUpdatedPoll'])->name('save-updated-poll');
        Route::post('/submit-poll-answer', [App\Http\Controllers\PollController::class, 'submitPollAnswer'])->name('submit-poll-answer');
        Route::post('/save-gallery', [App\Http\Controllers\GalleryController::class, 'saveGallery'])->name('save-gallery');
        Route::post('/save-updated-gallery', [App\Http\Controllers\GalleryController::class, 'saveUpdatedGallery'])->name('save-updated-gallery');

        Route::post('/save-report', [App\Http\Controllers\ReportsController::class, 'saveReport'])->name('save-report');
        Route::post('/save-updated-report', [App\Http\Controllers\ReportsController::class, 'saveUpdatedReport'])->name('save-updated-report');
        Route::get('/delete-report-file/{id}/{any}', [App\Http\Controllers\ReportsController::class, 'deleteFile'])->name('delete-report-file');
        Route::get('/delete-report/{id}', [App\Http\Controllers\ReportsController::class, 'deleteReport'])->name('delete-report');
        Route::get('/delete-poll/{id}', [App\Http\Controllers\PollController::class, 'deletePoll'])->name('delete-poll');
        

});


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');