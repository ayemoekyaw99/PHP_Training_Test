<?php
function drawChessBoard($rows, $cols) {
    echo '<div style="display: flex; flex-wrap: wrap; width: ' . ($cols * 50) . 'px;">';
    for ($row = 1; $row <= $rows; $row++) {
        for ($col = 1; $col <= $cols; $col++) {
            $colorClass = ($row + $col) % 2 === 0 ? 'black' : 'white';
            echo '<div class="' . $colorClass . '"></div>';
        }
    }
    echo '</div>';
    echo '<style>
        .white, .black {
            width: 50px;
            height: 50px;
            display: inline-block;
        }
        .white {
            background-color: white;
        }
        .black {
            background-color: black;
        }
    </style>';
}
drawChessBoard(8, 8);
?>
