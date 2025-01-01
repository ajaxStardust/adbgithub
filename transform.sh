#!/bin/bash

# Check if a filename argument is provided
if [ $# -eq 0 ]; then
    filename=$(pwd)
else
    filename="$1"
fi

# Resolve the absolute path of the file using realpath
full_path="$(realpath "$filename")"

# Extract the filename from the passed parameter
filename_only="${full_path##*/}"

# Display the full path of the file
echo "Full path: $full_path"

# Display the filename only
echo "File only: $filename_only"

# Pause for 2 seconds
sleep 2

# Open the URL in Firefox in the background
x-www-browser "http://localhost/p2u2.phtml?path2url=${full_path}" &

# Exit the script
exit
