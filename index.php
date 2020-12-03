<?php
function my_merge_image($first, $second){
  list($img1_width, $img1_height) = getimagesize($first); //recupére la taille
  list($img2_width, $img2_height) = getimagesize($second);

  $source1 = imagecreatefrompng($first); //créer l'image
  $source2 = imagecreatefrompng($second);
  $new_width = $img1_width > $img2_width ? $img1_width : $img2_width; //if ternaire --> ? différence
  $new_height = $img1_height + $img2_height;
  $new = imagecreatetruecolor($new_width, $new_height); //meilleurs palette d'image avec nouvelle largeur et hauteur de la plus grande image entre l'img 1 et 2

  imagealphablending($new, false);
  imagesavealpha($new, true);

  imagecopy($new, $source1, 0, 0, 0, 0, $img1_width, $img1_height);
  imagecopy($new, $source2, 0, $img1_height, 0, 0, $img2_width, $img2_height); //img copy --> mettre dans le sprite
  imagepng($new, "Fusion.png");
}
my_merge_image($argv[1], $argv[2]); //tableau grâce a list


function my_generate_css($new) {
  $new = fopen("Fusion.png", "x");
}
echo my_generate_css()
 ?>
