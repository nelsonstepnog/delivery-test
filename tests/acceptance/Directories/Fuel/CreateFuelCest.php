<?php

namespace Delivery\AcceptanceTest\Directories\Fuel;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\FuelPage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class CreateFuelCest.
 * Приемочные тесты для проверки сценариев создания видов топлива.
 *
 * @package Delivery\AcceptanceTest
 */
class CreateFuelCest
{
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
     * Позитивный сценарий создания топлива.
     *
     * @throws Exception
     */
    public function createFuelCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий создания топлива.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $fuelName = sqs('TestFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$addFuelMessage);
        $i->viewElement(FuelPage::$addFuelMessage);
        $id                = $i->grabFromFuelTable('id', [
            'name' => $fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий создания топлива с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function createFuelCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий создания топлива с проверкой отмены формы.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $fuelName = sqs('TestFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$cancelButtonInAddPopup);
        $i->dontSee(FuelPage::$addFuelMessage['text'], FuelPage::$addFuelMessage['locator']);
        $i->dontSee($fuelName);
    }

    /**
     * Позитивный сценарий создания топлива с кириллицей в поле "Название топлива".
     *
     * @throws Exception
     */
    public function createFuelNameCyrillic(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий создания топлива с кириллицей в поле "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $fuelName = sqs('Топливо тест');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$addFuelMessage);
        $i->viewElement(FuelPage::$addFuelMessage);
        $id                = $i->grabFromFuelTable('id', [
            'name' => $fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания топлива с уже существующим в системе названием.
     *
     * @throws Exception
     */
    public function createFuelNameAlreadyExist(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий создания топлива с уже существующим в системе названием.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $fuelNameAlrExist = 'АИ 92';
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelNameAlrExist);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$alreadyExistNameMessage);
        $i->viewElement(FuelPage::$alreadyExistNameMessage);
        $fuelName = sqs('TestFuelAlrExist');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$addFuelMessage);
        $i->viewElement(FuelPage::$addFuelMessage);
        $id                = $i->grabFromFuelTable('id', [
            'name' => $fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания топлива с проверкой валидатора на незаполнение поля "Название топлива".
     *
     * @throws Exception
     */
    public function createFuelNameEmpty(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий создания топлива с проверкой валидатора на незаполнение поля "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$validateNameEmptyMessage);
        $i->see(FuelPage::$validateNameEmptyMessage['text'], FuelPage::$validateNameEmptyMessage['locator']);
        $fuelName = sqs('TestFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$addFuelMessage);
        $i->viewElement(FuelPage::$addFuelMessage);
        $id                = $i->grabFromFuelTable('id', [
            'name' => $fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания топлива с проверкой валидатора на превышение количества символов в поле "Название топлива".
     *
     * @throws Exception
     */
    public function createFuelNameOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий создания топлива с проверкой валидатора на превышение количества символов в поле "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->clickElement(FuelPage::$createFuelButton);
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], str_repeat('a', 256));
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$validateNameLimitMessage);
        $i->viewElement(FuelPage::$validateNameLimitMessage);
        $fuelName = sqs('TestFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInAddPopup);
        $i->waitElement(FuelPage::$addFuelMessage);
        $i->viewElement(FuelPage::$addFuelMessage);
        $id                = $i->grabFromFuelTable('id', [
            'name' => $fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }
}
