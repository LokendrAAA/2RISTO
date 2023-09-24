<?php
// Replace with your actual PayPal credentials
$clientID = "YOUR_CLIENT_ID";
$clientSecret = "YOUR_CLIENT_SECRET";

// API URLs for sandbox and live environments
$apiURL = "https://api.sandbox.paypal.com/v1/";
$checkoutURL = "https://www.sandbox.paypal.com/checkoutnow?token=";

// Set up API request headers
$headers = array(
    "Content-Type: application/json",
);

// Set up API request data (replace with your actual order details)
$data = json_encode(array(
    "intent" => "CAPTURE",
    "purchase_units" => array(
        array(
            "amount" => array(
                "currency_code" => "USD",
                "value" => "100.00" // Replace with your order total
            )
        )
    )
));

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiURL . "payments/captures");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $clientID . ":" . $clientSecret);

// Execute cURL request and get response
$response = curl_exec($ch);
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Handle the PayPal API response
if ($httpStatus == 201) {
    $responseData = json_decode($response);
    $approvalURL = $responseData->links[1]->href; // PayPal approval URL
    header("Location: $approvalURL"); // Redirect to PayPal for payment
} else {
    echo "Error: Unable to create PayPal order.";
}
?>
