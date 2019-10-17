<?php

namespace Delivery\AcceptanceTest\Page\Layouts;

/**
 * Class DirectoriesNavbar
 * Класс паттерна Pageobject разделов справочника.
 *
 * @package Delivery\AcceptanceTest\Page\Layouts
 */
class DirectoriesNavbar
{
    /**
     * Раздел типов транспорта в справочниках.
     *
     * @var array
     */
    public static $vehicleType = [
        'text'    => 'Типы транспорта',
        'locator' => 'a[href="/directories/vehicle-type"]',
    ];

    /**
     * Раздел видов топлива в справочниках.
     *
     * @var array
     */
    public static $fuel = [
        'text'    => 'Топливо',
        'locator' => 'a[href="/directories/fuel"]',
    ];

    /**
     * Заголовок раздела видов топлива в справочниках.
     *
     * @var string
     */
    public static $fuelTitle = '//h1[@data-test="title"][contains(text(), "Топливо")]';

    /**
     * Заголовок раздела типов транспорта в справочниках.
     *
     * @var string
     */
    public static $vehicleTypeTitle = '//h1[@data-test="title"][contains(text(), "Типы транспорта")]';
}
