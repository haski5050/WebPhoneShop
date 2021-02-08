<?php
namespace App\Http\Controllers;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers;
use ArrayObject;
use DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Logger\ConsoleLogger;

class CookieController extends Controller {

    public function addToBasket($id, Request $request){
        $tmp = (new DateTime())->format('His');
        if($request->cookie('id') == NULL){
            DB::insert("INSERT INTO basket(ID,PhoneID,ICount) VALUES(?,?,?)",[$tmp,$id,$request->input('Count')]);
            return redirect()->route('aboutPhone',[$id])->withCookie(cookie('id',$tmp,3));
        }
            else {
            $basket = DB::select("SELECT * FROM basket WHERE ID = ?",[$request->cookie('id')]);
            $add = true;
            foreach ($basket as $el){
                if($el->PhoneID == $id){
                    DB::update("UPDATE basket SET ICount = ICount + ? WHERE ID = ? AND PhoneID = ?",[$request->input('Count'),$request->cookie('id'),$id]);
                    $add = false;
                    break;
                }

            }
            if($add)DB::insert("INSERT INTO basket(ID,PhoneID,ICount) VALUES(?,?,?)", [$request->cookie('id'), $id,$request->input('Count')]);
                return redirect()->route('aboutPhone',[$id]);
        }


    }
    public function showCookie(Request $request){
        $phones = DB::select("SELECT basket.ID AS basketID, basket.ICount AS bcount, phones.*, images.* FROM basket INNER JOIN phones ON phones.ID = basket.PhoneID LEFT JOIN images ON images.PhoneID = phones.ID WHERE basket.ID = ?",[$request->cookie('id')]);
        return view('basket',['phones'=>isset($phones)?$phones:NULL]);
    }
    public function deleteBasket($id, Request $request){
        DB::delete("DELETE FROM basket WHERE ID = ? AND PhoneID = ?",[$request->cookie('id'),$id]);


        return redirect()->route('basketPage');

    }
    public function orderSubmit(Request $request){
        $frst = DB::select("SELECT basket.ID AS basketID, basket.ICount AS bcount, phones.*, images.* FROM basket INNER JOIN phones ON phones.ID = basket.PhoneID LEFT JOIN images ON images.PhoneID = phones.ID WHERE basket.ID = ?",[$request->cookie('id')]);

        return view('orderSubmit',['phones'=>$frst]);

    }
    public function orderUpdate(Request $request){
        $frst = DB::select("SELECT basket.ID AS basketID, basket.ICount AS bcount, phones.*, images.* FROM basket INNER JOIN phones ON phones.ID = basket.PhoneID LEFT JOIN images ON images.PhoneID = phones.ID WHERE basket.ID = ?",[$request->cookie('id')]);
        $tmp = true;

        foreach ($frst as $el){
            if($el->bcount <= $el->ICount) {
                DB::update("UPDATE phones SET ICount = ICount - ? WHERE ID = ?", [$el->bcount, $el->PhoneID]);
                $tmp = false;
            }
        }
        if($tmp) {
            Log::info('count error');
            echo "<script>alert('Кількість товару більша ніж в наявності!')</script>";
        }
        else {
            $validator = Validator::make($request->all(), [
                'PIB' => 'required|max:50',
                'Age' => 'required',
                'PhoneNumber' => 'required|max:10',
                'Address' => 'required|max:50',
            ]);
            if ($validator->fails()) {
                return redirect()->route('add')
                    ->withErrors($validator)
                    ->withInput();
            }
            $buyers = DB::select("SELECT * FROM buyers");
            foreach ($buyers as $b){
                if($b->PIB == $request->input('PIB') && $b->Age == $request->input('Age') && $b->PhoneNumber == $request->input('PhoneNumber') && $b->Address == $request->input('Address'))Log::info('Такий покупець існує');
                else{
                    DB::insert("INSERT INTO buyers(PIB, Age, PhoneNumber, Address) VALUES(?,?,?,?)", [$request->input('PIB'), $request->input('Age'), $request->input('PhoneNumber'), $request->input('Address')]);
                }
            }
            $BID = DB::select("SELECT BuyerID FROM buyers WHERE PIB = ? AND Age = ? AND PhoneNumber = ? AND Address = ?", [$request->input('PIB'), $request->input('Age'), $request->input('PhoneNumber'), $request->input('Address')])[0]->BuyerID;
            foreach ($frst as $el) {
                DB::insert("INSERT INTO purchases(BuyerID, PhoneID, Total) VALUES(?,?,?)", [$BID, $el->ID, $el->Price]);
            }
        }
        return redirect()->route('MainPage');
    }
}
