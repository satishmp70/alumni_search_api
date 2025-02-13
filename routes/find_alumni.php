<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/response.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $latitude = $data['latitude'] ?? null;
    $longitude = $data['longitude'] ?? null;
    $radius = $data['radius'] ?? 10;

    if (!$latitude || !$longitude) {
        ResponseHelper::error('Missing location parameters');
    }

    $alumni = User::findNearbyAlumni($latitude, $longitude, $radius);

    if (isset($alumni['error'])) {
        ResponseHelper::error('Database error: ' . $alumni['error']);
    }

    if (empty($alumni)) {
        ResponseHelper::success('No alumni found within the specified radius', []);
    }

    ResponseHelper::success('Nearby alumni found', $alumni);
} else {
    ResponseHelper::error('Invalid request method');
}
?>
