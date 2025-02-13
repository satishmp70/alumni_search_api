<?php
require_once __DIR__ . '/../config/database.php';
for ($i = 1; $i <= 1000000; $i++) {
    $name = "User_$i";
    $email = "user$i@example.com";
    $latitude = rand(-900000, 900000) / 10000; 
    $longitude = rand(-1800000, 1800000) / 10000; 

    $data = [
        'name' => $name,
        'email' => $email,
        'latitude' => $latitude,
        'longitude' => $longitude
    ];
    $db->insert('users', $data);

    for ($j = 0; $j < rand(1, 5); $j++) {
        $siteId = rand(1, 100);
        $db->insert('user_site', ['user_id' => $db->getInsertId(), 'site_id' => $siteId]);
    }

    if ($i % 10000 == 0) {
        echo "$i records inserted...\n";
    }
}
echo "1 million records inserted successfully!";
?>
