<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// check captcha
    if (!recaptchaCheck()){
        $arResult["ERRORS"][] = 'Вы не прошли автоматическую защиту от спама';
    }

$this->IncludeComponentTemplate();
