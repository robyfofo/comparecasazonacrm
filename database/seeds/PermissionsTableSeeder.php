<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'agent_profile_create',
            ],
            [
                'id'    => '18',
                'title' => 'agent_profile_edit',
            ],
            [
                'id'    => '19',
                'title' => 'agent_profile_show',
            ],
            [
                'id'    => '20',
                'title' => 'agent_profile_delete',
            ],
            [
                'id'    => '21',
                'title' => 'agent_profile_access',
            ],
            [
                'id'    => '22',
                'title' => 'province_create',
            ],
            [
                'id'    => '23',
                'title' => 'province_edit',
            ],
            [
                'id'    => '24',
                'title' => 'province_show',
            ],
            [
                'id'    => '25',
                'title' => 'province_delete',
            ],
            [
                'id'    => '26',
                'title' => 'province_access',
            ],
            [
                'id'    => '27',
                'title' => 'comuni_create',
            ],
            [
                'id'    => '28',
                'title' => 'comuni_edit',
            ],
            [
                'id'    => '29',
                'title' => 'comuni_show',
            ],
            [
                'id'    => '30',
                'title' => 'comuni_delete',
            ],
            [
                'id'    => '31',
                'title' => 'comuni_access',
            ],
            [
                'id'    => '32',
                'title' => 'agenzie_filiali_access',
            ],
            [
                'id'    => '33',
                'title' => 'agenzie_create',
            ],
            [
                'id'    => '34',
                'title' => 'agenzie_edit',
            ],
            [
                'id'    => '35',
                'title' => 'agenzie_show',
            ],
            [
                'id'    => '36',
                'title' => 'agenzie_delete',
            ],
            [
                'id'    => '37',
                'title' => 'agenzie_access',
            ],
            [
                'id'    => '38',
                'title' => 'filiali_create',
            ],
            [
                'id'    => '39',
                'title' => 'filiali_edit',
            ],
            [
                'id'    => '40',
                'title' => 'filiali_show',
            ],
            [
                'id'    => '41',
                'title' => 'filiali_delete',
            ],
            [
                'id'    => '42',
                'title' => 'filiali_access',
            ],
            [
                'id'    => '43',
                'title' => 'impostazioni_access',
            ],
            [
                'id'    => '44',
                'title' => 'datiimmobili_access',
            ],
            [
                'id'    => '45',
                'title' => 'tipologia_immobili_create',
            ],
            [
                'id'    => '46',
                'title' => 'tipologia_immobili_edit',
            ],
            [
                'id'    => '47',
                'title' => 'tipologia_immobili_show',
            ],
            [
                'id'    => '48',
                'title' => 'tipologia_immobili_delete',
            ],
            [
                'id'    => '49',
                'title' => 'tipologia_immobili_access',
            ],
            [
                'id'    => '50',
                'title' => 'consegna_immobili_create',
            ],
            [
                'id'    => '51',
                'title' => 'consegna_immobili_edit',
            ],
            [
                'id'    => '52',
                'title' => 'consegna_immobili_show',
            ],
            [
                'id'    => '53',
                'title' => 'consegna_immobili_delete',
            ],
            [
                'id'    => '54',
                'title' => 'consegna_immobili_access',
            ],
            [
                'id'    => '55',
                'title' => 'stato_immobile_create',
            ],
            [
                'id'    => '56',
                'title' => 'stato_immobile_edit',
            ],
            [
                'id'    => '57',
                'title' => 'stato_immobile_show',
            ],
            [
                'id'    => '58',
                'title' => 'stato_immobile_delete',
            ],
            [
                'id'    => '59',
                'title' => 'stato_immobile_access',
            ],
            [
                'id'    => '60',
                'title' => 'garage_immobile_create',
            ],
            [
                'id'    => '61',
                'title' => 'garage_immobile_edit',
            ],
            [
                'id'    => '62',
                'title' => 'garage_immobile_show',
            ],
            [
                'id'    => '63',
                'title' => 'garage_immobile_delete',
            ],
            [
                'id'    => '64',
                'title' => 'garage_immobile_access',
            ],
            [
                'id'    => '65',
                'title' => 'piano_immobile_create',
            ],
            [
                'id'    => '66',
                'title' => 'piano_immobile_edit',
            ],
            [
                'id'    => '67',
                'title' => 'piano_immobile_show',
            ],
            [
                'id'    => '68',
                'title' => 'piano_immobile_delete',
            ],
            [
                'id'    => '69',
                'title' => 'piano_immobile_access',
            ],
            [
                'id'    => '70',
                'title' => 'clienti_access',
            ],
            [
                'id'    => '71',
                'title' => 'clienti_tipologium_create',
            ],
            [
                'id'    => '72',
                'title' => 'clienti_tipologium_edit',
            ],
            [
                'id'    => '73',
                'title' => 'clienti_tipologium_show',
            ],
            [
                'id'    => '74',
                'title' => 'clienti_tipologium_delete',
            ],
            [
                'id'    => '75',
                'title' => 'clienti_tipologium_access',
            ],
            [
                'id'    => '76',
                'title' => 'agent_client_create',
            ],
            [
                'id'    => '77',
                'title' => 'agent_client_edit',
            ],
            [
                'id'    => '78',
                'title' => 'agent_client_show',
            ],
            [
                'id'    => '79',
                'title' => 'agent_client_delete',
            ],
            [
                'id'    => '80',
                'title' => 'agent_client_access',
            ],
            [
                'id'    => '81',
                'title' => 'immobili_access',
            ],
            [
                'id'    => '82',
                'title' => 'pratica_create',
            ],
            [
                'id'    => '83',
                'title' => 'pratica_edit',
            ],
            [
                'id'    => '84',
                'title' => 'pratica_show',
            ],
            [
                'id'    => '85',
                'title' => 'pratica_delete',
            ],
            [
                'id'    => '86',
                'title' => 'pratica_access',
            ],
            [
                'id'    => '87',
                'title' => 'contratto_immobile_create',
            ],
            [
                'id'    => '88',
                'title' => 'contratto_immobile_edit',
            ],
            [
                'id'    => '89',
                'title' => 'contratto_immobile_show',
            ],
            [
                'id'    => '90',
                'title' => 'contratto_immobile_delete',
            ],
            [
                'id'    => '91',
                'title' => 'contratto_immobile_access',
            ],
            [
                'id'    => '92',
                'title' => 'richiestum_create',
            ],
            [
                'id'    => '93',
                'title' => 'richiestum_edit',
            ],
            [
                'id'    => '94',
                'title' => 'richiestum_show',
            ],
            [
                'id'    => '95',
                'title' => 'richiestum_delete',
            ],
            [
                'id'    => '96',
                'title' => 'richiestum_access',
            ],
            [
                'id'    => '97',
                'title' => 'immobile_create',
            ],
            [
                'id'    => '98',
                'title' => 'immobile_edit',
            ],
            [
                'id'    => '99',
                'title' => 'immobile_show',
            ],
            [
                'id'    => '100',
                'title' => 'immobile_delete',
            ],
            [
                'id'    => '101',
                'title' => 'immobile_access',
            ],
            [
                'id'    => '102',
                'title' => 'appuntamenti_combo_access',
            ],
            [
                'id'    => '103',
                'title' => 'appuntamento_tipologie_create',
            ],
            [
                'id'    => '104',
                'title' => 'appuntamento_tipologie_edit',
            ],
            [
                'id'    => '105',
                'title' => 'appuntamento_tipologie_show',
            ],
            [
                'id'    => '106',
                'title' => 'appuntamento_tipologie_delete',
            ],
            [
                'id'    => '107',
                'title' => 'appuntamento_tipologie_access',
            ],
            [
                'id'    => '108',
                'title' => 'appuntamento_stati_create',
            ],
            [
                'id'    => '109',
                'title' => 'appuntamento_stati_edit',
            ],
            [
                'id'    => '110',
                'title' => 'appuntamento_stati_show',
            ],
            [
                'id'    => '111',
                'title' => 'appuntamento_stati_delete',
            ],
            [
                'id'    => '112',
                'title' => 'appuntamento_stati_access',
            ],
            [
                'id'    => '113',
                'title' => 'appuntamenti_create',
            ],
            [
                'id'    => '114',
                'title' => 'appuntamenti_edit',
            ],
            [
                'id'    => '115',
                'title' => 'appuntamenti_show',
            ],
            [
                'id'    => '116',
                'title' => 'appuntamenti_delete',
            ],
            [
                'id'    => '117',
                'title' => 'appuntamenti_access',
            ],
            [
                'id'    => '118',
                'title' => 'cal_tag_appuntamento_agenti_create',
            ],
            [
                'id'    => '119',
                'title' => 'cal_tag_appuntamento_agenti_edit',
            ],
            [
                'id'    => '120',
                'title' => 'cal_tag_appuntamento_agenti_show',
            ],
            [
                'id'    => '121',
                'title' => 'cal_tag_appuntamento_agenti_delete',
            ],
            [
                'id'    => '122',
                'title' => 'cal_tag_appuntamento_agenti_access',
            ],
            [
                'id'    => '123',
                'title' => 'tipologia_contratto_prezzo_create',
            ],
            [
                'id'    => '124',
                'title' => 'tipologia_contratto_prezzo_edit',
            ],
            [
                'id'    => '125',
                'title' => 'tipologia_contratto_prezzo_show',
            ],
            [
                'id'    => '126',
                'title' => 'tipologia_contratto_prezzo_delete',
            ],
            [
                'id'    => '127',
                'title' => 'tipologia_contratto_prezzo_access',
            ],
            [
                'id'    => '128',
                'title' => 'tipologia_mandato_pratica_create',
            ],
            [
                'id'    => '129',
                'title' => 'tipologia_mandato_pratica_edit',
            ],
            [
                'id'    => '130',
                'title' => 'tipologia_mandato_pratica_show',
            ],
            [
                'id'    => '131',
                'title' => 'tipologia_mandato_pratica_delete',
            ],
            [
                'id'    => '132',
                'title' => 'tipologia_mandato_pratica_access',
            ],
            [
                'id'    => '133',
                'title' => 'analisi_valutazioni_access',
            ],
            [
                'id'    => '134',
                'title' => 'statistiche_report_access',
            ],
            [
                'id'    => '135',
                'title' => 'aggregatore_access',
            ],
            [
                'id'    => '136',
                'title' => 'valutazioni_access',
            ],
            [
                'id'    => '137',
                'title' => 'lead_generation_access',
            ],
            [
                'id'    => '138',
                'title' => 'marketing_access',
            ],
            [
                'id'    => '139',
                'title' => 'alert_access',
            ],
            [
                'id'    => '140',
                'title' => 'contabilitum_access',
            ],
            [
                'id'    => '141',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '142',
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => '143',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '144',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '145',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '146',
                'title' => 'admin_setting_create',
            ],
            [
                'id'    => '147',
                'title' => 'admin_setting_edit',
            ],
            [
                'id'    => '148',
                'title' => 'admin_setting_show',
            ],
            [
                'id'    => '149',
                'title' => 'admin_setting_delete',
            ],
            [
                'id'    => '150',
                'title' => 'admin_setting_access',
            ],
            [
                'id'    => '151',
                'title' => 'settings_bi_access',
            ],
            [
                'id'    => '152',
                'title' => 'generali_access',
            ],
            [
                'id'    => '153',
                'title' => 'dati_finanziari_access',
            ],
            [
                'id'    => '154',
                'title' => 'clienti_chiamate_create',
            ],
            [
                'id'    => '155',
                'title' => 'clienti_chiamate_edit',
            ],
            [
                'id'    => '156',
                'title' => 'clienti_chiamate_show',
            ],
            [
                'id'    => '157',
                'title' => 'clienti_chiamate_delete',
            ],
            [
                'id'    => '158',
                'title' => 'clienti_chiamate_access',
            ],
            [
                'id'    => '159',
                'title' => 'secretary_profile_create',
            ],
            [
                'id'    => '160',
                'title' => 'secretary_profile_edit',
            ],
            [
                'id'    => '161',
                'title' => 'secretary_profile_show',
            ],
            [
                'id'    => '162',
                'title' => 'secretary_profile_delete',
            ],
            [
                'id'    => '163',
                'title' => 'secretary_profile_access',
            ],
            [
                'id'    => '164',
                'title' => 'client_profile_create',
            ],
            [
                'id'    => '165',
                'title' => 'client_profile_edit',
            ],
            [
                'id'    => '166',
                'title' => 'client_profile_show',
            ],
            [
                'id'    => '167',
                'title' => 'client_profile_delete',
            ],
            [
                'id'    => '168',
                'title' => 'client_profile_access',
            ],
            [
                'id'    => '169',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
