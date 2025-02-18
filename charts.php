<!DOCTYPE html>
<html>
  <head>
    <title>JavaScript Bar Chart</title>
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js">>/script>
  </head>
  <body>
    <div id="container" style="width: 100%; height: 100%"></div>
    <script>
      anychart.onDocumentReady(function() {
 
        // set the data
        var data = {
            header: ["Name", "Death toll"],
            rows: [
              ["San-Francisco (1906)", 1500],
              ["Messina (1908)", 87000],
              ["Ashgabat (1948)", 175000],
              ["Chile (1960)", 10000],
              ["Tian Shan (1976)", 242000],
              ["Armenia (1988)", 25000],
              ["Iran (1990)", 50000]
        ]};
 
        // create the chart
        var chart = anychart.bar();
 
        // add the data
        chart.data(data);
 
        // set the chart title
        chart.title("The deadliest earthquakes in the XXth century");
 
        // draw
        chart.container("container");
        chart.draw();
      });
    </script>
  </body>
</html>