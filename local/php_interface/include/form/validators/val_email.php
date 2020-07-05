<?php
Class EmailValidator
{
    function getDescription()
    {
        return array(
            'NAME' => 'val_email', // идентификатор
            'DESCRIPTION' => 'Формат адреса электронной почты', // наименование
            'TYPES' => array('email'), // типы полей
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

        $phone_regexp = '/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})/';

        foreach ($arValues as $value) {

            if (strlen(trim($value)) <= 0) {
                $APPLICATION->ThrowException('Email не должен быть пустым');
                return false;
            }
            if (preg_match($phone_regexp, trim($value))) {
                return true;
            }
            else {
                $APPLICATION->ThrowException('Укажите правильный формат email');
                return false;
            }
        }

        return true;
    }
}
AddEventHandler("form", "onFormValidatorBuildList", array("EmailValidator", "getDescription"));