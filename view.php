<?php
    $verify = $_POST['verify'];
    $roll = $_POST['roll'];
    $eventt = $_POST['event'];
    
    $connect = mysqli_connect("localhost", 'appbeta' , 'd4y6FmiwGPESYryC', "appbeta");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    $data_query = "SELECT * FROM certificates WHERE roll='$roll' and event='$eventt' or hash='$verify'";
    $result = mysqli_query($connect, $data_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $event = $row['event'];
        $hash = $row['hash'];
        $temp = $row['temp'];
        $rank = $row['position'];
    } else {
        echo "No record found for the provided data.";
    }
    
    $data_query = "SELECT name FROM events WHERE id='$event'";
    $result = mysqli_query($connect, $data_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $eventname = $row['name'];
    } else {
        echo "No record found for the provided data.";
    }

    // Close connection
    mysqli_close($connect);
    
    if ($temp == 0) {
        $image = imagecreatefromjpeg("files/0.jpg");
        //name
        $namefont = "files/font/BRUSHSCI.TTF";
        $namecolor = imagecolorallocate($image, 0, 0, 225);
        $namep = "720";
        $nameSize = 75;
        $textInfo = imagettfbbox($nameSize, 0, $namefont, $name);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $namex = ($imageWidth - $textWidth) / 2;
        
        //message
        $message = "for participating in Eminence 2k24 \"$eventname\" conducted by";
        $messagefont = "files/font/ALEGREYA.TTF";
        $messagecolor = imagecolorallocate($image, 9, 10, 14);
        $messagep = "840";
        $messageSize = 38;
        $textInfo = imagettfbbox($messageSize, 0, $messagefont, $message);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $messagex = ($imageWidth - $textWidth) / 2;
        
        //hash
        $hash = "ID : $hash";
        $hashfont = "files/font/ARCHIVOBLACK.TTF";
        $hashcolor = imagecolorallocate($image, 9, 10, 14);
        $hashp = "1290";
        $hashSize = 18;
        $textInfo = imagettfbbox($hashSize, 0, $hashfont, $hash);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $hashx = ($imageWidth - $textWidth) / 2;
    } else if ($temp == 1) {
        $image = imagecreatefromjpeg("files/1.jpg");
        //name
        $namefont = "files/font/BRUSHSCI.TTF";
        $namecolor = imagecolorallocate($image, 0, 0, 0);
        $namep = "720";
        $nameSize = 75;
        $textInfo = imagettfbbox($nameSize, 0, $namefont, $name);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $namex = ($imageWidth - $textWidth) / 2;
        
        //message
        $message = "for achieving \"$rank\" position in the event Eminence 2k24 \"$eventname\"";
        $messagefont = "files/font/PlayfairDisplay.ttf";
        $messagecolor = imagecolorallocate($image, 52, 52, 52);
        $messagep = "820";
        $messageSize = 30;
        $textInfo = imagettfbbox($messageSize, 0, $messagefont, $message);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $messagex = ($imageWidth - $textWidth) / 2;
        
        //hash
        $hash = "ID : $hash";
        $hashfont = "files/font/ARCHIVOBLACK.TTF";
        $hashcolor = imagecolorallocate($image, 9, 10, 14);
        $hashp = "1240";
        $hashSize = 18;
        $textInfo = imagettfbbox($hashSize, 0, $hashfont, $hash);
        $textWidth = $textInfo[4] - $textInfo[0];
        $imageWidth = imagesx($image);
        $hashx = ($imageWidth - $textWidth) / 2;
        } else if ($event == 15) {
            
                $image = imagecreatefromjpeg("files/2.jpg");
                //name
                $namefont = "files/font/BRUSHSCI.TTF";
                $namecolor = imagecolorallocate($image, 221, 172, 0);
                $namep = "750";
                $nameSize = 75;
                $textInfo = imagettfbbox($nameSize, 0, $namefont, $name);
                $textWidth = $textInfo[4] - $textInfo[0];
                $imageWidth = imagesx($image);
                $namex = ($imageWidth - $textWidth) / 2;
                
                //message
                $message = " ";
                $messagefont = "files/font/PlayfairDisplay.ttf";
                $messagecolor = imagecolorallocate($image, 52, 52, 52);
                $messagep = "820";
                $messageSize = 30;
                $textInfo = imagettfbbox($messageSize, 0, $messagefont, $message);
                $textWidth = $textInfo[4] - $textInfo[0];
                $imageWidth = imagesx($image);
                $messagex = ($imageWidth - $textWidth) / 2;
                
                //hash
                $hash = "ID : $hash";
                $hashfont = "files/font/ARCHIVOBLACK.TTF";
                $hashcolor = imagecolorallocate($image, 9, 10, 14);
                $hashp = "1280";
                $hashSize = 18;
                $textInfo = imagettfbbox($hashSize, 0, $hashfont, $hash);
                $textWidth = $textInfo[4] - $textInfo[0];
                $imageWidth = imagesx($image);
                $hashx = ($imageWidth - $textWidth) / 2;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Download Certificate</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .registration-container {
      width: auto;
      opacity: 0;
      transform: translateY(20px);
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 0.5s ease forwards;
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 80%; /* Setting maximum width for the container */
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    button {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      margin-top: 20px;
    }

    button:hover {
      background-color: #45a049;
      transform: scale(1.05);
    }

    /* Adjusting image size based on screen width */
    img {
      max-width: 80%;
      height: auto;
    }

    @media only screen and (min-width: 768px) {
      img {
        max-width: 60%;
      }
    }
  </style>
</head>
<body>
  
    <?php
    if ($name != '') {
      ob_start();
      imagettftext($image, $nameSize, 0, $namex, $namep, $namecolor, $namefont, $name);
      imagettftext($image, $messageSize, 0, $messagex, $messagep, $messagecolor, $messagefont, $message);
      imagettftext($image, $hashSize, 0, $hashx, $hashp, $hashcolor, $hashfont, $hash);
      imagejpeg($image);
      imagedestroy($image);
      $image_data = ob_get_contents();
      ob_end_clean();
      $base64 = base64_encode($image_data);
      echo '<div class="registration-container">
            <img src="data:image/jpeg;base64,'.$base64.'" alt="Certificate">
            <button onclick="downloadCertificate()">Download Certificate</button>
            </div>';
    }
    ?>

  <script>
    function downloadCertificate() {
      var link = document.createElement('a');
      link.href = 'data:image/jpeg;base64,<?php echo $base64; ?>';
      link.download = 'senpaihost-certificate.jpg';
      link.click();
    }
  </script>
</body>
</html>
