<?php

namespace App\Controllers;

use App\Models\PayloadModel;

class Payload extends BaseController
{

    // Data Awal Sebelum Pilih Kabupaten / Kecamatan (Default)
    public function index()
    {
        $payloadModel = new PayloadModel();
        $data['payload'] = $payloadModel->select('payload.*, SUM(payload) as total_payload')
            ->groupBy('kabupaten')
            ->orderBy('total_payload', 'ASC')
            ->limit(10)
            ->get()
            ->getResultArray();

        return view('payload', $data);
    }

    // Data Kabupaten
    public function kabupaten($selectedKabupaten)
    {
        # $selectedKabupaten (nilai atau key pengkondisian)
        $payloadModel = new PayloadModel();
        $data['payload'] = $payloadModel
            ->where('kabupaten', $selectedKabupaten)
            ->orderBy('payload', 'ASC') // Mengurutkan dari yang terkecil
            ->findAll();
        return view('payload_table_kabupaten', $data);
    }

    // Data Kecamatan
    public function kecamatan($selectedKecamatan)
    {
        # $selectedKecamatan (nilai atau key pengkondisian)
        $payloadModel = new PayloadModel();
        $data['payload'] = $payloadModel
            ->where('kecamatan', $selectedKecamatan)
            ->orderBy('payload', 'DESC') // Mengurutkan dari yang terkecil
            ->findAll();
        return view('payload_table_kecamatan', $data);
    }

    // Return default
    public function default()
    {
        $payloadModel = new PayloadModel();
        $data['payload'] = $payloadModel->select('payload.*, SUM(payload) as total_payload')
            ->groupBy('kabupaten')
            ->orderBy('total_payload', 'ASC')
            ->limit(10)
            ->get()
            ->getResultArray();
        return view('payload_table_default', $data);
    }
}
