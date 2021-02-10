<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Phone;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class MainController extends Controller
{
    public function main(){
        $phones = DB::select("SELECT * FROM phones LEFT JOIN images ON images.PhoneID = phones.ID ORDER BY phones.ID DESC");

        return view('main',['dbInfo' => $phones]);
    }
    public function add(){
        $category = DB::select("SELECT * FROM categories");

        return view('add',['category' =>$category]);
    }
    public function addCategory(){
        return view('addCategory');
    }
    public function addPhoneSubmit(Request $request){
       $validator = Validator::make($request->all(),[
            'Mark' => 'required|max:100',
            'Model' => 'required|max:100',
            'DisplayDiagonal' => 'required|max:100',
            'ScreenResolution' => 'required|max:100',
            'ScreenType' => 'required|max:100',
            'CommunicationStandards' => 'required|max:100',
            'SIMCount' => 'required',
            'CPUmodel' => 'nullable|max:100',
            'CoreNumbers' => 'nullable',
            'CPUfrequency' => 'nullable',
            'GPUmodel' => 'nullable|max:100',
            'RAM' => 'required',
            'ROM' => 'required',
            'MainCamera' => 'required',
            'VideoResolution' => 'required|max:100',
            'FrontCamera' => 'required',
            'Flash' => 'required|max:100',
            'Battery' => 'required|max:100',
            'LongDescription' => 'nullable',
            'ShortDescription' => 'nullable|max:256',
            'Price' => 'required',
            'Count' => 'required',
            'CategoryID' => 'required',
            'Image1' => 'nullable',
            'Image2' => 'nullable',
            'Image3' => 'nullable',
            'Image4' => 'nullable',
            'Image5' => 'nullable'
        ]);
        if ($validator->fails()) {
            return redirect()->route('add')
                ->withErrors($validator)
                ->withInput();
        }

        DB::insert("INSERT INTO phones(Mark, Model, DisplayDiagonal, ScreenResolution, ScreenType, CommunicationStandards, SIMCount,
        CPUmodel, RAM, ROM, MainCamera, VideoResolution, FrontCamera, Flash, Battery, LongDescription, ShortDescription, Price, ICount, CategoryID)
        VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ",[$request->input('Mark'),$request->input('Model'),$request->input('DisplayDiagonal')
            ,$request->input('ScreenResolution'),$request->input('ScreenType'),$request->input('CommunicationStandards'),$request->input('SIMCount'),$request->input('CPUmodel')
            ,$request->input('RAM'),$request->input('ROM'),$request->input('MainCamera'),$request->input('VideoResolution'),$request->input('FrontCamera')
            ,$request->input('Flash'),$request->input('Battery'),$request->input('LongDescription'),$request->input('ShortDescription'),$request->input('Price'),$request->input('Count'),$request->input('CategoryID')]);

        $id = DB::select("SELECT ID FROM phones WHERE Mark =? AND Model = ? AND DisplayDiagonal = ? AND ScreenResolution = ? AND ScreenType = ? AND CommunicationStandards = ?
AND SIMCount = ? AND CPUmodel = ? AND RAM = ? AND ROM = ? AND MainCamera = ? AND VideoResolution = ? AND FrontCamera = ? AND Flash = ? AND Battery = ? AND LongDescription = ? AND ShortDescription = ? AND Price = ?
AND ICount = ? AND CategoryID = ? ",[$request->input('Mark'),$request->input('Model'),$request->input('DisplayDiagonal'),$request->input('ScreenResolution'),$request->input('ScreenType'),$request->input('CommunicationStandards'),$request->input('SIMCount'),$request->input('CPUmodel'),$request->input('RAM'),
            $request->input('ROM'),$request->input('MainCamera'),$request->input('VideoResolution'),$request->input('FrontCamera'),$request->input('Flash'),$request->input('Battery'),$request->input('LongDescription'),$request->input('ShortDescription'),$request->input('Price'),$request->input('Count'),$request->input('CategoryID')])[0]->ID;
        DB::insert("INSERT INTO images(PhoneID) VALUES(?)",[$id]);

        if ($request->file('Image1')) DB::update("UPDATE images SET Image1 = ? WHERE PhoneID = ?", [$request->file('Image1')->openFile()->fread($request->file('Image1')->getSize()),$id]);
        if ($request->file('Image2')) DB::update("UPDATE images SET Image2 = ? WHERE PhoneID = ?", [$request->file('Image2')->openFile()->fread($request->file('Image2')->getSize()),$id]);
        if ($request->file('Image3')) DB::update("UPDATE images SET Image3 = ? WHERE PhoneID = ?", [$request->file('Image3')->openFile()->fread($request->file('Image3')->getSize()),$id]);
        if ($request->file('Image4')) DB::update("UPDATE images SET Image4 = ? WHERE PhoneID = ?", [$request->file('Image4')->openFile()->fread($request->file('Image4')->getSize()),$id]);
        if ($request->file('Image5')) DB::update("UPDATE images SET Image5 = ? WHERE PhoneID = ?", [$request->file('Image5')->openFile()->fread($request->file('Image5')->getSize()),$id]);

        return redirect()->route('MainPage');
    }

    public function addCategorySubmit(Request $request){
        $request->validate([
            'CategoryName' => 'required|max:20'
            ]);
        DB::insert("INSERT INTO categories(Name) VALUE(?) ",[$request->input('CategoryName')]);
        return redirect()->route('MainPage');
    }
    public function search(Request $request){
        $request->validate([
           'search' => 'required'
        ]);
        $result = DB::select("SELECT * FROM phones LEFT JOIN images on images.PhoneID = ID WHERE CONCAT(phones.Mark, ' ', phones.Model) LIKE '%".$request->input('search')."%'");
        return view('searchResult',['phones' => $result]);
    }
    public function about(){
        return view('about');
    }
    public function report(Request $request){
        $request->validate([
           'name' => 'required|max:256',
            'email' => 'required|max:256',
            'subject' => 'required|max:256',
            'text' => 'required'
        ]);
        DB::insert("INSERT INTO reports(Name, Email, Subject, Message) VALUES(?,?,?,?)",[$request->input('name'),$request->input('email'),
        $request->input('subject'),$request->input('text')]);
        return redirect()->route('MainPage');
    }
    public function reports(){
        $report = DB::select("SELECT * FROM reports");

        return view('reports',['reports' =>$report]);
    }
    public function category(){
        $category = DB::select("SELECT * FROM categories");

        return view('category',['categories' =>$category]);
    }
    public function categorySelect($id,Request $request){
        $categoryId = $id;
        $phones = DB::select("SELECT * FROM phones LEFT JOIN images ON images.PhoneID = phones.ID WHERE phones.CategoryID=?",[$categoryId]);
        return view('main',['dbInfo' => $phones]);
    }
    public function aboutPhone($id, Request $request){
        $phone = DB::select("SELECT * FROM phones LEFT JOIN images ON images.PhoneID = phones.ID WHERE phones.ID=?",[$id]);
        $first = $phone[0];
        return view('aboutPhone',['phone' => $first]);
    }
    public function changePhone($id){
        $phone = DB::select("SELECT * FROM phones LEFT JOIN images ON images.PhoneID = phones.ID WHERE phones.ID=?",[$id]);
        $first = $phone[0];
        $category = DB::select("SELECT * FROM categories");
        return view('changePhone',['phone' => $first,'category' =>$category]);
    }
    public function updatePhone(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'Mark' => 'required|max:100',
            'Model' => 'required|max:100',
            'DisplayDiagonal' => 'required|max:100',
            'ScreenResolution' => 'required|max:100',
            'ScreenType' => 'required|max:100',
            'CommunicationStandards' => 'required|max:100',
            'SIMCount' => 'required',
            'CPUmodel' => 'nullable|max:100',
            'CoreNumbers' => 'nullable',
            'CPUfrequency' => 'nullable',
            'GPUmodel' => 'nullable|max:100',
            'RAM' => 'required',
            'ROM' => 'required',
            'MainCamera' => 'required',
            'VideoResolution' => 'required|max:100',
            'FrontCamera' => 'required',
            'Flash' => 'required|max:100',
            'Battery' => 'required|max:100',
            'LongDescription' => 'nullable',
            'ShortDescription' => 'nullable|max:256',
            'Price' => 'required',
            'Count' => 'required',
            'CategoryID' => 'required',
            'Image1' => 'nullable',
            'Image2' => 'nullable',
            'Image3' => 'nullable',
            'Image4' => 'nullable',
            'Image5' => 'nullable'
        ]);
        if ($validator->fails()) {
            return redirect()->route('add')
                ->withErrors($validator)
                ->withInput();
        }
        DB::update("UPDATE phones SET Mark = ?, Model = ?, DisplayDiagonal = ?, ScreenResolution = ?, ScreenType = ?, CommunicationStandards = ?, SIMCount = ?,
        CPUmodel = ?, RAM = ?, ROM = ?, MainCamera = ?, VideoResolution = ?, FrontCamera = ?, Flash = ?, Battery = ?, LongDescription = ?, ShortDescription = ?, Price = ?, ICount = ?, CategoryID = ? WHERE ID = ?
        ",[$request->input('Mark'),$request->input('Model'),$request->input('DisplayDiagonal')
            ,$request->input('ScreenResolution'),$request->input('ScreenType'),$request->input('CommunicationStandards'),$request->input('SIMCount'),$request->input('CPUmodel')
            ,$request->input('RAM'),$request->input('ROM'),$request->input('MainCamera'),$request->input('VideoResolution'),$request->input('FrontCamera')
            ,$request->input('Flash'),$request->input('Battery'),$request->input('LongDescription'),$request->input('ShortDescription'),$request->input('Price'),$request->input('Count'),$request->input('CategoryID'),$id]);


        if ($request->file('Image1')) DB::update("UPDATE images SET Image1 = ? WHERE PhoneID = ?", [$request->file('Image1')->openFile()->fread($request->file('Image1')->getSize()),$id]);
        if ($request->file('Image2')) DB::update("UPDATE images SET Image2 = ? WHERE PhoneID = ?", [$request->file('Image2')->openFile()->fread($request->file('Image2')->getSize()),$id]);
        if ($request->file('Image3')) DB::update("UPDATE images SET Image3 = ? WHERE PhoneID = ?", [$request->file('Image3')->openFile()->fread($request->file('Image3')->getSize()),$id]);
        if ($request->file('Image4')) DB::update("UPDATE images SET Image4 = ? WHERE PhoneID = ?", [$request->file('Image4')->openFile()->fread($request->file('Image4')->getSize()),$id]);
        if ($request->file('Image5')) DB::update("UPDATE images SET Image5 = ? WHERE PhoneID = ?", [$request->file('Image5')->openFile()->fread($request->file('Image5')->getSize()),$id]);

        if($request->input('Check1') == true)DB::update("UPDATE images SET Image1 = NULL WHERE PhoneID = ?",[$id]);
        if($request->input('Check2') == true)DB::update("UPDATE images SET Image2 = NULL WHERE PhoneID = ?",[$id]);
        if($request->input('Check3') == true)DB::update("UPDATE images SET Image3 = NULL WHERE PhoneID = ?",[$id]);
        if($request->input('Check4') == true)DB::update("UPDATE images SET Image4 = NULL WHERE PhoneID = ?",[$id]);
        if($request->input('Check5') == true)DB::update("UPDATE images SET Image5 = NULL WHERE PhoneID = ?",[$id]);

        return redirect()->route('MainPage');
    }
    public function deletePhone($id){
        DB::delete("DELETE FROM phones WHERE ID = ?",[$id]);

        return redirect()->route('MainPage');
    }
    public function ordersPage(){
$re = DB::select("SELECT * FROM buyers as b INNER JOIN purchases as p ON p.BuyerID=b.BuyerID INNER JOIN phones as ph ON ph.ID=p.PhoneID");

        $buyers = DB::select("SELECT * FROM buyers as b");
        $arr = [];
        foreach ($buyers as $b){
            $arr[$b->BuyerID] = DB::select("SELECT *,p.ID AS PurchID FROM purchases as p  INNER JOIN phones as ph ON ph.ID=p.PhoneID WHERE BuyerID=? AND Delivered=false", [$b->BuyerID]);
        }
        return view('orders', ['buyers' => $buyers, 'purchases' => $arr]);
    }
    public function ordersUpdate($id, Request $request){
        if($request->input('Submit')=='on')$Submit = true;
            else $Submit = false;
        if($request->input('Send')=='on')$Send = true;
            else $Send = false;
        if($request->input('Delivered')=='on')$Delivered = true;
            else $Delivered = false;
        DB::update("UPDATE purchases SET Submit = ?, Send = ?, Delivered = ? WHERE ID = ? ",[$Send,$Submit,$Delivered,$id]);
        return redirect()->route('ordersPage');
    }
    public function reportsPurchases(){
        $mostP = DB::select("SELECT max(Pdate) AS dt, SUM(Total) AS money, COUNT(p.PhoneID) AS pmax, ph.* FROM purchases AS p LEFT JOIN phones AS ph ON ph.ID = p.PhoneID GROUP BY p.PhoneID ORDER BY pmax DESC");
        $last = DB::select("SELECT phones.* FROM phones LEFT JOIN purchases ON purchases.PhoneID = phones.ID WHERE purchases.PhoneID IS NULL");

        return view('reportPurchases',['in'=>$mostP,'ls'=>$last]);
    }
    public function reportsDate(Request $request){
        $tmp = DB::select("SELECT max(Pdate) AS dt, SUM(Total) AS money, COUNT(p.PhoneID) AS pmax, ph.* FROM purchases AS p LEFT JOIN phones AS ph ON ph.ID = p.PhoneID WHERE Pdate BETWEEN ? AND ? GROUP BY p.PhoneID ORDER BY pmax DESC",[$request->input('frst'),$request->input('scnd')]);

        return view('reportPurchases',['in'=>$tmp,'ls'=>NULL]);
    }
}
