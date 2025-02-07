<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Droid+Sans:regular,bold&display=swap" rel="stylesheet">
    <style>
        /* Base Styling */
        body {
            font-family: 'Droid Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f5f7fa, #c3cfe2);
            color: #333;
            transition: background 0.5s ease, color 0.5s ease;
        }

        /* Header */
        header {
            background: #002366;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Adjust logo and content spacing */
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header .logo img {
            max-height: 80px;
            margin-left: 20px;
        }

        header .text-content {
            text-align: center;
            flex: 1; /* Center the content */
        }

        header .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        header .title span {
            font-size: 22px;
            font-weight: normal;
            color: #ffc107;
        }

        header .clr {
            margin-top: 5px;
            font-size: 14px;
            color: #ddd;
        }

        /* Navigation */
        #navigator {
            background: #ffc107;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        #navigator .menus {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        #navigator .menus li {
            margin: 0 15px;
        }

        #navigator .menus li a {
            text-decoration: none;
            color: #002366;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        #navigator .menus li a:hover {
            background: #002366;
            color: #ffc107;
        }

        /* Content Section */
        #container {
            margin: 20px auto;
            max-width: 1000px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer */
        footer {
			position: fixed; /* Tetap di tempat */
			bottom: 0; /* Menempel di bagian bawah layar */
			width: 100%; /* Memenuhi lebar layar */
            text-align: center;
            padding: 15px 0;
            background: #002366;
            color: #fff;
            margin-top: 20px;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logoUnikom.png" alt="Logo">
        </div>
        <div class="text-content">
            <div class="title">Sistem Informasi Nilai Online <br> 
                <span>UNIVERSITAS KOMPUTER INDONESIA</span>
            </div>
            <div class="clr">Jalan Dipatiukur No. 112-116, Coblong, Lebakgede, Bandung, Jawa Barat, 40132. </div>
        </div>
    </header>

    <!-- Navigation -->
    <section id="navigator">
        <ul class="menus">
            <li><a href="./?adm=home">Home</a></li>
            <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
            <li><a href="./?adm=dosen">Dosen</a></li>
            <li><a href="./?adm=matakuliah">Mata Kuliah</a></li>
            <li><a href="./?adm=nilai">Nilai</a></li>
            <li><a href="./?adm=about">About</a></li>
        </ul>
    </section>

    <section id="container">
        <?php
        if (empty($_GET)) {
            include("home.php");
        } else {
            switch ($_GET["adm"]) {
                case "home":
                    include("home.php");
                    break;
                case "mahasiswa":
                    include("mahasiswaView.php");
                    break;
                case "mahasiswaAdd":
                    include("mahasiswaAdd.php");
                    break;
                case "mahasiswaEdit":
                    include("mahasiswaEdit.php");
                    break;
                case "dosen":
                    include("dosenView.php");
                    break;
                case "dosenAdd":
                    include("dosenAdd.php");
                    break;
                case "dosenEdit":
                    include("dosenEdit.php");
                    break;
                case "matakuliah":
                    include("matakuliahView.php");
                    break;
                case "matakuliahAdd":
                    include("matakuliahAdd.php");
                    break;
                case "matakuliahEdit":
                    include("matakuliahEdit.php");
                    break;
                case "nilai":
                    include("nilaiView.php");
                    break;
                case "nilaiAdd":
                    include("nilaiAdd.php");
                    break;
                case "nilaiEdit":
                    include("nilaiEdit.php");
                    break;
				case "about":
                    include("about.php");
                    break;	
            }
        }
        ?>
    </section>

    <footer>
	    <font> Copyright &copy; 2025 - Universitas Komputer Indonesia <br />
        Developed By <a href="./?adm=about" target="_new">030</a> </font>
    </footer>

</body>

</html>
