
<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('advertisementsrequests',function(Blueprint $table){
            $table->increments("id");
            $table->integer('medicalcompany_id')->unsigned();
            $table->foreign('medicalcompany_id')->references('id')->on('medicalcompany');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('advertisement_id')->unsigned();
            $table->foreign('advertisement_id')->references('id')->on('advertisement');
            $table->boolean('isconfirmed');
            $table->date('advertisementrequstdate');
            $table->time('advertisementrequsttime');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
Schema::drop('advertisementsrequests',function(Blueprint $table)
        {
            $table->dropForeign('advertisementsrequests_medicalcompany_id_foreign');
            $table->dropForeign('advertisementsrequests_user_id_foreign');
            $table->dropForeign('advertisementsrequests_advertisement_id_foreign');
        });
    }
}
