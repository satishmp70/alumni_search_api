<?php
require_once __DIR__ . '/../config/database.php';

class User {

    public static function updateUser($id, $data) {
        global $db;
        $db->where('id', $id);
        return $db->update('users', $data);
    }

    public static function findNearbyAlumni($latitude, $longitude, $radiusKm) {
        global $db;
        $query = "SELECT id, name, email, latitude, longitude, (
            6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)) )
        ) AS distance
        FROM users
        HAVING distance <= ?
        
        ORDER BY distance LIMIT 50";
        return $db->rawQuery($query, [$latitude, $longitude, $latitude, $radiusKm]);
    }
}
?>
