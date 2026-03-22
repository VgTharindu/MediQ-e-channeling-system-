<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Channel Registration - MediQ</title>
</head>
<body>

<?php
// ── Database connection ──────────────────────────────────────────────────────
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "mediq";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}

// ── Read doctor details from GET parameters (passed from channeling.php) ─────
$doc_id         = isset($_GET['doc_id'])         ? trim(mysqli_real_escape_string($conn, $_GET['doc_id']))         : '';
$doctor_name    = isset($_GET['doctor_name'])     ? trim(mysqli_real_escape_string($conn, $_GET['doctor_name']))    : '';
$specialisation = isset($_GET['specialisation'])  ? trim(mysqli_real_escape_string($conn, $_GET['specialisation'])) : '';
$date_time      = isset($_GET['date_time'])       ? trim(mysqli_real_escape_string($conn, $_GET['date_time']))      : '';
$hospital       = isset($_GET['hospital'])        ? trim(mysqli_real_escape_string($conn, $_GET['hospital']))       : '';
$location       = isset($_GET['location'])        ? trim(mysqli_real_escape_string($conn, $_GET['location']))       : '';

// ── Handle form submission ───────────────────────────────────────────────────
$success_message = '';
$error_message   = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Read hidden doctor fields from POST (kept in form as hidden inputs)
    $doc_id         = trim(mysqli_real_escape_string($conn, $_POST['doc_id']));
    $doctor_name    = trim(mysqli_real_escape_string($conn, $_POST['doctor_name']));
    $specialisation = trim(mysqli_real_escape_string($conn, $_POST['specialisation']));
    $date_time      = trim(mysqli_real_escape_string($conn, $_POST['date_time']));
    $hospital       = trim(mysqli_real_escape_string($conn, $_POST['hospital']));
    $location       = trim(mysqli_real_escape_string($conn, $_POST['location']));

    // Read patient fields
    $pname    = trim(mysqli_real_escape_string($conn, $_POST['pname']));
    $age      = trim(mysqli_real_escape_string($conn, $_POST['age']));
    $gender   = isset($_POST['Gender']) ? trim(mysqli_real_escape_string($conn, $_POST['Gender'])) : '';
    $pnumber  = trim(mysqli_real_escape_string($conn, $_POST['pnumber']));
    $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));

    if (empty($pname) || empty($age) || empty($gender) || empty($pnumber) || empty($idnumber)) {
        $error_message = 'All fields are required. Please fill out the form completely.';
    } elseif (empty($doc_id)) {
        $error_message = 'Doctor information is missing. Please go back and select a doctor.';
    } else {
        // 1. Insert into the original patient table (keeps existing behaviour)
        $sql_patient = "INSERT INTO patient (Name, Age, Gender, phone, id_number)
                        VALUES ('$pname', '$age', '$gender', '$pnumber', '$idnumber')";
        mysqli_query($conn, $sql_patient);

        // 2. Insert full appointment record into channeling_appointments
        $sql_appt = "INSERT INTO channeling_appointments
                        (patient_name, age, gender, phone, id_number,
                         doc_id, doctor_name, specialisation, date_time, hospital, location)
                     VALUES
                        ('$pname', '$age', '$gender', '$pnumber', '$idnumber',
                         '$doc_id', '$doctor_name', '$specialisation', '$date_time', '$hospital', '$location')";

        if (mysqli_query($conn, $sql_appt)) {
            $success_message = 'success';
        } else {
            $error_message = 'Database error: ' . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!-- ── Success overlay ──────────────────────────────────────────────────────── -->
<?php if ($success_message === 'success'): ?>
<div class="success-overlay" id="successOverlay">
    <div class="success-card">
        <div class="success-icon">✓</div>
        <h2>Booking Confirmed!</h2>
        <p>Your appointment has been successfully registered.</p>
        <div class="success-detail">
            <span>On the relevant day, go to <strong><?php echo htmlspecialchars($hospital); ?></strong>,
            present your <strong>ID card</strong> and make the payment.</span>
        </div>
        <a href="channeling.php" class="success-btn">Back to Channeling</a>
    </div>
</div>
<?php endif; ?>

<!-- ── Main card ─────────────────────────────────────────────────────────────── -->
<div class="page-wrap">

    <!-- Doctor info banner -->
    <?php if (!empty($doctor_name)): ?>
    <div class="doc-banner">
        <div class="doc-banner-title">Your Selected Appointment</div>
        <div class="doc-info-grid">
            <div class="doc-info-item">
                <span class="doc-label">Doctor</span>
                <span class="doc-value"><?php echo htmlspecialchars($doctor_name); ?></span>
            </div>
            <div class="doc-info-item">
                <span class="doc-label">Specialisation</span>
                <span class="doc-value"><?php echo htmlspecialchars($specialisation); ?></span>
            </div>
            <div class="doc-info-item">
                <span class="doc-label">Schedule</span>
                <span class="doc-value"><?php echo htmlspecialchars($date_time); ?></span>
            </div>
            <div class="doc-info-item">
                <span class="doc-label">Hospital</span>
                <span class="doc-value"><?php echo htmlspecialchars($hospital); ?></span>
            </div>
            <div class="doc-info-item">
                <span class="doc-label">Location</span>
                <span class="doc-value"><?php echo htmlspecialchars($location); ?></span>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="doc-banner doc-banner-warn">
        <p>⚠ No doctor selected. <a href="channeling.php" style="color:#fff;text-decoration:underline;">Go back and choose a doctor.</a></p>
    </div>
    <?php endif; ?>

    <!-- Registration form -->
    <div class="register">
        <h1 class="title">Patient Registration</h1>

        <?php if (!empty($error_message)): ?>
        <div class="error-msg"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <!-- Hidden doctor fields — carry doctor info through POST -->
            <input type="hidden" name="doc_id"         value="<?php echo htmlspecialchars($doc_id); ?>">
            <input type="hidden" name="doctor_name"    value="<?php echo htmlspecialchars($doctor_name); ?>">
            <input type="hidden" name="specialisation" value="<?php echo htmlspecialchars($specialisation); ?>">
            <input type="hidden" name="date_time"      value="<?php echo htmlspecialchars($date_time); ?>">
            <input type="hidden" name="hospital"       value="<?php echo htmlspecialchars($hospital); ?>">
            <input type="hidden" name="location"       value="<?php echo htmlspecialchars($location); ?>">

            <label>Patient Name:</label><br>
            <input type="text" name="pname" class="inp" placeholder="Full name" required><br>

            <label>Age:</label><br>
            <input type="number" name="age" class="inp" min="0" max="150" placeholder="Age" required><br>

            <label>Gender:</label><br>
            <label>Male</label>
            <input type="radio" name="Gender" value="male" required>&nbsp;&nbsp;&nbsp;
            <label>Female</label>
            <input type="radio" name="Gender" value="female" required><br>

            <label>Phone Number:</label><br>
            <input type="tel" name="pnumber" class="inp" placeholder="07X XXXXXXX" required><br>

            <label>ID Number:</label><br>
            <input type="text" name="idnumber" class="inp" placeholder="NIC number" required><br>

            <button type="submit" class="submit_button">Confirm Booking</button>
        </form>
    </div>

</div>

</body>
</html>