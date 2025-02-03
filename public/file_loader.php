<?php

namespace Adb;

if (!defined('TEST_DIRECTORY')) {
    define('TEST_DIRECTORY', '/var/www/wsldebian/adbfinal01');
}
require_once __DIR__ . '/../vendor/autoload.php';

use Adb\Model\Adbsoc;

// Set custom error handler
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    $logMessage = "\n\nError [$errno]: $errstr in $errfile on line $errline";
    error_log($logMessage, 3, __DIR__ . '/errors.txt');
    throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
});

set_exception_handler(function ($exception) {
    $logMessage = "\n\nException: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
    error_log($logMessage, 3, __DIR__ . '/errors.txt');
    error_log("\nStack trace: " . $exception->getTraceAsString(), 3, __DIR__ . '/errors.txt');
    header("HTTP/1.0 500 Internal Server Error");
    echo "Internal Server Error.";
});

try {
    // Debugging output
    error_log("\nStarting file_loader.php", 3, __DIR__ . '/errors.txt');

    // Instantiate the Adbsoc class to set up configurations
    $adbsoc = new Adbsoc();
    error_log("\nAdbsoc instantiated", 3, __DIR__ . '/errors.txt');

    // Define the base directory where your files are located
    define('BASE_DIR', TEST_DIRECTORY);
    error_log("\nBASE_DIR defined: " . BASE_DIR, 3, __DIR__ . '/errors.txt');

    // Get the requested file path from the query parameter
    $requestedFile = isset($_GET['file']) ? $_GET['file'] : '';
    error_log("\nRequested file: " . $requestedFile, 3, __DIR__ . '/errors.txt');

    // Sanitize the requested file path to prevent directory traversal attacks
    $requestedFile = basename($requestedFile);
    error_log("\nSanitized file path: " . $requestedFile, 3, __DIR__ . '/errors.txt');

    // Construct the full file path
    $filePath = BASE_DIR . '/' . $requestedFile;
    error_log("\nFull file path: " . $filePath, 3, __DIR__ . '/errors.txt');

    // Check if the file exists and is readable
    if (file_exists($filePath) && is_readable($filePath)) {
        // Serve the file content
        header('Content-Type: ' . mime_content_type($filePath));
        readfile($filePath);
        error_log("\nFile served: " . $filePath, 3, __DIR__ . '/errors.txt');
    } else {
        // Return a 404 response if the file is not found
        header("HTTP/1.0 404 Not Found");
        echo "File not found.";
        error_log("\nFile not found: " . $filePath, 3, __DIR__ . '/errors.txt');
    }
} catch (\Exception $e) {
    // Return a 500 response if there is an internal server error
    header("HTTP/1.0 500 Internal Server Error");
    echo "Internal Server Error.";
    error_log("\nInternal Server Error: " . $e->getMessage(), 3, __DIR__ . '/errors.txt');
    error_log("\nStack trace: " . $e->getTraceAsString(), 3, __DIR__ . '/errors.txt');
}
?>
