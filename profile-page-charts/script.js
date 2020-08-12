//         <body>
//             <div id="weekly-chart-soft"></div>
//             <div id="weekly-chart-hard"></div>
//             <div
//                 id="evolution-chart-soft"
//                 data-url="https://docs.google.com/spreadsheets/d/1za2HD8Yy_LJAmd_T-CUsI-uqGjoWLuW22UFnYHrqW4A/gviz/tq?gid=1918886040"
//             ></div>
//             <div
//                 id="evolution-chart-hard"
//                 data-url="https://docs.google.com/spreadsheets/d/1za2HD8Yy_LJAmd_T-CUsI-uqGjoWLuW22UFnYHrqW4A/gviz/tq?gid=809148773"
//             ></div>

// apelata fara parametri => saptamana curenta de la inceputul internship-ului
// apelata cu parametri => calculateWeek(dataInceput, dataSfarsit) --------- dataInceput, dataSfarsit de tip string ---------
const calculateWeek = (dataInceput = "07/14/2020", dataSfarsit = "nothing") => {
  // daca functia nu primeste si al doilea parametru, data de sfarsit este data de azi
  if (dataSfarsit === "nothing") {
    dataSfarsit = new Date();
  }

  // transforma datele de inceput si sfarsit in milisecunde
  timeDataInceput = new Date(dataInceput).getTime();
  timeDataSfarsit = new Date(dataSfarsit).getTime();

  let diferenta = timeDataSfarsit - timeDataInceput; // diferenta intre date in milisecunde
  diferenta /= 1000 * 60 * 60 * 24 * 7; // impartit la (milisecunde * secunde * minute * ore * zile) => nr de milisecunde dintr-o saptamana
  return Math.abs(Math.round(diferenta)); // transforma in nr intreg si pune in modul
};

const softUrl = document
  .getElementById("evolution-chart-soft")
  .getAttribute("data-url");
const hardUrl = document
  .getElementById("evolution-chart-hard")
  .getAttribute("data-url");

var hardSkillsEvolutionChart,
  softSkillsEvolutionChart,
  hardSkillsWeeklyChart,
  softSkillsWeeklyChart;

// Load the Visualization API and the corechart package.
google.charts.load("current", { packages: ["corechart"] });
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
function drawChart() {
  var hardSkillsEvolutionQuery = new google.visualization.Query(hardUrl);
  var hardSkillsWeeklyQuery = new google.visualization.Query(hardUrl);
  hardSkillsWeeklyQuery.setQuery(
    `SELECT A, B, C, D, E, F, G, H, I LIMIT 1 OFFSET ${calculateWeek() - 1}`
  );

  var softSkillsEvolutionQuery = new google.visualization.Query(softUrl);
  var softSkillsWeeklyQuery = new google.visualization.Query(softUrl);
  softSkillsWeeklyQuery.setQuery(
    `SELECT A, B, C, D, E, F, G, H, I LIMIT 1 OFFSET ${calculateWeek() - 1}`
  );

  hardSkillsEvolutionQuery.send(hardSkillsEvolutionQueryResponse);
  hardSkillsWeeklyQuery.send(hardSkillsWeeklyQueryResponse);

  softSkillsEvolutionQuery.send(softSkillsEvolutionQueryResponse);
  softSkillsWeeklyQuery.send(softSkillsWeeklyQueryResponse);

  function hardSkillsWeeklyQueryResponse(response) {
    var data = response.getDataTable();
    // Set chart options
    var options = {
      curveType: "none",
      bar: {
        groupWidth: "95%",
      },
      vAxis: {
        baselineColor: "none",
        ticks: [],
      },
      hAxis: {
        maxValue: 10,
        minValue: 0,
        gridlines: {
          count: 10,
        },
        title: "Nota",
        titleTextStyle: {
          italic: false,
        },
      },
      legend: {
        position: "top",
        maxLines: 3,
      },
      pointSize: 3,
      chartArea: {
        width: "84%",
      },
      colors: [
        "#fb878a",
        "#f9c083",
        "#f7fb95",
        "#a6fa9a",
        "#74edff",
        "#79aaff",
        "#9d8bff",
        "#fc9eff",
      ],
      fontName: "Open Sans",
    };

    hardSkillsWeeklyChart = {
      id: "hard",
      data: data,
      options: options,
    };
    instantiateBarChart(hardSkillsWeeklyChart);
  }

  function softSkillsWeeklyQueryResponse(response) {
    var data;
    data = response.getDataTable();

    // Set chart options
    var options = {
      curveType: "none",
      bar: {
        groupWidth: "95%",
      },
      vAxis: {
        baselineColor: "none",
        ticks: [],
      },
      hAxis: {
        maxValue: 10,
        minValue: 0,
        gridlines: {
          count: 10,
        },
        title: "Nota",
        titleTextStyle: {
          italic: false,
        },
      },
      legend: {
        position: "top",
        maxLines: 3,
      },
      pointSize: 3,
      chartArea: { width: "84%" },
      colors: [
        "#fb878a",
        "#f9c083",
        "#f7fb95",
        "#a6fa9a",
        "#74edff",
        "#79aaff",
        "#9d8bff",
        "#fc9eff",
      ],
      fontName: "Open Sans",
    };

    softSkillsWeeklyChart = { id: "soft", data: data, options: options };
    instantiateBarChart(softSkillsWeeklyChart);
  }

  function hardSkillsEvolutionQueryResponse(response) {
    var data = response.getDataTable();

    // Set chart options
    var options = {
      curveType: "none",
      legend: {
        position: "top",
        maxLines: 3,
      },

      hAxis: {
        title: "Săptămâna",
        titleTextStyle: { italic: false },
        minValue: 1,
        maxValue: 15,
      },
      vAxis: {
        title: "Nota",
        titleTextStyle: { italic: false },
        minValue: 0,
        maxValue: 10,
        gridlines: {
          count: 10,
        },
      },

      pointSize: 5,
      chartArea: { width: "84%" },
      colors: [
        "#fb878a",
        "#f9c083",
        "#f7fb95",
        "#a6fa9a",
        "#74edff",
        "#79aaff",
        "#9d8bff",
        "#fc9eff",
      ],
      fontName: "Open Sans",
    };

    hardSkillsEvolutionChart = {
      id: "hard",
      data: data,
      options: options,
    };
    instantiateLineChart(hardSkillsEvolutionChart);
  }

  function softSkillsEvolutionQueryResponse(response) {
    var data = response.getDataTable();
    // Set chart options
    var options = {
      curveType: "none",
      legend: {
        position: "top",
        maxLines: 3,
      },
      hAxis: {
        title: "Săptămâna",
        titleTextStyle: { italic: false },
        minValue: 1,
        maxValue: 15,
      },
      vAxis: {
        title: "Nota",
        minValue: 0,
        maxValue: 10,
        gridlines: {
          count: 10,
        },
        titleTextStyle: { italic: false },
      },
      pointSize: 5,
      chartArea: { width: "84%" },
      colors: [
        "#fb878a",
        "#f9c083",
        "#f7fb95",
        "#a6fa9a",
        "#74edff",
        "#79aaff",
        "#9d8bff",
        "#fc9eff",
      ],
      fontName: "Open Sans",
    };

    softSkillsEvolutionChart = {
      id: "soft",
      data: data,
      options: options,
    };
    instantiateLineChart(softSkillsEvolutionChart);
  }

  // Instantiate and draw our charts, passing in some options.
  function instantiateLineChart(chart) {
    var newChart = new google.visualization.LineChart(
      document.getElementById(`evolution-chart-${chart.id}`)
    );
    newChart.draw(chart.data, chart.options);
  }

  function instantiateBarChart(chart) {
    var newChart = new google.visualization.BarChart(
      document.getElementById(`weekly-chart-${chart.id}`)
    );
    newChart.draw(chart.data, chart.options);
  }

  window.addEventListener("resize", function () {
    console.log("Resizing!");
    instantiateLineChart(hardSkillsEvolutionChart);
    instantiateLineChart(softSkillsEvolutionChart);
    instantiateBarChart(hardSkillsWeeklyChart);
    instantiateBarChart(softSkillsWeeklyChart);
  });
}
