<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyPdfRequest;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class FileController extends Controller
{
    public function modifyPdf(ModifyPdfRequest $request)
    {
        try {
            $requestData = $request->only(['x_axis', 'y_axis', 'height', 'width']);
            $filesPath = $this->uploadFile($request->pdf, $request->image);
            $this->processingPdf($requestData, $filesPath);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with('error', 'Something went wrong, please try again!')
                ->withInput();
        }
    }

    public function uploadFile($pdf, $image)
    {
        $path = [];
        if ($pdf) {
            $path['pdf'] = Storage::path($pdf->store('pdfs'));
        }
        if ($image) {
            $path['image'] = Storage::path($image->store('images'));
        }
        return $path;
    }

    public function processingPdf(array $rd, $filesPath)
    {
        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->setSourceFile($filesPath['pdf']);
        $templateId = $pdf->importPage(1);
        $pdf->useTemplate($templateId);
        $pdf->Image($filesPath['image'], $rd['x_axis'], $rd['y_axis'], $rd['width'], $rd['height']);
        $pdf->Output('modified.pdf', 'I');
        $pdf->Close();
    }
}
