<?php

namespace Delivery\AcceptanceTest\Directories\VehicleType;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\VehicleTypePage;
use Delivery\AcceptanceTest\Page\Directories\CourierPage;
use Delivery\AcceptanceTest\Page\Directories\VehiclePage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class DeleteVehicleTypeCest.
 * Приемочные тесты для проверки сценариев удаления типов транспорта.
 *
 * @package Delivery\AcceptanceTest
 */
class DeleteVehicleTypeCest
{
    /**
     * Фамилия курьера из предусловия предназначенного для удаления.
     *
     * @var string
     */
    public static $courierLastNameDel = 'Курьер для удаления в автотесте';

    /**
     * Локация "Абакан" курьера из предусловия предназначенного для удаления.
     *
     * @var integer
     */
    public static $courierLocationDel = 31;

    /**
     * Склад "Склад для удаления в автотесте" курьера из предусловия предназначенного для удаления.
     *
     * @var integer
     */
    public static $courierWarehouseDel = 1;

    /**
     * Телефон курьера для удаления из предусловия.
     *
     * @var string
     */
    public static $courierPhoneDel = '+79998887766';

    /**
     * Транспорт "Тип транспорта для удаления в автотесте vt999delete" курьера из предусловия предназначенного для удаления.
     *
     * @var integer
     */
    public static $courierVehicleDel = 1;

    /**
     * Госномер типа транспорта "Тип транспорта для удаления в автотесте" из предусловия.
     *
     * @var string
     */
    public static $vehicleSTN = 'vt999delete';

    /**
     * Название локации "Абакан" транспортного средства из предусловия.
     *
     * @var string
     */
    public static $vehicleLocation = 'Абакан';

    /**
     * ID локации "Абакан" транспортного средства из предусловия.
     *
     * @var integer
     */
    public static $vehicleLocationId = 31;

    /**
     * Название типа транспорта "Тип транспорта для удаления в автотесте" транспортного средства из предусловия.
     *
     * @var string
     */
    public static $vehicleVT = 'Тип транспорта для удаления в автотесте';

    /**
     * ID "Тип транспорта для удаления в автотесте" типа транспорта транспортного средства из предусловия.
     *
     * @var integer
     */
    public static $vehicleVTId = 3;

    /**
     * Название типа транспорта "Тип транспорта для удаления в автотесте" из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeName = 'Тип транспорта для удаления в автотесте';

    /**
     * Грузоподъёмность типа транспорта из предусловия.
     *
     * @var integer
     */
    public static $vehicleTypeLoad = 999.9;

    /**
     * Расход топлива типа транспорта из предусловия.
     *
     * @var integer
     */
    public static $vehicleTypeFC = 99.9;

    /**
     * Название топлива типа транспорта из предусловия.
     *
     * @var string
     */
    public static $vehicleTypeFuel = 'АИ 92';

    /**
     * ID топлива типа транспорта из предусловия.
     *
     * @var integer
     */
    public static $vehicleTypeFuelId = 1;

    /**
     * Время комплектации маршрута типа транспорта из предусловия.
     *
     * @var integer
     */
    public static $vehicleTypeRPT = 599999940;

    /**
     * Метод, выполняющийся перед каждым тестом.
     *
     * @return void
     *
     * @throws Exception
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
     * Позитивный сценарий удаления типа транспорта с предварительным удалением связанного с ним транспорта и связанного с ТС курьера.
     *
     * @throws Exception
     */
    public function deleteVehicleTypeCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToVT, Directories $goToCourier, Directories $goToVehicle)
    {
        $i->wantTo('Позитивный сценарий удаления типа транспорта с предварительным удалением связанного с ним транспорта и связанного с ТС курьера.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToCourier->courier();
        $id                = $i->grabFromCourierTable('id', [
            'lastName'           => static::$courierLastNameDel,
            'locationId'         => static::$courierLocationDel,
            'defaultWarehouseId' => static::$courierWarehouseDel,
            'phone'              => static::$courierPhoneDel,
            'vehicleId'          => static::$courierVehicleDel,
        ]);
        $dataTestAttribute = '[data-test="row_courier_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(CourierPage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableOk();
        $i->waitForElementVisible(CourierPage::$deleteCourierMessage['locator'], $i::$timeOut);
        $i->viewElement(CourierPage::$deleteCourierMessage);
        $i->waitForElementNotVisible(CourierPage::$deleteCourierMessage['locator'], $i::$timeOut);
        $i->dontSee(static::$courierLastNameDel, $dataTestAttribute);
        $goTo->directories();
        $goToVehicle->vehicle();
        $id                = $i->grabFromVehicleTable('id', [
            'locationId'           => static::$vehicleLocationId,
            'vehicleTypeId'        => static::$vehicleVTId,
            'stateTransportNumber' => static::$vehicleSTN,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(VehiclePage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableOk();
        $i->waitElement(VehiclePage::$deleteVehicleMessage);
        $i->viewElement(VehiclePage::$deleteVehicleMessage);
        $i->waitForElementNotVisible(VehiclePage::$deleteVehicleMessage['locator'], $i::$timeOut);
        $i->dontSee(static::$vehicleLocation, $dataTestAttribute);
        $i->dontSee(static::$vehicleVT, $dataTestAttribute);
        $i->dontSee(static::$vehicleSTN, $dataTestAttribute);
        $goTo->directories();
        $goToVT->vehicleType();
        $id                  = $i->grabFromVehicleTypeTable('id', [
            'name'             => static::$vehicleTypeName,
            'load'             => static::$vehicleTypeLoad,
            'fuelConsumption'  => static::$vehicleTypeFC,
            'fuelId'           => static::$vehicleTypeFuelId,
            'routePrepareTime' => static::$vehicleTypeRPT,
        ]);
        $dataTestAttributeVT = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttributeVT, $i::$timeOut);
        $i->click(VehicleTypePage::getDeleteRowLocator($dataTestAttributeVT));
        $i->findClickableOk();
        $i->waitElement(VehicleTypePage::$deleteVehicleTypeMessage);
        $i->viewElement(VehicleTypePage::$deleteVehicleTypeMessage);
        $i->waitForElementNotVisible(VehicleTypePage::$deleteVehicleTypeMessage['locator'], $i::$timeOut);
        $i->dontSee(static::$vehicleTypeName, $dataTestAttributeVT);
        $i->dontSee(static::$vehicleTypeLoad . ' т', $dataTestAttributeVT);
        $i->dontSee(static::$vehicleTypeFC . ' л/100 км', $dataTestAttributeVT);
        $i->dontSee(static::$vehicleTypeFuel, $dataTestAttributeVT);
    }

    /**
     * Позитивный сценарий проверки блокировки удаления типа транспорта, т.к. присутствует связанный с ним транспорт и связанный с ТС курьер.
     *
     * @throws Exception
     */
    public function deleteVehicleTypeBlock(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий проверки блокировки удаления типа транспорта, т.к. присутствует связанный с ним транспорт и связанный с ТС курьер.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name'             => static::$vehicleTypeName,
            'load'             => static::$vehicleTypeLoad,
            'fuelConsumption'  => static::$vehicleTypeFC,
            'fuelId'           => static::$vehicleTypeFuelId,
            'routePrepareTime' => static::$vehicleTypeRPT,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(VehicleTypePage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableOk();
        $i->waitForElementVisible(VehicleTypePage::$delBlockVehTypeMessage['locator'], $i::$timeOut);
        $i->viewElement(VehicleTypePage::$delBlockVehTypeMessage);
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see(static::$vehicleTypeName, $dataTestAttribute);
        $i->see(static::$vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see(static::$vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleTypeFuel, $dataTestAttribute);
    }

    /**
     * Позитивный сценарий удаления типа транспорта с проверкой отмены формы.
     *
     * @throws Exception
     */
    public function deleteVehicleTypeCancel(AcceptanceTester $i, Navigator $goTo, Directories $goToVT)
    {
        $i->wantTo('Позитивный сценарий удаления типа транспорта с проверкой отмены формы.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToVT->vehicleType();
        $id                = $i->grabFromVehicleTypeTable('id', [
            'name'             => static::$vehicleTypeName,
            'load'             => static::$vehicleTypeLoad,
            'fuelConsumption'  => static::$vehicleTypeFC,
            'fuelId'           => static::$vehicleTypeFuelId,
            'routePrepareTime' => static::$vehicleTypeRPT,
        ]);
        $dataTestAttribute = '[data-test="row_vehicle-type_' . $id . '"]';
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->click(VehicleTypePage::getDeleteRowLocator($dataTestAttribute));
        $i->findClickableCancel();
        $i->waitForElement($dataTestAttribute, $i::$timeOut);
        $i->see(static::$vehicleTypeName, $dataTestAttribute);
        $i->see(static::$vehicleTypeLoad . ' т', $dataTestAttribute);
        $i->see(static::$vehicleTypeFC . ' л/100 км', $dataTestAttribute);
        $i->see(static::$vehicleTypeFuel, $dataTestAttribute);
    }
}
