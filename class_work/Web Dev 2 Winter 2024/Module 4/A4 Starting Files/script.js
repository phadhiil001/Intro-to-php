// /******w**************
    
//     Assignment 4 Javascript
//     Name: Fadlullah Jamiu-Imam
//     Date: February 13th, 2023
//     Description: The purpose of this assignment is to create a program that displays the data from the api using AJAX Javascript 

// *********************/


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchButton').addEventListener('click', searchPermits);

    document.getElementById('searchInput').value = '';

    function searchPermits() {
        var searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();

        var apiUrl = `https://data.winnipeg.ca/resource/it4w-cpf4.json?$where=lower(permit_type) LIKE '%25${searchTerm}%25'&$order=issue_date DESC&$limit=100`;

        var xhr = new XMLHttpRequest();

        // Get request to retrieve data from API
        xhr.open('GET', apiUrl, true);

        xhr.onload = function () {
            if (this.status == 200) {
                let data = JSON.parse(this.responseText);

                if (searchTerm === '' || data.length === 0) {
                    displayErrorMessage("Please enter a permit type.");
                } else {
                    if (data.length === 0) {
                        displayErrorMessage("No permits found for the specified type.");
                    } else {
                        displayPermits(data);
                    }
                }
            } else {
                displayErrorMessage("Error loading permits. Status: " + this.status + " - " + this.statusText);
            }
        };

        xhr.onerror = function () {
            displayErrorMessage("Error loading permits. Network error occurred.");
        };

        xhr.send();
    }

    function displayPermits(data) {
        var output = `<h2>${data.length} Building Permit Issued since 2010</h2>`;

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

        for (var i in data) {
            output += `
                <tr>
                    <td>${data[i].issue_date}</td>
                    <td>${data[i].permit_type}</td>
                    <td>${data[i].sub_type}</td>
                    <td>${data[i].neighbourhood_name}</td>
                    <td>${data[i].permit_number}</td>
                    <td>${data[i].ward}</td>
                </tr>`;
        }

        output += `</table>`;

        document.getElementById('data').innerHTML = output;
    }

    function displayErrorMessage(message) {
        document.getElementById('data').innerHTML = `<p class="error-message">${message}</p>`;
    }



    document.getElementById('loadAll').addEventListener('click', loadAll);

    function loadAll() {

        let xhr = new XMLHttpRequest();
        
        xhr.open('GET', 'https://data.winnipeg.ca/resource/it4w-cpf4.json', true);

        xhr.onload = function () {
            if (this.status == 200) {
                let data = JSON.parse(this.responseText);

                displayAll(data);
            } else {
                displayErrorMessage("Error loading permits. Status: " + this.status + " - " + this.statusText);
            }
        };

        xhr.send();
    }

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
    
        for (let i in data) {
            output += `
                <tr>
                    <td>${data[i].issue_date}</td>
                    <td>${data[i].permit_type}</td>
                    <td>${data[i].sub_type}</td>
                    <td>${data[i].neighbourhood_name}</td>
                    <td>${data[i].permit_number}</td>
                    <td>${data[i].permit_group}</td>
                    <td>${data[i].work_type}</td>
                    <td>${data[i].community}</td>
                    <td>${data[i].ward}</td>
                    <td>${data[i].final_date}</td>
                </tr>`;
        }
    
        output += `</table>`;
    
        document.getElementById('data').innerHTML = output;
    }
    
});

