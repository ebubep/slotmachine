<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SlotController; 
use App\Lib\C ;
//use Symfony\Component\Console\Input\InputOption;

class Slot extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'slot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Execute the demo slot app";
	
/**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$bet_amount = C::BET_AMOUNT ;
		$sc =  new SlotController();
		echo $sc->launch($bet_amount);
	   
    }

}