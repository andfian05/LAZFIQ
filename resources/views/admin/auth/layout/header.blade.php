<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Masjid</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('Admin/src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('Admin/src/assets/css/styles.min.css')}}" />

  <!-- <link rel="stylesheet" href="{{asset('Font/css/fontawesome.min.css')}}" /> -->
  

  <style>
    @media only screen and (max-width:800px) {
      #no-more-tables tbody,
      #no-more-tables tr,
      #no-more-tables td {
          display: block;
      }
      #no-more-tables thead tr {
          position: absolute;
          top: -9999px;
          left: -9999px;
      }
      #no-more-tables td {
          position: relative;
          padding-left: 50%;
          border: none;
          border-bottom: 1px solid #eee;
      }
      #no-more-tables td:before {
          content: attr(data-title);
          position: absolute;
          left: 6px;
          font-weight: bold;
      }
      #no-more-tables tr {
          border-bottom: 1px solid #ccc;
      }
    }
  </style>
  
</head>

<body>