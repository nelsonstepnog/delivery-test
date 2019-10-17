<?php

namespace Delivery\AcceptanceTest\Directories\Fuel;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\FuelPage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class DeleteFuelCest.
 * Приемочные тесты для проверки сценариев удаления типов топлива.
 *
 * @package Delivery\AcceptanceTest
 */
class DeleteFuelCest
{
    /**
     * Название топлива для удаления из предусловия.
     *
     * @var string
     */
    public static $fuelName = 'Топливо для удаления в автотесте';

    /**
     * Название топлива из предусловия АИ 92, удаление которого плокируется транспортом и типом транспорта.
     *
     * @var string
     */
    public static $fuelNameBlock = 'АИ 92';

    /**
     * Метод, выполняющийся перед каждым тестом.
     *
     * @return void
     */
    public function _before(AcceptanceTester $i)
    {
    }

    /**
     * Метод, выполняющийся после каждого теста.
     *
     * @return void
     */
    public function _after(AcceptanceTester $i)
    {
    }

    /**
     * Позитивный сценарий удаления топлива, с которым не связан никакой транспорт и тип транспорта.
     *
     * @throws Exception
     */
    public function deleteFuelCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий удаления топлива, с которым не связан никакой транспорт и тип транспорта.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(FuelPage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableOk();
        $i->waitForElementVisible(FuelPage::$deletingFuelMessage['locator'], $i::$timeOut);
        $i->viewElement(FuelPage::$deletingFuelMessage);
        $i->waitForElementNotVisible(FuelPage::$deletingFuelMessage['locator'], $i::$timeOut);
        $i->dontSee(static::$fuelName, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий проверки блокировки удаления топлива, т.к. присутствует связанный с ним тип транспорта и транспорт.
     *
     * @throws Exception
     */
    public function deleteFuelBlock(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий проверки блокировки удаления топлива, т.к. присутствует связанный с ним тип транспорта и транспорт.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelNameBlock,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(FuelPage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableOk();
        $i->waitForElementVisible(FuelPage::$delBlockFuelMessage['locator'], $i::$timeOut);
        $i->viewElement(FuelPage::$delBlockFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see(static::$fuelNameBlock, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий удаления топлива с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function deleteFuelCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий удаления топлива с проверкой отмены формы');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(FuelPage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableCancel();
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see(static::$fuelName, $dataTestAttribute);
    }
}
