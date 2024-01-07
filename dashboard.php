<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="style_admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Judson:wght@700&display=swap" rel="stylesheet">

  <style>

.box {
  position: absolute;
}

#dashboard {
  top: 77px;
  left: 300px;
  width: 999px;
  height: 523px;
  border: 1px solid #999999;
  z-index: -1; 

}

#line-chart {
  top: 122px;
  left: 350px;
  width: 540px;
  height: 259px;
  background-color: #FFFFFE; /* Example background color */
  border-radius: 4px;
  z-index: -1; 
}

#countries {
  top: 122px;
  left: 910px;
  width: 357px;
  height: 448px;
  background-color: #FFFFFE; /* Example background color */
  border-radius: 4px;
  z-index: -1; 
}

#donutchart1 {
  top: 390px;
  left: 350px;
  width: 540px;
  height: 180px;
  background-color: #FFFFFE; /* Example background color */
  border-radius: 4px;
  z-index: -1; 
}

  /* CSS for the graph container */
  #graph-container {
      top: 122px;
      left: 350px;
      width: 442px;
      height: 160px;
      border: 1px solid #ccc;
      position: relative;
      padding: 40px;
    }

    /* CSS for the line */
    #line-graph {
      width: calc(100% - 80px);
      height: calc(100% - 80px);
      position: absolute;
      padding: auto;
      overflow: hidden;
    }

    /* Styling for the line */
    #line {
      stroke: blue;
      stroke-width: 2;
      fill: none;
    }

    /* Styling for axis labels */
    .axis-label {
      position: absolute;
      font-size: 12px;
    }



  </style>



  <head>

  </head>
  <body>


  <nav class="homepanel"></nav>
<nav class="navbar">
  <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="collection.php" >Collection</a></li>
    <li><a href="home_page.php" >Home</a></li>
    <li><a href="activity_log.php">Activity log</a></li>
    <li><a href="admin_panel.html">Log Out</a></li>
  </ul>
</nav>

        <div class="box" id="dashboard"></div>
        <div class="box" id="line-chart"></div>
        <div class="box" id="countries"></div>
        <div class="box" id="donutchart1"></div>

  
  <div id="graph-container">
    <svg id="line-graph"></svg>
    <div class="axis-label" style="bottom: 40px; left: 0;">1</div>
    <div class="axis-label" style="bottom: calc(100% - 40px); left: 0;">31</div>

  </div>

    <script>
    // JavaScript to draw the line graph
     // JavaScript to draw the line graph
     const data = [10, 15, 20, 25, 27, 30, 28, 29, 26, 22, 18, 12]; // Sample data for days in a month
    const months = [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    const svg = document.getElementById('line-graph');
    const width = svg.clientWidth;
    const height = svg.clientHeight;

    const xScale = width / 12;
    const yScale = height / 31;

    const points = data.map((d, i) => `${i * xScale},${height - d * yScale}`).join(' ');

    const line = document.createElementNS('http://www.w3.org/2000/svg', 'polyline');
    line.setAttribute('points', points);
    line.setAttribute('id', 'line');

    svg.appendChild(line);

    // Add x-axis month labels
    for (let i = 0; i < months.length; i++) {
      const label = document.createElement('div');
      label.textContent = months[i];
      label.className = 'axis-label';
      label.style.left = `${(i + 0.5) * xScale}px`;
      label.style.bottom = '0';
      document.getElementById('graph-container').appendChild(label);
    }
  </script>

    

  </body>
</html>