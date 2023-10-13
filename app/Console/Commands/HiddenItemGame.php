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

        // Display the grid
        $this->info("Hidden Item Game Grid:");
        foreach ($grid as $line) {
            $this->info($line);
        }

        // Find the player's starting position (X)
        $playerX = 1;
        $playerY = 4;

        // Generate the item location
        $itemX = rand(1, strlen($grid[0]) - 2);
        $itemY = rand(1, count($grid) - 2);
        $grid[$itemY][$itemX] = '$';

        // Display the updated grid
        $this->info("Hidden Item Game Grid with Item:");
        foreach ($grid as $line) {
            $this->info($line);
        }

        // Game loop for player's movement
        while (true) {
            $this->info("Enter a movement command (W, A, S, D) or 'Q' to quit:");
            $input = strtoupper(trim(fgets(STDIN)));

            if ($input === 'Q') {
                $this->info("Game Over");
                break;
            }

            $newPlayerX = $playerX;
            $newPlayerY = $playerY;

            if ($input === 'W') {
                $newPlayerY--;
            } elseif ($input === 'S') {
                $newPlayerY++;
            } elseif ($input === 'A') {
                $newPlayerX--;
            } elseif ($input === 'D') {
                $newPlayerX++;
            }

            // Check if the new position is valid
            if ($grid[$newPlayerY][$newPlayerX] === '.') {
                $grid[$playerY][$playerX] = '.';
                $grid[$newPlayerY][$newPlayerX] = 'X';
                $playerX = $newPlayerX;
                $playerY = $newPlayerY;

                // Display the updated grid
                $this->info("Updated Grid:");
                foreach ($grid as $line) {
                    $this->info($line);
                }

                // Check if the item is found

            } else 
                if ($newPlayerX === $itemX && $newPlayerY === $itemY) {
                $this->info("Congratulations! You found the hidden item at ($itemX, $itemY).");
                break;
            } else {
                $this->info("Invalid move. Try again.");
            }
        }
    }
}
