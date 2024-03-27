<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="files/styles.css">
  <title>Download Certificate</title>
</head>
<body>
  <div class="registration-container">
    <form action="/view" method="post">
      <label for="roll">Your Roll No.</label>
      <input type="number" id="roll" name="roll" required>
      <label for="event">Select Event:</label>
      <select name="event" id="event" required>
        <?php
        $connect = mysqli_connect("localhost", 'appbeta' , 'd4y6FmiwGPESYryC', "appbeta");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        
        $sql = "SELECT * FROM events";
        $result = $connect->query($sql);
    
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
            }
        } else {
            echo "0 results";
        }
        $connect->close();
        ?>
      </select>
      <button type="submit">Get Your Certificate Now!</button>
    </form>
  </div>
</body>
</html>