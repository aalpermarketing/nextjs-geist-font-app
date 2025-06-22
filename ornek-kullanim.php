// API URL ve API anahtarını tanımla
$api_url = 'https://anasite.com/api/fetch.php'; // Ana sitenin API URL'si
$api_key = 'YOUR_API_KEY_HERE'; // API anahtarınız

// cURL ile API'den veri çekme
function fetchFromAPI($url, $api_key, $kategori = 'all') {
    $ch = curl_init();
