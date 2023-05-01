<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    
    public function role()
    {
        $data['title'] = 'Role Management';
		$role = DB::table('role')->get();
        return view('admin/role',  ['role' => $role], $data);
    }

    public function tambah_role(Request $request)
    {
        DB::table('role')->insert([
			'role' => $request->role,
			'created_at' => now(),
		]);
		return redirect()
			->route('role')
			->withSuccess('Role berhasil di tambah');
    }

    public function edit_role(Request $request, $id)
	{
		DB::table('role')
			->where('id', $id)
			->update(['role' => $request->role], ['updated_at' => now()]);
		return redirect()
			->route('role')
			->withSuccess('Role berhasil di edit');
	}

	public function hapus_role($id)
	{
		DB::table('role')
			->where('id', $id)
			->delete();
		return redirect()
			->route('role')
			->withSuccess('Role berhasil dihapus');
	}

    public function kelas()
    {
        $data['title'] = 'Kelola Kelas';

		$kelas = DB::table('kelas')->get();

        return view('admin/kelas',  ['kelas' => $kelas], $data);
    }

    public function tambah_kelas(Request $request)
    {
        DB::table('kelas')->insert([
			'kelas' => $request->kelas,
			'created_at' => now(),
		]);
		return redirect()
			->route('kelas')
			->withSuccess('Kelas berhasil di tambah');
    }

    public function edit_kelas(Request $request, $id)
    {
        DB::table('kelas')
			->where('id', $id)
			->update(['kelas' => $request->kelas], ['updated_at' => now()]);
		return redirect()
			->route('kelas')
			->withSuccess('Kelas berhasil di edit');
    }

    public function hapus_kelas($id)
    {
        DB::table('kelas')
			->where('id', $id)
			->delete();
		return redirect()
			->route('kelas')
			->withSuccess('Kelas berhasil dihapus');
    }

    public function mapel()
    {
        $data['title'] = 'Kelola Mata Pelajaran';

		$mapel = DB::table('mapel')->get();

        return view('admin/mapel',  ['mapel' => $mapel], $data);
    }

    public function tambah_mapel(Request $request)
    {
        DB::table('mapel')->insert([
			'nama_mapel' => $request->nama_mapel,
			'created_at' => now(),
		]);
		return redirect()
			->route('mapel')
			->withSuccess('Mapel berhasil di tambah');
    }

    public function edit_mapel(Request $request, $id)
    {
        DB::table('mapel')
            ->where('id', $id)
            ->update(['nama_mapel' => $request->nama_mapel], ['updated_at' => now()]);

        return redirect()
            ->route('mapel')
            ->withSuccess('Mapel berhasil di edit');
    }

   public function hapus_mapel($id)
   {
        DB::table('mapel')
            ->where('id', $id)
            ->delete();
        return redirect()
            ->route('mapel')
            ->withSuccess('Mapel berhasil dihapus');
   }

   public function jadwal_mapel()
   {
    $data['title'] = 'Kelola Jadwal Mapel';
    $kelas = DB::table('kelas')->get();
    $semester = DB::table('semester')->get();
    $thn_ajaran = DB::table('thn_ajaran')->get();
    $mapel = DB::table('mapel')->get();
    $jadwal_mapel = DB::table('jadwal_mapel')
    ->join('kelas', 'kelas.id','=','jadwal_mapel.id_kelas' )
    ->join('semester', 'semester.id','=','jadwal_mapel.id_semester' )
    ->join('mapel', 'mapel.id','=','jadwal_mapel.id_mapel' )
    ->join('thn_ajaran', 'thn_ajaran.id','=','jadwal_mapel.id_thn_ajaran' )
    ->select('jadwal_mapel.*', 'kelas.kelas', 'semester.semester', 'mapel.nama_mapel','thn_ajaran.tahun_ajaran')->get();
    // $jadwal_mapel = DB::select('SELECT jadwal_mapel.*,jadwal_mapel.id, jadwal_mapel.id_mapel, kelas.kelas as nama_kelas, mapel.nama_mapel as nama_mapel , semester.semester as nama_semester, thn_ajaran.tahun_ajaran as nama_thn_ajaran FROM jadwal_mapel, kelas, semester, thn_ajaran, mapel WHERE jadwal_mapel.id_mapel = mapel.id AND jadwal_mapel.id_kelas = kelas.id AND jadwal_mapel.id_semester = semester.id AND jadwal_mapel.id_thn_ajaran=thn_ajaran.id;');

     return view('admin.jadwal_mapel', [
    'jadwal_mapel' => $jadwal_mapel,
    'kelas' => $kelas,
    'semester' => $semester,
    'thn_ajaran' => $thn_ajaran,
    'mapel' => $mapel,], $data);

   }

   public function tambah_jadwal_mapel(Request $request)
   {

       DB::table('jadwal_mapel')->insert([
           'id_kelas' => $request->id_kelas,
           'id_semester' => $request->id_semester,
           'id_thn_ajaran' => $request->id_thn_ajaran,
           'id_mapel' => $request->id_mapel,
           'dari' => $request->dari,
           'sampai' => $request->sampai,
           'created_at' => now(),
       ]);
       return redirect()
           ->route('jadwal.mapel')
           ->withSuccess('Jadwal berhasil di tambah');
   }
   public function edit_jadwal_mapel(Request $request, $id)
   {
// dd($id);
DB::table('jadwal_mapel')
    ->where('id', $id)
    ->update(
    ['id_mapel' => $request->id_mapel], 
    ['id_kelas' => $request->id_kelas], 
    ['id_semester' => $request->id_semester], 
    ['id_thn_ajaran' => $request->id_thn_ajaran], 
    ['dari' => $request->dari], 
    ['sampai' => $request->sampai], 
    ['updated_at' => now()]);

return redirect()
    ->route('jadwal.mapel')
    ->withSuccess('Jadwal berhasil di edit');
   
     }

     public function hapus_jadwal_mapel($id)
   {
// dd($id);

        DB::table('jadwal_mapel')
            ->where('id', $id)
            ->delete();
        return redirect()
            ->route('jadwal.mapel')
            ->withSuccess('Jadwal berhasil dihapus');
   }

   public function semester()
   {
    $data['title'] = 'Semester';
    $semester = DB::table('semester')->get();
    return view('admin/semester',  ['semester' => $semester], $data);
   }

   public function tambah_semester(Request $request)
   {
        DB::table('semester')->insert([
            'semester' => $request->semester,
            'created_at' => now(),
        ]);
        return redirect()
            ->route('semester')
            ->withSuccess('Semester berhasil di tambah');
   }

   public function edit_semester(Request $request, $id)
   {
        DB::table('semester')
            ->where('id', $id)
            ->update(['semester' => $request->semester], ['updated_at' => now()]);

        return redirect()
            ->route('semester')
            ->withSuccess('Semester berhasil di edit');
   }

   public function hapus_semester($id)
   {
        DB::table('semester')
            ->where('id', $id)
            ->delete();
        return redirect()
            ->route('semester')
            ->withSuccess('Semester berhasil dihapus');
   }

   public function thn_ajaran()
   {
    $data['title'] = 'Tahun Ajaran';

    $thn_ajaran = DB::table('thn_ajaran')->get();

    return view('admin/thn_ajaran',  ['thn_ajaran' => $thn_ajaran], $data);
   }

   public function tambah_thn_ajaran(Request $request)
   {
    DB::table('thn_ajaran')->insert([
        'tahun_ajaran' => $request->tahun_ajaran,
        'created_at' => now(),
    ]);
    return redirect()
        ->route('thn.ajaran')
        ->withSuccess('Tahun ajaran berhasil di tambah');
   }
   
   public function edit_thn_ajaran(Request $request, $id)
   {
    DB::table('thn_ajaran')
        ->where('id', $id)
        ->update(['tahun_ajaran' => $request->tahun_ajaran], ['updated_at' => now()]);

    return redirect()
        ->route('thn.ajaran')
        ->withSuccess('Tahun ajaran berhasil di edit');
   }

   public function hapus_thn_ajaran($id)
   {
        DB::table('thn_ajaran')
            ->where('id', $id)
            ->delete();
        return redirect()
            ->route('thn.ajaran')
            ->withSuccess('Tahun ajaran berhasil dihapus');
   }

   public function krs()
   {
        $data['title'] = 'Kelola KRS';
        $krs = DB::select('SELECT users.name as siswa,users.name as pengajar,krs.id, krs.id_users,krs.id_jadwal_mapel, krs.id_pengajar from users, krs where users.id=krs.id_users and users.role_id=3;');
        $users = DB::select('SELECT name as siswa, users.id from users WHERE role_id=3;');
        $pengajar = DB::select('SELECT name as pengajar, users.id from users WHERE role_id=2;');
        $jadwalmapel = DB::select('SELECT jadwal_mapel.*, mapel.nama_mapel as mapel FROM mapel,jadwal_mapel WHERE jadwal_mapel.id_mapel=mapel.id;');
        // $krs = DB::table('krs')->get();
        return view('admin/krs',['krs' => $krs,'users' => $users,'pengajar' => $pengajar,'jadwalmapel' => $jadwalmapel], $data);
   }

   public function tambah_krs(Request $request)
   {
    DB::table('krs')->insert([
        'id_jadwal_mapel' => $request->id_jadwal_mapel,
        'id_users' => $request->id_users,
        'id_pengajar' => $request->id_pengajar,
        'created_at' => now(),
    ]);
    return redirect()
        ->route('krs')
        ->withSuccess('KRS berhasil di tambah');
   }

   public function edit_krs(Request $request, $id)
   {
    // dd($request);
    DB::table('krs')
        ->where('id', $id)
        ->update(['id_users' => $request->id_users],['id_jadwal_mapel' => $request->id_jadwal_mapel],['id_pengajar' => $request->id_pengajar], ['updated_at' => now()]);

    return redirect()
        ->route('krs')
        ->withSuccess('Krs berhasil di edit');
   }


   public function hapus_krs($id)
   {
        DB::table('krs')
            ->where('id', $id)
            ->delete();
        return redirect()
            ->route('krs')
            ->withSuccess('KRS berhasil dihapus');
   }


   public function absensi()
   {
        $data['title'] = 'Kelola Absensi';

        $absensi = DB::table('absensi')->get();

        return view('admin/absensi',  ['absensi' => $absensi], $data);
   }

   public function nilai()
   {
        $data['title'] = 'Kelola Nilai';
        $nilai = DB::table('nilai')->get();
        return view('admin/nilai',  ['nilai' => $nilai], $data);
   }
}