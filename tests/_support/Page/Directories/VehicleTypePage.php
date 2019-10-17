<?php

namespace Delivery\AcceptanceTest\Page\Directories;

/**
 * Class VehicleTypePage
 * Класс паттерна Pageobject страницы справочника типов транспорта.
 *
 * @package Delivery\AcceptanceTest\Page\Directories
 */
class VehicleTypePage
{
    /**
     * УРЛ страницы справочника типы транспорта.
     *
     * @var string
     */
    public static $URL = '/directories/vehicle-type';

    /**
     * Заголовок страницы справочника типов транспорта.
     *
     * @var array
     */
    public static $title = [
        'text'    => 'Типы транспорта',
        'locator' => 'h1[data-test="title"]',
    ];

    /**
     * Первая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $firstTh = [
        'text'    => 'Название',
        'locator' => '//tr/th[1]',
    ];

    /**
     * Вторая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $secondTh = [
        'text'    => 'Грузоподъемность',
        'locator' => '//tr/th[2]',
    ];

    /**
     * Третья колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $thirdTh = [
        'text'    => 'Расход топлива',
        'locator' => '//tr/th[3]',
    ];

    /**
     * Четвертая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $fourthTh = [
        'text'    => 'Тип топлива',
        'locator' => '//tr/th[4]',
    ];

    /**
     * Пятая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $fifthTh = [
        'text'    => 'Планирование маршрутов',
        'locator' => '//tr/th[5]',
    ];

    /**
     * Шестая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $sixthTh = [
        'text'    => 'Время погрузки',
        'locator' => '//tr/th[6]',
    ];

    /**
     * Седьмая колонка в таблице типов транспорта.
     *
     * @var array
     */
    public static $seventhTh = [
        'text'    => '',
        'locator' => '//tr/th[7]',
    ];

    /**
     * Кнопка добавления нового типа транспорта.
     *
     * @var array
     */
    public static $createVehicleTypeButton = [
        'text'    => 'добавить',
        'locator' => 'a[href="/directories/vehicle-type/create"]',
    ];

    /**
     * Титул попапа добавления нового типа транспорта.
     *
     * @var array
     */
    public static $createPopupTitle = [
        'text'    => 'Новый тип транспорта',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Титул попапа редактирования типа транспорта.
     *
     * @var array
     */
    public static $updatePopupTitle = [
        'text'    => 'Редактирование типа транспорта',
        'locator' => '#rcDialogTitle0',
    ];

    /**
     * Лейбл для поля названия в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $labelNameInPopup = [
        'text'    => 'Название',
        'locator' => 'label[for="name"]',
    ];

    /**
     * Лейбл для поля грузоподъемности в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $labelLoadInPopup = [
        'text'    => 'Грузоподъемность',
        'locator' => 'label[for="load"]',
    ];

    /**
     * Лейбл для поля расхода топлива в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $labelFCInPopup = [
        'text'    => 'Расход топлива',
        'locator' => 'label[for="fuelConsumption"]',
    ];

    /**
     * Лейбл для поля вида топлива в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $labelFuelInPopup = [
        'text'    => 'Тип топлива',
        'locator' => 'label[for="fuelId"]',
    ];

    /**
     * Лейбл для поля времени погрузки маршрута в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $labelLTInPopup = [
        'text'    => 'Время погрузки маршрута',
        'locator' => 'label[for="loadTime"]',
    ];

    /**
     * Поле названия в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $nameFieldInAddPopup = [
        'text'    => null,
        'locator' => '#name',
    ];

    /**
     * Поле грузоподъемности в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $loadFieldInAddPopup = [
        'text'    => null,
        'locator' => '#load',
    ];

    /**
     * Аддон в поле грузоподъемности в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $loadFieldAddon = [
        'text'    => 'т',
        'locator' => '//*[@id="load"]//following-sibling::span',
    ];

    /**
     * Поле расхода топлива в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $addFCFieldInAddPopup = [
        'text'    => null,
        'locator' => '#fuelConsumption',
    ];

    /**
     * Аддон в поле расхода топлива в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $addFCFieldAddon = [
        'text'    => 'л/100 км',
        'locator' => '//*[@id="fuelConsumption"]//following-sibling::span',
    ];

    /**
     * Поле селекта вида топлива в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $fuelFieldInAddPopup = [
        'text'    => 'Выберите тип топлива',
        'locator' => '#fuelId',
    ];

    /**
     * Поле времени погрузки маршрута в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $addLTFieldInAddPopup = [
        'text'    => null,
        'locator' => '#loadTime',
    ];

    /**
     * Аддон в поле времени погрузки маршрута в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $addLTFieldAddon = [
        'text'    => 'мин',
        'locator' => '//*[@id="loadTime"]//following-sibling::span',
    ];

    /**
     * Чекбокс использования планового режима в попапе добавления нового типа транспорта.
     *
     * @var string
     */
    public static $checkBoxUPMInPopup = '#usePlanMode';

    /**
     * Кнопка отмены формы в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $cancelButtonInAddPopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_vehicle-type_cancel"]',
    ];

    /**
     * Кнопка отмены формы в попапе редактирования типа транспорта.
     *
     * @var array
     */
    public static $cancelButtonInUpdPopup = [
        'text'    => 'Отмена',
        'locator' => 'button[data-test="form_vehicle-type_cancel"]',
    ];

    /**
     * Кнопка подтверждения формы в попапе добавления нового типа транспорта.
     *
     * @var array
     */
    public static $submitButtonInAddPopup = [
        'text'    => 'Добавить',
        'locator' => 'button[data-test="form_vehicle-type_submit"]',
    ];

    /**
     * Кнопка подтверждения формы редактирования типа транспорта.
     *
     * @var array
     */
    public static $submitButtonInUpdatePopup = [
        'text'    => 'Сохранить',
        'locator' => 'button[data-test="form_vehicle-type_submit"]',
    ];

    /**
     * Иконка фильтра по названию типа транспорта в списке.
     *
     * @var array
     */
    public static $searchIconName = [
        'text'    => 'Фильтр',
        'locator' => '//table/thead/tr/th[1]/i',
    ];

    /**
     * Поле поиска фильтра по названию типа транспорта в списке.
     *
     * @var array
     */
    public static $filterFieldName = [
        'text'    => 'Введите текст',
        'locator' => 'input[class="ant-input"]',
    ];

    /**
     * Сообщение об удалении типа транспорта.
     *
     * @var array
     */
    public static $deleteVehicleTypeMessage = [
        'text'    => 'Тип транспорта удалён',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о блокировке удаления типа транспорта.
     *
     * @var array
     */
    public static $delBlockVehTypeMessage = [
        'text'    => 'Объект не может быть удален',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о создании типа транспорта.
     *
     * @var array
     */
    public static $addVehicleTypeMessage = [
        'text'    => 'Тип транспорта создан',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о редактировании типа транспорта.
     *
     * @var array
     */
    public static $updateVehicleTypeMessage = [
        'text'    => 'Тип транспорта изменён',
        'locator' => '.ant-notification',
    ];

    /**
     * Сообщение о пустом поле названия типа транспорта.
     *
     * @var array
     */
    public static $validateNameEmptyMessage = [
        'text'    => 'Пожалуйста, укажите тип транспорта!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле грузоподъемности типа транспорта.
     *
     * @var array
     */
    public static $validateLoadEmptyMessage = [
        'text'    => 'Пожалуйста, укажите грузоподъемность транспорта!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле расхода топлива типа транспорта.
     *
     * @var array
     */
    public static $validateFCEmptyMessage = [
        'text'    => 'Пожалуйста, укажите расход топлива транспорта!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о пустом поле типа топлива у типа транспорта.
     *
     * @var array
     */
    public static $validateFuelEmptyMessage = [
        'text'    => 'Пожалуйста, укажите тип топлива!',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение об уже существующем в системе названии типа транспорта.
     *
     * @var array
     */
    public static $alreadyExistNameMessage = [
        'text'    => 'The name is not unique',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле названия типа транспорта.
     *
     * @var array
     */
    public static $validateNameLimitMessage = [
        'text'    => 'Значение «Name» должно содержать максимум 255 символов.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле грузоподъемности типа транспорта.
     *
     * @var array
     */
    public static $validateLoadLimitMessage = [
        'text'    => 'Значение «Load» должно быть числом.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле расхода топлива типа транспорта.
     *
     * @var array
     */
    public static $validateFCLimitMessage = [
        'text'    => 'Значение «Fuel Consumption» должно быть числом.',
        'locator' => '.ant-form-explain',
    ];

    /**
     * Сообщение о превышении количества символов в поле времени погрузки маршрута типа транспорта.
     *
     * @var array
     */
    public static $validateLTLimitMessage = [
        'text'    => 'Значение «Load Time» не должно превышать 2147483647.',
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
     * Метод получения локатора у иконки редактирования типа транспорта по локатору его строки в таблице.
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
     * Метод получения локатора у иконки удаления типа транспорта по локатору его строки в таблице.
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
