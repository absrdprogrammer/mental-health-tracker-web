const barCtx = document.getElementById("barChartCanvas").getContext("2d");
const pieCtx = document.getElementById("pieChartCanvas").getContext("2d");

const chartData = {
  labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
  datasets: [
    {
      label: "Health",
      data: [20, 12, 20, 15, 10, 8, 20],
      backgroundColor: "rgba(75, 192, 192, 1)",
    },
    {
      label: "Continue treatment",
      data: [10, 13, 6, 15, 11, 7, 13],
      backgroundColor: "rgba(255, 99, 132, 1)",
    },
  ],
};

let barChart = new Chart(barCtx, {
  type: "bar",
  data: chartData,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: { display: true, font: { size: 10 } },
        grid: { display: false },
      },
      y: {
        ticks: { display: true, font: { size: 10 }, beginAtZero: true },
        grid: { display: true },
      },
    },
    plugins: {
      legend: { display: false },
      datalabels: {
        display: true,
        color: "black",
        font: { size: 10, weight: "bold" },
        anchor: "end",
        align: "start",
      },
    },
  },
});

let pieChart = new Chart(pieCtx, {
  type: "pie",
  data: {
    labels: ["Health", "Continue Treatment", "Neutral"],
    datasets: [
      {
        data: [110, 75, 50],
        backgroundColor: ["rgba(75, 192, 192, 1)", "rgba(255, 99, 132, 1)", "rgba(255, 206, 86, 1)"],
      },
    ],
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
          label: function (context) {
            const label = context.label || "";
            const value = context.raw || 0;
            return `${label}: ${value}`;
          },
        },
      },
    },
    layout: {
      padding: {
        right: 20,
      },
    },
  },
});

function switchChartType(type) {
  barChart.destroy();
  barChart = new Chart(barCtx, {
    type: type,
    data: chartData,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          ticks: { display: true, font: { size: 10 } },
          grid: { display: false },
        },
        y: {
          ticks: { display: true, font: { size: 10 }, beginAtZero: true },
          grid: { display: true },
        },
      },
      plugins: {
        legend: { display: false },
        datalabels: {
          display: true,
          color: "black",
          font: { size: 10, weight: "bold" },
          anchor: "end",
          align: "start",
        },
      },
    },
  });
}

document.getElementById("barChartBtn").addEventListener("click", function () {
  document.getElementById("barChartBtn").classList.add("active");
  document.getElementById("lineChartBtn").classList.remove("active");
  switchChartType("bar");
});

document.getElementById("lineChartBtn").addEventListener("click", function () {
  document.getElementById("lineChartBtn").classList.add("active");
  document.getElementById("barChartBtn").classList.remove("active");
  switchChartType("line");
});
