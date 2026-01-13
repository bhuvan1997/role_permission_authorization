<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorizationController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/roles', [RoleController::class, 'store']);
Route::get('/roles', [RoleController::class, 'index']);

Route::post('/permissions', [PermissionController::class, 'store']);
Route::get('/permissions', [PermissionController::class, 'index']);

Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions']);
Route::post('/users/{user}/roles', [UserController::class, 'assignRoles']);

Route::post('/authorize', [AuthorizationController::class, 'authorizeUser']);

