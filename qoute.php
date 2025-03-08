<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Get a Free Quote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            margin: 0;
        }
        .container {
            position: relative;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 800px;
            gap: 30px;
            
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #d40000;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            line-height: 30px;
        }
        .close-btn:hover {
            background: #b30000;
        }
        .form-container, .info-container {
            flex: 1;
            padding: 20px;
        }
        .info-box {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-box i {
            font-size: 20px;
            color: #d40000;
        }
        h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            transition: border-bottom 0.3s ease-in-out;
            background: transparent;
            font-size: 16px;
        }
        input:focus, textarea:focus {
            border-bottom: 2px solid #d40000;
            outline: none;
        }
        .btn {
            background: #d40000;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 12px;
            font-size: 16px;
        }
        .btn:hover {
            background: #b30000;
        }
        .info-container {
            border-left: 1px solid #ddd;
        }
        .info-container p {
            font-size: 16px;
        }
        .info-box i {
    font-size: 30px; 
    color: #d40000;  
}

.info-box div {
    color: #333; 
    font-size: 16px;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <button class="close-btn" onclick="closeForm()">&times;</button>
        <div class="form-container">
            <h2>Get a Free Quote</h2>
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email">
            <input type="tel" placeholder="Phone">
            <input type="text" placeholder="Website">
            <textarea placeholder="Message"></textarea>
            <button class="btn">GET A QUOTE</button>
        </div>
        <div class="info-container">
            <h2>What's Next?</h2>
            <p>1</p>
            <p>2</p>
            <p>3</p>
            <div class="info-box">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h3>Give us a call</h3>
                    <span> <a href="tel:+63289821268">+63 --- ---- ---</a> / <a href="tel:+639985833381">+63 --- ---- ---</a></span>

                </div>
            </div>
            <div class="info-box">
                <i class="fas fa-envelope"></i>
                <div>
                    <h3>Send an email</h3>
                    <p>dezcom@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function closeForm() {
        window.location.href = 'index.php'; 
    }
    </script>
</body>
</html>



