<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân loại số điện thoại</title>
</head>
<body>
    <h1>Phân loại số điện thoại theo nhà mạng</h1>
    <form method="post">
        <label for="phone_numbers">Nhập danh sách số điện thoại (phân cách bởi dấu phẩy):</label><br>
        <textarea id="phone_numbers" name="phone_numbers" rows="5" cols="50"></textarea><br><br> 
        <button type="submit">Phân loại</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input = $_POST['phone_numbers'];

        $viettel_prefixes = ['086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039'];
        $mobifone_prefixes = ['070', '076', '077', '078', '079', '089', '090', '093'];
        $vinaphone_prefixes = ['081', '082', '083', '084', '085', '088', '091', '094'];

        $viettel = [];
        $mobifone = [];
        $vinaphone = [];
        $others = [];

        $phone_numbers = explode(',', $input);

        foreach ($phone_numbers as $number) {
            $number = trim($number); // phải bỏ khoảng trắng
            $prefix = substr($number, 0, 3);

            if (in_array($prefix, $viettel_prefixes)) {
                $viettel[] = $number;
            } elseif (in_array($prefix, $mobifone_prefixes)) {
                $mobifone[] = $number;
            } elseif (in_array($prefix, $vinaphone_prefixes)) {
                $vinaphone[] = $number;
            } else {
                $others[] = $number;
            }
        }

        echo "<h2>Kết quả:</h2>";
        echo "<h3>Số điện thoại Viettel:</h3>";
        echo empty($viettel) ? "<p>Không có số nào.</p>" : "<ul><li>" . implode("</li><li>", $viettel) . "</li></ul>";

        echo "<h3>Số điện thoại Mobifone:</h3>";
        echo empty($mobifone) ? "<p>Không có số nào.</p>" : "<ul><li>" . implode("</li><li>", $mobifone) . "</li></ul>";

        echo "<h3>Số điện thoại Vinaphone:</h3>";
        echo empty($vinaphone) ? "<p>Không có số nào.</p>" : "<ul><li>" . implode("</li><li>", $vinaphone) . "</li></ul>";

        echo "<h3>Số điện thoại không xác định:</h3>";
        echo empty($others) ? "<p>Không có số nào.</p>" : "<ul><li>" . implode("</li><li>", $others) . "</li></ul>";
    }
    ?>
</body>
</html>
