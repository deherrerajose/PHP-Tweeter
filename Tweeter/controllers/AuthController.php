<?php
    require 'models/UserModel.php';

    class AuthController {
        private $userModel;

        public function __construct($db) {
            $this->userModel = new UserModel($db);
        }

        public function login($username, $password) {
            $user = $this->userModel->getUserByUsername($username);
            try {
                if (!empty($user)) {
                    $verify = password_verify($password, $user['password']);
                }else {
                    throw new Exception("User does not exist.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }


            if ($user && $verify) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];

                return true;
            }

            return false;
        }
    }
?>

