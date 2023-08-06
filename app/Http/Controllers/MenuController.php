<?php
namespace App\Http\Controllers;
use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Hash;

class MenuController extends Controller
{
    
    public function getmenu()
    {
        $dt_menu=Menu::get();
        return response()->json($dt_menu);
    }
    public function getsemuamenu($id){
        $data = Menu::where('id_menu','=',$id)->get();
        return response()->json($data);
    }
    public function createmenu(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama_menu'=>'required',
            'type'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'required|file',
            'harga'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }

        $imagename = time() . '.' . $req->gambar->extension();
        $req->gambar->move(public_path('images'), $imagename);

        $save = Menu::create([
            'nama_menu' =>$req->get('nama_menu'),
            'type' =>$req->get('type'),
            'deskripsi' =>$req->get('deskripsi'),
            'gambar' => $imagename,
            'harga' =>$req->get('harga'),
        ]);
        if($save){
            return Response()->json(['status'=>true,'message' => 'Sukses Menambah Menu']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Menambah Menu']);
        }
    }
    public function deletemenu($id){
        $hapus=Menu::where('id_menu',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses menghapus menu']);
        } else {
            return Response()->json(['status'=>false, 'message' => 'Gagal mengubah menu']);
        }
    }
    public function updatemenu(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'nama_menu'=>'required',
            'type'=>'required',
            'deskripsi'=>'required',
            // 'gambar'=>'required|file',
            'harga'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }

        // $imagename = time() . '.' . $req->gambar->extension();
        // $req->gambar->move(public_path('images'), $imagename);

        $ubah = menu::where('id_menu',$id)->update([
            'nama_menu'    =>$req->get('nama_menu'),
            'type'          =>$req->get('type'),
            'deskripsi'        =>$req->get('deskripsi'),
            // 'gambar'        =>$imagename,
            'harga'        =>$req->get('harga'),

        ]);
        if($ubah){
            return Response()->json(['status'=>true, 'message' => 'Sukses mengubah menu']);
        }else {
            return Response()->json(['status'=>false, 'message' => 'Gagal mengubah menu']);
}
    }
    public function updategambar(Request $req, $id)
    {
        $gambar = time() . '.' . $req->gambar->extension();
        $req->gambar->move(public_path('images'), $gambar);

        $update =  Menu::where('id_menu', $id)->update([
            'gambar' => $gambar
        ]);

        return response()->json([
            "Message" => "Berhasil",
            "Result" => $update
        ]);
    }
}
