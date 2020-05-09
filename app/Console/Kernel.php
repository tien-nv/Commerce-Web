<?php

namespace App\Console;

use App\models\ProductProcess;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //tạo ra một command chạy hằng phút cập nhật database
        $schedule->call(function () {
            //query ra các sản phẩm đấu giá nếu hết time đấu giá đẩy vào bán bình thường
            $products = DB::table('product')->where('isAuction', '=', 1)->get();
            $products = json_decode($products,true);
            for($i=0;$i<count($products);$i++){
                $check = ProductProcess::checkAuctionTime($products[$i]['Created_at'],$products[$i]['Total_Time']);
                if($check == 0){
                    DB::table('product')->where('Product_ID','=',$products[$i]['Product_ID'])->update(['isAuction'=>0]);
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
