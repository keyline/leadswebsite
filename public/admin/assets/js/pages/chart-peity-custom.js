'use strict';
$(document).ready(function() {
    setTimeout(function() {
        // [ updating-Chart ] start
        var updatingChart = $(".updating-chart").peity("line", {
            fill: "rgba(240, 70, 107, 0.4)",
            stroke: "rgb(240, 70, 107)"
        });
        setInterval(function() {
            var random = Math.round(Math.random() * 10)
            var values = updatingChart.text().split(",")
            values.shift()
            values.push(random)
            updatingChart
                .text(values.join(","))
                .change()
        }, 1000);
        // [ updating-Chart ] end

        // [ updating1-Chart ] start
        $(document).ready(function() {
            var updatingChart1 = $(".updating-chart1").peity("line", {
                fill: "rgba(51, 219, 158, 0.32)",
                stroke: "rgba(51, 219, 158, 0.90)"
            });
        });
        // [ updating1-Chart ] end

        // [ line-Chart ] start
        var updatingChart2 = $(".updating-chart2").peity("line", {
            fill: "rgba(79, 195, 247, 0.45)",
            stroke: "rgba(79, 195, 247, 0.91)"
        });

        var updatingChart3 = $(".updating-chart3").peity("line", {
            fill: "rgba(255, 138, 101, 0.39)",
            stroke: "rgba(255, 138, 101, 0.94)"
        });

        $(".bar-colours-1").peity("bar", {
            fill: ["rgba(79, 195, 247, 0.65)", "rgba(51, 219, 158, 0.65)"]
        });

        $(".bar-colours-2").peity("bar", {
            fill: ["rgba(79, 195, 247, 0.65)", "rgba(240, 70, 107, 0.65)"]
        });

        // [ Data-Attributes Charts ] start
        $(".data-attributes span").peity("donut");
        $("span.pie_1").peity("pie", {
            fill: ["#FF5370", "#4099ff"]
        });
        $("span.pie_2").peity("pie", {
            fill: ["#FFB64D", "#2ed8b6"]
        });
        $("span.pie_3").peity("pie", {
            fill: ["#4099ff", "#7759de"]
        });
        $("span.pie_4").peity("pie", {
            fill: ["#2ed8b6", "#FF5370"]
        });
        $("span.pie_5").peity("pie", {
            fill: ["#FFB64D", "#4099ff"]
        });
        $("span.pie_6").peity("pie", {
            fill: ["#FF5370", "#7759de"]
        });
        $("span.pie_7").peity("pie", {
            fill: ["#2ed8b6", "#FFB64D"]
        });

        // [ Pie Charts ] start
        $("span.pie_1").peity("pie", {
            fill: ["#FF5370", "#4099ff"]
        });
        $("span.pie_2").peity("pie", {
            fill: ["#FFB64D", "#2ed8b6"]
        });
        $("span.pie_3").peity("pie", {
            fill: ["#4099ff", "#7759de"]
        });
        $("span.pie_4").peity("pie", {
            fill: ["#2ed8b6", "#FF5370"]
        });
        $("span.pie_5").peity("pie", {
            fill: ["#FFB64D", "#4099ff"]
        });
        $("span.pie_6").peity("pie", {
            fill: ["#FF5370", "#7759de"]
        });
        $("span.pie_7").peity("pie", {
            fill: ["#2ed8b6", "#FFB64D"]
        });
        // [ line-Chart ] end
    }, 700);
});
;