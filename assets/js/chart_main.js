const pieCtx = document.getElementById('pieChartCanvas').getContext('2d');

fetch('get-mood-data') // Endpoint dari CodeIgniter
    .then(response => response.json())
    .then(data => {
        // Data untuk bar chart
        const barLabels = [...new Set(data.barData.map(item => item.date))];
        const moods = ['sad', 'neutral', 'happy'];
        const moodPositions = { 'sad': 1, 'neutral': 2, 'happy': 3 }; // Mapping posisi Y

        const barDatasets = [{
            label: 'Mood Counts',
            data: data.barData.map(item => ({
                x: item.date,
                y: moodPositions[item.mood],
                count: item.count // Untuk tooltip
            })),
            backgroundColor: data.barData.map(item =>
                item.mood === 'sad' ? 'rgba(75, 192, 192, 1)' :
                item.mood === 'neutral' ? 'rgba(255, 99, 132, 1)' :
                'rgba(255, 206, 86, 1)'
            )
        }];

        const barCtx = document.getElementById('barChartCanvas').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                datasets: barDatasets
            },
            options: {
                responsive: true,
                parsing: {
                    xAxisKey: 'x',
                    yAxisKey: 'y'
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Dates'
                        }
                    },
                    y: {
                        type: 'linear',
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                // Ubah label menjadi emoticon
                                if (value === 1) return '😢 Sad';
                                if (value === 2) return '😐 Neutral';
                                if (value === 3) return '😊 Happy';
                                return value;
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const moodCount = context.raw.count;
                                return `${context.raw.y === 1 ? '😢 Sad' :
                                        context.raw.y === 2 ? '😐 Neutral' :
                                        '😊 Happy'}`;
                            }
                        }
                    },
                    legend: {
                        display: false
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
