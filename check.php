<?php

include('src/MetadataLoaderInterface.php');
include('src/DefaultMetadataLoader.php');
include('src/CountryCodeToRegionCodeMap.php');
include('src/MetadataSourceInterface.php');
include('src/PhoneNumberDesc.php');
include('src/NumberFormat.php');
include('src/PhoneMetadata.php');
include('src/MultiFileMetadataSourceImpl.php');
include('src/MatcherAPIInterface.php');
include('src/RegexBasedMatcher.php');
include('src/PhoneNumber.php');
include('src/CountryCodeSource.php');
include('src/Matcher.php');
include('src/NumberParseException.php');
include('src/PhoneNumberType.php');
include('src/ValidationResult.php');
include('src/PhoneNumberUtil.php');

if ($_GET["phone"] == NULL) {
    $result["state"] = false;
    $result["error"]["message"][] = "'phone' is missing";
    echo json_encode($result);
    exit;
}
$phone = "+".$_GET["phone"];

$phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();

$phoneNumberObject = $phoneNumberUtil->parse($phone, null);
$phonedata = $phoneNumberUtil->getRegionCodeForNumber($phoneNumberObject);


$result["phone"] = $phone;
$result["country"] = $phonedata;
echo json_encode($result);