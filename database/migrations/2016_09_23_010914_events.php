<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Events
 *
 * @author  The scaffold-interface created at 2016-09-23 01:09:15pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('events',function (Blueprint $table){

        $table->increments('id');
        $table->String('event_title');
        $table->String('event_type');
        $table->date('event_date');        
        $table->String('event_desc');

        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
