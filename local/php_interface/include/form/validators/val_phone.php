<?php
Class PhoneValidator
{
    function getDescription()
    {
        return array(
            'NAME' => 'val_phone', // идентификатор
            'DESCRIPTION' => 'Номер телефона, формат: +7 (999) 999-99-99', // наименование
            'TYPES' => array('text'), // типы полей
            'SETTINGS' => array(__CLASS__, 'getSettings'), // метод, возвращающий массив настроек
            'CONVERT_TO_DB' => array(__CLASS__, 'toDB'), // метод, конвертирующий массив настроек в строку
            'CONVERT_FROM_DB' => array(__CLASS__, 'fromDB'), // метод, конвертирующий строку настроек в массив
            'HANDLER' => array(__CLASS__, 'doValidate') // валидатор
        );
    }

    function getSettings()
    {
        return array();
    }

    function toDB($arParams)
    {
        return serialize($arParams);
    }

    function fromDB($strParams)
    {
        return unserialize($strParams);
    }

    function doValidate($arParams, $arQuestion, $arAnswers, $arValues)
    {
        global $APPLICATION;

        $phone_regexp = '/^[+]7\s(\([0-9]{3}\))\s([0-9]{3})-([0-9]{2})-([0-9]{2})/';

        foreach ($arValues as $value) {

            if (strlen(trim($value)) <= 0) {
                $APPLICATION->ThrowException('Номер телефона не должен быть пустым');
                return false;
            }
            if (preg_match($phone_regexp, trim($value))) {
                return true;
            }
            else {
                $APPLICATION->ThrowException('Формат номера телефона должен быть: +7 (999) 999-99-99');
                return false;
            }
        }

        return true;
    }
}
AddEventHandler("form", "onFormValidatorBuildList", array("PhoneValidator", "getDescription"));