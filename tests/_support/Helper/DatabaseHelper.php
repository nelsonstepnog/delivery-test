<?php

namespace Delivery\AcceptanceTest\Helper;

use Codeception\Exception\ModuleException;
use Codeception\Module;
use Codeception\Module\Db;

/**
 * Class DatabaseHelper
 * Класс хэлпера для работы с базой данных.
 *
 * @package Delivery\AcceptanceTest\Helper
 */
class DatabaseHelper extends Module
{
    /**
     * Метод получения названия таблицы по названию сущности.
     *
     * @param $name
     *
     * @return string
     */
    public function getTable($name)
    {
        $tables = [
            'accounting_system'                       => 'md_accounting_system',
            'auth'                                    => 'md_auth',
            'auth_assignment'                         => 'md_auth_assignment',
            'auth_role'                               => 'md_auth_role',
            'auth_role_map'                           => 'md_auth_role_map',
            'auth_role_permission'                    => 'md_auth_role_permission',
            'clients'                                 => 'md_clients',
            'competing_view'                          => 'md_competing_view',
            'country'                                 => 'md_country',
            'courier'                                 => 'md_courier',
            'courier_external'                        => 'md_courier_external',
            'courier_offline_history'                 => 'md_courier_offline_history',
            'courier_online_history'                  => 'md_courier_online_history',
            'courier_status'                          => 'md_courier_status',
            'courier_warehouse_link'                  => 'md_courier_warehouse_link',
            'coverages'                               => 'md_coverages',
            'delivery'                                => 'md_delivery',
            'delivery_cancel_reasons'                 => 'md_delivery_cancel_reasons',
            'delivery_problem'                        => 'md_delivery_problem',
            'delivery_type'                           => 'md_delivery_type',
            'delivery_type_external'                  => 'md_delivery_type_external',
            'delivery_type_vs_delivery_type_external' => 'md_delivery_type_vs_delivery_type_external',
            'delivery_type_vs_person_group'           => 'md_delivery_type_vs_person_group',
            'exclusion'                               => 'md_exclusion',
            'exclusion_history'                       => 'md_exclusion_history',
            'exclusion_history_operation'             => 'md_exclusion_history_operation',
            'external_warehouse'                      => 'md_external_warehouse',
            'fieldset'                                => 'md_fieldset',
            'field_setting'                           => 'md_field_setting',
            'fuel'                                    => 'md_fuel',
            'geozone'                                 => 'md_geozone',
            'geozon_vs_coverages'                     => 'md_geozon_vs_coverages',
            'lag'                                     => 'md_lag',
            'language'                                => 'md_language',
            'language_message'                        => 'md_language_message',
            'language_source_message'                 => 'md_language_source_message',
            'location'                                => 'md_location',
            'location_access'                         => 'md_location_access',
            'mailer'                                  => 'md_mailer',
            'migration'                               => 'md_migration',
            'person_group'                            => 'md_person_group',
            'pickup_point'                            => 'md_pickup_point',
            'pickup_point_rate'                       => 'md_pickup_point_rate',
            'pickup_point_rate_person_group_param'    => 'md_pickup_point_rate_person_group_param',
            'pickup_point_shedule_template'           => 'md_pickup_point_shedule_template',
            'profile'                                 => 'md_profile',
            'profile_setting'                         => 'md_profile_setting',
            'schedule_template'                       => 'md_schedule_template',
            'shift_removal_reason'                    => 'md_shift_removal_reason',
            'user_recovery'                           => 'md_user_recovery',
            'vehicle'                                 => 'md_vehicle',
            'vehicle_external'                        => 'md_vehicle_external',
            'vehicle_type'                            => 'md_vehicle_type',
            'warehouse_external_group'                => 'md_warehouse_external_group',
            'warehouse_external_param'                => 'md_warehouse_external_param',
            'warehouse_rate'                          => 'md_warehouse_rate',
            'warehouses'                              => 'md_warehouses',
        ];
        return 'public.' . $tables[$name];
    }

    /**
     * Возвращает стандартный модуль codeception DB.
     *
     * @return Db|Module
     *
     * @throws ModuleException
     */
    protected function getModuleDb(): Db
    {
        return $this->getModule('Db');
    }
}
