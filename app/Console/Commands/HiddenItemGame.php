<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HiddenItemGame extends Command
{
    protected $signature = 'game:hidden-item';
    protected $description = 'Hidden Item Game';

    public function handle()
    {
        $this->info("Welcome to the Hidden Item Game!");

        // Define the grid
        $grid = [
            "########",
            "#......#",
            "#.###..#",
            "#...#..#",
            "#X#....#",
            "########",
        ];

        // Find the player's starting position (X)
        for ($y = 0; $y < count($grid); $y++) {
            if (Str::contains($grid[$y], 'X')) {
                $playerX = strpos($grid[$y], 'X');
                $playerY = $y;
            }
        }

        // Determine probable item locations
        $probableItemLocations = [];
        for ($x = 0; $x < strlen($grid[0]); $x++) {
            for ($y = 0; $y < count($grid); $y++) {
                if ($grid[$y][$x] == '.') {
                    $probableItemLocations[] = [$x, $y];
                }
            }
        }

        // Randomly select one of the probable item locations
        if (!empty($probableItemLocations)) {
            $itemLocation = collect($probableItemLocations)->random();
            [$itemX, $itemY] = $itemLocation;

            // Mark the grid with the probable item location
            $grid[$itemY][$itemX] = '$';

            // Display the grid
            $this->info("Hidden Item Game Grid:");
            foreach ($grid as $line) {
                $this->info($line);
            }

            $this->info("The item is hidden at coordinates ($itemX, $itemY).");
        } else {
            $this->info("No probable item locations found.");
        }
    }
}
