<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #000000;
            color: #ffffff;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #000000;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            outline: none;
        }

        .gender-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .gender-group label {
            font-weight: normal;
            color: #555555;
            margin: 0;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 12px;
            background-color: #FF7404;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #cc5c02;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            color: #FF7404;
            font-weight: bold;
        }

        .download-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #FF7404;
            font-weight: bold;
        }

        .download-link:hover {
            color: #cc5c02;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Data Mahasiswa</h2>
        <form action="" method="POST">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <div class="gender-group">
                <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
                <label for="laki">Laki-laki</label>
                
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                <label for="perempuan">Perempuan</label>
            </div>
            
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>
            
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        $filename = 'data_mahasiswa.csv';

        if (isset($_POST['submit'])) {
            $nim = htmlspecialchars($_POST['nim']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $no_hp = htmlspecialchars($_POST['no_hp']);
            $email = htmlspecialchars($_POST['email']);

            $data = [$nim, $nama, $jenis_kelamin, $alamat, $no_hp, $email];

            $file = fopen($filename, 'a');
            fputcsv($file, $data);
            fclose($file);

            echo "<p class='message'>Data berhasil disimpan!</p>";
        }

        if (file_exists($filename)) {
            echo "<a href='$filename' download class='download-link'>Download data mahasiswa (CSV)</a>";
        }
        ?>
    </div>
</body>
</html>
