<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Builds</title>

     <!-- Materialize css library -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <style type ="text/css">
        .brand-text{
            color: blue !important;
        }

        form{
            max-width: 550px;
            margin: 20px auto;
            padding: 20px;
        }
     </style>
</head>

<body class = "grey lighten-4">
    <nav class="white z-depth-10">
        <div class="container">
            <a href ="index.php" class ="left brand-logo brand-text">My Builds</a>
            <ul id ="nav-mobile" class = "right hide-on-small-and-down">
                <li><a href="add.php" class = " blue btn brand z-depth-10">Add a build</a></li>
            </ul>
        </div>
    </nav>