<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/response.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['id'], $data['name'], $data['email'], $data['latitude'], $data['longitude'])) {
        echo json_encode(ResponseHelper::error('Missing fields'));
        exit;
    }
    $result = User::updateUser($data['id'], [
        'name' => $data['name'],
        'email' => $data['email'],
        'latitude' => $data['latitude'],
        'longitude' => $data['longitude']
    ]);
    echo json_encode($result ? ResponseHelper::success('User updated') : ResponseHelper::error('Failed to update'));
}
?>
