<?php
    include("config.php");
    include("classes/SiteResultsProvider.php");
    include("classes/ImageResultsProvider.php");

    if(isset($_GET["term"])) {
        $term = $_GET["term"];
    }
    else {
        exit("You must enter a search term");
    }

    $type = isset($_GET["type"]) ? $_GET["type"] : "sites";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="helpers/resultstyle.css">


    
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <title><?php echo $type;?></title>
</head>
<body>
    <div class="top">
    <div class='logo'>
            <h1 style="color: #472D2D;">C</h1>
            <h1 style="color: #553939;">o</h1>
            <h1 style="color: #553939;">f</h1>
            <h1 style="color: #704F4F;">f</h1>
            <h1 style="color: #A77979;">e</h1>
            <h1 style="color: #A77979;">e</h1>
        </div>
        <form action="result.php" method="GET">
            <input type="text" name="term"  <?php if(isset($term)){echo "value='$term'";} ?>>
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="main-section">
        <div class="list-container">
            <ul>
                <li>
                    <a href='<?php echo "result.php?term=$term&type=sites"; ?>' <?php if($type == 'sites'){echo " style='color: blue' ";} ?> >
                        Sites
                    </a>
                </li>
                <li>
                    <a href='<?php echo "result.php?term=$term&type=images"; ?>'  <?php if($type == 'images'){echo " style='color: blue' ";} ?> >
                        Images
                    </a>
                </li>
            </ul>
        </div>


        <div class="mainResultsSection">

            <?php


            if($type == "sites") {
                $resultsProvider = new SiteResultsProvider($con);
                $pageSize = 20;
            }
            else {
                $resultsProvider = new ImageResultsProvider($con);
                $pageSize = 30;
            }

            $numResults = $resultsProvider->getNumResults($term);

            echo "<p class='resultsCount'>$numResults results found</p>";



            echo $resultsProvider->getResultsHtml(1, 20, $term);
            ?>


        </div>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="helpers/script.js"></script>
</body>
</body>
</html>