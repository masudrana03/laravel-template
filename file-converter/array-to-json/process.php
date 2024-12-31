<?php
$files = glob('*.php'); // Adjust the path if needed

foreach ($files as $file) {
    // Include the PHP file and get its returned data
    $data = include $file;

    // Check if the file returned valid data (e.g., an array or object)
    if (is_array($data) || is_object($data)) {
        // Replace the .php extension with .json for the output file
        $jsonFile = str_replace('.php', '.json', $file);

        // Convert the PHP data to JSON and write it to the .json file
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        echo "Conversion completed for: " . $file . PHP_EOL;
    } else {
        echo "No valid data returned in: " . $file . PHP_EOL;
    }
}

echo "Conversion process completed for all PHP files!" . PHP_EOL;
