<?php

namespace App\Controllers;

use App\Models\M_Feedback;

class KontakController extends BaseController
{


    public function kirim()
    {
        if ($this->request->getPost('captcha') != '1') {
            return redirect()->back()->with('error', 'Captcha is incorrect.');
        }

        $model = new M_Feedback();

        $data = [
            'nama'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subjek'  => $this->request->getPost('subject'),
            'pesan'   => $this->request->getPost('message'),
        ];

        $validation = $model->validateFeedback($data);

        if ($validation === true) {
            $model->save($data);
            return redirect()->to('/feedback');
        } else {
            return redirect()->back()->withInput()->with('errors', $validation);
        }
    }


    public function updateSave($id)
    {
        $model = new M_Feedback();

        $data = [
            'id'      => $id,
            'nama'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subjek'  => $this->request->getPost('subject'),
            'pesan'   => $this->request->getPost('message'),
        ];

        $validation = $model->validateFeedback($data);

        if ($validation === true) {
            $model->save($data);
            return redirect()->to('/feedback');
        } else {
            return redirect()->back()->withInput()->with('errors', $validation);
        }
    }

    public function delete($id)
    {
        $model = new M_Feedback();
        $feedback = $model->find($id);

        if (!$feedback) {
            return redirect()->to('/feedback')->with('error', 'Feedback not found.');
        }

        $model->delete($id);
        return redirect()->to('/feedback');
    }
}