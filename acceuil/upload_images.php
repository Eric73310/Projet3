<?php
function convert_upload_file_array($upload_files) {
  $converted = array();

  foreach ($upload_files as $attribute => $val_array) {
    foreach ($val_array as $index => $value) {
      $converted[$index][$attribute] = $value;
    }
  }
  return $converted;
}
if (isset($_FILES['file'])) {

  $id_location = $db->lastInsertId(); //ne pas mettre dans la boucle

  //inside1.png
  // ['inside1' 'png']


  //tableau des extensions qu on autorise
  $extensionsAutorisees = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
  $tailleMax = 500000;

  $pics = convert_upload_file_array($_FILES['file']);

  foreach ($pics as $key => $pic) {
      $tmpName = $pic['tmp_name'];
      $name = $pic['name'];
      $size = $pic['size'];
      $error = $pic['error'];
      $type = $pic['type'];
      $tabExtension = explode('.', $name);
      $extension = strtolower(end($tabExtension));


      if (in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0) {

          $uniqueName = uniqid('', true);
          $fileName = $uniqueName . '.' . $extension;
          $content = file_get_contents($pic['tmp_name']);

          $req = $db->prepare('INSERT INTO `file`( `name`, `content`, `id_location`) VALUES (?,?,?)');
          $req->execute([$fileName, $content, $id_location]);

          echo 'Image enregistrée';
      } elseif (!in_array($extension, $extensionsAutorisees)) {
          echo "mauvaise exentsion $extension";
      } elseif (!($size <= $tailleMax)) {
          echo "mauvaise taille $size";
      } elseif (!($error == 0)) {
          echo "mauvaise exentsion $error";
      }
  }
}
