<?php

namespace Delivery\AcceptanceTest\Page\Layouts;

/**
 * Class MainNavbar
 * Класс паттерна Pageobject разделов справочника.
 *
 * @package Delivery\AcceptanceTest\Page\Layouts
 */
class MainNavbar
{
    /**
     * Логотип в верхнем левом углу главного меню системы.
     *
     * @var array
     */
    public static $logo = [
        'text'    => 'MAG Delivery',
        'locator' => 'h1.header__title',
    ];

    /**
     * Раздел диспетчера в главном меню.
     *
     * @var array
     */
    public static $arm = [
        'text'    => 'Диспетчер',
        'locator' => 'a[href="/arm"]',
    ];

    /**
     * Раздел локаций в главном меню.
     *
     * @var array
     */
    public static $locations = [
        'text'    => 'Локации',
        'locator' => 'a[href="/locations"]',
    ];

    /**
     * Раздел клиентов в главном меню.
     *
     * @var array
     */
    public static $clients = [
        'text'    => 'Клиенты',
        'locator' => 'a[href="/clients"]',
    ];

    /**
     * Раздел исключений в главном меню.
     *
     * @var array
     */
    public static $exclusions = [
        'text'    => 'Исключения',
        'locator' => 'a[href="/exclusions"]',
    ];

    /**
     * Раздел справочники в главном меню.
     *
     * @var array
     */
    public static $directories = [
        'text'    => 'Справочники',
        'locator' => 'a[href="/directories"]',
    ];

    /**
     * Блок пользователя в главном меню.
     *
     * @var array
     */
    public static $userBlock = [
        'text'    => null,
        'locator' => 'div.header__user',
    ];

    /**
     * Значок загрузки данных справа от пунтов главного меню.
     *
     * @var string
     */
    public static $loadIcon = '//*[@class="loader"]';

    /**
     * Запись "Нет данных" при отсутствии данных в таблице.
     *
     * @var string
     */
    public static $noDataNotation = '//div[contains(@class, "directory__placeholder")][contains(text(), "Нет данных")]';

    /**
     * Таблица сущностей с заголовками выше списка данных.
     *
     * @var string
     */
    public static $viewTable = '[class="d_t-r h_full"]';

    /**
     * Таблица с данными сущностей и элементами управления.
     *
     * @var string
     */
    public static $viewTableWithData = '[class="ant-table-wrapper po_r"]';

    /**
     * Новая таблица с данными сущностей и элементами управления.
     *
     * @var string
     */
    public static $viewNewTableWithData = '[class="ReactVirtualized__Grid ReactVirtualized__Table__Grid"]';

    /**
     * Склад в АРМ Диспетчера в поле выбора склада, когда страница прогрузилась.
     *
     * @var string
     */
    public static $viewArmAfterLoadData = '//div[contains(@class, "ant-select-selection-selected-value")][contains(text(), "Второй склад Абакан")]';
}
