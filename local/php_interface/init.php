<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/form/validators/val_phone.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/form/validators/val_email.php");
/**
 * Проверка валидности капчи
 *
 * @return boolean
 */
function recaptchaCheck()
{
    $bRet = FALSE;

    $sCaptchaResponse = isset($_REQUEST['g-recaptcha-response'])?$_REQUEST['g-recaptcha-response']:'';
    if($sCaptchaResponse)
    {
        $aParams = [
            'secret' => '6LfNiqwZAAAAAKOO_3HbNkqqVoRHFalNrGUqF-QG',
            'response' => $sCaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $aParams);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        if($response)
        {
            $oResponse = json_decode($response);
            $bRet = $oResponse->success;
        }
    }

    return $bRet;
}