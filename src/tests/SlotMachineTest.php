<?php
namespace Tests;

use App\Http\Controllers\SlotController ;
use App\Lib\Board;
use App\Lib\Payline;
use App\Lib\C;

class SlotMachineTest extends TestCase
{
    
	/**
     * Test that the output matches required JSON format
     *
     * @return void
     */
    public function testJSONSignature($bet_amount = C::BET_AMOUNT){
        
		$sc =  new SlotController();
		$res_json_str = $sc->launch($bet_amount);
		json_decode($res_json_str);
		echo "\n\n Test if the SlotController returns valid JSON" ;
        echo $this->assertTrue( (json_last_error() == JSON_ERROR_NONE));
    }
	
	public function testTotalWin($bet_amount = C::BET_AMOUNT){
	
		$board = new Board();
		$spin = ['A','monkey','J','Q','K','cat','J','Q','J','bird','J','bird','J','Q','J'];
		$rand_board =  $board->gen_rand_board($spin);
		
		$pl = new Payline();
		
		echo "\n\n Test if the Payline returns accurate total win" ;
		$matched_paylines = $pl->find_matching_paylines($spin,$rand_board);
		$total_win = $pl->calc_total_win($matched_paylines , $bet_amount);
		
		echo $this->assertEquals(1020, $total_win );
		
		echo "\n\n Test if the Payline returns accurate total win" ;
		$spin = ['J','J','J','Q','K','cat','J','Q','monkey','bird','bird','bird','J','Q','A'];
		$rand_board =  $board->gen_rand_board($spin);
		$matched_paylines = $pl->find_matching_paylines($spin,$rand_board);
		$total_win = $pl->calc_total_win($matched_paylines , $bet_amount);
		
		
		echo $this->assertEquals(40, $total_win );
		
	}
	
	
}
