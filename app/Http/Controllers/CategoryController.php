<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;
use App\PriceController;

class CategoryController extends Controller
{
    public function show(Category $category, Request $request)
    {
         session(['catId' => $category->id, 'catName' => $category->cat_name]);

        $pathToPdf = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.pdf';
        $pathToWhereJpgShouldBeStored = 'assets/mpdf/temp/' . Auth::user()->username  . '/showData.jpg';

        File::delete([$pathToPdf, $pathToWhereJpgShouldBeStored]);
        return view('category.show', compact('category', 'request'));
    }

    public function showFranchiseCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);

        return view('category.franchise', compact('category', 'request', 'categories', 'product'));
    }

    public function showCorporateCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
       
        return view('category.corporate', compact('category', 'request', 'categories', 'product'));
    }

    public function showStaffCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
       
        return view('category.staff', compact('category', 'request', 'categories', 'product'));
    }

    public function showProcessBrochureCategories(Category $category, Request $request, Product $product)
    {
        session(['catId' => $category->id, 'catName' => $category->cat_name]);
       
        return view('category.processBrochure', compact('category', 'request', 'categories', 'product'));
    }

}
