document.addEventListener("DOMContentLoaded", function () {
    // Fetch data for all charts
    fetch("fetch_chart_data.php")
        .then(response => response.json())
        .then(data => {
            // Time-Series Graph
            const timeSeriesCtx = document.getElementById("timeSeriesGraph").getContext("2d");
            new Chart(timeSeriesCtx, {
                type: "line",
                data: {
                    labels: data.timeSeries.labels,
                    datasets: [{
                        label: "Patients Admitted",
                        data: data.timeSeries.values,
                        borderColor: "#007bff",
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: true }
                    }
                }
            });

            // Pie Chart
            const pieChartCtx = document.getElementById("pieChart").getContext("2d");
            new Chart(pieChartCtx, {
                type: "pie",
                data: {
                    labels: data.pieChart.labels,
                    datasets: [{
                        data: data.pieChart.values,
                        backgroundColor: ["#007bff", "#28a745", "#ffc107", "#dc3545", "#6c757d"]
                    }]
                },
                options: {
                    responsive: true,
                }
            });

            // Bar Graph
            const barGraphCtx = document.getElementById("barGraph").getContext("2d");
            new Chart(barGraphCtx, {
                type: "bar",
                data: {
                    labels: data.barGraph.labels,
                    datasets: [{
                        label: "Patients per Hospital",
                        data: data.barGraph.values,
                        backgroundColor: "#007bff"
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: true }
                    }
                }
            });
        })
        .catch(error => console.error("Error fetching chart data:", error));
});