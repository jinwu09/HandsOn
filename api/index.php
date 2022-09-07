<?php
require_once "./config/Connection.php";
require_once "./module/Get.php";
require_once "./module/Post.php";
require_once "./module/Global.php";


$db = new Connection();
$pdo = $db->connect();

$get = new Get($pdo);
$post = new Post($pdo);


if (isset($_REQUEST['request'])) {
    $req = explode('/', rtrim($_REQUEST['request'], '/'));
} else {
    http_response_code(404);
}


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($req[0]) {
            case 'Student':
                if (count($req) > 1) {
                    echo json_encode($get->get_student($req[1]));
                } else {
                    echo json_encode($get->get_student());
                }
                break;
            case 'faculty':
                echo 'this is faculty endpoint';
                break;
            case 'Class':
                if (count($req) > 1) {
                    echo json_encode($get->get_class($req[1]));
                } else {
                    echo json_encode($get->get_class());
                }
                break;
            case 'EnrolledSubject':
                if (count($req) > 1) {
                    echo json_encode($get->get_EnrolledSubject($req[1]));
                } else {
                    echo json_encode($get->get_EnrolledSubject());
                }
                break;
            case 'EnrolledSubjectWithClass':
                if (count($req) > 1) {
                    echo json_encode($get->get_EnrolledSubjWithClass($req[1]));
                } else {
                    echo json_encode($get->get_EnrolledSubjWithClass());
                }
                break;
            case 'StudentEnrolledSubj':
                if (count($req) > 1) {
                    echo json_encode($get->get_StudentsEnrolledSubj($req[1]));
                } else {
                    echo json_encode($get->get_StudentsEnrolledSubj());
                }
                break;
            default:
                http_response_code(403);
                break;
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        switch ($req[0]) {
            case 'student':
                echo json_encode($post->add_student($data));
                break;
            case 'editstudent':
                echo json_encode($post->edit_student($data, $req[1]));
                break;
            case 'deletestudent':
                echo json_encode($post->delete_student($req[1]));
                break;
            case 'faculty':
                break;
            default:
                http_response_code(403);
                break;
        }

        break;

    case 'PATCH':
        $data = json_decode(file_get_contents("php://input"));

        switch ($req[0]) {
            case 'student':
                break;
            case 'faculty':
                break;
            default:
                http_response_code(403);
                break;
        }
        break;

    default:
        http_response_code(403);
        break;
}
