<?php

namespace App\Console;

use App\models\ProductProcess;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Mail\NotifyMailAuction;
use Illuminate\Support\Facades\Mail;

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
            $products = json_decode($products, true);
            for ($i = 0; $i < count($products); $i++) {
                $check = ProductProcess::checkAuctionTime($products[$i]['Created_at'], $products[$i]['Total_Time']);
                if ($check == 0) {
                    $auction = DB::table('auction')->where('Product_ID', '=', $products[$i]['Product_ID'])
                        ->where(
                            'Cost',
                            '=',
                            DB::table('auction')->where('Product_ID', '=', $products[$i]['Product_ID'])->max('Cost')
                        )->get();
                    $auction = json_decode($auction, true);
                    if (count($auction) > 0) {
                        DB::table('order_detail')->insert(
                            [
                                'Name' => $products[$i]['Product_Name'], 'Product_ID' => $products[$i]['Product_ID'],
                                'Cost' => $auction[0]['Cost'], 'Count' => 1,
                                'Total' => $auction[0]['Cost'] * 1,
                                'Create_At' => date('Y-m-d H:i:s'),
                                'User_ID' => $auction[0]['User_ID']
                            ]
                        );
                        DB::table('product')->where('Product_ID', '=', $products[$i]['Product_ID'])
                        ->update(['isAuction'=>-1,'Cost'=>$auction[0]['Cost']]);
                        $mail_receiver = DB::table('user')->select('Mail')->where('User_ID','=', $auction[0]['User_ID'])->get();
                        $mail_receiver = json_decode($mail_receiver,true);
                        $details = [
                            'productName' => $products[$i]['Product_Name'],
                            'cost' => $auction[0]['Cost']
                        ];
                        
                        Mail::to($mail_receiver[0]['Mail'])->send(new NotifyMailAuction($details));
                    }else{
                        DB::table('product')->where('Product_ID', '=', $products[$i]['Product_ID'])
                        ->update(['isAuction'=>0]);
                    }
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
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
