<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Define the grid as an array of strings
        $grid = [
            "########",
            "#......#",
            "#.###..#",
            "#...#.##",
            "#X#....#",
            "########",
        ];

        // Find the player's starting position
        $playerPosition = $this->findPlayerPosition($grid);

        // Find the item
        $itemPosition = $this->findItemPosition($grid, $playerPosition);

        // Output the list of probable item locations
        $probableLocations = $this->findProbableLocations($grid, $itemPosition);

        // Bonus: Display the grid with probable item locations marked with '$'
        $gridWithProbable = $this->markProbableLocations($grid, $probableLocations);

        return view('hidden_item.index', compact('gridWithProbable'));
    }

    private function findPlayerPosition($grid)
    {
        foreach ($grid as $row => $line) {
            if (($col = strpos($line, 'X')) !== false) {
                return ['row' => $row, 'col' => $col];
            }
        }

        return null;
    }

    private function findItemPosition($grid, $playerPosition)
    {
        $steps = ['A', 'B', 'C'];
        $itemPosition = $playerPosition;

        foreach ($steps as $step) {
            $itemPosition = $this->moveInDirection($itemPosition, $step);
        }

        return $itemPosition;
    }

    private function moveInDirection($position, $direction)
    {
        $row = $position['row'];
        $col = $position['col'];

        if ($direction === 'A') {
            $row--;
        } elseif ($direction === 'B') {
            $col++;
        } elseif ($direction === 'C') {
            $row++;
        }

        return ['row' => $row, 'col' => $col];
    }

    private function findProbableLocations($grid, $itemPosition)
    {
        $probableLocations = [];

        for ($row = 0; $row < count($grid); $row++) {
            for ($col = 0; $col < strlen($grid[$row]); $col++) {
                if ($grid[$row][$col] === '.') {
                    $distance = abs($row - $itemPosition['row']) + abs($col - $itemPosition['col']);
                    $probableLocations[] = ['row' => $row, 'col' => $col, 'distance' => $distance];
                }
            }
        }

        usort($probableLocations, function ($a, $b) {
            return $a['distance'] - $b['distance'];
        });

        return $probableLocations;
    }

    private function markProbableLocations($grid, $probableLocations)
    {
        $gridWithProbable = $grid;

        foreach ($probableLocations as $location) {
            $row = $location['row'];
            $col = $location['col'];
            $gridWithProbable[$row][$col] = '$';
        }

        return $gridWithProbable;
    }
}
