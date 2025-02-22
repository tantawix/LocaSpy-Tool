<?php 
// الحصول على عنوان IP الخارجي
$ip = file_get_contents('http://ipinfo.io/ip');
if ($ip === false) {
    $ip = 'Unknown';
}

// الحصول على الـ User-Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// تحسين تعبيرات regex لتغطية المزيد من المتصفحات وأنظمة التشغيل
preg_match('/(Firefox|Chrome|Brave|Safari|Edge|Opera|MSIE|Trident)[\/\s]?([0-9.]*)/', $userAgent, $bMatch);
$browser = $bMatch[1] ?? 'Unknown';
$browserVersion = $bMatch[2] ?? 'Unknown';

preg_match('/(Windows NT|Windows|Linux|Mac OS X|Android|iPhone|iPad|iOS)[\/\s]?([0-9._]*)/', $userAgent, $osMatch);
$os = $osMatch[1] ?? 'Unknown';
$osVersion = $osMatch[2] ?? 'Unknown';

$deviceType = (preg_match('/Mobile|Android|iPhone|iPad/', $userAgent)) ? 'Mobile' : 'Desktop';

$response = file_get_contents("http://ip-api.com/json/{$ip}");
$geoData = json_decode($response, true);

if ($geoData && $geoData['status'] === 'fail') {
    echo "Error: " . $geoData['message'] . "\n"; // رسالة توضح السبب
    $country = 'Unknown';
    $region = 'Unknown';
    $city = 'Unknown';
} else {
    $country = $geoData['country'] ?? 'Unknown';
    $region = $geoData['regionName'] ?? 'Unknown';
    $city = $geoData['city'] ?? 'Unknown';
}

$data = "====================\n";
$data .= "IP: $ip\n";
$data .= "Location: $city, $region, $country\n";  // إضافة الموقع
$data .= "User-Agent: $userAgent\n";
$data .= "Browser: $browser\n";
$data .= "Browser-Version: $browserVersion\n";
$data .= "OS: $os\n";
$data .= "OS-Version: $osVersion\n";
$data .= "Device-Type: $deviceType\n";
$data .= "====================\n";


file_put_contents('data_ip.txt', $data, FILE_APPEND);
?>
