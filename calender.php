<?php
// Serve events data as JSON (replace with your actual data source)
$events = [
    [
        'title' => 'Event 1',
        'start' => '2023-09-10'
    ],
    [
        'title' => 'Event 2',
        'start' => '2023-09-15'
    ]
];

header('Content-Type: application/json');
echo json_encode($events);
?>
