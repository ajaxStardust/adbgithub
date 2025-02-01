<?php

namespace Adb\Public;

// Autoload classes using PSR-4
require_once __DIR__ . '/../vendor/autoload.php';

use Adb\Model\Adbsoc;

// Set custom error handler
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    $logMessage = "Error [$errno]: $errstr in $errfile on line $errline";
    error_log($logMessage, 3, __DIR__ . '/custom_error.log');
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

set_exception_handler(function ($exception) {
    $logMessage = "Exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
    error_log($logMessage, 3, __DIR__ . '/custom_error.log');
    error_log("Stack trace: " . $exception->getTraceAsString(), 3, __DIR__ . '/custom_error.log');
    header("HTTP/1.0 500 Internal Server Error");
    echo "Internal Server Error.";
});

try {
    // Debugging output
    error_log("Starting file_loader.php", 3, __DIR__ . '/custom_error.log');

    // Instantiate the Adbsoc class to set up configurations
    $adbsoc = new Adbsoc();
    error_log("Adbsoc instantiated", 3, __DIR__ . '/custom_error.log');

    // Define the base directory where your files are located
    define('BASE_DIR', TEST_DIRECTORY);
    error_log("BASE_DIR defined: " . BASE_DIR, 3, __DIR__ . '/custom_error.log');

    // Get the requested file path from the query parameter
    $requestedFile = isset($_GET['file']) ? $_GET['file'] : '';
    error_log("Requested file: " . $requestedFile, 3, __DIR__ . '/custom_error.log');

    // Sanitize the requested file path to prevent directory traversal attacks
    $requestedFile = basename($requestedFile);
    error_log("Sanitized file path: " . $requestedFile, 3, __DIR__ . '/custom_error.log');

    // Construct the full file path
    $filePath = BASE_DIR . '/' . $requestedFile;
    error_log("Full file path: " . $filePath, 3, __DIR__ . '/custom_error.log');

    // Check if the file exists and is readable
    if (file_exists($filePath) && is_readable($filePath)) {
        // Serve the file content
        header('Content-Type: ' . mime_content_type($filePath));
        readfile($filePath);
        error_log("File served: " . $filePath, 3, __DIR__ . '/custom_error.log');
    } else {
        // Return a 404 response if the file is not found
        header("HTTP/1.0 404 Not Found");
        echo "File not found.";
        error_log("File not found: " . $filePath, 3, __DIR__ . '/custom_error.log');
    }
} catch (Exception $e) {
    // Return a 500 response if there is an internal server error
    header("HTTP/1.0 500 Internal Server Error");
    echo "Internal Server Error.";
    error_log("Internal Server Error: " . $e->getMessage(), 3, __DIR__ . '/custom_error.log');
    error_log("Stack trace: " . $e->getTraceAsString(), 3, __DIR__ . '/custom_error.log');
}
?>
