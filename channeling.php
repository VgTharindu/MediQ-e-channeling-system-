<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Channeling - MediQ</title>
    <link href="logo/assistance.png" rel="icon">
    <link href="channeling.css" rel="stylesheet">
    <link href="about.css" rel="stylesheet">
</head>
<body>
    <div class="theam">
       <div class="logo"><img src="logo/assistance.png" class="logo_pic"></div>
       <div class="name">MediQ</div>
       <div class="sub_name">Channeling Center</div>
    </div>
    <hr>
    <div class="home_button">
        <a href="home.html"><img src="logo/home.png" width="50px" style="position:fixed; right:10px; top:10px;" class="home"></a>
    </div>

    <div class="nvb">
        <div class="chn">
            <a href="channeling.php">
            <div class="pic"></div>
            <div class="nm">Channeling</div></a>
        </div>
        <div class="bmi">
            <a href="bmi.html" class="c_link">
            <div class="pic" id="pic_2"></div>
            <div class="nm">BMI Calculator</div></a>
        </div>
        <div class="lungh">
            <a href="lung.html">
            <div class="pic" id="pic_3"></div>
            <div class="nm">Lung Tester</div></a>
        </div>
        <div class="inf">
            <a href="medi_information.html">
            <div class="pic" id="pic_4"></div>
            <div class="nm">Medical Information</div></a>
        </div>
    </div>

    <div class="srch">
        <form action="" method="post">
            <div class="tags" id="tags_1">
                <div class="tags_1">Specialization</div>
                <select class="spec" name="specific">
                    <option value="0">-Select Specialization-</option>
                    <option value="1" <?php if(isset($_POST['specific']) && $_POST['specific']=='1') echo 'selected'; ?>>Physician</option>
                    <option value="2" <?php if(isset($_POST['specific']) && $_POST['specific']=='2') echo 'selected'; ?>>Radiologist</option>
                    <option value="3" <?php if(isset($_POST['specific']) && $_POST['specific']=='3') echo 'selected'; ?>>Cariologist</option>
                    <option value="4" <?php if(isset($_POST['specific']) && $_POST['specific']=='4') echo 'selected'; ?>>ENT Surgeon</option>
                </select>
            </div>
            <div class="tags">
                <div class="tags_1">Hospital</div>
                <select class="spec" name="hospital">
                    <option value="0">-Select Hospital-</option>
                    <option value="1" <?php if(isset($_POST['hospital']) && $_POST['hospital']=='1') echo 'selected'; ?>>Asiri</option>
                </select>
            </div>
            <div class="tags">
                <div class="tags_1">Location</div>
                <select class="spec" name="location">
                    <option value="0">-Select Location-</option>
                    <option value="1" <?php if(isset($_POST['location']) && $_POST['location']=='1') echo 'selected'; ?>>Matara</option>
                    <option value="2" <?php if(isset($_POST['location']) && $_POST['location']=='2') echo 'selected'; ?>>Galle</option>
                </select>
            </div>
            <div class="tags_bu">
                <button type="submit" class="bu1" name="sub">Check Now</button>
            </div>
        </form>
    </div>

    <div class="table">

    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "mediq";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['sub'])) {

        $specMap = [
            "1" => "physician",
            "2" => "Radiologist",
            "3" => "Cariologist",
            "4" => "ENT Sugeon"
        ];
        $hospMap = ["1" => "Asiri"];
        $locMap  = ["1" => "Matara", "2" => "Galle"];

        $spec = isset($specMap[$_POST["specific"]]) ? $specMap[$_POST["specific"]] : "";
        $hosp = isset($hospMap[$_POST["hospital"]]) ? $hospMap[$_POST["hospital"]] : "";
        $loc  = isset($locMap[$_POST["location"]])  ? $locMap[$_POST["location"]]  : "";

        $conditions = [];
        if ($spec) $conditions[] = "LOWER(specialisation) = '" . strtolower(mysqli_real_escape_string($con, $spec)) . "'";
        if ($hosp) $conditions[] = "LOWER(hospital) = '"       . strtolower(mysqli_real_escape_string($con, $hosp)) . "'";
        if ($loc)  $conditions[] = "LOWER(location) = '"       . strtolower(mysqli_real_escape_string($con, $loc))  . "'";

        $query = "SELECT * FROM doctors";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "<p style='color:red;'>Error: " . mysqli_error($con) . "</p>";
        } elseif (mysqli_num_rows($result) == 0) {
            echo "<p>No doctors found for the selected criteria.</p>";
        } else {
            echo "<table>";
            echo "<tr>
                <th>Doctor Name</th>
                <th>Date &amp; Time</th>
                <th>Channel</th>
                </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                // Pass all doctor info as GET parameters to login.php
                $params = http_build_query([
                    'doc_id'        => $row['doc_id'],
                    'doctor_name'   => $row['name'],
                    'specialisation'=> $row['specialisation'],
                    'date_time'     => $row['date_time'],
                    'hospital'      => $row['hospital'],
                    'location'      => $row['location']
                ]);

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name'])          . "</td>";
               // echo "<td>" . htmlspecialchars($row['specialisation']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_time'])      . "</td>";
               // echo "<td>" . htmlspecialchars($row['hospital'])       . "</td>";
                //echo "<td>" . htmlspecialchars($row['location'])       . "</td>";
                echo "<td><a href='login.php?" . $params . "'><button class='ch_bt'>Channel Now</button></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    mysqli_close($con);
    ?>

    </div>

    <!-- Footer / About -->
    <div class="bottom">
        <div class="bt1">
            <div class="bt_sub1"><img src="logo/assistance.png" class="bt_icon"></div>
            <div class="bt_sub2"><span>MediQ</span></div>
            <div class="bt_sub3"><span>The Best Medical Partner</span></div>
        </div>
        <div class="bt2">
            <div class="bt2_sub1">Trust Your Health
                <div class="button">Contact Us</div>
            </div>
            <div class="bt2_sub2">
                <div class="call"><img src="logo/phone-call.png" class="call_pic"></div>
                <div class="number">+9477 2010733</div>
            </div>
            <div class="bt2_sub3">
                <div class="socialmedia_icon1"><img src="logo/twitter (1).png" class="smi"></div>
                <div class="socialmedia_icon2"><img src="logo/facebook (3).png" class="smi"></div>
                <div class="socialmedia_icon3"><img src="logo/instagram (1).png" class="smi"></div>
                <div class="socialmedia_icon4"><img src="logo/message.png" class="smi"></div>
            </div>
            <div class="bt2_sub4"><img src="logo/Charity-Navigator-badge-Four-Star.png" class="bt_pic"></div>
        </div>
        <div class="bt3">
            <div class="bt3_sub1"><a href="home.html" class="bta">Home</a></div>
            <div class="bt3_sub1"><a href="channeling.php" class="bta">Meet your Doctor</a></div>
            <div class="bt3_sub2"><a href="bmi.html" class="bta">Test your BMI</a></div>
            <div class="bt3_sub3"><a href="lung.html" class="bta">Check your Lung</a></div>
            <div class="bt3_sub4"><a href="medi_information.html" class="bta">Learn about Diseases</a></div>
        </div>
        <div class="bt4">
            <div class="bt4_sub1"><span class="bta4">&copy; MediQ</span></div>
            <div class="bt4_sub2"><span class="bta4">All rights reserved.</span></div>
            <div class="bt4_sub3"><a href="#" class="bta4 bta4_u">Privacy Policy.</a></div>
            <div class="bt4_sub4"><a href="#" class="bta4 bta4_u">Terms &amp; Conditions.</a></div>
            <div class="bt4_sub5"><a href="#" class="bta4 bta4_u">FAQ.</a></div>
            <div class="bt4_sub6"><span class="bta4">Design and development by</span><br><a href="#" class="bta4 bta4_u">VgTharindu</a></div>
        </div>
    </div>

</body>
</html>