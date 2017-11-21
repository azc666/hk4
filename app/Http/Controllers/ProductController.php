<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Phone;
use Session;
use PDF;
use Imagick;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use ImagickPixel;
use ImageMagick;
use \Cart as Cart;
use App\Classes\LayoutHelpersClass;
// use Spatie\PdfToImage\Pdf;

class ProductController extends Controller
{
    public function show(Request $request, Product $product, Category $category)
    {
        // $product = new Product;
        //$category = new \App\Category;
        //$category = $category->cat_name;
         //dd($request->rowId);
        Session::put('prodId', $product->id);
        // Session::put('title', $request->title);
         //if ($request->qty > 0) {
          //Cart::update($request->rowId, ['qty' => $request->qty, 'price' => $request->price]);
        //Session::put('rowId', '');
        //return redirect('products/' . $product->id)->withSuccessMessage('The xxx has been updated!'); 
        //}
        return view('products.show', [$product->id], compact('product', 'category', 'request'));
    }

    public function index(Product $products)
    {
        // $category = $products->categories()->orderBy('created_at', 'desc')->paginate(2);
         //$category = Category::all();
//         $articles = Article::with('users')->all();
         //$products = Product::all();
         //$product = Product::orderBy('prod_name', 'desc');

         //$filePath = 'assets/mpdf/temp/showData.jpg';

         //Storage::disk('public')->put('"mpdf/temp/" . {Auth::user->username} . "/showData.jpg"', $filePath);
         //Storage::disk('public')->delete('showData.jpg');
         //$exists = Storage::disk('public')->exists('showData.jpg');
         //echo $exists;

        return view('products.index', compact('category', 'products'));
    }

    public function showData(Request $request, Product $product)
    {   
        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            $phone .= Phone::phoneNumber($numb) . ' &#8226; ';
            // $request->merge(['phone' => App\Phone::phoneNumber($numb)]);
        }
        elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= Phone::phoneNumber($numb);
        }  
        if ($request->fax) {
            $phone .= 'Fax ' .  Phone::phoneNumber($numbfax);
        } 
        if (($request->cell) && ($request->fax)) {
            $phone .= ' &#8226; Cell ' . Phone::phoneNumber($numbcell);
        }
        elseif ($request->cell && ($request->phone)) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        elseif ($request->cell) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::phoneNumber($numbfax)]);
        $request->merge(['cell' => Phone::phoneNumber($numbcell)]); 

        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        } else {
            mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }
        
////////////////////////////////////// Business Cards ////////////////////////////////////////
        if ($request->id == 1 || $request->id == 2 || $request->id == 3 || $request->id == 4 || $request->id == 10 || $request->id == 11 || $request->id == 12 || $request->id == 13 || $request->id == 7 || $request->id == 16 || $request->id == 27 || $request->id == 28 || $request->id == 29 || $request->id == 30 || $request->id == 31 || $request->id == 32) { // BCs
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone', 'phoneValidation'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

////////////////////////////////////// Note Pads /////////////////////////////////////////////
        if ($request->id == 19 || $request->id == 20 || $request->id == 21 || $request->id == 22 || $request->id == 33 || $request->id == 34) { 
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

//////////////////////////////////////// Letterhead ///////////////////////////////////////       
        if ($request->id == 8 || $request->id == 17 || $request->id == 5 || $request->id == 14 || $request->id == 37 || $request->id == 38) {  
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392,517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

//////////////////////////////////////// Envelope ////////////////////////////////////////        
        if ($request->id == 9 || $request->id == 18 || $request->id == 35 || $request->id == 36 || $request->id == 6 || $request->id == 15) {  
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 170.4),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

//////////////////////////////// Our Process Brochures ///////////////////////////////        
        if ($request->id == 23 || $request->id == 24 || $request->id == 25 || $request->id == 26) {  
            $pdf = PDF::loadView('products.showData', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 1035.2),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF  PROOF  PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.09,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);

        $pdf->save($pathToPdf);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);

        Session::put('prod_description', strip_tags($request->prod_description));
        Session::put('address2', $request->address2);
        //dd(strip_tags(Session::get('prod_description')));
        return back()->withInput();

    }

    public function showEdit(Request $request, Product $product)
    {   
        $numb = $request->phone;
        $numbfax = $request->fax;
        $numbcell = $request->cell;

        $phone = '';
        if (($request->phone) && ($request->fax || $request->cell)) {
            $phone .= Phone::phoneNumber($numb) . ' &#8226; ';
            // $request->merge(['phone' => App\Phone::phoneNumber($numb)]);
        }
        elseif (empty($request->fax) && empty($request->cell)) {
            $phone .= Phone::phoneNumber($numb);
        }  
        if ($request->fax) {
            $phone .= 'Fax ' .  Phone::phoneNumber($numbfax);
        } 
        if (($request->cell) && ($request->fax)) {
            $phone .= ' &#8226; Cell ' . Phone::phoneNumber($numbcell);
        }
        elseif ($request->cell && ($request->phone)) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        elseif ($request->cell) {
            $phone .= 'Cell ' . Phone::phoneNumber($numbcell);
        }
        $request->merge(['phone' => Phone::phoneNumber($numb)]); 
        $request->merge(['fax' => Phone::phoneNumber($numbfax)]);
        $request->merge(['cell' => Phone::phoneNumber($numbcell)]);  

        $data = [];

        if (file_exists('assets/mpdf/temp/' . Auth::user()->username)) {
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        } else {
            // mkdir('assets/mpdf/temp/' . Auth::user()->username);
            $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
            $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';
        }

//////////////////////////////// Business Cards //////////////////////////////////        
        if ($request->prod_id == 1 || $request->prod_id == 2 || $request->prod_id == 3 || $request->prod_id == 4 || $request->prod_id == 10 || $request->prod_id == 11 || $request->prod_id == 12 || $request->prod_id == 13 || $request->prod_id == 7 || $request->prod_id == 16 || $request->prod_id == 27 || $request->prod_id == 28 || $request->prod_id == 29 || $request->prod_id == 30 || $request->prod_id == 31 || $request->prod_id == 32) { 

            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(266, 152.4),    // jpg dimensions (665x381) / 2.5
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

////////////////////////////////// Note Pads //////////////////////////////////        
        if ($request->prod_id == 19 || $request->prod_id == 20 || $request->prod_id == 21 || $request->prod_id == 22 || $request->prod_id == 33 || $request->prod_id == 34) { 
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(405.2, 517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }
        
/////////////////////////////// Letterhead ////////////////////////////////////         
        if ($request->prod_id == 8 || $request->prod_id == 17 || $request->prod_id == 5 || $request->prod_id == 14 || $request->prod_id == 37 || $request->prod_id == 38) {  
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392,517.6),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

///////////////////////////////// Envelope ////////////////////////////////         
        if ($request->prod_id == 9 || $request->prod_id == 18 || $request->prod_id == 6 || $request->prod_id == 15 || $request->prod_id == 35 || $request->prod_id == 36) { 
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 170.4),
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

///////////////////////////// Our Process Brochures ///////////////////////////        
        if ($request->prod_id == 23 || $request->prod_id == 24 || $request->prod_id == 25 || $request->prod_id == 26) {  
            $pdf = PDF::loadView('products.showEdit', $data, compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'), [
                'mode'                 => '',
                'format'               => array(392, 1035.2),
                'default_font_size'    => '24',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 0,
                'margin_bottom'        => 0,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'orientation'          => 'P',
                'title'                => 'Laravel mPDF',
                'author'               => '',
                'watermark'            => 'PROOF',
                'show_watermark'       => true,
                'watermark_font'       => 'sans-serif',
                'display_mode'         => 'fullpage',
                'watermark_text_alpha' => 0.075,
            ]);
        }

        File::delete($pathToWhereJpgShouldBeStored);
        File::delete($pathToPdf);
        $pdf->save($pathToPdf);

        $im = new \Imagick($pathToPdf);
        $im->setImageFormat('jpg');

        file_put_contents($pathToWhereJpgShouldBeStored, $im);

        return view('products.edit', compact('product', 'category', 'request', 'numb', 'numbfax', 'numbcell', 'phone'));

    }
}
