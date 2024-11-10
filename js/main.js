// Event listener for form submission
document.getElementById('urlForm').addEventListener('submit', async function(event) {
    event.preventDefault();  // Prevent form from reloading the page
    
    // Get values from the form inputs
    const url = document.getElementById('urlInput').value;
    const topN = parseInt(document.getElementById('topNInput').value);

    // Make a POST request to the backend REST API
    const response = await fetch('api/restapi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'  // Specify JSON content type
        },
        body: JSON.stringify({ url, n: topN })  // Send URL and top N words as JSON data
    });

    // Parse the JSON response from the backend
    const data = await response.json();

    const table = document.getElementById('resultsTable');
    const tbody = table.querySelector('tbody');
    tbody.innerHTML = '';  // Clear previous results

    if (data.error) {
        alert(data.error);  // Show an error message if there's an issue
    } else {
        table.style.display = 'table';  // Display the table if data is available
        // Populate the table with word-frequency pairs
        Object.entries(data).forEach(([word, frequency]) => {
            const row = document.createElement('tr');
            row.innerHTML = `<td>${word}</td><td>${frequency}</td>`;
            tbody.appendChild(row);
        });
    }
});