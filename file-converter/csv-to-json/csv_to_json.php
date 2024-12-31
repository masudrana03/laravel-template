<?php
// Get all CSV files in the current directory (you can adjust the path if needed)
$files = glob('*.csv');

foreach ($files as $file) {
    // Open the CSV file for reading
    $handle = fopen($file, 'r');

    if ($handle !== false) {
        // Get the header row (first row) which will be used as keys for the JSON
        $header = fgetcsv($handle);

        // Initialize an array to store the data
        $data = [];

        // Loop through each row of the CSV
        while (($row = fgetcsv($handle)) !== false) {
            // Combine the header with the current row data to form an associative array
            $data[] = array_combine($header, $row);
        }

        // Close the CSV file after reading
        fclose($handle);

        // Replace the .csv extension with .json for the output file
        $jsonFile = str_replace('.csv', '.json', $file);

        // Convert the array to JSON and write it to the .json file
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        echo "Conversion completed for: " . $file . PHP_EOL;
    } else {
        echo "Failed to open file: " . $file . PHP_EOL;
    }
}

echo "CSV to JSON conversion process completed for all CSV files!" . PHP_EOL;
