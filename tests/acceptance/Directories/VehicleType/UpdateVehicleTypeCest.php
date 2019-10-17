<?php

namespace Delivery\AcceptanceTest\Directories\VehicleType;

use Exception;
use Facebook\WebDriver\WebDriverElement;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\VehicleTypePage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class UpdateVehicleTypeCest.
 * Приемочные тесты для проверки сценариев редактирования типов транспорта.
 *
 * @package Delivery\AcceptanceTest
 */
class UpdateVehicleTypeCest
{
    /**
     * Название типа транспорта из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeName = 'Тип транспорта для редактирования в автотесте';

    /**
     * Топливо "АИ 95" из предусловия для редактирования типа транспорта.
     *
     * @var string
     */
    public static $vehicleFuel = 'АИ 95';

    /**
     * Название типа транспорта из предусловия использующего плановый режим.
     *
     * @var string
     */
    public static $vehicleTypeNameUPM = 'Тип транспорта для редактирования с плановым режимом';

    /**
     * Использование чекбокса с функцией планового режима у типа транспорта из предусловия.
     *
     * @var boolean
     */
    public static $vehicleTypePMUPM = true;

    /**
     * Значение "Да" у типа транспорта в списке, когда отмечен чекбокс "Плановый режим".
     *
     * @var string
     */
    public static $usePlanModeYes = 'Да';

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
     * Позитивный сценарий редактирования типа транспорта.
     *
     * @throws Exception
     */
    public function updateVehicleTypeCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий редактирования типа транспорта.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $vehicleTypeName = 'TestVehicleTypeUpdate';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->viewElement(VehicleTypePage::$loadFieldAddon);
        $i->viewElement(VehicleTypePage::$addFCFieldAddon);
        $i->viewElement(VehicleTypePage::$addLTFieldAddon);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
        $i->dontSee(static::$usePlanModeYes, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий редактирования типа транспорта с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function updateVehicleTypeCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий редактирования типа транспорта с проверкой отмены формы.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $vehicleTypeName = 'TestVehicleTypeCancel';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$cancelButtonInUpdPopup);
        $i->dontSee(VehicleTypePage::$updateVehicleTypeMessage['text'], VehicleTypePage::$updateVehicleTypeMessage['locator']);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see('Тип транспорта для редактирования в автотесте', $dataTestAttribute);
        $i->see(9999999, $dataTestAttribute);
        $i->see(9999999, $dataTestAttribute);
        $i->see('АИ 92', $dataTestAttribute);
        $i->see(9999999, $dataTestAttribute);
        $i->dontSee($vehicleTypeName);
    }

    /**
     * Позитивный сценарий редактирования типа транспорта с отметкой чекбокса "Использовать плановый режим".
     *
     * @throws Exception
     */
    public function updateVehicleTypeUsePM(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий редактирования типа транспорта с отметкой чекбокса "Использовать плановый режим".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $vehicleTypeName = 'TestVehicleTypeUpdateUsePM';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->see('Использовать для плановых маршрутов');
        $i->checkOption(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->seeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
        $i->see(static::$usePlanModeYes, $dataTestAttribute);
        $i->click($dataTestAttribute);
        $i->wait(1);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->seeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
    }

    /**
     * Позитивный сценарий редактирования типа транспорта, снимаем отметку чекбокса "Использовать плановый режим".
     *
     * @throws Exception
     */
    public function updateVehicleTypeWithoutUsePM(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий редактирования типа транспорта, снимаем отметку чекбокса "Использовать плановый режим".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name'        => static::$vehicleTypeNameUPM,
            'usePlanMode' => static::$vehicleTypePMUPM,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeNameUPM;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeNameUPM);
        $i->seeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $vehicleTypeNameUPM = 'TestVehicleTypeUpdateWithoutUsePM';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeNameUPM);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->uncheckOption(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeNameUPM, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
        $i->dontSee(static::$usePlanModeYes, $dataTestAttribute);
        $i->click($dataTestAttribute);
        $i->wait(1);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeNameUPM);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
    }

    /**
     * Позитивный сценарий редактирования типа транспорта с кириллицей в поле "Название".
     *
     * @throws Exception
     */
    public function updateVehicleTypeNameCyrillic(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий редактирования типа транспорта с кириллицей в поле "Название".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $vehicleTypeName = 'Транспорт Изменен Имя Кириллица';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования типа транспорта с уже существующим в системе названием.
     *
     * @throws Exception
     */
    public function updateVehicleTypeNameNameAlreadyExist(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий редактирования типа транспорта с уже существующим в системе названием.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $vehicleTypeNameAlrExist = 'Тип транспорта для удаления в автотесте';
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeNameAlrExist);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$alreadyExistNameMessage);
        $i->viewElement(VehicleTypePage::$alreadyExistNameMessage);
        $vehicleTypeName = 'TestVehicleTypeUpdateNameAlrExist';
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования типа транспорта c незаполненными полями название, грузоподъёмность и расход топлива.
     *
     * @throws Exception
     */
    public function updateVehicleTypeValuesInFieldsEmpty(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий редактирования типа транспорта c незаполненными полями название, грузоподъёмность и расход топлива.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $i->pressKey(VehicleTypePage::$nameFieldInAddPopup['locator'], [
            'ctrl',
            'a',
        ], \Facebook\WebDriver\WebDriverKeys::DELETE);
        $i->pressKey(VehicleTypePage::$loadFieldInAddPopup['locator'], [
            'ctrl',
            'a',
        ], \Facebook\WebDriver\WebDriverKeys::DELETE);
        $i->pressKey(VehicleTypePage::$addFCFieldInAddPopup['locator'], [
            'ctrl',
            'a',
        ], \Facebook\WebDriver\WebDriverKeys::DELETE);
        $i->pressKey(VehicleTypePage::$addLTFieldInAddPopup['locator'], [
            'ctrl',
            'a',
        ], \Facebook\WebDriver\WebDriverKeys::DELETE);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$validateNameEmptyMessage);
        $i->see(VehicleTypePage::$validateNameEmptyMessage['text'], VehicleTypePage::$validateNameEmptyMessage['locator']);
        $i->see(VehicleTypePage::$validateLoadEmptyMessage['text'], VehicleTypePage::$validateLoadEmptyMessage['locator']);
        $i->see(VehicleTypePage::$validateFCEmptyMessage['text'], VehicleTypePage::$validateFCEmptyMessage['locator']);
        $vehicleTypeName = 'TestVehicleTypeUpdateValuesInFieldsEmpty';
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования типа транспорта c превышением количества символов в поле "Название".
     *
     * @throws Exception
     */
    public function updateVehicleTypeNameOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий редактирования типа транспорта c превышением количества символов в поле "Название".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], str_repeat('a', 256));
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateNameLimitMessage);
        $i->viewElement(VehicleTypePage::$validateNameLimitMessage);
        $vehicleTypeName = 'TestVehicleTypeUpdateNameOutOfSTR';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования типа транспорта c превышением количества символов в полях грузоподъёмность и расход топлива.
     *
     * @throws Exception
     */
    public function updateVehicleTypeLoadAndFCOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий редактирования типа транспорта c превышением количества символов в полях грузоподъёмность и расход топлива.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $vehicleTypeName = 'TestVehicleTypeUpdateLoadFcOutOfSTR';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], str_repeat('1', 350));
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], str_repeat('1', 350));
        $vehicleTypeLT = 55;
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateLoadLimitMessage);
        $i->viewElement(VehicleTypePage::$validateLoadLimitMessage);
        $i->viewElement(VehicleTypePage::$validateFCLimitMessage);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий редактирования типа транспорта c превышением количества символов в поле "Время комплектации маршрута".
     *
     * @throws Exception
     */
    public function updateVehicleTypeLTOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий редактирования типа транспорта c превышением количества символов в поле "Время комплектации маршрута".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click($dataTestAttribute);
        $i->waitForElementChange(VehicleTypePage::$nameFieldInAddPopup['locator'], function(WebDriverElement $el) {
            return $el->getAttribute('value') === static::$vehicleTypeName;
        }, $i::$timeOut);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], static::$vehicleTypeName);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $vehicleTypeName = 'TestVehicleTypeUpdateLTOutOfSTR';
        $i->clearField(VehicleTypePage::$nameFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], str_repeat('1', 16));
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateLTLimitMessage);
        $i->viewElement(VehicleTypePage::$validateLTLimitMessage);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->dontSeeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
        $i->wait(1);
        $i->clickElement(VehicleTypePage::$submitButtonInUpdatePopup);
        $i->waitElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$updateVehicleTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }
}
