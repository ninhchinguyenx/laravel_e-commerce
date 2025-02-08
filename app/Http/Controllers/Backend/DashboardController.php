<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $config = $this->config();
        return view('backend.dashboard.index', compact('config'));
    }

    private function config(){
        return [
            'js' =>[
                'backend/assets/libs/apexcharts/apexcharts.min.js',
                'backend/assets/libs/jsvectormap/js/jsvectormap.min.js',
                'backend/assets/libs/jsvectormap/maps/world-merc.js',
                'backend/assets/libs/swiper/swiper-bundle.min.js',
                'backend/assets/js/pages/dashboard-ecommerce.init.js'
            ],
        ];
    }
}
