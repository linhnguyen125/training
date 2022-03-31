<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
</head>

<body>
    <h1>Thêm mới</h1>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Họ và tên">
        </div>
        <div class="form-group">
            <input type="date" name="dateOfBirth" class="form-control" placeholder="Ngày sinh">
        </div>
        <div class="form-group flex">
            <label class="form-label" for="male">Nam</label>
            <input type="radio" id="male" name="gender" value="2" class="">
            <label class="form-label" for="female">Nữ</label>
            <input type="radio" id="female" name="gender" value="1" class="">
        </div>
        <div class="form-group">
            <input type="text" name="mark" class="form-control" placeholder="Điểm">
        </div>
        <button id="button" type="submit" class="btn btn-primary">Thêm</button>
    </form>

    <a href="./index.php" class="link">Trang chủ</a>

    <?php

    function writeToJsonFile($data)
    {
        $file = fopen('./data.json', 'w');
        fwrite($file, json_encode($data));
        fclose($file);
    }

    // lấy dữ liệu cũ trong file json
    $str = file_get_contents('./data.json');
    $data = json_decode($str, true);

    // lấy dữ liệu từ form
    $response = [];
    $response['id'] = rand(1, 9999999999);
    if (!empty($_POST["name"])) {
        $response['name'] = $_POST['name'];
    }
    if (!empty($_POST['dateOfBirth'])) {
        $response['dateOfBirth'] = $_POST['dateOfBirth'];
    }
    if (!empty($_POST['gender'])) {
        $response['gender'] = $_POST['gender'];
    }
    if (!empty($_POST['mark'])) {
        $response['mark'] = $_POST['mark'];
    }
    // gộp dữ liệu
    if (count($response) == 5) {
        $response = [(object)$response];
        if ($data != null) {
            $data = array_merge($data, $response);
            writeToJsonFile($data);
            header('Location: ' . './index.php');
            exit;
        } else {
            writeToJsonFile($response);
            header('Location: ' . './index.php');
            exit;
        }
    }

    ?>

    <style>
        .disabled {
            cursor: not-allowed !important;
        }

        .link {
            text-decoration: none;
            font-size: 15px;
            color: #000;
        }

        .link:hover {
            color: red;
        }

        .form-group {
            height: 32px;
            width: 250px;
            margin: 10px 0;
        }

        .form-control {
            height: 100%;
            width: 100%;
            border: 1px solid #bbb;
            outline: none;
            padding: 0 10px !important;
        }

        .form-control:hover {
            outline: 1px solid #bbb;
        }

        .form-control:focus {
            border: 1px solid green;
            outline: none !important;
        }

        .flex {
            display: flex;
            align-items: center;
        }

        .btn {
            outline: none;
            border: 1px solid #bbb;
            background-color: greenyellow;
            height: 32px;
            min-width: 100px;
            padding: 5px 10px;
        }

        .btn:hover {
            background-color: #c2c2c2;
            cursor: pointer;
            transition: all ease .3s;
        }
    </style>

    <script src="./app.js"></script>
</body>

</html>