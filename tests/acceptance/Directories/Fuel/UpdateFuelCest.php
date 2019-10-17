<?php

namespace Delivery\AcceptanceTest\Directories\Fuel;

use Exception;
use Facebook\WebDriver\WebDriverKeys;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\FuelPage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class UpdateFuelCest.
 * Приемочные тесты для проверки сценариев редактирования видов топлива.
 *
 * @package Delivery\AcceptanceTest
 */
class UpdateFuelCest
{
    /**
     * Название вида топлива из предусловия.
     *
     * @var string
     */
    public static $fuelName = 'Топливо для редактирования в автотесте';

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
     * Позитивный сценарий редактирования топлива.
     *
     * @throws Exception
     */
    public function updateFuelCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий редактирования топлива.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->seeInField(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $fuelName = sqs('NewFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$updateFuelMessage);
        $i->viewElement(FuelPage::$updateFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий редактирования топлива с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function updateFuelCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий редактирования топлива с проверкой отмены формы.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->seeInField(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $fuelName = sqs('NewFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$cancelButtonInUpdPopup);
        $i->dontSee(FuelPage::$updateFuelMessage['text'], FuelPage::$updateFuelMessage['locator']);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see(static::$fuelName, $dataTestAttribute);
        $i->dontSee($fuelName, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий редактирования топлива с кириллицей в поле "Название топлива".
     *
     * @throws Exception
     */
    public function updateFuelNameCyrillic(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий редактирования топлива с кириллицей в поле "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->seeInField(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $fuelName = sqs('Новое название топлива');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$updateFuelMessage);
        $i->viewElement(FuelPage::$updateFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования топлива с уже существующим в системе названием.
     *
     * @throws Exception
     */
    public function updateFuelNameAlreadyExist(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий редактирования топлива с уже существующим в системе названием.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->seeInField(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $fuelNameAlrExist = 'АИ 92';
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelNameAlrExist);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$alreadyExistNameMessage);
        $i->viewElement(FuelPage::$alreadyExistNameMessage);
        $fuelName = 'NewFuelAlrExist';
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$updateFuelMessage);
        $i->viewElement(FuelPage::$updateFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования топлива с проверкой валидатора на незаполнение поля "Название топлива".
     *
     * @throws Exception
     */
    public function updateFuelNameEmpty(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий редактирования топлива с проверкой валидатора на незаполнение поля "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->seeInField(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->pressKey(FuelPage::$nameFieldInAddPopup['locator'], [
            WebDriverKeys::LEFT_CONTROL,
            'a',
        ], WebDriverKeys::BACKSPACE);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$validateNameEmptyMessage);
        $i->see(FuelPage::$validateNameEmptyMessage['text'], FuelPage::$validateNameEmptyMessage['locator']);
        $fuelName = sqs('NewFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$updateFuelMessage);
        $i->viewElement(FuelPage::$updateFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования топлива с проверкой валидатора на превышение количества символов в поле "Название топлива".
     *
     * @throws Exception
     */
    public function updateFuelNameOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Негативный сценарий редактирования топлива с проверкой валидатора на превышение количества символов в поле "Название топлива".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $id                = $i->grabFromFuelTable('id', [
            'name' => static::$fuelName,
        ]);
        $dataTestAttribute = '[data-test="row_fuel_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForFieldFill(FuelPage::$nameFieldInAddPopup['locator'], static::$fuelName);
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], str_repeat('a', 256));
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$validateNameLimitMessage);
        $i->viewElement(FuelPage::$validateNameLimitMessage);
        $fuelName = sqs('NewFuel');
        $i->fillField(FuelPage::$nameFieldInAddPopup['locator'], $fuelName);
        $i->clickElement(FuelPage::$submitButtonInUpdatePopup);
        $i->waitElement(FuelPage::$updateFuelMessage);
        $i->viewElement(FuelPage::$updateFuelMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($fuelName, $dataTestAttribute);
    }
}
