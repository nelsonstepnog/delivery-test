<?php

namespace Delivery\AcceptanceTest\Directories\VehicleType;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\VehicleTypePage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class CreateVehicleTypeCest.
 * Приемочные тесты для проверки сценариев создания типов транспорта.
 *
 * @package Delivery\AcceptanceTest
 */
class CreateVehicleTypeCest
{
    /**
     * Топливо "АИ 92" из предусловия для создания типа транспорта.
     *
     * @var string
     */
    public static $vehicleFuel = 'АИ 92';

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
     * Позитивный сценарий создания типа транспорта.
     *
     * @throws Exception
     */
    public function createVehicleTypeCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий создания типа транспорта.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeName = sqs('TestVehicleType');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->viewElement(VehicleTypePage::$loadFieldAddon);
        $i->viewElement(VehicleTypePage::$addFCFieldAddon);
        $i->viewElement(VehicleTypePage::$addLTFieldAddon);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->dontSee(static::$usePlanModeYes, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Позитивный сценарий создания типа транспорта с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function createVehicleTypeCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий создания типа транспорта с проверкой отмены формы.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeName = sqs('TestVehicleTypeCancel');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$cancelButtonInAddPopup);
        $i->dontSee(VehicleTypePage::$addVehicleTypeMessage['text'], VehicleTypePage::$addVehicleTypeMessage['locator']);
        $i->dontSee($vehicleTypeName);
    }

    /**
     * Позитивный сценарий создания типа транспорта без заполнения необязательного поля "Время погрузки маршрута".
     *
     * @throws Exception
     */
    public function createVehicleTypeWithoutLT(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий создания типа транспорта без заполнения необязательного поля "Время погрузки маршрута".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeName = sqs('TestVehicleType');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = '';
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Позитивный сценарий создания типа транспорта с кириллицей в поле "Название".
     *
     * @throws Exception
     */
    public function createVehicleTypeCyrillic(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий создания типа транспорта с кириллицей в поле "Название".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeName = sqs('Тип транспорта тест');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Позитивный сценарий создания типа транспорта с отметкой чекбокса "Использовать плановый режим".
     *
     * @throws Exception
     */
    public function createVehicleTypeUsePM(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий создания типа транспорта с отметкой чекбокса "Использовать плановый режим".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeName = sqs('TestVehicleTypeUsePM');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 222.2;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 22.1;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 2222222;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->see('Использовать для плановых маршрутов');
        $i->checkOption(VehicleTypePage::$checkBoxUPMInPopup);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see(static::$usePlanModeYes, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
        $i->click($dataTestAttribute);
        $i->wait(1);
        $i->seeInField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->seeCheckboxIsChecked(VehicleTypePage::$checkBoxUPMInPopup);
    }

    /**
     * Негативный сценарий создания типа транспорта с уже существующим в системе названием.
     *
     * @throws Exception
     */
    public function createVehicleTypeNameAlreadyExist(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий создания типа транспорта с уже существующим в системе названием.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $vehicleTypeNameAlrExist = 'Тип транспорта для удаления в автотесте';
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeNameAlrExist);
        $i->wait(1);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$alreadyExistNameMessage);
        $i->viewElement(VehicleTypePage::$alreadyExistNameMessage);
        $vehicleTypeName = sqs('TestVehicleTypeNameAlrExist');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания типа транспорта с проверкой валидатора на на превышение количества символов в поле "Название".
     *
     * @throws Exception
     */
    public function createVehicleTypeNameOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий создания типа транспорта с проверкой валидатора на на превышение количества символов в поле "Название".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $i->waitElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], str_repeat('a', 256));
        $i->wait(1);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateNameLimitMessage);
        $i->viewElement(VehicleTypePage::$validateNameLimitMessage);
        $vehicleTypeName = sqs('TestVehicleTypeNameOutOfSTR');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания типа транспорта с проверкой валидатора на превышение количества символов в полях "Load" и "Fuel Consumption".
     *
     * @throws Exception
     */
    public function createVehicleTypeLoadAndFCOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий создания типа транспорта с проверкой валидатора на превышение количества символов в полях "Load" и "Fuel Consumption".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $i->waitElement(VehicleTypePage::$submitButtonInAddPopup);
        $vehicleTypeName = sqs('TestVehicleTypeLoadOutOfSTR');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], str_repeat('1', 350));
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], str_repeat('1', 350));
        $i->wait(1);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateLoadLimitMessage);
        $i->viewElement(VehicleTypePage::$validateLoadLimitMessage);
        $i->viewElement(VehicleTypePage::$validateFCLimitMessage);
        $i->clearField(VehicleTypePage::$loadFieldInAddPopup['locator']);
        $i->clearField(VehicleTypePage::$addFCFieldInAddPopup['locator']);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания типа транспорта с проверкой валидатора на превышение количества символов в поле "Время погрузки маршрута".
     *
     * @throws Exception
     */
    public function createVehicleTypeLTOutOfSTR(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий создания типа транспорта с проверкой валидатора на превышение количества символов в поле "Время погрузки маршрута".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $i->waitElement(VehicleTypePage::$submitButtonInAddPopup);
        $vehicleTypeName = sqs('TestVehicleTypeRPMOutOfSTR');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], str_repeat('1', 16));
        $i->wait(1);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->wait(1);
        $i->waitElement(VehicleTypePage::$validateLTLimitMessage);
        $i->viewElement(VehicleTypePage::$validateLTLimitMessage);
        $i->clearField(VehicleTypePage::$addLTFieldInAddPopup['locator']);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }

    /**
     * Негативный сценарий создания транспорта с проверкой валидатора на незаполненные обязательные поля.
     *
     * @throws Exception
     */
    public function createVehicleTypeFieldsEmpty(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Негативный сценарий создания транспорта с проверкой валидатора на незаполненные обязательные поля.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->clickElement(VehicleTypePage::$createVehicleTypeButton);
        $i->waitElement(VehicleTypePage::$submitButtonInAddPopup);
        $vehicleTypeLT = 55;
        $i->fillField(VehicleTypePage::$addLTFieldInAddPopup['locator'], $vehicleTypeLT);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$validateNameEmptyMessage);
        $i->see(VehicleTypePage::$validateNameEmptyMessage['text'], VehicleTypePage::$validateNameEmptyMessage['locator']);
        $i->see(VehicleTypePage::$validateLoadEmptyMessage['text'], VehicleTypePage::$validateLoadEmptyMessage['locator']);
        $i->see(VehicleTypePage::$validateFCEmptyMessage['text'], VehicleTypePage::$validateFCEmptyMessage['locator']);
        $i->see(VehicleTypePage::$validateFuelEmptyMessage['text'], VehicleTypePage::$validateFuelEmptyMessage['locator']);
        $vehicleTypeName = sqs('TestVehicleType');
        $i->fillField(VehicleTypePage::$nameFieldInAddPopup['locator'], $vehicleTypeName);
        $vehicleTypeLoad = 555.5;
        $i->fillField(VehicleTypePage::$loadFieldInAddPopup['locator'], $vehicleTypeLoad);
        $vehicleTypeFC = 55.5;
        $i->fillField(VehicleTypePage::$addFCFieldInAddPopup['locator'], $vehicleTypeFC);
        $i->click(VehicleTypePage::$fuelFieldInAddPopup['locator']);
        $i->selectValueFromSelectByText(static::$vehicleFuel);
        $i->clickElement(VehicleTypePage::$submitButtonInAddPopup);
        $i->waitElement(VehicleTypePage::$addVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$addVehicleTypeMessage);
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name' => $vehicleTypeName,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see($vehicleTypeName, $dataTestAttribute);
        $i->see($vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see($vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleFuel, $dataTestAttribute);
        $i->see($vehicleTypeLT . ' мин', $dataTestAttribute);
    }
}
