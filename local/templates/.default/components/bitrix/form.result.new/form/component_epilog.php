<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$el = new CIBlockElement;
$prop = array();
$prop[9] = $_POST["form_text_2"];
$prop[10] = $_POST["form_email_3"];
$prop[11] = $_POST["form_text_4"];
$prop[12] = $_POST["form_textarea_5"];
//$prop[13] = $_POST["form_text_1"];
$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(),
    "IBLOCK_SECTION" => false,
    "IBLOCK_ID"      => 5,
    "PROPERTY_VALUES"=> $prop,
    "NAME"           => $_POST["form_text_1"],
    "ACTIVE"         => "N",
);
$el->Add($arLoadProductArray);