<?php
function formatAngkaDiketahui($text)
{
  if (!strpos($text, ".")) {
    echo number_format($text, 0, ",", ".");
  } else {
    $k = (explode(".", $text));

    echo number_format($text, strlen($k[1]), ",", ".");
  }
}

function formatAngkaJawaban($text)
{
  if (!strpos($text, ".")) {
    return number_format($text, 0, ",", ".");
  } else {
    return number_format($text, 2, ",", ".");
  }
}
