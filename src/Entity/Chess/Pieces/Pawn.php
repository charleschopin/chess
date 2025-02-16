<?php

namespace App\Entity\Chess\Pieces;

use App\Entity\Chess\ChessBoard;
use App\Entity\Chess\Pieces\Piece as Piece;

class Pawn extends Piece 
{
    private $first;
    
    public function __construct($x, $y, $color, $alive) 
    {
        $this->posX = $y;
        $this->posY = $x;
        $this->color = $color;
        $this->alive = $alive;
        $this->first = 0;
        $this->type = "P";
    }
  
    //getter setter
    
    public function __get($name) 
    {
        return $this->$name;
    }

    public function __set($name, $value) 
    {
        $this->$name = $value;
    }
    
    public function display()
    {
        if ($this->color == "White")
            echo "Pw";
        else 
            echo "Pb";
    }

    public function check(int $from, int $to, ChessBoard $chess, $player = null)
    {
        $chessboard = $chess;
        $cpt = 0;
        $array = array (0);
        if ($player % 2 == 0) {
            if ($this->first == 0 ) {
                $this->first++;
                if (((($to+1) < 8) && ($from - 1 >= 0)) &&
                    $chessboard->board[$to+1][$from-1]->type != "-" &&
                    ($chessboard->board[$to + 1][$from - 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                $array[$cpt] = $from - 1;
                $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }
                if (((($to+1) < 8) && ($from < 8)) &&
                    $chessboard->board[$to+1][$from]->type == "-") {
                    $array[$cpt] = $from;
                    $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }
                if (((($to+1) < 8) && ($to+2 < 8) && ($from < 8)) &&
                    $chessboard->board[$to+2][$from]->type == "-") {
                    $array[$cpt] = $from;
                    $cpt++;
                    $array[$cpt] = $to + 2;
                    $cpt++;
                }
                if (((($to+1) < 8) && ($from + 1 < 8)) &&
                        $chessboard->board[$to+1][$from + 1]->type
                        != "-" &&
                    ($chessboard->board[$to + 1][$from + 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                    $array[$cpt] = $from + 1;
                    $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }

            } else {
                if (((($to+1) < 8) && ($from - 1 >= 0)) &&
                    $chessboard->board[$to+1][$from-1]->type != "-" &&
                    ($chessboard->board[$to + 1][$from - 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                    $array[$cpt] = $from - 1;
                    $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }
                if (((($to+1) < 8) && ($from< 8)) &&
                    $chessboard->board[$to+1][$from]->type == "-") {
                    $array[$cpt] = $from;
                    $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }
                if (((($to+1) < 8) && ($from + 1 < 8)) &&
                    $chessboard->board[$to+1][$from + 1]->type != "-" &&
                    ($chessboard->board[$to + 1][$from + 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                    $array[$cpt] = $from + 1;
                    $cpt++;
                    $array[$cpt] = $to + 1;
                    $cpt++;
                }
            }
            return $array;
        } else {
            if ($this->first == 0 ) {
                $this->first++;
                if (((($to-1) >= 0) && ($from - 1 >= 0)) &&
                    $chessboard->board[$to-1][$from-1]->type!= "-" &&
                    ($chessboard->board[$to - 1][$from - 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                $array[$cpt] = $from - 1;
                $cpt++;
                    $array[$cpt] = $to - 1;
                    $cpt++;
                }
                if (((($to-1) >= 0) && ($from < 8)) &&
                    $chessboard->board[$to-1][$from]->type == "-") {
                    $array[$cpt] = $from;
                    $cpt++;
                    $array[$cpt] = $to - 1;
                    $cpt++;
                }
                if (((($to-1) >= 0) && ($to-2 >= 0) && ($from < 8)) &&
                    $chessboard->board[$to-2][$from]->type == "-") {
                    $array[$cpt] = $from;
                    $cpt++;
                    $array[$cpt] = $to - 2;
                    $cpt++;
                }
                if (((($to-1) >= 0) && ($from + 1 < 8)) &&
                    $chessboard->board[$to - 1][$from + 1]->type != "-" &&
                    ($chessboard->board[$to - 1][$from + 1]->color
                        !=
                        $chessboard->board[$to][$from]->color)) {
                    $array[$cpt] = $from + 1;
                    $cpt++;
                    $array[$cpt] = $to - 1;
                    $cpt++;
                }
            } else {
                   if (((($to-1) >= 0) && ($from - 1 >= 0)) &&
                       $chessboard->board[$to-1][$from-1]->type != "-" &&
                       ($chessboard->board[$to - 1][$from - 1]->color
                           !=
                           $chessboard->board[$to][$from]->color)) {
                        $array[$cpt] = $from - 1;
                        $cpt++;
                        $array[$cpt] = $to - 1;
                        $cpt++;
                    }
                   if (((($to-1) >= 0) && ($from < 8)) &&
                       $chessboard->board[$to-1][$from]->type == "-") {
                        $array[$cpt] = $from;
                        $cpt++;
                        $array[$cpt] = $to - 1;
                        $cpt++;
                    }
                    if (((($to-1) >= 0) && ($from + 1 < 8)) &&
                        $chessboard->board[$to - 1][$from + 1]->type != "-" &&
                        ($chessboard->board[$to - 1][$from + 1]->color
                            !=
                            $chessboard->board[$to][$from]->color)) {
                        $array[$cpt] = $from + 1;
                        $cpt++;
                        $array[$cpt] = $to - 1;
                        $cpt++;
                    }
                }

                return ($array);
        }
    }

    public function move(
                        int $fromx,
                        int $fromy,
                        int $tox,
                        int $toy,
                        ChessBoard $chess
                    ): array
    {
        $tab = array (0);
        $board = $chess->board;
        $board[$toy][$tox] = $chess->board[$fromy][$fromx];
        $board[$fromy][$fromx] = new None($fromx, $fromy, "", false);
        
        $tab[0]=$tox;
        $tab[1]=$toy;
        $tab[2]=$board[$toy][$tox]->type;

        $chess->board = $board;

        $response = [
            'tab' => $tab,
            'chess' => $chess
        ];

        return $response;
    }
}