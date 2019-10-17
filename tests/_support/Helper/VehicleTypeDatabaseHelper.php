<?php

namespace Delivery\AcceptanceTest\Helper;

use Codeception\Exception\ModuleException;

/**
 * Class VehicleTypeDatabaseHelper
 * Класс хэлпера для работы с таблицей типов транспорта.
 *
 * @package Delivery\AcceptanceTest\Helper
 */
class VehicleTypeDatabaseHelper extends DatabaseHelper
{
    /**
     * Добавляет запись в таблицы сущности "Тип транспорта".
     *
     * @param array $params Значение полей записи, которую нужно добавить.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return int
     */
    public function addVehicleTypeEntity(array $params): int
    {
        return $this->getModuleDb()->haveInDatabase($this->getVehicleTypeTableName(), [
            'name'             => array_key_exists('name', $params) ? $params['name'] : sqs('name'),
            'load'             => array_key_exists('load', $params) ? $params['load'] : 9999999,
            'fuelConsumption'  => array_key_exists('fuelConsumption', $params) ? $params['fuelConsumption'] : 8888888,
            'fuelId'           => $params['fuelId'],
            'routePrepareTime' => array_key_exists('routePrepareTime', $params) ? $params['routePrepareTime'] : 6666666,
            'usePlanMode'      => array_key_exists('usePlanMode', $params) ? $params['usePlanMode'] : false,
            'isDeleted'        => array_key_exists('isDeleted', $params) ? $params['isDeleted'] : false,
        ]);
    }

    /**
     * Возвращает название таблицы сущности "Тип транспорта".
     *
     * @return string
     */
    public function getVehicleTypeTableName(): string
    {
        return $this->getTable('vehicle_type');
    }

    /**
     * Возвращает значение поля из таблицы сущности "Тип транспорта".
     *
     * @param string $column   Название столбца значение которого нужно вернуть.
     * @param array  $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return mixed
     */
    public function grabFromVehicleTypeTable(string $column, array $criteria)
    {
        return $this->getModuleDb()->grabFromDatabase($this->getVehicleTypeTableName(), $column, $criteria);
    }

    /**
     * Проверяет отсутствие записи в таблице сущности "Тип транспорта".
     *
     * @param array $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function dontSeeInVehicleTypeTable(array $criteria): void
    {
        $this->getModuleDb()->dontSeeInDatabase($this->getVehicleTypeTableName(), $criteria);
    }

    /**
     * Проверяет наличие записи в таблице сущности "Тип транспорта".
     *
     * @param array $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function seeInVehicleTypeTable(array $criteria): void
    {
        $this->getModuleDb()->seeInDatabase($this->getVehicleTypeTableName(), $criteria);
    }

    /**
     * Обновляет запись в таблице сущности "Тип транспорта".
     *
     * @param int   $id     Идентификатор обновляемой записи.
     * @param array $params Значение полей записи, которую нужно добавить.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function updateVehicleTypeEntityById(int $id, array $params): void
    {
        $this->getModuleDb()->updateInDatabase($this->getVehicleTypeTableName(), $params, [
            'id' => $id,
        ]);
    }
}
