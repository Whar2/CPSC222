<?php
function Input($data) {
    return htmlspecialchars(trim($data));
}

// Check if isoDate parameter is present in the URL
if(isset($_GET["isoDate"])) {
    $isoDate = $_GET["isoDate"];
    $prettyDate = "";
    $birthdate = date("F j, Y h:i A", strtotime($isoDate)); // Convert ISO date to pretty format
} else {
    // the data Janitor
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $day = isset($_POST["day"]) ? Input($_POST["day"]) : "";
        $month = isset($_POST["month"]) ? Input($_POST["month"]) : "";
        $year = isset($_POST["year"]) ? Input($_POST["year"]) : "";
        $hour = isset($_POST["hour"]) ? Input($_POST["hour"]) : "";
        $minute = isset($_POST["minute"]) ? Input($_POST["minute"]) : "";
        $ampm = isset($_POST["ampm"]) ? Input($_POST["ampm"]) : "";

        $hour = ($ampm == "PM" && $hour != 12) ? $hour + 12 : $hour;
        $hour = ($ampm == "AM" && $hour == 12) ? 0 : $hour;

        $birthdate = "$year-$month-$day $hour:$minute:00";
        $prettyDate = date("F j, Y h:i A", strtotime($birthdate));
        $isoDate = date("Y-m-d H:i:s", strtotime($birthdate));
    } else {
        $prettyDate = "";
        $isoDate = "";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
    <h1>Birthday Formatter</h1>

    <?php if (isset($_GET["isoDate"])) : ?>
        <table border='1'>
            <tr>
                <th>ISO format:</th>
                <td><?php echo $isoDate; ?></td>
            </tr>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <table border='1'>
            <tr>
                <th>Pretty date:</th>
                <td><?php echo $prettyDate; ?></td>
            </tr>
            <tr>
                <th>ISO format:</th>
                <td><a href='?isoDate=<?php echo urlencode($isoDate); ?>'>Show date in ISO Format</a></td>
            </tr>
        </table>
    <?php else : ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table border='1'>
                <tr>
                    <th><label for="day">Day:</label></th>
                    <td>
                        <select name="day" id="day" required>
                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="month">Month:</label></th>
                    <td>
                        <select name="month" id="month" required>
                            <?php
                            $months = array(
                                "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                                "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                                "09" => "September", "10" => "October", "11" => "November", "12" => "December"
                            );
                            foreach ($months as $key => $value) : ?>
                                <option value='<?php echo $key; ?>'><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="year">Year:</label></th>
                    <td>
                        <select name="year" id="year" required>
                            <?php
                            $currentYear = date("Y");
                            $startYear = $currentYear - 100;
                            $endYear = $currentYear;
                            for ($i = $endYear; $i >= $startYear; $i--) : ?>
                                <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
</tr>
                <tr>
                    <th><label for="hour">Hour:</label></th>
                    <td>
                        <select name="hour" id="hour" required>
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="minute">Minute:</label></th>
                    <td>
                        <select name="minute" id="minute" required>
                            <?php for ($i = 0; $i <= 59; $i++) : ?>
                                <option value='<?php echo sprintf("%02d", $i); ?>'><?php echo sprintf("%02d", $i); ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="ampm">AM/PM:</label></th>
                    <td>
                        <select name="ampm" id="ampm" required>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </td>
                </tr>
                    <td colspan="2" style="text-align: center;"//if you look at this code from the side, it looks like hills>
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
        
