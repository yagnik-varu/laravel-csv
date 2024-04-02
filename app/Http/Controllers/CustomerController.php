<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function importCsv(Request $request){
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
        $data = str_getcsv($line);

        customer::create([
            'first name' => $data[0],
            'last na' => $data[1],
            // Add more fields as needed
        ]);
    }

    return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}
