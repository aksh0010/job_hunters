<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'header2.php';
    require './connection.php';

    $user_search = $_POST['search_job'];
    // Run SQL query
    $sql = "SELECT `title`, `description` FROM `jobs` WHERE `description` LIKE ?";
    $stmt = $conn->prepare($sql);
    

    $search_term = "%$user_search%";
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $result = $stmt->get_result();


    // $sql = "SELECT  `title`, `description`FROM `jobs` WHERE `description` like %$user_search% ;";
    // $result = $conn->query($sql);

    // Output result in HTML table

    if ($result->num_rows > 0) {
        // Login successful
        echo <<<HTML
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
HTML;
        while ($row = $result->fetch_assoc()) {
            echo <<<HTML
            <tr>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
            </tr>
HTML;
        }
        echo "</table>";

    } else {
        echo "<br>No matching Jobs";
        // Login failed
        // ...
    }
}

// Include the CSS code in the head section of your HTML document
echo <<<HTML
<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 800px;
                margin: 0 auto;
            }
            th, td {
                text-align: left;
                padding: 8px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
HTML;

// Your HTML and PHP code here

echo <<<HTML
    </body>
</html>
HTML;
