<?php
$str = file_get_contents('./data.json');
$data = json_decode($str, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <table <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th rowspan="2">STT</th>
                <th rowspan="2">Họ và tên</th>
                <th colspan="2">Năm sinh</th>
                <th rowspan="2">Điểm TB</th>
                <th rowspan="2">Xếp loại</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <th>Nam</th>
                <th>Nữ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0;
            foreach ($data as $item) {
                $index++;
            ?>

                <tr>
                    <td><?php echo $index ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td>
                        <?php if ($item["gender"] == "2") {
                            echo $item["dateOfBirth"];
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($item["gender"] == "1") {
                            echo $item["dateOfBirth"];
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                    <td><?php echo $item['mark'] ?></td>
                    <td>
                        <?php
                        $mark = $item["mark"];
                        switch ($mark) {
                            case $mark >= 9:
                                echo "Giỏi";
                                break;
                            case $mark >= 7 && $mark < 9:
                                echo "Khá";
                                break;
                            default:
                                echo "Trung bình";
                                break;
                        }
                        ?>
                    </td>
                    <td><a href="./delete.php?id=<?php echo $item["id"] ?>">Xóa</a></td>
                </tr>

            <?php
            }
            ?>

            <tr>
                <td colspan="4">Tổng số sinh viên đạt</td>
                <td colspan="2">
                    <?php
                    $count = 0;
                    foreach ($data as $item) {
                        if ($item["mark"] >= 5) $count++;
                    }
                    echo $count . " sinh viên";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

<a href="./add.php" class="link">Thêm mới</a>


<style>
    .link {
        text-decoration: none;
        font-size: 15px;
        color: #000;
    }

    .link:hover {
        color: red;
    }
</style>

</html>