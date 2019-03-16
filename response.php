<?php
  // File: response.php
  include('koneksi.php');

  // Get POST gender value
  $asisten = $_POST["asisten"];


  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM asisten_kelas WHERE id_asisten = '" . $asisten . "'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'nama_asisten'   => $row['nama_asisten'],
      'tahun_ajar' => $row['tahun_ajar']
      'smt' => $row['smt']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>
