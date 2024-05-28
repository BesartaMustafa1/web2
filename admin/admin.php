<?php
session_start();
require_once("../mysql/dbconnector.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Handle logout
        if ($action == "logout") {
            session_destroy();
            header("Location: ../signup/signup.php");
            exit();
        }

        // Handle Authors CRUD
        if ($action == "insert_author") {
            $name = $_POST['name'];
            $sql = "INSERT INTO authors (name) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $name);
            $stmt->execute();
        } elseif ($action == "update_author") {
            $author_id = $_POST['author_id'];
            $name = $_POST['name'];
            $sql = "UPDATE authors SET name = ? WHERE author_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $name, $author_id);
            $stmt->execute();
        } elseif ($action == "delete_author") {
            $author_id = $_POST['author_id'];
            $sql = "DELETE FROM authors WHERE author_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $author_id);
            $stmt->execute();
        }

        // Handle Books CRUD
        elseif ($action == "insert_book") {
            $title = $_POST['title'];
            $author_id = $_POST['author_id'];
            $published_date = $_POST['published_date'];
            $isbn = $_POST['isbn'];
            $pages = $_POST['pages'];
            $sql = "INSERT INTO books (title, author_id, published_date, isbn, pages) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissi", $title, $author_id, $published_date, $isbn, $pages);
            $stmt->execute();
        } elseif ($action == "update_book") {
            $book_id = $_POST['book_id'];
            $title = $_POST['title'];
            $author_id = $_POST['author_id'];
            $published_date = $_POST['published_date'];
            $isbn = $_POST['isbn'];
            $pages = $_POST['pages'];
            $sql = "UPDATE books SET title = ?, author_id = ?, published_date = ?, isbn = ?, pages = ? WHERE book_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissii", $title, $author_id, $published_date, $isbn, $pages, $book_id);
            $stmt->execute();
        } elseif ($action == "delete_book") {
            $book_id = $_POST['book_id'];
            $sql = "DELETE FROM books WHERE book_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $book_id);
            $stmt->execute();
        }

        // Handle Members CRUD
        elseif ($action == "insert_member") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            $sql = "INSERT INTO members (name, email, phone, join_date) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $phone, $join_date);
            $stmt->execute();
        } elseif ($action == "update_member") {
            $member_id = $_POST['member_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            $sql = "UPDATE members SET name = ?, email = ?, phone = ?, join_date = ? WHERE member_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $name, $email, $phone, $join_date, $member_id);
            $stmt->execute();
        } elseif ($action == "delete_member") {
            $member_id = $_POST['member_id'];
            $sql = "DELETE FROM members WHERE member_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $member_id);
            $stmt->execute();
        }

        // Handle Users CRUD
        elseif ($action == "insert_user") {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $sql = "INSERT INTO users (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $username, $password, $first_name, $last_name, $email);
            $stmt->execute();
        } elseif ($action == "update_user") {
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $sql = "UPDATE users SET username = ?, password = ?, first_name = ?, last_name = ?, email = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $username, $password, $first_name, $last_name, $email, $user_id);
            $stmt->execute();
        } elseif ($action == "delete_user") {
            $user_id = $_POST['user_id'];
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
        }

        // Handle Spaces CRUD
        elseif ($action == "insert_space") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $detail_page = $_POST['detail_page'];
            $sql = "INSERT INTO spaces (name, price, image_url, detail_page) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdss", $name, $price, $image_url, $detail_page);
            $stmt->execute();
        } elseif ($action == "update_space") {
            $space_id = $_POST['space_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $detail_page = $_POST['detail_page'];
            $sql = "UPDATE spaces SET name = ?, price = ?, image_url = ?, detail_page = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdssi", $name, $price, $image_url, $detail_page, $space_id);
            $stmt->execute();
        } elseif ($action == "delete_space") {
            $space_id = $_POST['space_id'];
            $sql = "DELETE FROM spaces WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $space_id);
            $stmt->execute();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <h1>Admin Dashboard</h1>
            <form method="POST" action="">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="logout-button">Logout</button>
            </form>

            <!-- Authors Section -->
            <div class="form-section">
                <h2>Authors</h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="insert_author">
                    <input type="text" name="name" placeholder="Author Name" required>
                    <button type="submit">Add Author</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM authors";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['author_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td class='actions'>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='update_author'>
                                            <input type='hidden' name='author_id' value='{$row['author_id']}'>
                                            <input type='text' name='name' value='{$row['name']}' required>
                                            <button type='submit'>Update</button>
                                        </form>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='delete_author'>
                                            <input type='hidden' name='author_id' value='{$row['author_id']}'>
                                            <button type='submit'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Books Section -->
            <div class="form-section">
                <h2>Books</h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="insert_book">
                    <input type="text" name="title" placeholder="Book Title" required>
                    <input type="number" name="author_id" placeholder="Author ID" required>
                    <input type="date" name="published_date" placeholder="Published Date" required>
                    <input type="text" name="isbn" placeholder="ISBN" required>
                    <input type="number" name="pages" placeholder="Pages" required>
                    <button type="submit">Add Book</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author ID</th>
                            <th>Published Date</th>
                            <th>ISBN</th>
                            <th>Pages</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM books";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['book_id']}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['author_id']}</td>
                                    <td>{$row['published_date']}</td>
                                    <td>{$row['isbn']}</td>
                                    <td>{$row['pages']}</td>
                                    <td class='actions'>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='update_book'>
                                            <input type='hidden' name='book_id' value='{$row['book_id']}'>
                                            <input type='text' name='title' value='{$row['title']}' required>
                                            <input type='number' name='author_id' value='{$row['author_id']}' required>
                                            <input type='date' name='published_date' value='{$row['published_date']}' required>
                                            <input type='text' name='isbn' value='{$row['isbn']}' required>
                                            <input type='number' name='pages' value='{$row['pages']}' required>
                                            <button type='submit'>Update</button>
                                        </form>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='delete_book'>
                                            <input type='hidden' name='book_id' value='{$row['book_id']}'>
                                            <button type='submit'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Members Section -->
            <div class="form-section">
                <h2>Members</h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="insert_member">
                    <input type="text" name="name" placeholder="Member Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone" required>
                    <input type="date" name="join_date" placeholder="Join Date" required>
                    <button type="submit">Add Member</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Join Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM members";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['member_id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['join_date']}</td>
                                    <td class='actions'>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='update_member'>
                                            <input type='hidden' name='member_id' value='{$row['member_id']}'>
                                            <input type='text' name='name' value='{$row['name']}' required>
                                            <input type='email' name='email' value='{$row['email']}' required>
                                            <input type='text' name='phone' value='{$row['phone']}' required>
                                            <input type='date' name='join_date' value='{$row['join_date']}' required>
                                            <button type='submit'>Update</button>
                                        </form>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='delete_member'>
                                            <input type='hidden' name='member_id' value='{$row['member_id']}'>
                                            <button type='submit'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Users Section -->
            <div class="form-section">
                <h2>Users</h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="insert_user">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <button type="submit">Add User</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['first_name']}</td>
                                    <td>{$row['last_name']}</td>
                                    <td>{$row['email']}</td>
                                    <td class='actions'>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='update_user'>
                                            <input type='hidden' name='user_id' value='{$row['id']}'>
                                            <input type='text' name='username' value='{$row['username']}' required>
                                            <input type='password' name='password' placeholder='New Password'>
                                            <input type='text' name='first_name' value='{$row['first_name']}' required>
                                            <input type='text' name='last_name' value='{$row['last_name']}' required>
                                            <input type='email' name='email' value='{$row['email']}' required>
                                            <button type='submit'>Update</button>
                                        </form>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='delete_user'>
                                            <input type='hidden' name='user_id' value='{$row['id']}'>
                                            <button type='submit'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Spaces Section -->
            <div class="form-section">
                <h2>Spaces</h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="insert_space">
                    <input type="text" name="name" placeholder="Space Name" required>
                    <input type="number" name="price" placeholder="Price" required>
                    <input type="text" name="image_url" placeholder="Image URL" required>
                    <input type="text" name="detail_page" placeholder="Detail Page" required>
                    <button type="submit">Add Space</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image URL</th>
                            <th>Detail Page</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM spaces";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['image_url']}</td>
                                    <td>{$row['detail_page']}</td>
                                    <td class='actions'>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='update_space'>
                                            <input type='hidden' name='space_id' value='{$row['id']}'>
                                            <input type='text' name='name' value='{$row['name']}' required>
                                            <input type='number' name='price' value='{$row['price']}' required>
                                            <input type='text' name='image_url' value='{$row['image_url']}' required>
                                            <input type='text' name='detail_page' value='{$row['detail_page']}' required>
                                            <button type='submit'>Update</button>
                                        </form>
                                        <form method='POST' action='' style='display:inline;'>
                                            <input type='hidden' name='action' value='delete_space'>
                                            <input type='hidden' name='space_id' value='{$row['id']}'>
                                            <button type='submit'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

