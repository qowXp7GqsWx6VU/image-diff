<?php
require 'compare.php';
$recursive = compare();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.min.css">

    <title>Diff Img</title>

  </head>
  <body>
    <div class="container-fluid" id="grid">

      <div class="row py-3">
        <div class="col-12">
          <h1 class="text-primary text-center mb-5 mt-2 title-page">DIFF IMAGES</h1>
        </div>
        <div class="col-12">
          <button type="button"
            class="btn btn-outline-primary btn-sm"
            id="load-grid">GRID</button>
        </div>
      </div>

        <div class="accordion px-3 pb-5" id="accordionImagesDiff">
        <?php
        foreach($recursive as $key => $obj) {
        ?>
        <div class="row">
          <div class="col-12 py-2 btn-primary btn text-left bar-title-image" type="button" data-toggle="collapse" data-target="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
            <p class="text-white name-image d-flex justify-content-between"><?php echo $obj; ?> <i class="fas fa-angle-down mt-1"></i></p>
          </div>
        </div>

        <div id="collapse<?php echo $key; ?>" class="collapse show row crosshair" aria-labelledby="headingOne" data-parent="#accordionImagesDiff">
          <!-- Before -->
          <div class="col-md-4 mb-1 p-1 box">
            <h6 class="text-primary">Before </h6>
            <?php
            if (file_exists('images/before/'.$obj)) {
              echo '<img src="images/before/' .$obj.'" class="img-fluid img-original" id="before-img-'.$key.'">';
            }
            else {
              echo '<div class="no-image">
                      <span>No image...</span>
                      <i class="far fa-sad-tear"></i>
                    </div>';
            }
            ?>
          </div>

          <!-- After -->
          <div class="col-md-4 p-1 box img-zoom-container">
            <h6 class="text-primary">After</h6>
            <?php
            if (file_exists('images/after/'.$obj)) {
              echo '<img src="images/after/' .$obj.'" class="img-fluid img-original" id="after-img-'.$key.'">';
            }
            else {
              echo '<div class="no-image">
                      <span>No image...</span>
                      <i class="far fa-sad-tear"></i>
                    </div>';
            }
            ?>
          </div>

          <!-- Diff -->
          <div class="col-md-4 p-1 box">
            <h6 class="text-primary">Diff</h6>
            <?php
            if (file_exists('images/diff/'.$obj)) {
              echo '<img src="images/diff/' .$obj.'" class="img-fluid img-original" id="diff-img-'.$key.'">';
            }
            else {
              echo '<div class="no-image">
                      <span>No image...</span>
                      <i class="far fa-sad-tear"></i>
                    </div>';
            }
            ?>
          </div>
        </div>
        <?php
        }
        ?>

      </div>
    </div>

    <div class="btn-to-top text-white">
      <i class="fas fa-angle-up"></i>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="javascript/jquery.zoom.min.js"></script>
    <script src="javascript/app.js"></script>
  </body>
</html>
