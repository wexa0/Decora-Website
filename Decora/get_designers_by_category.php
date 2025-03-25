<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "decora";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['category'])) {
    $selectedCategory = $_POST['category'];

    if ($selectedCategory === 'all') {
        $query = "SELECT d.id, d.brandName, d.logoImgFileName, GROUP_CONCAT(dc.category SEPARATOR ', ') AS specialties
                  FROM Designer d
                  LEFT JOIN DesignerSpeciality ds ON d.id = ds.designerID
                  LEFT JOIN DesignCategory dc ON ds.designerCategoryID = dc.id
                  GROUP BY d.id";
    } else {
        $selectedCategory = ucfirst($selectedCategory); // Capitalize the first letter
        $query = "SELECT d.id, d.brandName, d.logoImgFileName, GROUP_CONCAT(dc.category SEPARATOR ', ') AS specialties
                  FROM Designer d
                  LEFT JOIN DesignerSpeciality ds ON d.id = ds.designerID
                  LEFT JOIN DesignCategory dc ON ds.designerCategoryID = dc.id
                  WHERE dc.category LIKE '%$selectedCategory%'
                  GROUP BY d.id";
    }

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die(json_encode(['error' => 'Error fetching designers']));
    }

    $designers = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $designers[] = $row;
    }

    echo json_encode($designers);

    // Close database connection
    mysqli_close($conn);
} else {
    die(json_encode(['error' => 'Category not specified']));
}
?>
