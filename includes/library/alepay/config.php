<?php

//define('URL_DEMO', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/user/');
define('URL_CALLBACK', ""); //{$this->config["url"]}/processing"); // Trả kết quả về trang pricing để xử lý kết quả! Nếu ok thì chuyển về Membership, ko thì báo error!

/* SANBOX === TEST ONLY */
/* ============================== */
$aleconfig_test = array(
    "apiKey" => "IuQUnlbk8f03vNOSgsuQoitHqwdo6k", //Là key dùng để xác định tài khoản nào đang được sử dụng.
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCXTnNZrnFzqlv+aCdyJMSZaoFwOCMjJuc88erIDEe6vUmF8yS8pBELNPqmm9z51+HMT6ImwxI90MnNnaET4CjLzWYk0jIZSkNfVPRkVHhf0GpkLyB06TSWUGSGmyfZw24jkPis1vuSuwzhw1me2/lXLPMixAv6Xwwos/f6H84PYwIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
    "checksumKey" => "Hyw2UkQnY5CKUaEROSLPobj5khw6xg", //Là key dùng để tạo checksum data.
    "callbackUrl" => URL_CALLBACK,
    "env" => "test",
);

/* LIVE === PERSONAL ACCOUNT */
/* ============================== */
$aleconfig_personal = array(
    "apiKey" => "DnoPPwqSlpsKMH7PfIYOg4chc1TyBz",
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCS9MUrrlherujv9oGkwhUKijPURKsMPax5RQEQK5sfMuWw6H9UcPenAanxbldULw1TntBLnRLwVI8xpYIjfQWCA7VzBcatJRiLt0v1oCk8elhaQ7L5c1DAVfw19IV1PXxNT8ZqNYb1/hrzTtms57R4ZyImVP8kThnmfUGcFdHeRQIDAQAB",
    "checksumKey" => "tR9wNjNbmc9bisCVy3sN6KmKLp1F1h",
    "callbackUrl" => URL_CALLBACK,
    "env" => "live"
);

/* LIVE === COMPANY ACCOUNT */
/* ============================== */
$aleconfig_company = array(
    "apiKey" => "I0X1rB0cBOPxNYzQtQ0ktNdCNGLu8U",
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCWeReFKe+nSFqKRv0TqsEbrDD7bZCqsldkoF5Biw9dWZgG0XGC6O182pdM8q07feV7rDMChUDrBUt0/2SwvLR+bmY4BVTDhyCIATSuvfxdBR8LaqYuqgF+OIYJPFQTjZIwGsmpXJnl/MRMC98o6qLQEBLUlUmyfmm4UPqG1slHawIDAQAB",
    "checksumKey" => "dnXWEtrnBsExcTGdQtc7tZBhn27XXP",
    "callbackUrl" => URL_CALLBACK,
    "env" => "live",
);

/* 
    Account to test
    =======================
    1 = LIVE :: Company
    2 = LIVE :: Personal
    Any other number = SANDBOX
*/
$account_to_test = 2;
$aleconfig = [];

switch ($account_to_test) {
    case 1: 
        $aleconfig['apiKey']        = $aleconfig_company['apiKey'];
        $aleconfig['encryptKey']    = $aleconfig_company['encryptKey'];
        $aleconfig['checksumKey']   = $aleconfig_company['checksumKey'];
        $aleconfig['callbackUrl']   = $aleconfig_company['callbackUrl'];
        $aleconfig['env']           = $aleconfig_company['env'];
        break;

    case 2: 
        $aleconfig['apiKey']        = $aleconfig_personal['apiKey'];
        $aleconfig['encryptKey']    = $aleconfig_personal['encryptKey'];
        $aleconfig['checksumKey']   = $aleconfig_personal['checksumKey'];
        $aleconfig['callbackUrl']   = $aleconfig_personal['callbackUrl'];
        $aleconfig['env']           = $aleconfig_personal['env'];
        break;

    default:
        $aleconfig['apiKey']        = $aleconfig_test['apiKey'];
        $aleconfig['encryptKey']    = $aleconfig_test['encryptKey'];
        $aleconfig['checksumKey']   = $aleconfig_test['checksumKey'];
        $aleconfig['callbackUrl']   = $aleconfig_test['callbackUrl'];
        $aleconfig['env']           = $aleconfig_test['env'];
}


