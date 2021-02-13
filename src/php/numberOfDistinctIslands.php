<?php
error_reporting(error_reporting() & ~E_NOTICE);

/**
 * Status: incomplete.
 *
 * @param Integer[][] $grid
 * @return Integer
 */
function numDistinctIslands($grid)
{
    $rowsLength = count($grid);
    $colsLength = count($grid[0]);

    if (is_null($grid)) {
        return 0;
    }

    if ($rowsLength == 0 || $colsLength == 0) {
        return 0;
    }

    $uniqueIslands = [];

    for ($i = 0; $i < $rowsLength; $i++) {
        for ($j = 0; $j < $colsLength; $j++) {

            // in progress.
        }
    }

    var_dump($uniqueIslands);

    return count($uniqueIslands);
}

function dfs($grid, $i, $j, $rows, $cols, $dir)
{
    // depth first search logic goes here...
}

$input = [[1, 1, 0, 0, 0], [1, 1, 0, 0, 0], [0, 0, 0, 1, 1], [0, 0, 0, 1, 1]];
$output = numDistinctIslands($input);
print_r("Output: " . $output . "\n");