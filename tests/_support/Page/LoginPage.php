<?php

namespace Delivery\AcceptanceTest\Page;

/**
 * Class LoginPage
 * Паттерн Pageobject страницы входа в систему.
 *
 * @package Delivery\AcceptanceTest\Page
 */
class LoginPage
{
    /**
     * УРЛ страницы входа в систему.
     *
     * @var string
     */
    public static $URL = '/login';

    /**
     * Лейбл над формой входа в систему.
     *
     * @var array
     */
    public static $label = [
        'text'    => 'Delivery',
        'locator' => 'h1.text_center',
    ];

    /**
     * Поле для ввода логина в форме входа в систему.
     *
     * @var array
     */
    public static $usernameField = [
        'text'    => null,
        'locator' => '#login',
    ];

    /**
     * Поле для ввода пароля в форме входа в систему.
     *
     * @var array
     */
    public static $passwordField = [
        'text'    => null,
        'locator' => '#password',
    ];

    /**
     * Чекбокс запоминания входа.
     *
     * @var array
     */
    public static $rememberCheckbox = [
        'text'    => null,
        'locator' => '#rememberMe',
    ];

    /**
     * Кнопка подтверждения входа в систему.
     *
     * @var array
     */
    public static $submitButton = [
        'text'    => 'Войти',
        'locator' => 'form.login-form button[type="submit"]',
    ];
}
