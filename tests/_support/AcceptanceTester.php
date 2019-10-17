<?php

namespace Delivery\AcceptanceTest;

use Codeception\Actor;
use Exception;
use Facebook\WebDriver\WebDriverElement;
use Delivery\AcceptanceTest\Page\LoginPage;
use Delivery\AcceptanceTest\Page\Locations\DeliveryTypePage;

/**
 * Класс с дополнительными методами для тестирования.
 *
 * @method void wantToTest( $text )
 * @method void wantTo( $text )
 * @method void execute( $callable )
 * @method void expectTo( $prediction )
 * @method void expect( $prediction )
 * @method void amGoingTo( $argumentation )
 * @method void am( $role )
 * @method void lookForwardTo( $achieveValue )
 * @method void comment( $description )
 * @method \Codeception\Lib\Friend haveFriend( $name, $actorClass = null )
 */
class AcceptanceTester extends Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Максимальное время ожидания элементов.
     *
     * @var int
     */
    public static $timeOut = 15;

    /**
     * Метод для входа в систему и создания слепка браузера.
     *
     * @throws Exception
     */
    public function loginAsAdmin()
    {
        if ($this->loadSessionSnapshot('loginAsAdmin')) {
            return;
        }
        $this->amOnPage('/login');
        $this->viewElement(LoginPage::$submitButton);
        $this->fillField(LoginPage::$usernameField['locator'], 'admin');
        $this->fillField(LoginPage::$passwordField['locator'], '123456');
        $this->clickElement(LoginPage::$submitButton);
        $this->wait(1);
        $this->saveSessionSnapshot('loginAsAdmin');
    }

    /**
     * Метод для ожидания элемента перед кликом по нему.
     *
     * @param array $webElement
     *
     * @throws Exception
     */
    public function clickElement(array $webElement)
    {
        $this->waitForText($webElement['text'], $this::$timeOut);
        $this->click($webElement['locator']);
    }

    /**
     * Метод для проверки присутствия элемента и его значения.
     *
     * @param array $webElement
     *
     * @throws Exception
     */
    public function viewElement(array $webElement)
    {
        $this->waitForElement($webElement['locator'], $this::$timeOut);
        $this->waitForText($webElement['text'], $this::$timeOut);
        $this->see($webElement['text'], $webElement['locator']);
    }

    /**
     * Метод для ожидания элемента и надписи на нём.
     *
     * @param array $webElement
     *
     * @throws Exception
     */
    public function waitElement(array $webElement)
    {
        try {
            $this->waitForElement($webElement['locator'], self::$timeOut);
        } catch (Exception $e) {
            $this->waitForElement($webElement['locator'], self::$timeOut);
        }
        $this->waitForText($webElement['text'], self::$timeOut, $webElement['locator']);
        $this->wait(0.5);
    }

    /**
     * Метод для ожидания появления текста в поле.
     *
     * @param string $fieldLocator
     * @param string $text
     */
    public function waitForFieldFill(string $fieldLocator, string $text)
    {
        $this->waitForElementChange($fieldLocator, function(WebDriverElement $el) use ($text) {
            return $el->getAttribute('value') === $text;
        }, self::$timeOut);
    }

    /**
     * Выбор значения по тексту из выпадающего поля селекта.
     *
     * @param $text
     *
     * @throws Exception
     */
    public function selectValueFromSelectByText($text)
    {
        $this->waitForText($text, $this::$timeOut);
        $liLocator = '//li[text()="' . $text . '"]';
        $this->click($liLocator);
    }

    /**
     * Поиск поля в блоке и заполнение его.
     *
     * @param $textSearchInBlock
     * @param $textFill
     */
    public function fillFieldInBlockByText($textSearchInBlock, $textFill)
    {
        $thisnputLocator = '//div[text()="' . $textSearchInBlock . '"]/parent::div//input[contains(@class, "ant-input")]';
        $this->moveMouseOver($thisnputLocator);
        $this->pressKey($thisnputLocator, [
            'ctrl',
            'a',
        ], \Facebook\WebDriver\WebDriverKeys::DELETE);
        $this->fillField($thisnputLocator, $textFill);
    }

    /**
     * Поиск значения элемента в поле таблицы у строки, содержащей это значение.
     *
     * @param $valueInField
     * @param $webElementField
     * @param $dataAttribute
     */
    public function viewElementInFieldOfTable($valueInField, $webElementField, $dataAttribute)
    {
        $thisnputLocator = '' . $dataAttribute . '' . $webElementField . '[@value="' . $valueInField . '"]';
        $this->seeElement($thisnputLocator);
    }

    /**
     * Поиск значения элемента в поле таблицы у строки, содержащей это значение.
     *
     * @param $valueInField
     * @param $webElementField
     * @param $dataAttribute
     */
    public function dontViewElementInFieldOfTable($valueInField, $webElementField, $dataAttribute)
    {
        $thisnputLocator = '' . $dataAttribute . '' . $webElementField . '[@value="' . $valueInField . '"]';
        $this->dontSeeElement($thisnputLocator);
    }

    /**
     * Тултип с информацией и координатами по адресу на карте, согласно передаваемым данным.
     *
     * @param $text
     *
     * @throws Exception
     */
    public function viewInfoByTextTooltipOnMap($text)
    {
        $this->waitForText($text, $this::$timeOut);
        $textLocator = '//div[@class="leaflet-popup-content-wrapper"]//div[contains(text(), "' . $text . '")]';
        $this->seeElement($textLocator);
    }

    /**
     * Ожидание текста и клик по элементу.
     *
     * @param $webElement
     * @param $text
     *
     * @throws Exception
     */
    public function waitAndClick($text, $webElement)
    {
        $this->waitForText($text, $this::$timeOut);
        $this->click($webElement);
    }
}
