<?php
/**
 * Created by PhpStorm.
 * User: shaju
 *
 *  This is a Service Layer  class for Google DriveApi
 *  functions - Create Google drive api client
 *             Activate the service
 */

namespace App\Services;

Class GoogleDriveService
{
    public $client_id;
    public $client_secret;
    public $redirect_uri;
    public $accesstoken;

    public function __construct(array $config = array())
    {
        $this->client_id = env('GOOGLE_DRIVE_CLIENT_ID');
        $this->client_secret = env('GOOGLE_DRIVE_CLIENT_SECRET');
        $this->redirect_uri= env('GOOGLE_DRIVE_REDIRECT_URI');

    }

    /*
     * Method for creating Client object - Acceptiing Client ID and Client Secret, RedirectURI  etc Parameters .
     */

    public function getClient()
    {

        $client = new \Google_Client();

        $client->setApplicationName("CashU Google Drive File List");
        $client->setClientId($this->client_id);
        $client->setClientSecret($this->client_secret);
        $client->setRedirectUri($this->redirect_uri);
        $client->setScopes(implode(' ', array(
            \Google_Service_Drive::DRIVE_METADATA_READONLY)));

        // $client->setAccessType('offline');
        // $client->setApprovalPrompt('force');

        return $client;
    }

    /*
     *  Activating service
     */
    public function activateService($client)
    {
        // Get the API client and construct the service object.
        // $client= $this->getClient();
        $service = new \Google_Service_Drive($client);
        return $service;
    }


}


?>