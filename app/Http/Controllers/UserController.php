<?php
namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function getuser()
    {
        $dt_user=User::get();
        return response()->json($dt_user);
    }
    public function getsemuauser($id){
        $data = User::where('id_user','=',$id)->get();
        return response()->json($data);
    }
    public function getkasir()
    {
        $kasir = user::where('role','kasir')
        ->get();
        return response()->json($kasir);
    }
    public function createuser(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama_user'=>'required',
            'username'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = User::create([
            'nama_user' =>$req->get('nama_user'),
            'username' =>$req->get('username'),
            'role' =>$req->get('role'),
            'password' =>$req->get('password'),
        ]);
        if($save){
            return Response()->json(['status'=>true,'message' => 'Sukses Menambah User']);
        } else {
            return Response()->json(['status'=>false,'message' => 'Gagal Menambah User']);
        }
    }
    public function deleteuser($id){
        $hapus=User::where('id_user',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>true,'message' => 'Sukses menghapus user']);
        } else {
            return Response()->json(['status'=>false, 'message' => 'Gagal mengubah user']);
        }
    }
    public function updateuser(Request $req,$id)
    {
        $validator = Validator::make($req->all(),[
            'nama_user'=>'required',
            'username'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $ubah = user::where('id_user',$id)->update([
            'nama_user'    =>$req->get('nama_user'),
            'username'          =>$req->get('username'),
            'role'        =>$req->get('role'),
            'password'        =>$req->get('password'),

        ]);
        if($ubah){
            return Response()->json(['status'=>true, 'message' => 'Sukses mengubah user']);
        }else {
            return Response()->json(['status'=>false, 'message' => 'Gagal mengubah user']);
}
    }
}
