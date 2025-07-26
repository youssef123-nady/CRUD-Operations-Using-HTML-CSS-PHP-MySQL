<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>محل الحدايد</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="menu">
            <form method="post" class="form-container">
                <input type="number" placeholder="Write ID To Update Or Delete" name="id" class="box" step="1" />
                <input type="text" placeholder="Enter The Name" name="name" class="box" />
                <input type="number" placeholder="Enter The Price" name="price" class="box" step="0.1" />
                <input type="number" placeholder="Enter Private Price" name="private" class="box" step="0.1" />

                <input type="submit" value="Add" class="btn btn-add" name="add" />
                <input type="submit" value="Update" class="btn btn-update" name="update" />
                <input type="submit" value="Delete" class="btn btn-delete" name="delete" />
                <input type="submit" value="Search" class="btn btn-search" name="search" />
            </form>

            <button type="button" id="togglePrivateBtn" class="btn-toggle">Show Private Prices</button>

            <?php
            // Database connection
            @$host = 'localhost';
            @$user = 'root';
            @$pass = '';
            @$db = 'shop';

            $con = mysqli_connect($host, $user, $pass, $db);
            if (!$con) {
                die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
            }

            $id = isset($_POST['id']) && $_POST['id'] !== '' ? intval($_POST['id']) : null;
            $name = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';
            $price = isset($_POST['price']) && $_POST['price'] !== '' ? floatval($_POST['price']) : null;
            $private = isset($_POST['private']) && $_POST['private'] !== '' ? floatval($_POST['private']) : null;

            // ADD
            if (isset($_POST['add'])) {
                $fields = [];
                $values = [];

                if ($id !== null) {
                    $fields[] = 'id';
                    $values[] = $id;
                }
                if (!empty($name)) {
                    $fields[] = 'name';
                    $values[] = "'$name'";
                }
                if ($price !== null) {
                    $fields[] = 'price';
                    $values[] = $price;
                }
                if ($private !== null) {
                    $fields[] = 'private';
                    $values[] = $private;
                }

                if (!empty($fields)) {
                    $insert = "INSERT INTO products (" . implode(',', $fields) . ") VALUES (" . implode(',', $values) . ")";
                    if (!mysqli_query($con, $insert)) {
                        echo "<p class='error'>Insert Error: " . mysqli_error($con) . "</p>";
                    } else {
                        echo "<p class='success'>Inserted successfully!</p>";
                    }
                } else {
                    echo "<p class='error'>Provide at least one field to insert.</p>";
                }
            }

            // UPDATE
            if (isset($_POST['update'])) {
                if ($id !== null) {
                    $updates = [];
                    if (!empty($name)) $updates[] = "name='$name'";
                    if ($price !== null) $updates[] = "price=$price";
                    if ($private !== null) $updates[] = "private=$private";

                    if (!empty($updates)) {
                        $update = "UPDATE products SET " . implode(', ', $updates) . " WHERE id=$id";
                        if (!mysqli_query($con, $update)) {
                            echo "<p class='error'>Update Error: " . mysqli_error($con) . "</p>";
                        } else {
                            echo "<p class='success'>Updated successfully!</p>";
                        }
                    } else {
                        echo "<p class='error'>Provide at least one field to update.</p>";
                    }
                } else {
                    echo "<p class='error'>Please provide ID to update.</p>";
                }
            }

            // DELETE
            if (isset($_POST['delete'])) {
                if ($id !== null) {
                    $delete = "DELETE FROM products WHERE id=$id";
                    if (!mysqli_query($con, $delete)) {
                        echo "<p class='error'>Delete Error: " . mysqli_error($con) . "</p>";
                    } else {
                        echo "<p class='success'>Deleted successfully!</p>";
                    }
                } else {
                    echo "<p class='error'>Please enter an ID to delete.</p>";
                }
            }

            // SEARCH
            if (isset($_POST['search']) && !empty($name)) {
                $query = "SELECT * FROM products WHERE name LIKE '%$name%'";
            } else {
                $query = "SELECT * FROM products ORDER BY id ASC";
            }

            $result = mysqli_query($con, $query);
            ?>

            <div class="tbl">
                <table>
                    <caption>
                        "أَسْتَطِيعُ كُلَّ شَيْءٍ فِي الْمَسِيحِ الَّذِي يُقَوِّينِي." (في 4: 13)
                    </caption>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th class="private-col">private</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['price']}</td>
                                        <td class='private-col'><span class='private-value'>{$row['private']}</span></td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found.</td></tr>";
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('togglePrivateBtn');
        let isVisible = false;

        window.onload = () => {
            document.querySelectorAll('.private-value').forEach(el => {
                el.style.visibility = 'hidden';
            });
        };

        toggleBtn.addEventListener('click', () => {
            isVisible = !isVisible;
            document.querySelectorAll('.private-value').forEach(el => {
                el.style.visibility = isVisible ? 'visible' : 'hidden';
            });
            toggleBtn.textContent = isVisible ? 'Hide Private Prices' : 'Show Private Prices';
        });
    </script>
</body>

</html>
