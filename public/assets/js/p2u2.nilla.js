// Function to fetch and populate the dropdowns dynamically
function populateDropdowns() {
    // Make an AJAX request to fetch data from the server
    // You can use fetch() or XMLHttpRequest to make the request
    // Example using fetch():
    fetch('config.json')
        .then(response => response.json())
        .then(data => {
            // Populate the prefix dropdown
            const prefixSelect = document.getElementById('prefix');
            const prefixOptions = foreach
            data.prefixOptions.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                prefixSelect.appendChild(optionElement);
            });
            // Populate the suffix dropdown
            const suffixSelect = document.getElementById('suffix');
            data.suffixOptions.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                suffixSelect.appendChild(optionElement);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}
// Call the function to populate dropdowns when the page loads
window.onload = populateDropdowns;
// Existing code...
// Add the updateAppendedData function here
function updateAppendedData() {
    const prefixSelect = document.getElementById('prefix');
    const suffixSelect = document.getElementById('suffix');
    const appendedDataDiv = document.getElementById('appendedData');
    const prefix = prefixSelect.value;
    const suffix = suffixSelect.value;
    let href = '';
    if (prefix !== '') {
        href += prefix + '.';
    }
    href += suffix + '/';
    const anchor = document.createElement('a');
    anchor.href = href;
    anchor.textContent = href;
    anchor.target = '_blank';
    appendedDataDiv.innerHTML = '';
    appendedDataDiv.appendChild(anchor);
}
