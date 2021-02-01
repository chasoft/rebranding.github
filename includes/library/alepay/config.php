<?php
//define('URL_DEMO', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/user/');
define('URL_CALLBACK', ""); //{$this->config["url"]}/processing"); // Trả kết quả về trang pricing để xử lý kết quả! Nếu ok thì chuyển về Membership, ko thì báo error!

$aleconfig = array(
    "apiKey" => "IuQUnlbk8f03vNOSgsuQoitHqwdo6k", //Là key dùng để xác định tài khoản nào đang được sử dụng.
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCXTnNZrnFzqlv+aCdyJMSZaoFwOCMjJuc88erIDEe6vUmF8yS8pBELNPqmm9z51+HMT6ImwxI90MnNnaET4CjLzWYk0jIZSkNfVPRkVHhf0GpkLyB06TSWUGSGmyfZw24jkPis1vuSuwzhw1me2/lXLPMixAv6Xwwos/f6H84PYwIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
    "checksumKey" => "Hyw2UkQnY5CKUaEROSLPobj5khw6xg", //Là key dùng để tạo checksum data.
    "callbackUrl" => URL_CALLBACK,
    "env" => "test",
);
?>