<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Absensi;
use App\Models\Pengajuan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function jumlahTotal()
    {
        try {
            $countLainnya = Pengajuan::where('jenis_izin','0')->count();
            $countSakit = Pengajuan::where('jenis_izin','1')->where('draft','0')->count();
            $countCuti = Pengajuan::where('jenis_izin','2')->count();
            $countLembur = Pengajuan::where('jenis_izin','3')->count();

            $this->responseCode = 200;
            $this->responseMessage = 'Data jumlah berhasil ditampilkan.';
            $this->responseData['jumlah_lainnya']= $countLainnya;
            $this->responseData['jumlah_sakit'] = $countSakit;
            $this->responseData['jumlah_cuti'] = $countCuti;
            $this->responseData['jumlah_lembur'] = $countLembur;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function chart(Request $request)
    {
        try {
            $label = ['Sangat Baik','Baik','Kurang','Tidak Masuk/Alpha'];
            $all = Absensi::where(
                                function($query) {
                                    return $query
                                        ->where('keterangan','Sangat Baik')
                                        ->orWhere('keterangan','Baik')
                                        ->orWhere('keterangan','Kurang')
                                        ->orWhere('keterangan','Tidak Masuk/Alpha');
                            })
                            ->where('tanggal', 'like', '_____'.$request->bulan.'%')
                            ->get();
            $data = [
                'Sangat Baik' => Absensi::where('keterangan','Sangat Baik')->where('tanggal', 'like', '_____'.$request->bulan.'%')->count(),
                'Baik' => Absensi::where('keterangan','Baik')->where('tanggal', 'like', '_____'.$request->bulan.'%')->count(),
                'Kurang' => Absensi::where('keterangan','Kurang')->where('tanggal', 'like', '_____'.$request->bulan.'%')->count(),
                'Tidak Masuk/Alpha' => Absensi::where('keterangan','Tidak Masuk/Alpha')->where('tanggal', 'like', '_____'.$request->bulan.'%')->count()
            ];
            $this->responseCode = 200;
            $this->responseMessage = 'Data graph berhasil ditampilkan.';
            $this->responseData['label']= $label;
            $this->responseData['data_graph']= $data;
            $this->responseData['data_all']= $all;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function chartMonth()
    {
        try {
            $label = ['Sangat Baik','Baik','Kurang','Tidak Masuk/Alpha'];
            $date = Carbon::now()->format('m');
            $all = Absensi::where(
                                function($query) {
                                    return $query
                                        ->where('keterangan','Sangat Baik')
                                        ->orWhere('keterangan','Baik')
                                        ->orWhere('keterangan','Kurang')
                                        ->orWhere('keterangan','Tidak Masuk/Alpha');
                            })
                            ->where('tanggal', 'like', '_____'.$date.'%')
                            ->get();
            $data = [
                'SangatBaik' => Absensi::where('keterangan','Sangat Baik')->where('tanggal', 'like', '_____'.$date.'%')->count(),
                'Baik' => Absensi::where('keterangan','Baik')->where('tanggal', 'like', '_____'.$date.'%')->count(),
                'Kurang' => Absensi::where('keterangan','Kurang')->where('tanggal', 'like', '_____'.$date.'%')->count(),
                'TidakMasuk' => Absensi::where('keterangan','Tidak Masuk/Alpha')->where('tanggal', 'like', '_____'.$date.'%')->count()
            ];
            $this->responseCode = 200;
            $this->responseMessage = 'Data graph berhasil ditampilkan.';
            $this->responseData['label']= $label;
            $this->responseData['data_graph']= $data;
            $this->responseData['data_all']= $all;

            return response()->json($this->getResponse(), $this->responseCode);
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }
}
