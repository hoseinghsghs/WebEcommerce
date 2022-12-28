<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Analytics;
use Spatie\Analytics\Period;
use Verta;

class AnalyticsController extends Controller
{
    public function show()
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

        //پربازدید ترین صفحات
        try {
            $more = Analytics::fetchMostVisitedPages(Period::days(30), $maxResults = 3);
        } catch (\Throwable $th) {
            $more1 = [
                0 => [
                    "url" => "/",
                    "pageTitle" => "قطعی اتباط",
                    "pageViews" => 10,
                ],
                1 => [
                    "url" => "/blog/3",
                    "pageTitle" => "قطعی اتباط",
                    "pageViews" => 10,
                ],
                2 => [
                    "url" => "/blog/4",
                    "pageTitle" => "قطعی اتباط",
                    "pageViews" => 10,
                ],
            ];
            $more = collect($more1);
        };
        return view(
            'admin.page.analytics.show',
            compact(
                'month_visits',
                'more',
            )
        );
    }
}
