<?php include_once "./includes/connect.php"?>
<?php include_once "pay-action.php"?>

<!DOCTYPE html>

<head>
    
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    <div class="wrapper">
        <div class="payment">
            <h1>Payment Gateway</h1>
            <div class="form">

                <div class="card space icone-relative">
                    <label class="label">Card holder:</label>
                    <input type="text" class="input" name="cHolder" autocomplete="off" placeholder="Name">
                    <i class='bx bxs-user'></i>
                </div>

                <div class="card space icone-relative">
                    <label class="label">Card Number:</label>
                    <input type="text" class="input" name="cNumber" autocomplete="off" placeholder="Card Number">
                    <i class='bx bx-credit-card'></i>
                </div>

                <div class="card-grp space">
                    <div class="card-item icone-relative">
                        <label class="label">Expiry Date:</label>
                        
                        <input type="text" class="input" name="exDate" autocomplete="off" placeholder="00 / 00"> 
                        <i class='bx bxs-calendar'></i>
                    </div>
                    <div class="card-item icone-relative">
                        <label class="label">CVC:</label>
                        <input type="text" class="input" name="cvc" autocomplete="off" placeholder="000">
                        <i class='bx bxs-lock-alt'></i> 
                    </div>

                
                </div>
                <div class="button">
                    <button id="send" name="submit">send</button>
                </div>

                <script>
                    document.getElementById("send").onclick=function(){
                        
                       alert("payment successful");
                        
                        
                    }
                </script>

            </div>
        </div>
    </div>

</body>
</html>