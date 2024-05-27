<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: fit-content;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-select {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        select {
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding-block: 10px;
            margin: 5px 0 10px 0;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .edit-link,
        .delete-link {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .edit-link:hover,
        .delete-link:hover {
            text-decoration: underline;
        }

        .table-body {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    // Пример значения переменной $aim
    $aim = isset($_GET['aim']) ? $_GET['aim'] : 'users';
    ?>

    <div class="container">
        <h1>Admin Panel</h1>
        <div class="table-select">
            <h2>Table:</h2>
            <form id="tableSelectForm" method="get" action="">
                <select name="aim" onchange="this.form.submit()">
                    <option value="users" <?php if ($aim === 'users')
                        echo 'selected'; ?>>Users</option>
                    <option value="products" <?php if ($aim === 'products')
                        echo 'selected'; ?>>Products</option>
                </select>
            </form>
        </div>

        <h2>Add New Record</h2>
        <?php
        // Fetch and display existing records
        include 'server_part/boot.php';
        $pdo = pdo();

        $stmt = $pdo->query('SELECT * FROM ' . $aim);

        $stmt2 = $pdo->query('SELECT * FROM ' . $aim);
        $table = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <form id="addForm" method="post" action="server_part/admin/add_record.php">
            <?php
            echo '<input type="hidden" name="table" value="' . $aim . '">';
            foreach ($table as $key => $value) {
                if ($key !== 'id') {
                    echo '<label for="' . $key . '">' . htmlspecialchars($key) . ':</label>';
                    echo '<input type="text" name="' . $key . '">';
                }
            }
            ?>
            <input type="submit" value="Add Record">
        </form>

        <h2>Edit Records</h2>
        <table class="table-body">
            <thead>
                <tr>
                    <?php
                    foreach ($table as $key => $value) {
                        echo '<th>' . htmlspecialchars($key) . '</th>';
                    }
                    ?>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display existing records
                $pdo = pdo();
                $stmt2 = $pdo->query('SELECT * FROM ' . $aim);
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    foreach ($table as $key => $value) {
                        echo '<td>' . htmlspecialchars($row[$key]) . '</td>';
                    }
                    echo '<td>';
                    echo '<a class="edit-link" href="admin.php?id=' . htmlspecialchars($row['id']) . '&aim=' . $aim . '">Edit</a>';
                    echo '<a class="delete-link" href="server_part/admin/delete_record.php?id=' . htmlspecialchars($row['id']) . '&table=' . $aim . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                // Edit record
                if (isset($_GET['id'])) {
                    $pdo = pdo();
                    $stmt3 = $pdo->prepare('SELECT * FROM ' . $aim . ' WHERE id = :id');
                    $stmt3->execute(['id' => $_GET['id']]);

                    $row = $stmt3->fetch(PDO::FETCH_ASSOC);
                    echo '<form method="post" action="server_part/admin/update_record.php">';
                    echo '<input type="hidden" name="table" value="' . $aim . '">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($_GET['id']) . '">';
                    foreach ($table as $key => $value) {
                        if ($key !== 'id') {
                            echo '<label for="' . $key . '">' . htmlspecialchars($key) . ':</label>';
                            echo '<input type="text" name="' . $key . '" value="' . htmlspecialchars($row[$key]) . '">';
                        }
                    }
                    echo '<input type="submit" value="Save">';
                    echo '</form>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>