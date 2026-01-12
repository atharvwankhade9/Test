<?php
header("Content-Type: application/json");

// Get card_id (POST or GET)
$card_id = $_POST['card_id'] ?? $_GET['card_id'] ?? null;

// Hardcoded card database
$cards = [
    "CARD1001" => [
        "phone_number" => "919876543210",
        "display_message" => "Admin Access OK",
        "message" => "Card valid. Welcome Admin.",
        "url" => "https://example.com/admin"
    ],
    "CARD1002" => [
        "phone_number" => "919812345678",
        "display_message" => "User Verified",
        "message" => "User verified successfully.",
        "url" => "https://example.com/user"
    ],
    "CARD1003" => [
        "phone_number" => "919800112233",
        "display_message" => "Staff Access",
        "message" => "Access granted for staff.",
        "url" => "https://example.com/staff"
    ],
    "CARD2001" => [
        "phone_number" => "919855566677",
        "display_message" => "Ration Card OK",
        "message" => "Ration card verified.",
        "url" => "https://example.com/ration"
    ]
];

// Check card_id
if (!$card_id) {
    echo json_encode([
        "status" => "failed",
        "message" => "card_id is required"
    ]);
    exit;
}

// Validate card
if (array_key_exists($card_id, $cards)) {

    $card = $cards[$card_id];

    // SMS text (URL included)
    $text_message = $card['message'] . " Visit: " . $card['url'];

    echo json_encode([
        "status" => "success",
        "card_id" => $card_id,
        "phone_number" => $card['phone_number'],
        "display_message" => $card['display_message'],
        "text_message" => $text_message,
        "url" => $card['url']
    ]);

} else {

    echo json_encode([
        "status" => "failed",
        "display_message" => "Invalid Card",
        "message" => "Invalid card ID"
    ]);
}
?>
