// /******w**************
    
//     Assignment 4 Javascript
//     Name:
//     Date:
//     Description:

// *********************/

// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('searchButton').addEventListener('click', searchPermits);


//     // Function to handle search when links are clicked
//     function searchFor(term) {
//         document.getElementById('searchInput').value = term;
//         searchPermits();
//     }

//     function searchPermits() {
//         var searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();

//         var  xhr = new XMLHttpRequest();
//         // Get request to retrieve data from API
//         xhr.open('GET', 'https://data.winnipeg.ca/resource/it4w-cpf4.json', true);

//         xhr.onload = function () {
//             if (this.status == 200) {
//                 var data = JSON.parse(this.responseText);

//                 var filterData = data.filter(function (item) {
//                     // Check if the neighbouthood name contains the search  term
//                     return item.neighbourhood_name.toLowerCase().includes(searchTerm);
//                 });

//                 displayPermits(filterData);
//             } else {
//                 console.log("Error: " + this.status);
//             }
//         };

//         xhr.send();
//     }
    

//     function displayPermits(data)  {
//         var output = `
//             <table class="data">
//                 <tr>
//                     <th>Issue Date</th>
//                     <th>Permit Type</th>
//                     <th>Subtype</th>
//                     <th>Neighbourhood</th>
//                     <th>Permit Number</th>
//                     <th>Ward</th>
//                 </tr>`;

//         for (var i in data) {
//             output += `
//                 <tr>
//                     <td>${data[i].issue_date}</td>
//                     <td>${data[i].permit_type}</td>
//                     <td>${data[i].sub_type}</td>
//                     <td>${data[i].neighbourhood_name}</td>
//                     <td>${data[i].permit_number}</td>
//                     <td>${data[i].ward}</td>
//                 </tr>`;
//         }

//         output += `</table>`;

//         document.getElementById('data').innerHTML = output;
//     }
// });


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchButton').addEventListener('click', searchPermits);

    // Function to handle search when links are clicked
    function searchFor(term) {
        document.getElementById('searchInput').value = term;
        searchPermits();
    }

    document.getElementById('stJohns').addEventListener('click', function () {
        searchFor("ST. JOHN'S");
    });

    document.getElementById('grassie').addEventListener('click', function () {
        searchFor("GRASSIE");
    });

    document.getElementById('brucePark').addEventListener('click', function () {
        searchFor("BRUCE PARK");
    });

    function searchPermits() {
        var searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();

        var xhr = new XMLHttpRequest();
        // Get request to retrieve data from API
        xhr.open('GET', 'https://data.winnipeg.ca/resource/it4w-cpf4.json', true);

        xhr.onload = function () {
            if (this.status == 200) {
                var data = JSON.parse(this.responseText);

                var filteredData = data.filter(function (item) {
                    // Check if the neighbourhood name contains the search term
                    return item.neighbourhood_name && item.neighbourhood_name.toLowerCase().includes(searchTerm);
                });

                displayPermits(filteredData); // Corrected function name
            } else {
                console.log("Error: " + this.status);
            }
        };

        xhr.send();
    }

    function displayPermits(data) { // Corrected function name
        var output = `
            <table class="data">
                <tr>
                    <th>Issue Date</th>
                    <th>Permit Type</th>
                    <th>Subtype</th>
                    <th>Neighbourhood</th>
                    <th>Permit Number</th>
                </tr>`;

        for (var i in data) {
            output += `
                <tr>
                    <td>${data[i].issue_date}</td>
                    <td>${data[i].permit_type}</td>
                    <td>${data[i].sub_type}</td>
                    <td>${data[i].neighbourhood_name}</td>
                    <td>${data[i].permit_number}</td>
                </tr>`;
        }

        output += `</table>`;

        document.getElementById('data').innerHTML = output;
    }
});
