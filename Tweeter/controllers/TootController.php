<?php
    require 'models/TootModel.php';

    class TootController {
        public function createToot() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['content'])) {
                    $content = htmlspecialchars(trim($_POST['content']));
                    $userId = $_SESSION['user_id'];

                    $model = new TootModel();
                    $model->createNewToot($userId, $content);

                    header('Location: index.php');
                    exit;
                }
            }
        }

        public function edit() {
            $id = $_GET['id'];

            $model = new TootModel();
            $toot = $model->getToot($id);

//            echo $toot['id'];

            if ($toot && $toot['user_id'] == $_SESSION['user_id']) {
                include 'views/toot/EditView.php';
            } else {
//                header("Location: index.php");
//                exit;
            }
        }

        public function update() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $content = htmlspecialchars(trim($_POST['content']));
//                $userId = $_SESSION['user_id'];
                $model = new TootModel();
                $model->updateToot($id, $content);
            }
            header("Location: index.php");
            exit;
        }

        public function delete() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
//                $userId = $_SESSION['user_id'];
                $model = new TootModel();
                $model->deleteToot($id);
            }
            header("Location: index.php");
            exit;
        }

    }
?>

