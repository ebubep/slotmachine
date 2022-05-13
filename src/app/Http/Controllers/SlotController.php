<?php

namespace App\Http\Controllers;

use App\Lib\Board;
use App\Lib\Payline; 


class SlotController extends Controller{
    
    /**
     * Launch the slot machine
     *
     * @return JSON encoded value as defined in the requirement doc
     */
    public function launch($bet_amount){
		
		$board = new Board();
		$spin = $board->do_spin();
		$rand_board =  $board->gen_rand_board($spin);

		$pl = new Payline();
		$matched_paylines = $pl->find_matching_paylines($spin,$rand_board);
		$total_win = $pl->calc_total_win($matched_paylines , $bet_amount);


		$ret_arr = array("board"=>$spin,
						"paylines"=>$matched_paylines,
						"bet_amount"=>$bet_amount,
						"total_win"=>$total_win);

		return json_encode($ret_arr);
    }
}
