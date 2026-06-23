<?php

use Illuminate\Support\Facades\Route;

// Auth controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Business logic controllers
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketCommentController;
use App\Http\Controllers\EscalationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TicketCategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActivityLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Protected Portal Group
Route::middleware(['auth', 'activity_log'])->group(function () {
    
    // Portal Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Settings
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'changePassword'])->name('profile.password');

    // Ticket Workflows
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('tickets/{ticket}/assign', [TicketController::class, 'assign'])->name('tickets.assign');
    Route::post('tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.status');
    Route::post('tickets/{ticket}/escalate', [TicketController::class, 'escalate'])->name('tickets.escalate');
    Route::post('tickets/{ticket}/comment', [TicketCommentController::class, 'store'])->name('tickets.comment');

    // Escalations log
    Route::get('escalations', [EscalationController::class, 'index'])->name('escalations.index');
    Route::post('escalations/{escalation}/resolve', [EscalationController::class, 'resolve'])->name('escalations.resolve');

    // Notifications
    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    Route::get('notifications/unread-count', [NotificationController::class, 'unreadCount'])->name('notifications.unread-count');

    // Hierarchy map
    Route::get('hierarchy', [HierarchyController::class, 'index'])->name('hierarchy.index');
    Route::post('hierarchy/update', [HierarchyController::class, 'updateManager'])->name('hierarchy.update');

    // Reports and analytics
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/export', [ReportController::class, 'exportCsv'])->name('reports.export');

    // Administration Group (restricted to Admin users)
    Route::middleware(['role:Admin'])->group(function () {
        Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);
        
        Route::resource('departments', DepartmentController::class)->except(['create', 'edit', 'show']);
        Route::post('departments/{department}/assign-head', [DepartmentController::class, 'assignHead'])->name('departments.assign-head');

        Route::resource('roles', RoleController::class)->except(['create', 'edit', 'show']);
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');

        Route::resource('ticket-categories', TicketCategoryController::class)->except(['create', 'edit', 'show']);

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
    });

});
