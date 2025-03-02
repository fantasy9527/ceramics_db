<?php
if (!isset($_GET["id"])) {
    header("location: frozenUsers.php");
}
$id = $_GET["id"];

require_once("../ceramics_db_connect.php");
$sql = "SELECT * FROM users WHERE id = $id AND valid=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$userCount = $result->num_rows;
// var_dump($row);

?>

<!doctype html>
<html lang="zh-TW">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("../css.php") ?>
    <style>
        .user-table {
            border-radius: 0;
            /* border:none; */
            box-shadow: none;
        }
    </style>
</head>

<body class="g-sidenav-show">
    <!-- aside -->
    <?php include("../aside.php") ?>

    <main class="main-content position-relative max-height-vh-100 h-100  ">
        <!-- Navbar -->
        <?php include("../navbar.php") ?>

        <!-- frozenUser -->
        <div class="container py-2">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="d-flex align-items-center mb-4 mx-4 p-2">
                        <div><i class="fa-solid fa-user-group fa-2x me-2"></i></div>
                        <div>
                            <h2>停權會員資料</h2>
                        </div>
                    </div>
                    <div class="card mb-4 mx-4 p-3">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div class="col-12">
                                <?php if ($userCount > 0): ?>
                                    <table class="user-table table align-middle">
                                        <tr>
                                            <th>ID</th>
                                            <td><?= $row["id"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>名字</th>
                                            <td><?= $row["name"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>帳號</th>
                                            <td><?= $row["account"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>性別</th>
                                            <td><?= $row["gender"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>電話</th>
                                            <td><?= $row["phone"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>信箱</th>
                                            <td><?= $row["email"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>生日</th>
                                            <td><?= $row["birth"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>加入時間</th>
                                            <td><?= $row["created_at"] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="color:red;">停權原因</th>
                                            <td style="color:red;"><?= $row["frozen"] ?></td>
                                        </tr>
                                    </table>
                                <?php else: ?>
                                    <h2>該會員帳號不存在</h2>
                                <?php endif; ?>
                                <div class="d-flex justify-content-center">
                                    <div class="py-2 me-2">
                                        <a href="frozenUsers.php" class="btn btn-primary"><i class="me-2 fa-solid fa-arrow-left fa-fw"></i>返回列表</a>
                                    </div>
                                    <div class="py-2 text-end">
                                        <a class="btn btn-primary" href="frozenUser-edit.php?id=<?= $row["id"] ?>"><i class="me-2 fa-solid fa-pen-to-square fa-fw"></i>編輯</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- 頁尾 -->
        <?php include("../footer.php"); ?>
    </main>

    <?php include("../js.php") ?>
</body>

</html>