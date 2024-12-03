const barCtx = document.getElementById('barChartCanvas').getContext('2d');
const pieCtx = document.getElementById('pieChartCanvas').getContext('2d');

fetch('get-mood-all-data') // Endpoint dari CodeIgniter
    .then(response => response.json())
    .then(data => {
        // Data untuk bar chart
        const barLabels = data.barData.map(item => item.date);  // Label berdasarkan tanggal
        const sadCounts = data.barData.map(item => item.sad);   // Jumlah mood 'sad'
        const neutralCounts = data.barData.map(item => item.neutral); // Jumlah mood 'neutral'
        const happyCounts = data.barData.map(item => item.happy);

        const barDatasets = [
            {
                label: '😢 Sad',
                data: sadCounts, // Data mood sad
                backgroundColor: 'rgba(255, 99, 132, 1)'
            },
            {
                label: '😐 Neutral',
                data: neutralCounts, // Data mood neutral
                backgroundColor: 'rgba(255, 206, 86, 1)'
            },
            {
                label: '😊 Happy',
                data: happyCounts, // Data mood happy
                backgroundColor: 'rgba(75, 192, 192, 1)'
            }
        ];

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: barDatasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Dates'
                        },
                        // Mengatur agar setiap tanggal memiliki dua bar
                        grid: {
                            offset: true
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Mood Count'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const mood = tooltipItem.dataset.label; // Label dataset, misalnya "Sad", "Neutral", "Happy"
                                const count = tooltipItem.raw; // Nilai data                            
                                return `${mood}: ${count}`;
                            }
                            
                        }
                    },
                    legend: {
                        display: true
                    }
                }
            }
        });

        // Data untuk pie chart (tetap sama)
        const pieLabels = data.pieData.map(item => item.mood.charAt(0).toUpperCase() + item.mood.slice(1));
        const pieValues = data.pieData.map(item => item.count);
        const pieColors = pieLabels.map(label =>
            label.toLowerCase() === 'sad' ? 'rgba(255, 99, 132, 1)' :
            label.toLowerCase() === 'neutral' ? 'rgba(255, 206, 86, 1)' :
            'rgba(75, 192, 192, 1)'
        );

        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieValues,
                    backgroundColor: pieColors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "right",
                        labels: {
                          usePointStyle: true,
                          padding: 15,
                          font: {
                            size: 12,
                          },
                        },
                      },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Tambahkan jumlah data di tooltip
                                const mood = pieLabels[tooltipItem.dataIndex];
                                const count = tooltipItem.raw;
                                return `${mood}: ${count}`;
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                      right: 20,
                    },
                  },
            }
        });
    })
    .catch(error => console.error('Error fetching data:', error));
