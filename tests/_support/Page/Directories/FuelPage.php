<?php

namespace Delivery\AcceptanceTest\Page\Directories;

/**
 * Class FuelPage
 * Класс паттерна Pageobject страницы справочника типов топлива.
 *
 * @package Delivery\AcceptanceTest\Page\Directories
 */
class FuelPage
{
    /**
     * УРЛ страницы справочника стран.
     *
     * @var string
     */
    public static $URL = '/directories/fuel';

    /**
     * Заголовок страницы справочника видов топлива.
     *
     * @var array
     */
    public static $title = [
        'text'    => 'Топливо',
        'locator' => 'h1[data-test="title"]',
    ];

    /**
     * Первая колонка в таблице видов топлива.
     *
     * @var array
     */
    public static $firstTh = [
        'text'    => 'Название',
        'locator' => '//div/div[1]/div[1]/span',
    ];

    /**
     * Вторая колонка в таблице видов топлива.
     *
     * @var array
     */
    public static $secondTh = [
        'text'    => '',
        'locator' => '//div/div[1]/div[2]/span',
    ];

    /**
     * Кнопка добавления нового вида топлива.
     *
     * @var array
     */
    public static $createFuelButton = [
        'text'    => 'добавить',
        'locator' => 'a[href="/directories/fuel/create"]',
    ];

    /**
     * Титул попапа добавления нового вида топлива.
     *
     * @var array
     */
    public static $createPopupTitle = [
        'text'    => 'Добавить тип топлива',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Титул попапа редактирования вида топлива.
     *
     * @var array
     */
    public static $updatePopupTitle = [
        'text'    => 'Изменить тип топлива',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Лейбл для поля названия в попапе добавления нового вида топлива.
     *
     * @var array
     */
    public static $labelNameInPopup = [
        'text'    => 'Название топлива',
        'locator' => 'label[for="name"]',
    ];

    /**
     * Поле названия в попапе добавления нового вида топлива.
     *
     * @var array
     */
    public static $nameFieldInAddPopup = [
        'text'    => null,
        'locator' => '#name',
    ];

    /**
     * Иконка фильтра по названию у справочника видов топлива в списке.
     *
     * @var array
     */
    public static $searchIconName = [
        'text'    => 'Фильтр',
        'locator' => '//div/div[1]/div[1]/i',
    ];

    /**
     * Поле поиска у фильтра по названию вида топлива в списке.
     *
     * @var array
     */
    public static $filterFieldName = [
        'text'    => 'Введите текст',
        'locator' => 'input[class="ant-input"]',
    ];

    /**
     * Кнопка применения фильтра по названию у справочника видов топлива в списке.
     *
     * @var array
     */
    public static $searchButtonName = [
        'text'    => 'Найти',
        'locator' => '//div[2]/div/div/div/form/button',
    ];

    /**
     * Кнопка отмены формы в попапе добавления нового вида топлива.
     *
     * @var array
     */
    public static $cancelButtonInAddPopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_fuel_cancel"]',
    ];

    /**
     * Кнопка отмены формы в попапе редактирования нового вида топлива.
     *
     * @var array
     */
    public static $cancelButtonInUpdPopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_fuel_cancel"]',
    ];

    /**
     * Кнопка подтверждения формы в попапе добавления нового вида топлива.
     *
     * @var array
     */
    public static $submitButtonInAddPopup = [
        'text'    => 'Добавить',
        'locator' => 'button[data-test="form_fuel_submit"]',
    ];

    /**
     * Кнопка подтверждения формы редактирования вида топлива.
     *
     * @var array
     */
    public static $submitButtonInUpdatePopup = [
        'text'    => 'Сохранить',
        'locator' => 'button[data-test="form_fuel_submit"]',
    ];

    /**
     * Сообщение об удалении топлива.
     *
     * @var array
     */
    public static $deletingFuelMessage = [
        'text'    => 'Тип топлива удалён!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о блокировке удаления вида топлива.
     *
     * @var array
     */
    public static $delBlockFuelMessage = [
        'text'    => 'Объект не может быть удален',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о создании вида топлива.
     *
     * @var array
     */
    public static $addFuelMessage = [
        'text'    => 'Тип топлива создан!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о редактировании вида топлива.
     *
     * @var array
     */
    public static $updateFuelMessage = [
        'text'    => 'Тип топлива изменён!',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение об уже существующем в системе названии вида топлива.
     *
     * @var array
     */
    public static $alreadyExistNameMessage = [
        'text'    => 'The name is not unique',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле названия вида топлива.
     *
     * @var array
     */
    public static $validateNameEmptyMessage = [
        'text'    => 'Пожалуйста, укажите тип топлива!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле названия вида топлива.
     *
     * @var array
     */
    public static $validateNameLimitMessage = [
        'text'    => 'Значение «Name» должно содержать максимум 255 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Иконка очистки данных в поле фильтра с лупой.
     *
     * @var array
     */
    public static $clearFilterMagnifierIcon = [
        'text'    => null,
        'locator' => '//i[contains(@class, "anticon d_i-b m_-xs p_xs text_xxs l-h_0")]',
    ];

    /**
     * Метод получения локатора у иконки редактирования вида топлива по локатору его строки в таблице.
     *
     * @param $rowLocator
     *
     * @return string
     */
    public static function getUpdateRowLocator($rowLocator)
    {
        return $rowLocator . ' div a:nth-child(1)';
    }

    /**
     * Метод получения локатора у иконки удаления вида топлива по локатору его строки в таблице.
     *
     * @param $rowLocator
     *
     * @return string
     */
    public static function getDeleteRowLocator($rowLocator)
    {
        return $rowLocator . ' div a:nth-child(2)';
    }
}
