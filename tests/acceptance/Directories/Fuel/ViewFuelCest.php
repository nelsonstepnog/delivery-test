<?php

namespace Delivery\AcceptanceTest\Directories\Fuel;

use Exception;
use Delivery\AcceptanceTest\AcceptanceTester;
use Delivery\AcceptanceTest\Page\Directories\FuelPage;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator;
use Delivery\AcceptanceTest\Step\Acceptance\Navigator\Directories;

/**
 * Class ViewFuelCest.
 * Приемочные тесты на проверку отображения элементов страниц в справочнике видов топлива.
 *
 * @package Delivery\AcceptanceTest
 */
class ViewFuelCest
{
    /**
     * Название типа топлива "АИ 92" из предусловия.
     *
     * @var string
     */
    public static $firstFuelName = 'АИ 92';

    /**
     * Название типа топлива "АИ 95" из предусловия.
     *
     * @var string
     */
    public static $secondFuelName = 'АИ 95';

    /**
     * Название типа топлива "Дизель" из предусловия.
     *
     * @var string
     */
    public static $thirdFuelName = 'Дизель';

    /**
     * Название типа топлива "Топливо для редактирования в автотесте" из предусловия.
     *
     * @var string
     */
    public static $fourthFuelName = 'Топливо для редактирования в автотесте';

    /**
     * Название типа топлива "Топливо для удаления в автотесте" из предусловия.
     *
     * @var string
     */
    public static $fifthFuelName = 'Топливо для удаления в автотесте';

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
     * Позитивный сценарий просмотра элементов справочника типов топлива.
     *
     * @throws Exception
     */
    public function viewFuelElementsCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий просмотра элементов справочника типов топлива.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $i->waitElement(FuelPage::$title);
        $i->viewElement(FuelPage::$title);
        $i->viewElement(FuelPage::$firstTh);
        $i->viewElement(FuelPage::$createFuelButton);
        $i->clickElement(FuelPage::$createFuelButton);
        $i->waitElement(FuelPage::$labelNameInPopup);
        $i->viewElement(FuelPage::$labelNameInPopup);
        $i->viewElement(FuelPage::$cancelButtonInAddPopup);
        $i->viewElement(FuelPage::$submitButtonInAddPopup);
    }

    /**
     * Позитивный сценарий просмотра списка типов топлива с фильтром по названию.
     *
     * @throws Exception
     */
    public function viewFuelFilterByName(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий просмотра списка типов топлива с фильтром по названию.');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $idFirstFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$firstFuelName,
        ]);
        $dataTestAttributeFirst  = '[data-test="row_fuel_' . $idFirstFuel . '"]';
        $idSecondFuel            = $i->grabFromFuelTable('id', [
            'name' => static::$secondFuelName,
        ]);
        $dataTestAttributeSecond = '[data-test="row_fuel_' . $idSecondFuel . '"]';
        $idThirdFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$thirdFuelName,
        ]);
        $dataTestAttributeThird  = '[data-test="row_fuel_' . $idThirdFuel . '"]';
        $idFourthFuel            = $i->grabFromFuelTable('id', [
            'name' => static::$fourthFuelName,
        ]);
        $dataTestAttributeFourth = '[data-test="row_fuel_' . $idFourthFuel . '"]';
        $idFifthFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$fifthFuelName,
        ]);
        $dataTestAttributeFifth  = '[data-test="row_fuel_' . $idFifthFuel . '"]';
        $i->waitForElement($dataTestAttributeFifth, $i::$timeOut);
        $i->click(FuelPage::$searchIconName['locator']);
        $i->fillField(FuelPage::$filterFieldName['locator'], static::$secondFuelName);
        $i->click(FuelPage::$firstTh['locator']);
        $i->waitForText(static::$secondFuelName, $i::$timeOut, $dataTestAttributeSecond, sleep(2));
        $i->see(static::$secondFuelName, $dataTestAttributeSecond);
        $i->dontSee(static::$firstFuelName, $dataTestAttributeFirst);
        $i->dontSee(static::$thirdFuelName, $dataTestAttributeThird);
        $i->dontSee(static::$fourthFuelName, $dataTestAttributeFourth);
        $i->dontSee(static::$fifthFuelName, $dataTestAttributeFifth);
        $i->click(FuelPage::$searchIconName['locator']);
        $i->click(FuelPage::$clearFilterMagnifierIcon['locator']);
        $i->waitForText(static::$fifthFuelName, $i::$timeOut, $dataTestAttributeFifth, sleep(2));
        $i->see(static::$firstFuelName, $dataTestAttributeFirst);
        $i->see(static::$secondFuelName, $dataTestAttributeSecond);
        $i->see(static::$thirdFuelName, $dataTestAttributeThird);
        $i->see(static::$fourthFuelName, $dataTestAttributeFourth);
        $i->see(static::$fifthFuelName, $dataTestAttributeFifth);
    }

    /**
     * Позитивный сценарий просмотра списка типов топлива с проверкой отображаения всех элементов после открытия попапа и нажатия кнопки "Отмена".
     *
     * @throws Exception
     */
    public function viewFuelElementsAfterPopupCloseCheck(AcceptanceTester $i, Navigator $goTo, Directories $goToFuel)
    {
        $i->wantTo('Позитивный сценарий просмотра списка типов топлива с проверкой отображаения всех элементов после открытия попапа и нажатия кнопки "Отмена".');
        $i->loginAsAdmin();
        $goTo->directories();
        $goToFuel->fuel();
        $idFirstFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$firstFuelName,
        ]);
        $dataTestAttributeFirst  = '[data-test="row_fuel_' . $idFirstFuel . '"]';
        $idSecondFuel            = $i->grabFromFuelTable('id', [
            'name' => static::$secondFuelName,
        ]);
        $dataTestAttributeSecond = '[data-test="row_fuel_' . $idSecondFuel . '"]';
        $idThirdFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$thirdFuelName,
        ]);
        $dataTestAttributeThird  = '[data-test="row_fuel_' . $idThirdFuel . '"]';
        $idFourthFuel            = $i->grabFromFuelTable('id', [
            'name' => static::$fourthFuelName,
        ]);
        $dataTestAttributeFourth = '[data-test="row_fuel_' . $idFourthFuel . '"]';
        $idFifthFuel             = $i->grabFromFuelTable('id', [
            'name' => static::$fifthFuelName,
        ]);
        $dataTestAttributeFifth  = '[data-test="row_fuel_' . $idFifthFuel . '"]';
        $i->waitForElement($dataTestAttributeFifth, $i::$timeOut);
        $i->click(FuelPage::getUpdateRowLocator($dataTestAttributeFirst));
        $i->clickElement(FuelPage::$cancelButtonInUpdPopup);
        $i->waitForElement($dataTestAttributeFirst, $i::$timeOut);
        $i->see(static::$firstFuelName, $dataTestAttributeFirst);
        $i->see(static::$secondFuelName, $dataTestAttributeSecond);
        $i->see(static::$thirdFuelName, $dataTestAttributeThird);
        $i->see(static::$fourthFuelName, $dataTestAttributeFourth);
        $i->see(static::$fifthFuelName, $dataTestAttributeFifth);
    }
}
