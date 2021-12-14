<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{

    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    private function setUserSession($actor)
    {
        $data=[
            'actor_firstname'=>$actor['actor_firstName'],
            'actor_lastname'=>$actor['actor_lastName'],
            'actor_birthdate'=>$actor['actor_birthdate'],
            // gender, veritabanından cekilip forma aktarılacak ve oradan alınacak
        ];

        session()->set($data);
        return true;
    }


    public function addCategory() {
        $data = [];
        helper(['form']);

        if($this->request->getPost())
        {
            $rules=
                [
                    'category_name' => 'required|min_length[2]',
                ];

            $errors=
                [
                    'category_name' =>
                        [
                            'validateCategory'=> "The length of category name must be minimum two"
                        ]
                ];

            if(! $this->validate($rules,$errors))
            {
                $data['validation']= $this->validator;
            }
            else
            {
                $category = new CategoryModel();
                if(is_null($category->getCategory())) {
                    $newData = [
                        'category_name'  => $this->request->getVar('actor_firstName')
                    ];

                    $category->save($newData);

                } else {

                }

                //$this->setUserSession($user);
                //$session->setFlashdata('success','Succesful Registiration');
                return redirect()->to('/dashboard');
            }
        }
        echo view('login',$data);
    }


}