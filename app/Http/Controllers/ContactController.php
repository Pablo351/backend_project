<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\SendContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

/**
 * @OA\Info(title="Contact API", version="0.1")
 *
 * @OA\Server(url="http://localhost:8000")
 **/


class ContactController extends Controller
{

/**
* @OA\Post(
*      path="/api/contact/create",
*      summary="Guardar datos de contacto",
*      @OA\RequestBody(
*          @OA\MediaType(
*              mediaType="application/json",
*              @OA\Schema(
*                  @OA\Property(
*                      property="name",
*                      type="string"
*                  ),
*                  @OA\Property(
*                       property="mail",
*                       type="string"
*                  ),
*                   @OA\Property(
*                      property="phone",
*                      type="string"
*                  ),
*                   @OA\Property(
*                          property="messaje",
*                          type="text"
*                  ),
*                  example={"name":"Alberto Urbaez", "mail":"alberto.urbaez@25watts.com.ar","phone": "+54 9 351 370000","messaje":"Test de envio de email"}
*              )
*          )
* ),
*  @OA\Response(
*      response=200,
*       description="OK"
* )
* )
*/
    public function save(Request $request)
    {
        try {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->mail = $request->mail;
            $contact->phone = $request->phone;
            $contact->messaje = $request->messaje;

            try {
                Mail::to($request->mail)->send(new SendContact($contact));
                $contact->send_mail = "Se envio el correo";
            } catch (\exception $e) {
                $contact->send_mail = "Fallo el envio del correo: {$e->getMessage()}";
            }
            $contact->save();
        } catch (\exception $e) {
            return response()->json("Se genero un error {$e->getMessage()}",404);
        }
        return response()->json("La info se guardo con exito {$contact->mail}",201);
    }

    public function list()
    {
        $data = Contact::all();
        return response()->json($data,200);

    }


}
