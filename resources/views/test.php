<?php

public function getVendorIdu()
{

        try{

           ajaxChecker(true, null, [], true, 2);
          $property = PropertyManager::fetch($propertyId);
                if(!$property) {
                    throw new Exception("Cannot load property '{$propertyId}'");
                }
                $vendors = $property->getVendors(false, true, true, true);
                $vlist = [];

                foreach($vendors as $vendor)
                {
                    // Load or Create the Identity Verification Record
                    $iv = IdentityVerificationManager::createNewIdentityVerificationRecord($property->id, 'vendor', $vendor->id);

                    $response = new stdClass();
                    $response->idu = $iv->idu ?? 0;
                    $response->kba = $iv->kba ?? 0;
                    $response->exempt = $iv->exempt ?? 0;
                    $response->name = $vendor->getName();
                    $response->email = $vendor->email;
                    $response->telephone = $vendor->getTelephone();
                    $response->id = $vendor->id;
                    $response->vendor_number = $vendor->vendor_number;
                    $vlist[] = $response;

                }
           
        }catch(exception $e) {

            $this->ajaxFail(['message'] => $e->getMessage()]);
            }

        $this->ajaxSuccess($vlist);

}

 public function saveContractBackTask($propertyId)
    {
        $view = new AdminView();
        $view->popup();

        if (!$this->init($view)) {
            return $view;
        }

        $view->setSource(Config::get('ext.Ias.dir.views') . '/admin/identity-verification/index.tpl.php');
        $propertyId = 'dafae06b4bee41e0aaf641ce42389fd7';
        // Controller stuff
        $property = PropertyManager::fetch($propertyId);
        if(!$property) {
            throw new Exception("Cannot load property '{$propertyId}'");
        }
        $vendors = $property->getVendors(false, true, true, true);
        $vlist = [];

        foreach($vendors as $vendor)
        {
            // Load or Create the Identity Verification Record
            $iv = IdentityVerificationManager::createNewIdentityVerificationRecord($property->id, 'vendor', $vendor->id);

            $response = new stdClass();
            $response->idu = $iv->idu ?? 0;
            $response->kba = $iv->kba ?? 0;
            $response->exempt = $iv->exempt ?? 0;
            $response->name = $vendor->getName();
            $response->email = $vendor->email;
            $response->telephone = $vendor->getTelephone();
            $response->id = $vendor->id;
            $response->vendor_number = $vendor->vendor_number;
            $vlist[] = $response;

        }

        $view->vlist = $vlist;
        $view->property = $property;

        if (!empty($_POST['form_content'])){
            $formData = json_decode($_POST['form_content']);
            foreach ($formData->vendors As $vendor){
                $iv = IdentityVerificationManager::createNewIdentityVerificationRecord($property->id, 'vendor', $vendor->id);

                if ($vendor->idu == "1"){
                    $iv->idu = 0;
                    $iv->kba = 0;
                } elseif ($vendor->idu == "2"){
                    $iv->idu = 1;
                    $iv->kba = 0;
                } elseif ($vendor->idu == "3"){
                    $iv->idu = 1;
                    $iv->kba = 1;
                }
                $iv->getModelManager()->save($iv);
            }

            foreach($formData->vendors as $vendor){

                if(isset( $vendor->idu) && $vendor->idu > 1 && validateEmailAddress($vendor->email)  ) {

                    $regUrl = homeUrl() . $property->getAdminUrl();
                    $emails = [];
                    $emails[] =  $vendor->email;

                    $emailView = new ComplianceKbaInvite($property->title, $regUrl, $vendor->name);
                    MessageManager::send($emails, '', "IAM Sold: Idu Kba Identity checks", $emailView->make());

                }

            }

        }


        return  $view;

    }


?>
