<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

   public function semester()
   {
    $data['title'] = 'Semester';
    $semester = DB::table('semester')->get();
    return view('admin/semester',  ['semester' => $semester], $data);
   }

   public function tambah_semester(Request $request)
   {
       DB::table('semester')->insert([
           'semester' => $request->nama_semester,
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
           ->update(['semester' => $request->nama_semester], ['updated_at' => now()]);

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
}
