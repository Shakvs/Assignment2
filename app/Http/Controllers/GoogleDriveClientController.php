<?php
/**
 * Created by PhpStorm.
 * User: shaju
 *  Main controller class for Listing and Saving Google Drive  files.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use  App\Services\GoogleDriveService;
use Session;
use Illuminate\Http\Request;
use App\Gdfiles;

class GoogleDriveClientController extends Controller
{
    /*
     * Method for  Listing Google drive files
     *
     */
    public function index(Request $request)
    {
        // Initialize and activate service
        $authUrl = null;
        $gdservice = new GoogleDriveService();
        $client = $gdservice->getClient();
        $service = $gdservice->activateService($client);

        //  authentication and Getting  Token
        $code = $request->input("code");
        if (isset($code)) {
            $client->authenticate($code);
            Session::put('access_token', $client->getAccessToken());
            Session::put('refresh_token', $client->getRefreshToken());
            return redirect('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);

        }


        if (Session::has('access_token')) {
            $client->setAccessToken(Session::get('access_token', ''));
        }

        if (Session::has('access_token') && $client->isAccessTokenExpired()) {
            $oldtoken = Session::get('access_token', '');
            // dd("expired", $oldtoken);
            $client->refreshToken($oldtoken['access_token']);
            $newtoken = $client->getAccessToken();

        }

        if ($client->getAccessToken()) {
            $params = array(
                'pageSize' => 50,
                'fields' => 'nextPageToken, files(id, name,mimeType,size,webViewLink )'
            );
            $results = $service->files->listFiles($params);
            if (count($results->getFiles()) == 0) {
                dd("No files found.");
            }
            else {

                foreach ($results->getFiles() as $file) {
                    $file_list[] = [
                        'name' => $file->getName(),
                        'id' => $file->getId(),
                        'mimetype' => $file->getMimeType(),
                        'size' => number_format($file->getSize() / 1024, 2),
                        'webViewLink' => $file->getWebViewLink()

                    ];


                }

                $request->session()->put('gdfileList', $file_list);
                return view('filelist', array('file_list' => $file_list));
            }


        } else {
            // creating Auth Url
            $authUrl = $client->createAuthUrl();
        }

        return view('home', array('authUrl' => $authUrl));

    }

    /*
     * Method  Save Google Drive  files Details in locally
     */
    public function saveFiles(Request $request)
    {
        $flg = 0;
        $gdfileList = $request->session()->get('gdfileList', '');

        foreach ($gdfileList as $eachfile) {
            $gdfileidcount = Gdfiles::where('gdfileid', $eachfile['id'])->first();
            if (!$gdfileidcount) {
                $gdfilesmodel = new Gdfiles();
                $gdfilesmodel->name = $eachfile['name'];
                $gdfilesmodel->downloadurl = $eachfile['webViewLink'];
                $gdfilesmodel->mimetype = $eachfile['mimetype'];
                $gdfilesmodel->size = $eachfile['size'];
                $gdfilesmodel->gdfileid = $eachfile['id'];
                $gdfilesmodel->save();
                $flg = 1;
            }


        }

        if ($flg == 1)
            Session::flash('message', 'File details Saved Local database successfully!');
        else
            Session::flash('message', "Already Saved ");

        return view('filelist', array('file_list' => $gdfileList));

    }

    /*
         * logout - Clear session
         */
    public function logout(Request $request)
    {
        Session::forget('access_token');
        Session::flush();
        return redirect('http://' . $_SERVER['HTTP_HOST'] );
    }


}
