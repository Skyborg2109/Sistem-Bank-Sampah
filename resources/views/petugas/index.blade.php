<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Sampah</title>
    <style>
        /* CSS Dasar untuk Layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
        }
        .header-left, .header-right {
            display: flex;
            align-items: center;
        }
        .sidebar {
            width: 60px;
            background-color: #fff;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
            height: 100vh; /* Tinggi penuh layar */
        }
        .sidebar-item {
            font-size: 24px;
            margin: 15px 0;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .placeholder {
            width: 30px;
            height: 30px;
            border: 1px solid #333;
            margin-right: 15px;
        }
        .icon {
            margin-right: 15px;
            font-size: 20px; /* Representasi Ikon Lonceng */
        }
        .input-box {
            width: 120px;
            height: 25px;
            border: 1px solid #ccc;
            margin-right: 15px;
        }
        .profile-icon {
            font-size: 24px; /* Representasi Ikon Profil */
        }
        .content {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }
        .form-card {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        /* CSS untuk Form */
        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
        input[type="text"]:nth-of-type(1), input[type="text"]:nth-of-type(2) {
            height: 40px;
            width: auto; /* Lebar Penuh */
        }
        .input-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .input-group input[type="text"] {
            width: 200px;
            margin-right: 30px;
            height: 40px;
            margin-bottom: 0; /* Override */
        }
        .checkbox-group {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 70px;
        }
        .checkbox-group label {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
        }
        textarea {
            height: 150px;
            resize: vertical;
            margin-bottom: 40px;
        }
        button[type="submit"] {
            padding: 10px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-wrapper {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <div class="placeholder">
        </div> </div>
        <div class="header-right">
            <span class="icon">&#x1F514;</span> 
            <div class="input-box"></div>
            <div class="input-box"></div>
            <span class="icon profile-icon">&#x1F464;</span>
        </div>
    </div>
    
    <div class="content">



        <div class="form-card">
            
            <h2>Input Data Sampah</h2>

            <form action="/petugas/kelolaDataSampah" method="POST">
                @csrf
                
                <input type="text" placeholder="Input Data 1">

                <input type="text" placeholder="Input Data 2">

                <div class="input-group">
                    
                    <input type="text" placeholder="Input Data 3">

                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox">
                            <span>Checkbox</span>
                        </label>
                        <label>
                            <input type="checkbox">
                            <span>Checkbox</span>
                        </label>
                    </div>
                </div>

                <textarea placeholder="Deskripsi/Catatan"></textarea>

                <div class="button-wrapper">
                    <button type="submit">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>