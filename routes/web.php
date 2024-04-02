<?php

use App\Filament\Pages\DataProtectionRequestForm;
use App\Filament\Pages\FormDataProtectionRequest;
use App\Filament\Pages\FormDefaultReport;
use App\Filament\Pages\FormMock;
use App\Filament\Pages\FormProbityReport;
use App\Filament\Pages\FormSelection;
use App\Filament\Pages\PraiseForm;
use App\Filament\Pages\ProbityForm;
use Illuminate\Support\Facades\Route;


use Livewire\Livewire;

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/ouvidoria/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/ouvidoria/public/livewire/update', $handle);
});

/**
 * Ao trocar a senha do usuário, o Laravel exige um novo login.
 * Para isso, é necessário informar a rota de login
 */
Route::redirect('/ouvidoria/public/login', '/ouvidoria/public/login')->name('login');

Route::get('/', FormSelection::class)->name('form-selection');
Route::get('/denuncia/probidade-empresarial', ProbityForm::class)->name('probity-form');
Route::get('/denuncia/assedio-ou-violencia-contra-mulheres', ProbityForm::class)->name('harassment-form');
Route::get('/elogio-reclamacao-ou-sugestao', PraiseForm::class)->name('praise-form');
Route::get('/pedido/protecao-de-dados', DataProtectionRequestForm::class)->name('data-protection-request-form');