<?php

namespace Delivery\AcceptanceTest\Helper;

use Codeception\Exception\ModuleException;

/**
 * Class FuelDatabaseHelper
 * Класс хэлпера для работы с таблицей типов топлива.
 *
 * @package Delivery\AcceptanceTest\Helper
 */
class FuelDatabaseHelper extends DatabaseHelper
{
    /**
     * Добавляет запись в таблицы сущности "Тип топлива".
     *
     * @param array $params Значение полей записи, которую нужно добавить.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return int
     */
    public function addFuelEntity(array $params): int
    {
        return $this->getModuleDb()->haveInDatabase($this->getFuelTableName(), [
            'name'      => array_key_exists('name', $params) ? $params['name'] : sqs('name'),
            'isDeleted' => array_key_exists('isDeleted', $params) ? $params['isDeleted'] : false,
        ]);
    }

    /**
     * Возвращает название таблицы сущности "Тип топлива".
     *
     * @return string
     */
    public function getFuelTableName(): string
    {
        return $this->getTable('fuel');
    }

    /**
     * Возвращает значение поля из таблицы сущности "Тип топлива".
     *
     * @param string $column   Название столца значение которого нужно вернуть.
     * @param array  $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return mixed
     */
    public function grabFromFuelTable(string $column, array $criteria)
    {
        return $this->getModuleDb()->grabFromDatabase($this->getFuelTableName(), $column, $criteria);
    }

    /**
     * Проверяет отсутствие записи в таблице сущности "Тип топлива".
     *
     * @param array $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function dontSeeInFuelTable(array $criteria): void
    {
        $this->getModuleDb()->dontSeeInDatabase($this->getFuelTableName(), $criteria);
    }

    /**
     * Проверяет наличие записи в таблице сущности "Тип топлива".
     *
     * @param array $criteria Критерии, которым должна удовлетворять искомая запись.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function seeInFuelTable(array $criteria): void
    {
        $this->getModuleDb()->seeInDatabase($this->getFuelTableName(), $criteria);
    }

    /**
     * Обновляет запись в таблице сущности "Тип топлива".
     *
     * @param int   $id     Идентификатор обновляемой записи.
     * @param array $params Значение полей записи, которую нужно добавить.
     *
     * @throws ModuleException Если модуль DB не зарегистрирован в конфигурации codeception.
     *
     * @return void
     */
    public function updateFuelEntityById(int $id, array $params): void
    {
        $this->getModuleDb()->updateInDatabase($this->getFuelTableName(), $params, [
            'id' => $id,
        ]);
    }
}
