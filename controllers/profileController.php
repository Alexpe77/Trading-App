<?php

require_once './models/profileModel.php';

class ProfileController
{
    public function getProfileById($profileId)
    {
        $profileId = isset($params['0']) ? (int)$params['0'] : 0;
        if($profileId > 0) {
            $profileData = new ProfileModel();

            $data = $profileData->getProfileById($profileId);

            if($data) {
                header('Content-Type: application/json');
                echo json_encode($data);
            } else {
                header('Content-Type: application/json');
                http_response_code(404);
                echo json_encode(['error' => 'Profile not found']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['error' => 'ID not valid']);
        }
    }

    public function updateProfile($profileId) {

        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            $profileData = json_decode(file_get_contents('php://input'), true);
            if (
                isset($profileData['first_name']) &&
                isset($profileData['last_name']) &&
                isset($profileData['address'])
            ) {
                $profileId = (int)$profileId;

                if ($profileId > 0) {
                    $postModel = new ProfileModel();

                    $postModel->updateProfile(
                        $profileId,
                        $profileData['first_name'],
                        $profileData['last_name'],
                        $profileData['address']
                    );

                    header('Content-Type: application/json');
                    echo json_encode(['message' => 'Profile updated successfully']);
                } else {
                    header('Content-Type: application/json');
                    http_response_code(400);
                    echo json_encode(['error' => 'ID not valid']);
                }
            } else {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['error' => 'Missing data']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(405);
            echo json_encode(['error' => 'Unauthorized method']);
        }
    }
}
