document.addEventListener('DOMContentLoaded', function () {
    // Find the parent container of your navigation links (assuming it's a <ul> with id="navlist")
    const navlist = document.getElementById('navlist');
    const mainFrame = document.getElementById('mainFrame');
    const frameName = document.getElementById('frameName');

    // Function to get the base URL
    function getBaseURL() {
        const url = window.location.href;
        const pathArray = window.location.pathname.split('/');
        const protocol = url.split('/')[0];
        const host = url.split('/')[2];
        const baseURL = protocol + '//' + host + '/' + pathArray[1];
        return baseURL;
    }

    // Check if navlist exists
    if (navlist) {
        // Delegate the click event to the parent <ul> element
        navlist.addEventListener('click', function (e) {
            // Check if the clicked element has the "iframe-nav-link" class
            if (e.target && e.target.matches('a.iframe-nav-link')) {
                // Get the file path from the data-filepath attribute
                const filePath = e.target.getAttribute('data-filepath');

                // Construct the URL to the PHP script with the requested file
                const baseURL = getBaseURL();
                const fileUrl = baseURL + '/file_loader.php?file=' + encodeURIComponent(filePath);

                // Debugging output
                console.log("File path: " + filePath);
                console.log("File URL: " + fileUrl);

                // Update the iframe source and the frame name
                mainFrame.src = fileUrl;
                frameName.textContent = "Currently Viewing: " + fileUrl;

                // Optional: Add active state to clicked link
                const allLinks = navlist.querySelectorAll('.iframe-nav-link');
                allLinks.forEach(link => link.classList.remove('active'));  // Remove 'active' from all links
                e.target.classList.add('active');  // Add 'active' class to the clicked link
            }
        });
    } else {
        console.error('Element with ID "navlist" not found.');
    }
});