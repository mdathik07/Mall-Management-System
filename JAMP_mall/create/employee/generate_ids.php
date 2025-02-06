<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'mall');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to utf8mb4 for the connection
$conn->set_charset("utf8mb4");

// Check if 'department' parameter is passed in the URL
if (!isset($_GET['department'])) {
    echo "Error: Missing 'department' parameter.";
    exit;
}

// Get the 'department' parameter from the URL and sanitize it
$department = htmlspecialchars($_GET['department'], ENT_QUOTES, 'UTF-8');

// SQL query to count the number of employees in the specified department
$sql = "
    SELECT COUNT(employee_details.store_id) AS genid 
    FROM employee_details 
    JOIN stores ON employee_details.store_id = stores.id 
    WHERE stores.department COLLATE utf16_general_ci = ?
";

// Prepare and execute the query
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Error: Query preparation failed: " . $conn->error;
    exit;
}

// Bind the 'department' parameter to the query
$stmt->bind_param("s", $department);
$stmt->execute();

// Bind the result
$stmt->bind_result($genid);
$stmt->fetch();

// Check if the department exists
if ($genid === null) {
    echo "Error: Department not found.";
} else {
    // Format and output the generated ID
    echo $department[0] . str_pad($genid, 3, "0", STR_PAD_LEFT);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
