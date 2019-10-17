<?php

namespace Delivery\AcceptanceTest\Directories\VehicleType;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\VehicleTypePage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class ViewVehicleTypeCest.
 * Приемочные тесты на проверку отображения элементов страниц в справочнике типы транспорта.
 *
 * @package Delivery\AcceptanceTest
 */
class ViewVehicleTypeCest
{
    /**
     * Название типа транспорта из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeNameUpd = 'Тип транспорта для редактирования в автотесте';

    /**
     * Грузоподъемность типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $loadUpd = '99999999 т';

    /**
     * Расход топлива типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $fuelConsumptionUpd = '99999999 л/100 км';

    /**
     * Тип топлива типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $fuelUpd = 'АИ 92';

    /**
     * Время погрузки типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $loadTimeUpd = '0 мин';

    /**
     * Название типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeNameUpm = 'Тип транспорта для редактирования с плановым режимом';

    /**
     * Грузоподъемность типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $loadUpm = '88888888 т';

    /**
     * Расход топлива типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $fuelConsumptionUpm = '88888888 л/100 км';

    /**
     * Тип топлива типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $fuelUpm = 'АИ 92';

    /**
     * Значение да для планирования маршрутов типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $planModeUpm = 'Да';

    /**
     * Время погрузки типа транспорта использующего плановый режим из предусловия.
     *
     * @var string
     */
    public static $loadTimeUpm = '0 мин';

    /**
     * Название типа транспорта для удаления из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeNameDel = 'Тип транспорта для удаления в автотесте';

    /**
     * Грузоподъемность типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $loadDel = '999.9 т';

    /**
     * Расход топлива типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $fuelConsumptionDel = '99.9 л/100 км';

    /**
     * Тип топлива типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $fuelDel = 'АИ 92';

    /**
     * Время погрузки типа транспорта для редактирования из предусловия.
     *
     * @var string
     */
    public static $loadTimeDel = '0 мин';

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
     * Позитивный сценарий просмотра элементов справочника типов транспорта.
     *
     * @throws Exception
     */
    public function viewVehicleTypeElementsCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий просмотра элементов справочника типов транспорта.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $i->waitElement(VehicleTypePage::$title);
        $i->viewElement(VehicleTypePage::$title);
        $i->viewElement(VehicleTypePage::$firstTh);
        $i->viewElement(VehicleTypePage::$secondTh);
        $i->viewElement(VehicleTypePage::$thirdTh);
        $i->viewElement(VehicleTypePage::$fourthTh);
        $i->viewElement(VehicleTypePage::$fifthTh);
        $i->viewElement(VehicleTypePage::$sixthTh);
        $i->viewElement(VehicleTypePage::$createVehicleTypeButton);
        $i->click(VehicleTypePage::$createVehicleTypeButton['locator']);
        $i->waitElement(VehicleTypePage::$labelNameInPopup);
        $i->viewElement(VehicleTypePage::$labelNameInPopup);
        $i->viewElement(VehicleTypePage::$labelLoadInPopup);
        $i->viewElement(VehicleTypePage::$labelFCInPopup);
        $i->viewElement(VehicleTypePage::$labelFuelInPopup);
        $i->viewElement(VehicleTypePage::$labelLTInPopup);
        $i->viewElement(VehicleTypePage::$loadFieldAddon);
        $i->viewElement(VehicleTypePage::$addFCFieldAddon);
        $i->viewElement(VehicleTypePage::$addLTFieldAddon);
        $i->viewElement(VehicleTypePage::$cancelButtonInAddPopup);
        $i->viewElement(VehicleTypePage::$submitButtonInAddPopup);
    }

    /**
     * Позитивный сценарий просмотра списка типа транспорта с фильтром по названию.
     *
     * @throws Exception
     */
    public function viewVehicleTypeFilterByName(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий просмотра списка типа транспорта с фильтром по названию.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $idFirstVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameUpd,
        ]);
        $dataTestAttributeFirst = '[data-test="row_vehicle-type_' . $idFirstVehicleType . '"]';
        $i->waitForElement($dataTestAttributeFirst, $i::$timeOut);
        $idSecondVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameUpm,
        ]);
        $dataTestAttributeSecond = '[data-test="row_vehicle-type_' . $idSecondVehicleType . '"]';
        $i->waitForElement($dataTestAttributeSecond, $i::$timeOut);
        $idThirdVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameDel,
        ]);
        $dataTestAttributeThird = '[data-test="row_vehicle-type_' . $idThirdVehicleType . '"]';
        $i->waitForElement($dataTestAttributeThird, $i::$timeOut);
        $i->click(VehicleTypePage::$searchIconName['locator']);
        $i->fillField(VehicleTypePage::$filterFieldName['locator'], static::$vehicleTypeNameUpm);
        $i->click(VehicleTypePage::$firstTh['locator']);
        $i->waitForText(static::$vehicleTypeNameUpm, $i::$timeOut, $dataTestAttributeSecond, sleep(2));
        $i->see(static::$vehicleTypeNameUpm, $dataTestAttributeSecond);
        $i->see(static::$loadUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelConsumptionUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelUpm, $dataTestAttributeSecond);
        $i->see(static::$planModeUpm, $dataTestAttributeSecond);
        $i->see(static::$loadTimeUpm, $dataTestAttributeSecond);
        $i->dontSee(static::$vehicleTypeNameUpd, $dataTestAttributeFirst);
        $i->dontSee(static::$vehicleTypeNameDel, $dataTestAttributeThird);
        $i->click(VehicleTypePage::$searchIconName['locator']);
        $i->click(VehicleTypePage::$clearFilterMagnifierIcon['locator']);
        $i->waitForText(static::$vehicleTypeNameDel, $i::$timeOut, $dataTestAttributeThird, sleep(2));
        $i->see(static::$vehicleTypeNameUpd, $dataTestAttributeFirst);
        $i->see(static::$loadUpd, $dataTestAttributeFirst);
        $i->see(static::$fuelConsumptionUpd, $dataTestAttributeFirst);
        $i->see(static::$fuelUpd, $dataTestAttributeFirst);
        $i->see(static::$loadTimeUpd, $dataTestAttributeFirst);
        $i->see(static::$vehicleTypeNameUpm, $dataTestAttributeSecond);
        $i->see(static::$loadUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelConsumptionUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelUpm, $dataTestAttributeSecond);
        $i->see(static::$planModeUpm, $dataTestAttributeSecond);
        $i->see(static::$loadTimeUpm, $dataTestAttributeSecond);
        $i->see(static::$vehicleTypeNameDel, $dataTestAttributeThird);
        $i->see(static::$loadDel, $dataTestAttributeThird);
        $i->see(static::$fuelConsumptionDel, $dataTestAttributeThird);
        $i->see(static::$fuelDel, $dataTestAttributeThird);
        $i->see(static::$loadTimeDel, $dataTestAttributeThird);
    }

    /**
     * Позитивный сценарий просмотра списка типа транспорта с проверкой отображаения всех элементов после открытия попапа и нажатия кнопки "Отмена".
     *
     * @throws Exception
     */
    public function viewVehicleTypeElementsAfterPopupCloseCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий просмотра списка типа транспорта с проверкой отображаения всех элементов после открытия попапа и нажатия кнопки "Отмена".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $idFirstVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameUpd,
        ]);
        $dataTestAttributeFirst = '[data-test="row_vehicle-type_' . $idFirstVehicleType . '"]';
        $i->waitForElement($dataTestAttributeFirst, $i::$timeOut);
        $idSecondVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameUpm,
        ]);
        $dataTestAttributeSecond = '[data-test="row_vehicle-type_' . $idSecondVehicleType . '"]';
        $i->waitForElement($dataTestAttributeSecond, $i::$timeOut);
        $idThirdVehicleType     = $i->grabFromVehicleTypeTable('id', [
            'name' => static::$vehicleTypeNameDel,
        ]);
        $dataTestAttributeThird = '[data-test="row_vehicle-type_' . $idThirdVehicleType . '"]';
        $i->waitForElement($dataTestAttributeFirst, $i::$timeOut);
        $i->click(VehicleTypePage::getUpdateRowLocator($dataTestAttributeFirst));
        $i->clickElement(VehicleTypePage::$cancelButtonInUpdPopup);
        $i->waitForElement($dataTestAttributeFirst, $i::$timeOut);
        $i->see(static::$vehicleTypeNameUpd, $dataTestAttributeFirst);
        $i->see(static::$loadUpd, $dataTestAttributeFirst);
        $i->see(static::$fuelConsumptionUpd, $dataTestAttributeFirst);
        $i->see(static::$fuelUpd, $dataTestAttributeFirst);
        $i->see(static::$loadTimeUpd, $dataTestAttributeFirst);
        $i->see(static::$vehicleTypeNameUpm, $dataTestAttributeSecond);
        $i->see(static::$loadUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelConsumptionUpm, $dataTestAttributeSecond);
        $i->see(static::$fuelUpm, $dataTestAttributeSecond);
        $i->see(static::$planModeUpm, $dataTestAttributeSecond);
        $i->see(static::$loadTimeUpm, $dataTestAttributeSecond);
        $i->see(static::$vehicleTypeNameDel, $dataTestAttributeThird);
        $i->see(static::$loadDel, $dataTestAttributeThird);
        $i->see(static::$fuelConsumptionDel, $dataTestAttributeThird);
        $i->see(static::$fuelDel, $dataTestAttributeThird);
        $i->see(static::$loadTimeDel, $dataTestAttributeThird);
    }
}
