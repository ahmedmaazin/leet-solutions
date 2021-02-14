<?php
error_reporting(error_reporting() & ~E_NOTICE);

/**
 * Class Solution.
 * Contains Duplicate.
 *
 * Description: Given an m x n 2d grid map of '1's (land) and '0's (water), return the number of islands. An island
 * is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. You may assume
 * all four edges of the grid are all surrounded by water.
 *
 * Example: Input: grid = [
 * ["1","1","1","1","0"],
 * ["1","1","0","1","0"],
 * ["1","1","0","0","0"],
 * ["0","0","0","0","0"]
 * ]
 * Output: 1
 * Problem Link: https://leetcode.com/problems/number-of-islands.
 */
class Solution
{
    /**
     * Grid.
     *
     * @var array[]
     */
    public $grid = [[]];

    /**
     * Number of islands.
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    public function numIslands($grid)
    {
        if (empty($grid) || count($grid) == 0) {
            return 0;
        }

        $this->grid = $grid;

        $rows = count($this->grid);
        $cols = count($this->grid[0]);

        $totalIslands = 0;
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {

                if ($this->grid[$i][$j] == "1") {
                    $totalIslands++;
                    $this->depthFirstSearch($this->grid, $i, $j);
                }
            }
        }

        return $totalIslands;
    }

    /**
     * DFS search.
     *
     * @param $grid
     * @param $i
     * @param $j
     */
    private function depthFirstSearch($grid, $i, $j)
    {
        $rows = count($grid);
        $cols = count($grid[0]);

        if ($i < 0 || $j < 0
            || $i >= $rows || $j >= $cols
            || $this->grid[$i][$j] != "1") {
            return;
        }

        $this->grid[$i][$j] = "0";

        $this->depthFirstSearch($grid, $i, $j + 1);
        $this->depthFirstSearch($grid, $i, $j - 1);
        $this->depthFirstSearch($grid, $i + 1, $j);
        $this->depthFirstSearch($grid, $i - 1, $j);
    }
}

// example.
$input = [["1", "1", "1", "1", "0"], ["1", "1", "0", "1", "0"], ["1", "1", "0", "0", "0"], ["0", "0", "0", "0", "0"]];

$solution = new Solution();

$output = $solution->numIslands($input);

print_r("Output: " . $output . "\n");