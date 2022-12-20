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

class AbsensiController extends Controller
{
    public function index()
    {
        try {
            $data = Absensi::all();
            if ($data->isEmpty()) {
                $this->responseCode = 200;
                $this->responseMessage = 'Data presensi tidak ditemukan.';

                return response()->json($this->getResponse(), $this->responseCode);
            }else {
                // $data_absen = Absensi::with('user')->find(auth('api')->user()->id);
                $data_absen = Absensi::with('user')->get();

                $user = Auth::id();

                $tampil_data = Pengajuan::where('id_user',$user)
                                    ->where('jenis_izin','3')
                                    ->get();
                $this->responseCode = 200;
                $this->responseMessage = 'Data presensi berhasil ditampilkan.';
                $this->responseData['data_absen']= $data_absen;
                $this->responseData['data_lembur'] = $tampil_data;
    
                return response()->json($this->getResponse(), $this->responseCode);
            }
        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }

    public function showAll(Request $request)
    {
        $data = Absensi::all();
        if ($data->isEmpty()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }else {
            $data_absen = Absensi::with('user')->where('tanggal', 'like', '_____'.$request->tanggal.'%')->get();
            $countHadir = Absensi::where('status','Masuk')
                                ->with('user')->count();
            $countTelat = Absensi::where('status','Tidak Masuk')
                                ->with('user')->count();

            return Datatables::of($data_absen)
                ->addIndexColumn()
                ->addColumn('jumlah_hadir', function($count)
                {
                    $countHadir = Absensi::where('status','Masuk')
                                ->with('user')->count();
                    return $countHadir;
                })
                ->addColumn('jumlah_telat', function($count)
                {
                    $countTelat = Absensi::where('status','Tidak Masuk')
                                ->with('user')->count();
                    return $countTelat;
                })
                ->make(true);
        }
    }

    public function showPerBulanAdmin()
    {
        $data = Absensi::all();
        if ($data->isEmpty()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }else {
            $date = Carbon::now()->format('m');
            $data_absen = Absensi::with('user')->where('tanggal', 'like', '_____'.$date.'%')->get();
            $countHadir = Absensi::where('status','Masuk')
                                ->with('user')->count();
            $countTelat = Absensi::where('status','Tidak Masuk')
                                ->with('user')->count();

            return Datatables::of($data_absen)
                ->addIndexColumn()
                ->addColumn('jumlah_hadir', function($count)
                {
                    $countHadir = Absensi::where('status','Masuk')
                                ->with('user')->count();
                    return $countHadir;
                })
                ->addColumn('jumlah_telat', function($count)
                {
                    $countTelat = Absensi::where('status','Tidak Masuk')
                                ->with('user')->count();
                    return $countTelat;
                })
                ->make(true);
        }
    }

    public function showPerId(Request $request)
    {
        $data = Absensi::where('id_user',Auth::user()->id)->get();
        if ($data->isEmpty()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }else {
            $data_absen = Absensi::where('id_user',Auth::user()->id)->where('tanggal', 'like', '_____'.$request->tanggal.'%')->with('user')->get();
            $countHadir = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Masuk')
                                ->with('user')->count();
            $countTelat = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Tidak Masuk')
                                ->with('user')->count();

            return Datatables::of($data_absen)
                ->addIndexColumn()
                ->addColumn('jumlah_hadir', function($count)
                {
                    $countHadir = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Masuk')
                                ->with('user')->count();
                    return $countHadir;
                })
                ->addColumn('jumlah_telat', function($count)
                {
                    $countTelat = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Tidak Masuk')
                                ->with('user')->count();
                    return $countTelat;
                })
                ->make(true);
        }
    }

    public function showPerBulan()
    {
        $data = Absensi::where('id_user',Auth::user()->id)->get();
        if ($data->isEmpty()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }else {
            $date = Carbon::now()->format('m');
            // $tanggal = Absensi::select('tanggal')->get();
            // $bulan = '';
            // foreach ($tanggal as $tgl){ 
            //     $bln = explode("-", $tgl->tanggal);
            //     $bulan = $bln[1];
            // }
            $data_absen = Absensi::where('id_user',Auth::user()->id)
                            ->where('tanggal', 'like', '_____'.$date.'%')
                            ->with('user')->get();
            $countHadir = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Masuk')
                                ->with('user')->count();
            $countTelat = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Tidak Masuk')
                                ->with('user')->count();

            return Datatables::of($data_absen)
                ->addIndexColumn()
                ->addColumn('jumlah_hadir', function($count)
                {
                    $countHadir = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Masuk')
                                ->with('user')->count();
                    return $countHadir;
                })
                ->addColumn('jumlah_telat', function($count)
                {
                    $countTelat = Absensi::where('id_user',Auth::user()->id)
                                ->where('status','Tidak Masuk')
                                ->with('user')->count();
                    return $countTelat;
                })
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $date = Carbon::now()->format('Y-m-d');
            // $jam = Carbon::now()->format('H');
            // $menit = Carbon::now()->format('i');
            // dd($date,$jam,$menit);

            $status = '';
            $keterangan = '';
            $absen = '';

            $waktu = $request->jam;
            $ex = explode(":", $waktu);
            $jam = $ex[0];
            $menit = $ex[1];
            
            $role = Auth::user()->role_id;
            $id_user = Auth::user()->id;
            $data = Absensi::where([
                    ['id_user', $id_user],
                    ['status', "Tidak Masuk"],
                    ['tanggal', $date]
                ])
                ->exists();
            if ($role == 3 && $data) {
                DB::rollBack();
                $this->responseCode = 200;
                $this->responseMessage = 'Anda sudah absensi';
                return response()->json($this->getResponse(), $this->responseCode);
            } elseif ($role == 3 && Absensi::where([['id_user', $id_user],['status', "Masuk"],['tanggal', $date]])->exists() && ($jam <= 9 && $menit <= 15)) {
                DB::rollBack();
                $this->responseCode = 200;
                $this->responseMessage = 'Anda sudah absensi';
                return response()->json($this->getResponse(), $this->responseCode);
            } elseif ($role == 3 && Absensi::where([['id_user', $id_user],['status', "Pulang"],['tanggal', $date]])->exists() && ($jam >= 17 && $menit >= 00)) {
                DB::rollBack();
                $this->responseCode = 200;
                $this->responseMessage = 'Anda sudah absensi';
                return response()->json($this->getResponse(), $this->responseCode);
            } elseif ($role == 3 && Absensi::where([['id_user', $id_user],['status', "Masuk"],['tanggal', $date]])->exists() && (($jam == 9 && $menit == 16) || ($jam <= 16 && $menit <= 59))) {
                DB::rollBack();
                $this->responseCode = 200;
                $this->responseMessage = 'Anda sudah absensi';
                return response()->json($this->getResponse(), $this->responseCode);
            } else {
                //absen masuk
                if (($jam == 8 && $menit == 45) || ($jam == 8 && $menit <= 59)) {
                    $status = 'Masuk';
                    $keterangan = 'Sangat Baik';
                } elseif (($jam == 9 && $menit == 00) || ($jam == 9 && $menit <= 05)) {
                    $status = 'Masuk';
                    $keterangan = 'Baik';
                } elseif (($jam == 9 && $menit == 06) || ($jam == 9 && $menit <= 15)) {
                    $status = 'Masuk';
                    $keterangan = 'Kurang';
                } elseif (($jam == 9 && $menit == 16) || ($jam <= 16 && $menit <= 59)) {
                    $status = 'Tidak Masuk';
                    $keterangan = 'Tidak Masuk/Alpha';
                }
                //absen pulang
                elseif ($jam >= 17 && $menit >= 00) {
                    $status = 'Pulang';
                    $keterangan = 'Pulang';
                }

                $absen = Absensi::create([
                    'id_user' => Auth::user()->id,
                    'jam' => $request->jam,
                    'tanggal' => $request->tanggal,
                    'status' => $status,
                    'keterangan' => $keterangan
                ]);

                DB::commit();
                $this->responseCode = 200;
                $this->responseMessage = 'Anda berhasil absensi';
                $this->responseData['data_absensi'] = $absen;
                return response()->json($this->getResponse(), $this->responseCode);
            }


        } catch (\Exception $ex) {
            $this->responseCode = 500;
            $this->responseMessage = $ex->getMessage();
            DB::rollBack();

            return response()->json($this->getResponse(), $this->responseCode);
        }
    }
}
