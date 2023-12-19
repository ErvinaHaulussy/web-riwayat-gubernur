// script.js

$(document).ready(function () {
    // Function to add a product card dynamically
    function addDaerahCard(daerah) {
        var cardHtml = `
            <div class="col-md-4">
                <div class="card">
                    <img src="img/${daerah.foto}" alt="${daerah.nama_gubernur}" class="card-img-top w-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">${daerah.nama_gubernur}</h5>
                        <p class="card-text">Periode ${daerah.periode} tahun</p>
                    </div>
                </div>
            </div>
        `;

        $("#productContainer").append(cardHtml);
    }

    // Fetch data from the server and add cards on page load
    $.ajax({
        url: "/riwayat/getDaerahJson", // Update the URL to match your routes
        method: "GET",
        dataType: "json",
        success: function (data) {
            // Add cards for each product in the fetched data
            data.forEach(function (daerah) {
                addDaerahCard(daerah);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data:", error);
        }
    });
});
