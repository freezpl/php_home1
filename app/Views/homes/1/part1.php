<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
    <h2>Calendar</h2>
    <form action="/homes/1/part1/calendar" method="post" >
    <div class="form-group">
    <label for="inputMonth">Number of month in 2020: </label>
    <input type="number" class="form-control" id="inputMonth" name="month" 
    placeholder="Enter month of 2020 year" value = <?php echo ($this->data != null) ? $this->data['monthNum'] : 1 ?> max= 12 min =1>
    </div>
    <button type="submit" class="btn btn-primary">Show calendar</button>
    </form>
    <?php if($this->data != null){
        $calendar = $this->data['calendar']; 
        echo "<h4>".$this->data['month']."</h4>";
        echo "<div class='calendar'>";
        echo <<<EOT
        <div class='calendar-row'>
        <div class='day day-title'>Mon</div>
        <div class='day day-title'>Tue</div>
        <div class='day day-title'>Wed</div>
        <div class='day day-title'>Thu</div>
        <div class='day day-title'>Fri</div>
        <div class='day day-title'>Sat</div>
        <div class='day day-title'>Sun</div>
        </div>
EOT;
        for ($i=0; $i < count($calendar); $i++){  
            echo "<div class='calendar-row'>";
            for ($j=0; $j < 7; $j++) {
                if($calendar[$i][$j] == 0){
                    echo "<div class='day'></div>";
                }
                else if($j < 5){
                    echo "<div class='day day-weekday'>".$calendar[$i][$j]."</div>";
                }
                else{
                    echo "<div class='day day-holyday'>".$calendar[$i][$j]."</div>";
                }
            }
            echo "</div>";
        }

        echo "</div>";
    }
    ?>
</div>
</div>
</div>