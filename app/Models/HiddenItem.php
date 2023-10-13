<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiddenItem extends Model
{
    use HasFactory;
    protected $table = 'hidden_items';
    protected $fillable = ['grid', 'player_x', 'player_y', 'steps'];
    public function getProbableLocations()
    {
        $grid = json_decode($this->grid);
        $playerX = $this->player_x;
        $playerY = $this->player_y;
        $steps = json_decode($this->steps);

        $locations = [];
        $currentX = $playerX;
        $currentY = $playerY;

        foreach ($steps as $step => $count) {
            for ($i = 0; $i < $count; $i++) {
                if ($step === 'A') {
                    $currentX--;
                } elseif ($step === 'B') {
                    $currentY++;
                } elseif ($step === 'C') {
                    $currentX++;
                }

                if ($grid[$currentX][$currentY] === '.') {
                    $locations[] = ['x' => $currentX, 'y' => $currentY];
                }
            }
        }

        return $locations;
    }
}
