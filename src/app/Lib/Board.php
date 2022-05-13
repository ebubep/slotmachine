<?php 
namespace App\Lib;

use App\Lib\C;

class Board  {
	
	private  $spin = [];
	private $board_arr = [];
	
	public function do_spin(){
		$spin = C::DEF_SYMBOLS ;
		//Use shuffle function to shuffle the $spin array
		shuffle( $spin);
		
		//use array_rand to randomly select 5 additional elements from $spin
		$rand_arr = array_rand( $spin , 5);
		
		//merge the newly shuffled array and the new random 5 elements
		foreach($rand_arr as $elm)$spin[] = $spin[$elm];
		
		return $spin ;
	}
	
	public function gen_rand_board($spin){
		
		$ba = $this->board_arr ;
		$counter = 0;
		for($i = 0; $i < C::DEF_ROW_SIZE; $i++){
			
			$board_code_counter = $i;
			for($j = 0; $j < C::DEF_COL_SIZE; $j++){
				$ba[$board_code_counter] = $spin[$counter];
				$board_code_counter += C::DEF_ROW_SIZE;
				$counter++;
			}
		}
		return $ba;
	}
	
}	
?>