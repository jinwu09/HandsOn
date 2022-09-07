<?php

class Get
{

    protected $pdo, $gm;

    public function __construct(\PDO $pdo)
    {
        $this->gm = new GlobalMethods($pdo);
        $this->pdo = $pdo;
    }


    public function get_student($studnum = null)
    {
        $sql = "SELECT * FROM student_tbl WHERE is_deleted = 0 ";
        if ($studnum != null) {
            $sql .= "AND studnum = '$studnum'";
        }
        $result = $this->gm->exec_query($sql);
        if ($result['code'] == 200) {
            return $this->gm->response_payload($result['data'], "success", "Succesfully retrieved data.", $result['code']);
        }
        return $this->gm->response_payload(null, "failed", "Unable tp retrieve data.", $result['code']);
    }

    public function get_class($classcode = null)
    {
        $sql = "SELECT * FROM class_tbl WHERE is_deleted = 0 ";
        if ($classcode != null) {
            $sql .= "AND classcode = '$classcode'";
        }
        $result = $this->gm->exec_query($sql);
        if ($result['code'] == 200) {
            return $this->gm->response_payload($result['data'], "success", "Succesfully retrieved data.", $result['code']);
        }
        return $this->gm->response_payload(null, "failed", "Unable tp retrieve data.", $result['code']);
    }
    public function get_EnrolledSubject($classcode = null)
    {
        $sql = "SELECT * FROM enrolledsubj_tbl  ";
        if ($classcode != null) {
            $sql .= "AND classcode = '$classcode'";
        }
        $result = $this->gm->exec_query($sql);
        if ($result['code'] == 200) {
            return $this->gm->response_payload($result['data'], "success", "Succesfully retrieved data.", $result['code']);
        }
        return $this->gm->response_payload(null, "failed", "Unable tp retrieve data.", $result['code']);
    }
    public function get_EnrolledSubjWithClass($classcode = null)
    {
        $sql = "SELECT * FROM enrolledsubj_tbl, class_tbl WHERE enrolledsubj_tbl.classcode = class_tbl.classcode ";
        if ($classcode != null) {
            $sql .= "AND classcode = '$classcode'";
        }
        $result = $this->gm->exec_query($sql);
        if ($result['code'] == 200) {
            return $this->gm->response_payload($result['data'], "success", "Succesfully retrieved data.", $result['code']);
        }
        return $this->gm->response_payload(null, "failed", "Unable tp retrieve data.", $result['code']);
    }
    public function get_StudentsEnrolledSubj($studnum = null)
    {
        $sql = "SELECT * FROM enrolledsubj_tbl, student_tbl WHERE enrolledsubj_tbl.studnum = student_tbl.studnum ";
        if ($studnum != null) {
            $sql .= "AND studnum = '$studnum'";
        }
        $result = $this->gm->exec_query($sql);
        if ($result['code'] == 200) {
            return $this->gm->response_payload($result['data'], "success", "Succesfully retrieved data.", $result['code']);
        }
        return $this->gm->response_payload(null, "failed", "Unable tp retrieve data.", $result['code']);
    }
}
