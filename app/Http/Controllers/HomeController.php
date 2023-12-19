<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $faker = Faker::create('id_ID');
        $nama_pria = $faker->name('male');
        $nama_wanita = $faker->name('female');
        $nama_akrab_pria = explode(' ', $nama_pria);
        $nama_akrab_pria = end($nama_akrab_pria);
        $nama_akrab_wanita = explode(' ', $nama_wanita);
        $nama_akrab_wanita = end($nama_akrab_wanita);
        
        $pengantin = (object)[
            'nama_pria' => $nama_pria,
            'nama_wanita' => $nama_wanita,
            'nama_akrab_pria' => $nama_akrab_pria,
            'nama_akrab_wanita' => $nama_akrab_wanita,
            'tempat_menikah' => $faker->address(),
            'tgl_menikah' => date('d-m-Y'),
            'waktu_menikah_mulai' => date('H:m'),
            'waktu_menikah_selesai' => date('H:m'),
            'nama_orgtua_pria_1' => $faker->name('male'),
            'nama_orgtua_pria_2' => $faker->name('female'),
            'nama_orgtua_wanita_1' => $faker->name('male'),
            'nama_orgtua_wanita_2' => $faker->name('female'),
        ];

    	return view('home.index', ['pengantin' => $pengantin]);
    }

    public function greeting($person = null)
    {
        $data = array(
            'code' => 200,
            'status' => 'success',
            'data' => [
                'message' => 'Welcome, ' . ($person ?? 'Stranger') . '!'
            ]
        );

        return view('home.greeting', $data);
    }
}
