<div class="container h-100">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php allImages(); ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" style="background-color: grey;" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" style="background-color: grey;" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<?php

    function allImages(){

        $productID = $_GET['id'];
        $query = ("SELECT foto
        FROM productimages
        WHERE productid = $productID
        ");

        $result = mysqli_query(dbConnectionRoot(), $query); // dbConnectionRoot staat onder (Functions/dbconnections.php)
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {

            $count = null;

            while($row = mysqli_fetch_assoc($result)){
                $count++;
                $img = base64_encode($row["foto"]);
    
                if ($count == 1) {
                    print ('
                        <div class="carousel-item active">
                            <img src="data:image/jpeg;base64,'. $img .' " class="card-img" style="object-fit: contain; max-height: 300px;">
                        </div> 
                    ');
                } else {
                    print ('
                        <div class="carousel-item">
                            <img src="data:image/jpeg;base64,'. $img .' " class="card-img" style="object-fit: contain; max-height: 300px;">
                        </div> 
                    ');
                }
            }
            
        } else {

            $imgPath = ("img/defaultproduct.jpg");
            $imgBinary = fread(fopen($imgPath, "r"), filesize($imgPath));
            $img = base64_encode($imgBinary);

            print ('
                <div class="carousel-item active">
                    <img src="data:image/jpeg;base64,'. $img .' " class="card-img" style="object-fit: contain; max-height: 300px;">
                </div> 
            ');
        }

        
    }

?>