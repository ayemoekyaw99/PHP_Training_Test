<?php
    function makeDiamondShape($row) {
          if ($row < 1 ) {
              echo "Invalid input.Row parameter must be odd greater than or equal 1";
              return;
          }
          if ($row %2 ==0) {
            echo "Row parameter must be odd number.";
            return;
          }
          if (is_int($row)) {
            $midPoint = intdiv($row, 2);
            for ($i = 0; $i < $row; $i++) {
                $spaces = abs($midPoint - $i);
                $stars = $row - 2 * $spaces;
      
                for ($j = 0; $j < $spaces; $j++) {
                    echo " ";
                }
                for ($j = 0; $j < $stars; $j++) {
                    echo "* ";
                }
                echo "<br>"; 
            }
        } else {
          echo "Row parameter must be number.";
        } 
}
makeDiamondShape(7);
?>