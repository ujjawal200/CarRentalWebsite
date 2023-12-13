// view_booked_cars.js

// Function to fetch and display booked cars
function fetchBookedCars() {
    // Assuming you have an API endpoint for fetching booked cars
    const apiUrl = 'php/view_booked_cars.php';

    // Fetch data from the API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Display booked cars in the booked-cars-list div
            const bookedCarsList = document.getElementById('booked-cars-list');

            // Clear existing content
            bookedCarsList.innerHTML = '';

            // Iterate over the data and create HTML elements
            data.forEach(bookedCar => {
                const bookedCarElement = document.createElement('div');
                bookedCarElement.innerHTML = `
                    <p>Customer Name: ${bookedCar.customer_name}</p>
                    <p>Model: ${bookedCar.model}</p>
                    <p>Start Date: ${bookedCar.start_date}</p>
                    <p>Duration: ${bookedCar.duration} days</p>
                    <hr>
                `;
                bookedCarsList.appendChild(bookedCarElement);
            });
        })
        .catch(error => console.error('Error fetching booked cars:', error));
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', fetchBookedCars);
