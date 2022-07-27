<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Auth\Events\Failed;
use Psy\CodeCleaner\IssetPass;
use Spatie\Analytics\Period;
use Verta;

use function PHPUnit\Framework\isNull;

class DashboardController extends Controller
{

    public function index()
    {
        $v = verta();
        $year = $v->year;
        $m_1 = $v->month(1)->day(1)->toCarbon();
        $m_13 = $v->month(12)->day(30)->toCarbon();
        $now = Carbon::now();
        try {
            if (Analytics::fetchVisitorsAndPageViews(Period::create($m_1, $m_13))->count()) {
                $lastyear = Analytics::fetchVisitorsAndPageViews(Period::create($m_1, $m_13));
            } else {
                $lastyear = [0];
            }


            $farvardin = $ordibehasht = $khordad = $tir = $mordad = $shahrivar = $mehr = $abaan = $azar = $dey = $bahman = $esfand = 0;
            foreach ($lastyear as $key => $value) {

                if (Verta::instance($value['date'])->month == 1) {
                    $farvardin = $farvardin + 1;
                } elseif (Verta::instance($value['date'])->month == 2) {
                    $ordibehasht = $ordibehasht + 1;
                } elseif (Verta::instance($value['date'])->month == 3) {
                    $khordad = $khordad + 1;
                } elseif (Verta::instance($value['date'])->month == 4) {
                    $tir = $tir + 1;
                } elseif (Verta::instance($value['date'])->month == 5) {
                    $mordad = $mordad + 1;
                } elseif (Verta::instance($value['date'])->month == 6) {
                    $shahrivar = $shahrivar + 1;
                } elseif (Verta::instance($value['date'])->month == 7) {
                    $mehr = $mehr + 1;
                } elseif (Verta::instance($value['date'])->month == 8) {
                    $abaan = $abaan + 1;
                } elseif (Verta::instance($value['date'])->month == 9) {
                    $azar = $azar + 1;
                } elseif (Verta::instance($value['date'])->month == 10) {
                    $dey = $dey + 1;
                } elseif (Verta::instance($value['date'])->month == 11) {
                    $bahman = $bahman + 1;
                } elseif (Verta::instance($value['date'])->month == 12) {
                    $esfand = $esfand + 1;
                }
            }


            $month_visits = [$farvardin, $ordibehasht, $khordad, $tir, $mordad, $shahrivar, $mehr, $abaan, $azar, $dey, $bahman, $esfand];
        } catch (\Throwable $th) {
            $lastyear = [0];
            $month_visits = [0];
        }

        $from = Carbon::now()->subDays(30);
        $to = Carbon::now();
        //هزینه های سفارشات
        $amunt_success_orders =  Order::whereBetween('created_at', [$from, $to])->where('status', '1')->sum('paying_amount');
        $amunt_total_orders =    Order::whereBetween('created_at', [$from, $to])->where('status', '1')->sum('total_amount');
        $amunt_coupon_orders =   Order::whereBetween('created_at', [$from, $to])->where('status', '1')->sum('coupon_amount');
        $amunt_delivery_orders = Order::whereBetween('created_at', [$from, $to])->where('status', '1')->sum('delivery_amount');
        //تراکنش های سفارشات
        $success_transaction = Transaction::whereBetween('created_at', [$from, $to])->where('status', 1)->count();
        $all_transaction = Transaction::whereBetween('created_at', [$from, $to])->count();
        //تعداد سفارشات
        $notpay_order = Order::whereBetween('created_at', [$from, $to])->where('status', 0)->count();
        $successpay_order = Order::whereBetween('created_at', [$from, $to])->where('status', 1)->count();
        $successsend_order = Order::whereBetween('created_at', [$from, $to])->where('status', 2)->count();
        $returned_order = Order::whereBetween('created_at', [$from, $to])->where('status', 3)->count();

        $all_order = Order::whereBetween('created_at', [$from, $to])->count();

        //تعداد سفارشات بر اساس زمان
        $month = 12;

        $successTransactions = Transaction::getData($month, 1);
        $successTransactionsChart = $this->chart($successTransactions, $month);
        array_unshift($successTransactionsChart, "data1");
        $lable = $this->chart($successTransactions, $month);

        $unsuccessTransactions = Transaction::getData($month, 0);
        $unsuccessTransactionsChart = $this->chart($unsuccessTransactions, $month);
        array_unshift($unsuccessTransactionsChart, "data2");
        //پربازدید ترین صفحات
        try {
            $more = Analytics::fetchMostVisitedPages(Period::days(30), $maxResults = 3);
        } catch (\Throwable $th) {
            $more = [10, 20, 3];
        }



        //  dd($successTransactionsChart , $unsuccessTransactionsChart);
        return view(
            'admin.page.dashboard',
            compact(

                'success_transaction',
                'all_transaction',
                'notpay_order',
                'successpay_order',
                'all_order',
                'amunt_success_orders',
                'amunt_total_orders',
                'amunt_coupon_orders',
                'amunt_delivery_orders',
                'successsend_order',
                'returned_order',
                'month_visits',
                'more',

            ),

            [
                'successTransactions' => array_values($successTransactionsChart),
                'unsuccessTransactions' => array_values($unsuccessTransactionsChart),
                'labels' => array_keys($lable),
                'transactionsCount' => [$successTransactions->count(), $unsuccessTransactions->count()]
            ]

        );
    }



    public function chart($transactions, $month)
    {
        $result = [];
        $monthName = $transactions->map(function ($item) {
            return verta($item->created_at)->format('%B %y');
        });

        $amount = $transactions->map(function ($item) {
            return $item->amount;
        });

        foreach ($monthName as $i => $v) {

            if (!isset($result[$v])) {
                $result[$v] = 0;
            }
            $result[$v] += $amount[$i];
        }
        if (count($result) != $month) {
            for ($i = 0; $i < $month; $i++) {
                $monthName = verta()->subMonth($i)->format('%B %y');
                $shamsiMonths[$monthName] = 0;
            }
            return array_reverse(array_merge($shamsiMonths, $result));
        }
        return $result;
    }
}
