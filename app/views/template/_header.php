<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= Url::BASEURL ?>/css/bootstrap.min.css">

   <title><?= $data['url']; ?></title>
   <style>
      #loader {
         width: 500px;
         position: absolute;
         top: -40px;
         left: 480px;
         display: none;
         z-index: -1;
      }
   </style>
   <link rel="stylesheet" type="text/css" href="<?= Url::BASEURL ?>/vendor/datatables/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?= Url::BASEURL ?>/vendor/datatables/dataTables.bootstrap4.min.css">

</head>

<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#d3d3d3;">
      <a class="navbar-brand" href="<?= Url::BASEURL ?>"><b>CyberBullying</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav ml-auto">
            <a class="nav-link <?= ($data['url'] == 'Multinominal') ? 'active' : '' ?>" href="<?= Url::BASEURL ?>/Multinominal_/postMultinominal">Multinominal</a>
            <a class="nav-link <?= ($data['url'] == 'Bernouli') ? 'active' : '' ?>" href="<?= Url::BASEURL ?>/Bernouli_/postBernouli">Bernouli</a>
         </div>
      </div>
   </nav>
   <!-- end navbar -->