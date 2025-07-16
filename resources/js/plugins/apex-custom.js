if (document.querySelector(".customer_impression")) {
  var options = {
    series: [
      {
        name: "Orders",
        type: "area",
        data: [30, 35, 28, 45, 40, 70],
      },
    ],
    chart: {
      height: 250,
      type: "line",
      toolbar: {
        show: false,
      },
      animations: {
        enabled: true,
        easing: "easeinout",
        speed: 800,
      },
    },
    stroke: {
      curve: "smooth",
      dashArray: [0, 0, 8],
      width: [2, 0, 2.2],
    },
    fill: {
      opacity: [0.1, 0.9, 1],
    },
    markers: {
      size: [0, 0, 0],
      strokeWidth: 2,
      hover: {
        size: 4,
      },
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
    },
    grid: {
      show: true,
      borderColor: "#F5F6F7",
      xaxis: {
        lines: {
          show: false,
        },
      },
      yaxis: {
        lines: {
          show: true,
        },
      },
      padding: {
        top: 0,
        right: 0,
        bottom: -10,
        left: 0,
      },
    },
    legend: {
      show: false,
    },
    plotOptions: {
      bar: {
        columnWidth: "30%",
        barHeight: "70%",
      },
    },
    colors: ["#FFC861", "#0065ff", "#00A385"],
    tooltip: {
      shared: true,
      y: [
        {
          formatter: function (e) {
            return e !== undefined ? e.toFixed(0) : e;
          },
        },
        {
          formatter: function (e) {
            return e !== undefined ? "$" + e.toFixed(2) + "k" : e;
          },
        },
        {
          formatter: function (e) {
            return e !== undefined ? e.toFixed(0) + " Sales" : e;
          },
        },
      ],
    },
  };

  chart = new ApexCharts(
    document.querySelector(".customer_impression"),
    options
  );
  chart.render();
}

if (document.querySelector(".meter1")) {
  var options = {
    series: [44, 55, 41],
    chart: {
      width: 160,
      height: 200,
      type: "donut",
      toolbar: {
        show: false,
      },
    },
    fill: {
      colors: ["#FF710F", "#613BFF", "#5EBA67"],
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    plotOptions: {
      pie: {
        startAngle: -90,
        endAngle: 90,
        offsetY: 0,
        donut: {
          size: "80%",
        },
      },
    },
    grid: {
      padding: {
        bottom: -80,
      },
    },
  };

  var chart = new ApexCharts(document.querySelector(".meter1"), options);
  chart.render();
}

if (document.querySelector(".meter2")) {
  var options = {
    series: [44, 55],
    chart: {
      width: "100%",
      height: 200,
      type: "donut",
      toolbar: {
        show: false,
      },
    },
    fill: {
      colors: ["#FF710F", "#613BFF"],
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    stroke: {
      width: 2,
    },
    plotOptions: {
      pie: {
        startAngle: -90,
        endAngle: 90,
        offsetY: 0,
        donut: {
          size: "80%",
        },
      },
    },
    grid: {
      padding: {
        bottom: -80,
      },
    },
  };

  var chart = new ApexCharts(document.querySelector(".meter2"), options);
  chart.render();
}
