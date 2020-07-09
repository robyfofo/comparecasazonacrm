<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Agent Profiles
    Route::delete('agent-profiles/destroy', 'AgentProfileController@massDestroy')->name('agent-profiles.massDestroy');
    Route::resource('agent-profiles', 'AgentProfileController');

    // Provinces
    Route::delete('provinces/destroy', 'ProvinceController@massDestroy')->name('provinces.massDestroy');
    Route::resource('provinces', 'ProvinceController');

    // Comunis
    Route::delete('comunis/destroy', 'ComuniController@massDestroy')->name('comunis.massDestroy');
    Route::resource('comunis', 'ComuniController');

    // Agenzies
    Route::delete('agenzies/destroy', 'AgenzieController@massDestroy')->name('agenzies.massDestroy');
    Route::post('agenzies/media', 'AgenzieController@storeMedia')->name('agenzies.storeMedia');
    Route::post('agenzies/ckmedia', 'AgenzieController@storeCKEditorImages')->name('agenzies.storeCKEditorImages');
    Route::resource('agenzies', 'AgenzieController');

    // Filialis
    Route::delete('filialis/destroy', 'FilialiController@massDestroy')->name('filialis.massDestroy');
    Route::resource('filialis', 'FilialiController');

    // Tipologia Immobilis
    Route::delete('tipologia-immobilis/destroy', 'TipologiaImmobiliController@massDestroy')->name('tipologia-immobilis.massDestroy');
    Route::resource('tipologia-immobilis', 'TipologiaImmobiliController');

    // Consegna Immobilis
    Route::delete('consegna-immobilis/destroy', 'ConsegnaImmobiliController@massDestroy')->name('consegna-immobilis.massDestroy');
    Route::resource('consegna-immobilis', 'ConsegnaImmobiliController');

    // Stato Immobiles
    Route::delete('stato-immobiles/destroy', 'StatoImmobileController@massDestroy')->name('stato-immobiles.massDestroy');
    Route::resource('stato-immobiles', 'StatoImmobileController');

    // Garage Immobiles
    Route::delete('garage-immobiles/destroy', 'GarageImmobileController@massDestroy')->name('garage-immobiles.massDestroy');
    Route::resource('garage-immobiles', 'GarageImmobileController');

    // Piano Immobiles
    Route::delete('piano-immobiles/destroy', 'PianoImmobileController@massDestroy')->name('piano-immobiles.massDestroy');
    Route::resource('piano-immobiles', 'PianoImmobileController');

    // Clienti Tipologia
    Route::delete('clienti-tipologia/destroy', 'ClientiTipologiaController@massDestroy')->name('clienti-tipologia.massDestroy');
    Route::resource('clienti-tipologia', 'ClientiTipologiaController');

    // Agent Clients
    Route::delete('agent-clients/destroy', 'AgentClientController@massDestroy')->name('agent-clients.massDestroy');
    Route::post('agent-clients/media', 'AgentClientController@storeMedia')->name('agent-clients.storeMedia');
    Route::post('agent-clients/ckmedia', 'AgentClientController@storeCKEditorImages')->name('agent-clients.storeCKEditorImages');
    Route::resource('agent-clients', 'AgentClientController');

    // Praticas
    Route::delete('praticas/destroy', 'PraticaController@massDestroy')->name('praticas.massDestroy');
    Route::post('praticas/media', 'PraticaController@storeMedia')->name('praticas.storeMedia');
    Route::post('praticas/ckmedia', 'PraticaController@storeCKEditorImages')->name('praticas.storeCKEditorImages');
    Route::resource('praticas', 'PraticaController');

    // Contratto Immobiles
    Route::delete('contratto-immobiles/destroy', 'ContrattoImmobileController@massDestroy')->name('contratto-immobiles.massDestroy');
    Route::resource('contratto-immobiles', 'ContrattoImmobileController');

    // Richiesta
    Route::delete('richiesta/destroy', 'RichiestaController@massDestroy')->name('richiesta.massDestroy');
    Route::resource('richiesta', 'RichiestaController');

    // Immobiles
    Route::delete('immobiles/destroy', 'ImmobileController@massDestroy')->name('immobiles.massDestroy');
    Route::post('immobiles/media', 'ImmobileController@storeMedia')->name('immobiles.storeMedia');
    Route::post('immobiles/ckmedia', 'ImmobileController@storeCKEditorImages')->name('immobiles.storeCKEditorImages');
    Route::resource('immobiles', 'ImmobileController');

    // Appuntamento Tipologies
    Route::delete('appuntamento-tipologies/destroy', 'AppuntamentoTipologieController@massDestroy')->name('appuntamento-tipologies.massDestroy');
    Route::resource('appuntamento-tipologies', 'AppuntamentoTipologieController');

    // Appuntamento Statis
    Route::delete('appuntamento-statis/destroy', 'AppuntamentoStatiController@massDestroy')->name('appuntamento-statis.massDestroy');
    Route::resource('appuntamento-statis', 'AppuntamentoStatiController');

    // Appuntamentis
    Route::delete('appuntamentis/destroy', 'AppuntamentiController@massDestroy')->name('appuntamentis.massDestroy');
    Route::resource('appuntamentis', 'AppuntamentiController');

    // Cal Tag Appuntamento Agentis
    Route::delete('cal-tag-appuntamento-agentis/destroy', 'CalTagAppuntamentoAgentiController@massDestroy')->name('cal-tag-appuntamento-agentis.massDestroy');
    Route::post('cal-tag-appuntamento-agentis/media', 'CalTagAppuntamentoAgentiController@storeMedia')->name('cal-tag-appuntamento-agentis.storeMedia');
    Route::post('cal-tag-appuntamento-agentis/ckmedia', 'CalTagAppuntamentoAgentiController@storeCKEditorImages')->name('cal-tag-appuntamento-agentis.storeCKEditorImages');
    Route::resource('cal-tag-appuntamento-agentis', 'CalTagAppuntamentoAgentiController');

    // Tipologia Contratto Prezzos
    Route::delete('tipologia-contratto-prezzos/destroy', 'TipologiaContrattoPrezzoController@massDestroy')->name('tipologia-contratto-prezzos.massDestroy');
    Route::resource('tipologia-contratto-prezzos', 'TipologiaContrattoPrezzoController');

    // Tipologia Mandato Praticas
    Route::delete('tipologia-mandato-praticas/destroy', 'TipologiaMandatoPraticaController@massDestroy')->name('tipologia-mandato-praticas.massDestroy');
    Route::resource('tipologia-mandato-praticas', 'TipologiaMandatoPraticaController');

    // Statistiche Reports
    Route::resource('statistiche-reports', 'StatisticheReportController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Aggregatores
    Route::resource('aggregatores', 'AggregatoreController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Valutazionis
    Route::resource('valutazionis', 'ValutazioniController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Lead Generations
    Route::resource('lead-generations', 'LeadGenerationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Marketings
    Route::resource('marketings', 'MarketingController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Alerts
    Route::resource('alerts', 'AlertController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Contabilita
    Route::resource('contabilita', 'ContabilitaController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController');

    // Admin Settings
    Route::delete('admin-settings/destroy', 'AdminSettingsController@massDestroy')->name('admin-settings.massDestroy');
    Route::resource('admin-settings', 'AdminSettingsController');

    // Generalis
    Route::resource('generalis', 'GeneraliController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Dati Finanziaris
    Route::resource('dati-finanziaris', 'DatiFinanziariController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Clienti Chiamates
    Route::delete('clienti-chiamates/destroy', 'ClientiChiamateController@massDestroy')->name('clienti-chiamates.massDestroy');
    Route::post('clienti-chiamates/media', 'ClientiChiamateController@storeMedia')->name('clienti-chiamates.storeMedia');
    Route::post('clienti-chiamates/ckmedia', 'ClientiChiamateController@storeCKEditorImages')->name('clienti-chiamates.storeCKEditorImages');
    Route::resource('clienti-chiamates', 'ClientiChiamateController');

    // Secretary Profiles
    Route::delete('secretary-profiles/destroy', 'SecretaryProfileController@massDestroy')->name('secretary-profiles.massDestroy');
    Route::resource('secretary-profiles', 'SecretaryProfileController');

    // Client Profiles
    Route::delete('client-profiles/destroy', 'ClientProfileController@massDestroy')->name('client-profiles.massDestroy');
    Route::post('client-profiles/media', 'ClientProfileController@storeMedia')->name('client-profiles.storeMedia');
    Route::post('client-profiles/ckmedia', 'ClientProfileController@storeCKEditorImages')->name('client-profiles.storeCKEditorImages');
    Route::resource('client-profiles', 'ClientProfileController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
