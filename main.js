
        
        const cityNames = [
            "Delhi",
            "Jaipur",
            "Mumbai",
            "Bangluru",
            "Hydrabad",
            "Kota",
            "Boston",
            "Denver",
            "Austin",
            "Houston",
            "Atlanta",
            "Philadelphia",
            "Las Vegas"
        ];

        function searchCities() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const cityList = document.getElementById("cityList");

            // Clear and hide the dropdown if the search input is empty
            if (!searchInput) {
                cityList.innerHTML = "";
                cityList.style.display = "none";
                return;
            }

            // Filter and display matching city names
            const matchingCities = cityNames.filter(city => city.toLowerCase().includes(searchInput));
            
            // Populate the dropdown
            cityList.innerHTML = "";
            matchingCities.forEach(city => {
                const li = document.createElement("li");
                li.textContent = city;
                li.onclick = function() {
                    document.getElementById("searchInput").value = city;
                    cityList.style.display = "none";
                };
                cityList.appendChild(li);
            });

            // Display the dropdown
            cityList.style.display = "block";
        }

        // Close the dropdown when clicking outside of it
        window.onclick = function(event) {
            if (!event.target.matches("#searchInput")) {
                const cityList = document.getElementById("cityList");
                cityList.style.display = "none";
            }
        }
    