<?php

namespace App\Http\Controllers;
use App\Models\meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Hash;

class MejaController extends Controller
{

    public function getmeja()
    {
        $dt_meja=Meja::get();
        return response()->json($dt_meja);
    }
    public function getmejakosong(){
        $sts_meja=meja::where('status', 'kosong')
        ->get();
        return response()->json($sts_meja);
}
    public function getsemuameja($id){
        $data = Meja::where('id_meja','=',$id)->get();
        return response()->json($data);
    }
    public function createmeja(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nomor_meja'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = Meja::create([
            'nomor_meja' =>$req->get('nomor_meja'),
            'status' =>'kosong',
        ]);
        if($save){
            return Response()->json(['status'=>true,'message' => 'Sukses Menambah meja']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Menambah meja']);
        }
    }
    public function deletemeja($id){
        $hapus=Meja::where('id_meja',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses menghapus menu']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal mengubah menu']);
        }
    }
    public function updatemeja(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'nomor_meja'=>'required',
            'status'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $ubah = meja::where('id_meja',$id)->update([
            'nomor_meja' =>$req->get('nomor_meja'),
            'status' =>$req->get('status'),
        ]);
        if($ubah){
            return Response()->json(['status'=>true, 'message' => 'Sukses mengubah meja']);
        }else{
            return Response()->json(['status'=>false, 'message' => 'Gagal mengubah meja']);
        }
    }
}
