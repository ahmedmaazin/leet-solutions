<?php
error_reporting(error_reporting() & ~E_NOTICE & ~E_WARNING);

/**
 * Class UnionFind
 * Based on golang implementation by (ryderwang).
 * Reference Link: https://leetcode.com/problems/number-of-islands-ii/discuss/1025581/Golang-UnionFind-beat-100.
 *
 * Description: A 2d grid map of m rows and n columns is initially filled with water. We may perform an addLand
 * operation which turns the water at position (row, col) into a land. Given a list of positions to operate,
 * count the number of islands after each addLand operation. An island is surrounded by water and is
 * formed by connecting adjacent lands horizontally or vertically. You may assume all four edges
 * of the grid are all surrounded by water.
 *
 * Example: Input: m = 3, n = 3, positions = [[0,0], [0,1], [1,2], [2,1]] Output: [1,1,2,3]
 * Problem Link: https://leetcode.com/problems/number-of-islands-ii.
 */
class UnionFind
{
    /**
     * Count.
     *
     * @var int
     */
    public $count = 0;

    /**
     * Parent.
     *
     * @var array
     */
    public $parent = [];

    /**
     * Rank.
     *
     * @var array
     */
    public $rank = [];

    /**
     * UnionFind constructor.
     *
     * @param $n
     */
    public function __construct($n)
    {
        $this->rank[] = $n;

        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 0;
        }
    }

    /**
     * Union find.
     *
     * @param $i
     * @return mixed
     */
    public function find($i)
    {
        if ($this->parent[$i] == $i) {
            return $i;
        }

        $this->parent[$i] = $this->find($this->parent[$i]);

        return $this->parent[$i];
    }

    /**
     * Union.
     *
     * @param $x
     * @param $y
     */
    public function union($x, $y)
    {
        $ap = $this->find($x);
        $bp = $this->find($y);

        if ($ap == $bp) {
            return;
        }

        if ($this->rank[$ap] < $this->rank[$bp]) {
            $this->parent[$ap] = $bp;
        } else {
            $this->parent[$bp] = $ap;
            if ($this->rank[$ap] == $this->rank[$bp]) {
                $this->rank[$ap]++;
            }
        }

        $this->count--;
    }

    /**
     * Get count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     *  Set the count.
     */
    public function setCount()
    {
        $this->count++;
    }
}

class NumberOfIslandsSolution
{
    /**
     * Number of islands 2.
     *
     * @param Integer $m
     * @param Integer $n
     * @param Integer[][] $positions
     * @return Integer[]
     */
    function numIslands2($m, $n, $positions)
    {
        $unionFind = new UnionFind($m * $n);

        $grid = [[]];

        for ($i = 0; $i <= $m; ++$i) {
            for ($j = 0; $j <= $n; ++$j) {
                $grid[$i][$j] = [0][0];
            }
        }

        $islands = [];

        foreach ($positions as $position) {
            $r = $position[0];
            $c = $position[1];

            if ($grid[$r][$c] == 1) {
                array_push($islands, $unionFind->getCount());
                continue;
            }

            $grid[$r][$c] = 1;
            $unionFind->setCount();
            $currentIndex = $r * $n + $c;

            if ($r - 1 >= 0 && $grid[$r - 1][$c] == 1) {
                $unionFind->union($currentIndex, ($r - 1) * $n + $c);
            }

            if ($r + 1 < $m && $grid[$r + 1][$c] == 1) {
                $unionFind->union($currentIndex, ($r + 1) * $n + $c);
            }

            if ($c - 1 >= 0 && $grid[$r][$c - 1] == 1) {
                $unionFind->union($currentIndex, $r * $n + $c - 1);
            }

            if ($c + 1 < $n && $grid[$r][$c + 1] == 1) {
                $unionFind->union($currentIndex, $r * $n + $c + 1);
            }

            array_push($islands, $unionFind->getCount());
        }

        return $islands;
    }
}

// example.
$m = 3;
$n = 3;
$positions = [[0, 0], [0, 1], [1, 2], [2, 1]];

$solution = new NumberOfIslandsSolution();

$output = $solution->numIslands2($m, $n, $positions);
print_r(json_encode($output) . "\n");