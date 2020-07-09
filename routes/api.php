<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Agent Profiles
    Route::apiResource('agent-profiles', 'AgentProfileApiController');

    // Provinces
    Route::apiResource('provinces', 'ProvinceApiController');

    // Comunis
    Route::apiResource('comunis', 'ComuniApiController');

    // Agenzies
    Route::post('agenzies/media', 'AgenzieApiController@storeMedia')->name('agenzies.storeMedia');
    Route::apiResource('agenzies', 'AgenzieApiController');

    // Filialis
    Route::apiResource('filialis', 'FilialiApiController');

    // Tipologia Immobilis
    Route::apiResource('tipologia-immobilis', 'TipologiaImmobiliApiController');

    // Consegna Immobilis
    Route::apiResource('consegna-immobilis', 'ConsegnaImmobiliApiController');

    // Stato Immobiles
    Route::apiResource('stato-immobiles', 'StatoImmobileApiController');

    // Garage Immobiles
    Route::apiResource('garage-immobiles', 'GarageImmobileApiController');

    // Piano Immobiles
    Route::apiResource('piano-immobiles', 'PianoImmobileApiController');

    // Clienti Tipologia
    Route::apiResource('clienti-tipologia', 'ClientiTipologiaApiController');

    // Agent Clients
    Route::post('agent-clients/media', 'AgentClientApiController@storeMedia')->name('agent-clients.storeMedia');
    Route::apiResource('agent-clients', 'AgentClientApiController');

    // Praticas
    Route::post('praticas/media', 'PraticaApiController@storeMedia')->name('praticas.storeMedia');
    Route::apiResource('praticas', 'PraticaApiController');

    // Contratto Immobiles
    Route::apiResource('contratto-immobiles', 'ContrattoImmobileApiController');

    // Richiesta
    Route::apiResource('richiesta', 'RichiestaApiController');

    // Immobiles
    Route::post('immobiles/media', 'ImmobileApiController@storeMedia')->name('immobiles.storeMedia');
    Route::apiResource('immobiles', 'ImmobileApiController');

    // Appuntamento Tipologies
    Route::apiResource('appuntamento-tipologies', 'AppuntamentoTipologieApiController');

    // Appuntamento Statis
    Route::apiResource('appuntamento-statis', 'AppuntamentoStatiApiController');

    // Appuntamentis
    Route::apiResource('appuntamentis', 'AppuntamentiApiController');

    // Cal Tag Appuntamento Agentis
    Route::post('cal-tag-appuntamento-agentis/media', 'CalTagAppuntamentoAgentiApiController@storeMedia')->name('cal-tag-appuntamento-agentis.storeMedia');
    Route::apiResource('cal-tag-appuntamento-agentis', 'CalTagAppuntamentoAgentiApiController');

    // Tipologia Contratto Prezzos
    Route::apiResource('tipologia-contratto-prezzos', 'TipologiaContrattoPrezzoApiController');

    // Tipologia Mandato Praticas
    Route::apiResource('tipologia-mandato-praticas', 'TipologiaMandatoPraticaApiController');

    // Admin Settings
    Route::apiResource('admin-settings', 'AdminSettingsApiController');

    // Clienti Chiamates
    Route::post('clienti-chiamates/media', 'ClientiChiamateApiController@storeMedia')->name('clienti-chiamates.storeMedia');
    Route::apiResource('clienti-chiamates', 'ClientiChiamateApiController');

    // Secretary Profiles
    Route::apiResource('secretary-profiles', 'SecretaryProfileApiController');

    // Client Profiles
    Route::post('client-profiles/media', 'ClientProfileApiController@storeMedia')->name('client-profiles.storeMedia');
    Route::apiResource('client-profiles', 'ClientProfileApiController');
});
