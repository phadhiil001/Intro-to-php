// /******w**************
    
//     Assignment 4 Javascript
//     Name: Fadlullah Jamiu-Imam
//     Date: February 13th, 2023
//     Description: The purpose of this assignment is to create a program that displays the data from the api using AJAX Javascript 

// *********************/


document.addEventListener('DOMContentLoaded', function () {
    // Add event listener to the search button
    document.getElementById('searchButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        searchPermits();
    });

    // Set the value of the search input field to an empty string
    document.getElementById('searchInput').value = '';

    // Function to search permits
    function searchPermits() {
        let searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();
        // Encode the search term to handle special characters
        let encodedSearchTerm = encodeURIComponent(searchTerm);
        // Construct the API URL with encoded search term
        const apiUrl = 'https://data.winnipeg.ca/resource/it4w-cpf4.json?' +
            `$where=lower(permit_type) LIKE '%${encodedSearchTerm}%'` +
            '&$order=issue_date DESC' +
            '&$limit=100';
        const encodedURL = encodeURI(apiUrl);

        // Fetch request to retrieve data from API
        fetch(encodedURL)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error loading permits. Status: ${response.status} - ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (searchTerm === '' || data.length === 0) {
                    displayErrorMessage("Please enter a permit type.");
                } else {
                    if (data.length === 0) {
                        displayErrorMessage("No permits found for the specified type.");
                    } else {
                        displayPermits(data);
                    }
                }
            })
            .catch(error => {
                displayErrorMessage("Error loading permits. " + error.message);
            });
    }

    // Function to display permits
    function displayPermits(data) {
        let output = `<h2>${data.length} Building Permit Issued since 2010</h2>`;

        output += `
            <table class="data">
                <tr>
                    <th>Issue Date</th>
                    <th>Permit Type</th>
                    <th>Subtype</th>
                    <th>Neighbourhood</th>
                    <th>Permit Number</th>
                    <th>Ward</th>
                </tr>`;

        data.forEach(item => {
            output += `
                <tr>
                    <td>${item.issue_date}</td>
                    <td>${item.permit_type}</td>
                    <td>${item.sub_type}</td>
                    <td>${item.neighbourhood_name}</td>
                    <td>${item.permit_number}</td>
                    <td>${item.ward}</td>
                </tr>`;
        });

        output += `</table>`;

        document.getElementById('data').innerHTML = output;
    }


// This part of the code retrive all data from the api 

    // Function to display error messages
    function displayErrorMessage(message) {
        document.getElementById('data').innerHTML = `<p class="error-message">${message}</p>`;
    }

    // Event listener for the "Load All" button
    document.getElementById('loadAll').addEventListener('click', loadAll);

    // Function to load all permits
    function loadAll() {
        // URL to fetch all permits
        const apiUrl = 'https://data.winnipeg.ca/resource/it4w-cpf4.json';
        const encodedURL = encodeURI(apiUrl);

        // Fetch request to retrieve all data from API
        fetch(encodedURL)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error loading permits. Status: ${response.status} - ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                displayAll(data);
            })
            .catch(error => {
                displayErrorMessage("Error loading permits. " + error.message);
            });
    }

    // Function to display all permits
    function displayAll(data) {
        let output = `
            <p>${data.length} is the total number of Building Permit Issued since 2010</p>
            <table class="data">
                <tr>
                    <th>Issue Date</th>
                    <th>Permit Type</th>
                    <th>Subtype</th>
                    <th>Neighbourhood</th>
                    <th>Permit Number</th>
                    <th>Permit Group</th>
                    <th>Work Type</th>
                    <th>Community</th>
                    <th>Ward</th>
                    <th>Final Date</th>
                </tr>`;
    
        data.forEach(item => {
            output += `
                <tr>
                    <td>${item.issue_date}</td>
                    <td>${item.permit_type}</td>
                    <td>${item.sub_type}</td>
                    <td>${item.neighbourhood_name}</td>
                    <td>${item.permit_number}</td>
                    <td>${item.permit_group}</td>
                    <td>${item.work_type}</td>
                    <td>${item.community}</td>
                    <td>${item.ward}</td>
                    <td>${item.final_date}</td>
                </tr>`;
        });
    
        output += `</table>`;
    
        document.getElementById('data').innerHTML = output;
    }
});