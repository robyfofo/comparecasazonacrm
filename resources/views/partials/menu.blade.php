<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('agent_profile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.agent-profiles.index") }}" class="nav-link {{ request()->is('admin/agent-profiles') || request()->is('admin/agent-profiles/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.agentProfile.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('province_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.provinces.index") }}" class="nav-link {{ request()->is('admin/provinces') || request()->is('admin/provinces/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.province.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('comuni_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.comunis.index") }}" class="nav-link {{ request()->is('admin/comunis') || request()->is('admin/comunis/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.comuni.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('agenzie_filiali_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/agenzies*') ? 'menu-open' : '' }} {{ request()->is('admin/filialis*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.agenzieFiliali.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('agenzie_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.agenzies.index") }}" class="nav-link {{ request()->is('admin/agenzies') || request()->is('admin/agenzies/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.agenzie.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('filiali_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.filialis.index") }}" class="nav-link {{ request()->is('admin/filialis') || request()->is('admin/filialis/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.filiali.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('impostazioni_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/*') ? 'menu-open' : '' }} {{ request()->is('admin/*') ? 'menu-open' : '' }} {{ request()->is('admin/*') ? 'menu-open' : '' }} {{ request()->is('admin/tipologia-contratto-prezzos*') ? 'menu-open' : '' }} {{ request()->is('admin/tipologia-mandato-praticas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-wrench">

                            </i>
                            <p>
                                {{ trans('cruds.impostazioni.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('datiimmobili_access')
                                <li class="nav-item has-treeview {{ request()->is('admin/tipologia-immobilis*') ? 'menu-open' : '' }} {{ request()->is('admin/consegna-immobilis*') ? 'menu-open' : '' }} {{ request()->is('admin/stato-immobiles*') ? 'menu-open' : '' }} {{ request()->is('admin/garage-immobiles*') ? 'menu-open' : '' }} {{ request()->is('admin/piano-immobiles*') ? 'menu-open' : '' }} {{ request()->is('admin/contratto-immobiles*') ? 'menu-open' : '' }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.datiimmobili.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('tipologia_immobili_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.tipologia-immobilis.index") }}" class="nav-link {{ request()->is('admin/tipologia-immobilis') || request()->is('admin/tipologia-immobilis/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.tipologiaImmobili.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('consegna_immobili_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.consegna-immobilis.index") }}" class="nav-link {{ request()->is('admin/consegna-immobilis') || request()->is('admin/consegna-immobilis/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.consegnaImmobili.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('stato_immobile_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.stato-immobiles.index") }}" class="nav-link {{ request()->is('admin/stato-immobiles') || request()->is('admin/stato-immobiles/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.statoImmobile.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('garage_immobile_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.garage-immobiles.index") }}" class="nav-link {{ request()->is('admin/garage-immobiles') || request()->is('admin/garage-immobiles/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.garageImmobile.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('piano_immobile_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.piano-immobiles.index") }}" class="nav-link {{ request()->is('admin/piano-immobiles') || request()->is('admin/piano-immobiles/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.pianoImmobile.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('contratto_immobile_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.contratto-immobiles.index") }}" class="nav-link {{ request()->is('admin/contratto-immobiles') || request()->is('admin/contratto-immobiles/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.contrattoImmobile.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('clienti_access')
                                <li class="nav-item has-treeview {{ request()->is('admin/clienti-tipologia*') ? 'menu-open' : '' }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-user-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.clienti.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('clienti_tipologium_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.clienti-tipologia.index") }}" class="nav-link {{ request()->is('admin/clienti-tipologia') || request()->is('admin/clienti-tipologia/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.clientiTipologium.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('appuntamenti_combo_access')
                                <li class="nav-item has-treeview {{ request()->is('admin/appuntamento-tipologies*') ? 'menu-open' : '' }} {{ request()->is('admin/appuntamento-statis*') ? 'menu-open' : '' }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.appuntamentiCombo.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('appuntamento_tipologie_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.appuntamento-tipologies.index") }}" class="nav-link {{ request()->is('admin/appuntamento-tipologies') || request()->is('admin/appuntamento-tipologies/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.appuntamentoTipologie.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('appuntamento_stati_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.appuntamento-statis.index") }}" class="nav-link {{ request()->is('admin/appuntamento-statis') || request()->is('admin/appuntamento-statis/*') ? 'active' : '' }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.appuntamentoStati.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('tipologia_contratto_prezzo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tipologia-contratto-prezzos.index") }}" class="nav-link {{ request()->is('admin/tipologia-contratto-prezzos') || request()->is('admin/tipologia-contratto-prezzos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tipologiaContrattoPrezzo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tipologia_mandato_pratica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tipologia-mandato-praticas.index") }}" class="nav-link {{ request()->is('admin/tipologia-mandato-praticas') || request()->is('admin/tipologia-mandato-praticas/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tipologiaMandatoPratica.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('agent_client_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.agent-clients.index") }}" class="nav-link {{ request()->is('admin/agent-clients') || request()->is('admin/agent-clients/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.agentClient.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('immobili_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/praticas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.immobili.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('pratica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.praticas.index") }}" class="nav-link {{ request()->is('admin/praticas') || request()->is('admin/praticas/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.pratica.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('richiestum_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.richiesta.index") }}" class="nav-link {{ request()->is('admin/richiesta') || request()->is('admin/richiesta/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon far fa-question-circle">

                            </i>
                            <p>
                                {{ trans('cruds.richiestum.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('immobile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.immobiles.index") }}" class="nav-link {{ request()->is('admin/immobiles') || request()->is('admin/immobiles/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.immobile.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('appuntamenti_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.appuntamentis.index") }}" class="nav-link {{ request()->is('admin/appuntamentis') || request()->is('admin/appuntamentis/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.appuntamenti.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('cal_tag_appuntamento_agenti_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.cal-tag-appuntamento-agentis.index") }}" class="nav-link {{ request()->is('admin/cal-tag-appuntamento-agentis') || request()->is('admin/cal-tag-appuntamento-agentis/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.calTagAppuntamentoAgenti.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('analisi_valutazioni_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/statistiche-reports*') ? 'menu-open' : '' }} {{ request()->is('admin/aggregatores*') ? 'menu-open' : '' }} {{ request()->is('admin/valutazionis*') ? 'menu-open' : '' }} {{ request()->is('admin/lead-generations*') ? 'menu-open' : '' }} {{ request()->is('admin/marketings*') ? 'menu-open' : '' }} {{ request()->is('admin/alerts*') ? 'menu-open' : '' }} {{ request()->is('admin/contabilita*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-chart-bar">

                            </i>
                            <p>
                                {{ trans('cruds.analisiValutazioni.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('statistiche_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.statistiche-reports.index") }}" class="nav-link {{ request()->is('admin/statistiche-reports') || request()->is('admin/statistiche-reports/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.statisticheReport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('aggregatore_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.aggregatores.index") }}" class="nav-link {{ request()->is('admin/aggregatores') || request()->is('admin/aggregatores/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.aggregatore.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('valutazioni_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.valutazionis.index") }}" class="nav-link {{ request()->is('admin/valutazionis') || request()->is('admin/valutazionis/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.valutazioni.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lead_generation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lead-generations.index") }}" class="nav-link {{ request()->is('admin/lead-generations') || request()->is('admin/lead-generations/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.leadGeneration.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('marketing_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.marketings.index") }}" class="nav-link {{ request()->is('admin/marketings') || request()->is('admin/marketings/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.marketing.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.alerts.index") }}" class="nav-link {{ request()->is('admin/alerts') || request()->is('admin/alerts/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.alert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contabilitum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contabilita.index") }}" class="nav-link {{ request()->is('admin/contabilita') || request()->is('admin/contabilita/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contabilitum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('admin_setting_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.admin-settings.index") }}" class="nav-link {{ request()->is('admin/admin-settings') || request()->is('admin/admin-settings/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.adminSetting.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('settings_bi_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/generalis*') ? 'menu-open' : '' }} {{ request()->is('admin/dati-finanziaris*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.settingsBi.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('generali_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.generalis.index") }}" class="nav-link {{ request()->is('admin/generalis') || request()->is('admin/generalis/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.generali.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dati_finanziari_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dati-finanziaris.index") }}" class="nav-link {{ request()->is('admin/dati-finanziaris') || request()->is('admin/dati-finanziaris/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-euro-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.datiFinanziari.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('clienti_chiamate_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.clienti-chiamates.index") }}" class="nav-link {{ request()->is('admin/clienti-chiamates') || request()->is('admin/clienti-chiamates/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-phone">

                            </i>
                            <p>
                                {{ trans('cruds.clientiChiamate.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('secretary_profile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.secretary-profiles.index") }}" class="nav-link {{ request()->is('admin/secretary-profiles') || request()->is('admin/secretary-profiles/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.secretaryProfile.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('client_profile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.client-profiles.index") }}" class="nav-link {{ request()->is('admin/client-profiles') || request()->is('admin/client-profiles/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.clientProfile.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('fattura_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.fatturas.index") }}" class="nav-link {{ request()->is('admin/fatturas') || request()->is('admin/fatturas/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.fattura.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>