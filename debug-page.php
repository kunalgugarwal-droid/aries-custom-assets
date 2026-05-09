<?php
// Find JSON syntax error in page 46 data
$page_id = 46;
$data = get_post_meta($page_id, '_elementor_data', true);

// Check last 300 chars
echo "Last 300 chars:\n" . substr($data, -300) . "\n\n";

// Try to find the error position
// Check if slashes are the issue
$unslashed = wp_unslash($data);
$decoded = json_decode($unslashed, true);
echo "After unslash decode type: " . gettype($decoded) . "\n";
if ($decoded) {
    echo "After unslash: " . count($decoded) . " sections\n";
}

// Try stripslashes
$stripped = stripslashes($data);
$decoded2 = json_decode($stripped, true);
echo "After stripslashes decode type: " . gettype($decoded2) . "\n";
if ($decoded2) {
    echo "After stripslashes: " . count($decoded2) . " sections\n";
}

echo "json error: " . json_last_error_msg() . "\n";

// Check for common issues - look for position of bad char
for ($i = 0; $i < strlen($data); $i++) {
    $partial = substr($data, 0, $i + 1);
    json_decode($partial);
    if (json_last_error() === JSON_ERROR_NONE) {
        // Valid so far, but this might be because it's a complete value
    }
}

// Let's just try to re-store it properly
// First delete the meta
delete_post_meta($page_id, '_elementor_data');
echo "Deleted old meta\n";
