<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\StreamedResponse;


class MainController extends Controller
{
    public function traitement(Request $request){
        if (!$request->hasFile('image')) {
            return redirect('/')->with('message','errorEmail');
        }

        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'emailUniv' => 'required',
            'emailPerso' => 'required',
            'indice1' => 'required',
            'indice2' => 'required',
            'anneeScolaire' => 'required',
            'image' => 'required',
            'sexe' => 'required',
            'souhait' => 'required'
        ]);

        $identifiant = strtolower(htmlspecialchars($request->input('nom')))."_".strtolower(htmlspecialchars($request->input('prenom')));

        $student = Student::whereRaw('LOWER(identifiant) = ?', [$identifiant])->first();

        $uploadedFile = $request->file('image');
        $base64Image = base64_encode(file_get_contents($uploadedFile->getRealPath()));

        $pathImage = "data:image/jpeg;base64,".$base64Image;

        $userExist = User::whereRaw('LOWER(nom) = ? AND LOWER(prenom) = ?', [strtolower(htmlspecialchars($request->input('nom'))), strtolower(htmlspecialchars($request->input('prenom')))])
            ->first();

        if ($student){
            if (!$userExist){ //Si USER EXISTE PAS
                try {
                    $user = new User();
                    $user->nom = htmlspecialchars($request->input('nom'));
                    $user->prenom = htmlspecialchars($request->input('prenom'));
                    $user->emailUniv = strtolower(htmlspecialchars($request->input('emailUniv')));
                    $user->emailPerso = htmlspecialchars($request->input('emailPerso'));
                    $user->indice1 = htmlspecialchars($request->input('indice1'));
                    $user->indice2 = htmlspecialchars($request->input('indice2'));
                    $user->annéeScolaire = htmlspecialchars($request->input('anneeScolaire'));
                    $user->photo = $pathImage;
                    $user->sexe = htmlspecialchars($request->input('sexe'));
                    $user->souhait = htmlspecialchars($request->input('souhait'));

                    $user->save();

                    return redirect('/inscription');
                } catch (\Illuminate\Database\QueryException $e){
                    return redirect('/error1048');
                }
            }else{
                return redirect('/error1048');
            }
        }else{
            return redirect('/error1047');
        }
    }

//    public function downloadBDD(Request $request){
//        $request->validate([
//            'pwd' => 'required',
//        ]);
//
//        if ()
//
//        $data = DB::table('users')->get();
//
//        $headers = array(
//            "Content-type" => "text/csv",
//            "Content-Disposition" => "attachment; filename=table.csv",
//            "Pragma" => "no-cache",
//            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
//            "Expires" => "0"
//        );
//
//        $response = new StreamedResponse(function () use ($data) {
//            $output = fopen("php://output", "w");
//            fputcsv($output, array_keys((array)$data[0]));
//            foreach ($data as $row) {
//                fputcsv($output, (array)$row);
//            }
//            fclose($output);
//        }, 200, $headers);
//        return $response;
//    }
}
