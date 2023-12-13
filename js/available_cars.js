// available_cars.js

// Function to fetch and display available cars
function fetchAvailableCars() {
    // Assuming you have an API endpoint for fetching available cars
    const apiUrl = 'php/available_cars.php';

    // Fetch data from the API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Display available cars in the cars-list div
            const carsList = document.getElementById('cars-list');

            // Clear existing content
            carsList.innerHTML = '';

            // Iterate over the data and create HTML elements
            data.forEach(car => {
                const carElement = document.createElement('div');
                carElement.innerHTML = `
                    <p>Model: ${car.model}</p>
                    <p>Number: ${car.number}</p>
                    <p>Seating Capacity: ${car.seating_capacity}</p>
                    <p>Rent per Day: ${car.rent_per_day}</p>
                    <hr>
                `;
                carsList.appendChild(carElement);
            });
        })
        .catch(error => console.error('Error fetching available cars:', error));
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', fetchAvailableCars);
