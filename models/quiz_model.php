<?php

class Quiz_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function topicList() {
        $user = Session::get('user');
        $st = $this->db->prepare('SELECT topicID, topicName FROM topic WHERE userID = ' . $user);
        $st->execute();
        return $st->fetchAll();
    }

    public function start($id) {
        //$st_code = $this->db->prepare();
    }

    public function delete($id) {
        $st = $this->db->prepare('DELETE questionSet, topic, question, answer FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE t.topicID = :id ');
        $succ = $st->execute(array(':id' => $id));
        if ($succ != TRUE) {
            $st = $this->db->prepare('DELETE FROM topic WHERE topicID = :id');
            $succ = $st->execute(array(':id' => $id));
        }
    }

    public function getSingleQuiz($id) {
        //$st = $this->db->prepare('SELECT * FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE topicID = :id');
        $st = $this->db->prepare('SELECT * FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE t.topicID = :id ');
        $st->execute(array(':id' => $id));
        $st->setFetchMode(PDO::FETCH_ASSOC);
        return $st->fetchAll();
    }

    public function xhrAddQuiz() {
        $data = $_POST['data'];
        $topic = $_POST['topic'];
        $user = Session::get('user');

        $this->db->beginTransaction();

        $l_data = explode("]", $data);
        $st_topic = $this->db->prepare('INSERT INTO topic (userID, topicName) VALUES( :userID, :topic);');
        $st_topic->execute(array(':userID' => $user,
            ':topic' => $topic));

        $topic_id = $this->db->lastInsertId();

        //prepare statements
        $st_question = $this->db->prepare('INSERT INTO question ( questionText ) VALUES (:question);');

        for ($i = 0; $i < sizeof($l_data); $i++) {
            if ($l_data[$i] != "") {
                $question = explode("[", $l_data[$i]);

                //add question
                $st_question->execute(array(':question' => $question[0]));
                $qid = $this->db->lastInsertId();

                $answers = explode(";", $question[1]);

                $st_answer = $this->db->prepare('INSERT INTO answer ( questionID, answerText, isCorrect ) VALUES (:question, :answer, :correct);');

                for ($k = 0; $k < sizeof($answers); $k++) {

                    if ($answers[$k] != "") {
                        $answer = explode("/", $answers[$k]);
                        $answ = $answer['0'];
                        $utfansw = utf8_encode($answ);
                        $checked = $answer['1'];
                        if ($checked === "true") {
                            $st_answer->execute(array(':question' => $qid,
                                ':answer' => $utfansw,
                                ':correct' => 1));
                        } else {
                            $st_answer->execute(array(':question' => $qid,
                                ':answer' => $utfansw,
                                ':correct' => 0));
                        }
                    }
                }

                $st_questionset = $this->db->prepare('INSERT INTO questionSet (topicID, orderNo, questionID) VALUES ( :topic1, (SELECT * FROM (SELECT coalesce(max(OrderNo), 0) + 1 FROM questionSet WHERE topicID = :topic2 ) AS _questionSet), :question)');
                $st_questionset->execute(array(':topic1' => $topic_id,
                    ':topic2' => $topic_id,
                    ':question' => $qid));
            }
        }
        $this->db->commit();
    }

    public function xhrEditQuiz() {
        $data = $_POST['data'];
        $topic = $_POST['topic'];
        $topicID = $_POST['topicID'];
        $user = Session::get('user');

        $this->db->beginTransaction();

        $st = $this->db->prepare('DELETE questionSet, topic, question, answer FROM topic t INNER JOIN questionSet qs ON t.topicID = qs.topicID INNER JOIN question q ON q.questionID = qs.questionID INNER JOIN answer a ON a.questionID = q.questionID WHERE t.topicID = :id ');
        $succ = $st->execute(array(':id' => $topicID));
        if ($succ != TRUE) {
            $st = $this->db->prepare('DELETE FROM topic WHERE topicID = :id');
            $succ = $st->execute(array(':id' => $topicID));
        }

        if ($succ == TRUE) {

            $l_data = explode("]", $data);
            $st_topic = $this->db->prepare('INSERT INTO topic (userID, topicName) VALUES( :userID, :topic);');
            $st_topic->execute(array(':userID' => $user,
                ':topic' => $topic));

            $topic_id = $this->db->lastInsertId();

            //prepare statements
            $st_question = $this->db->prepare('INSERT INTO question ( questionText ) VALUES (:question);');

            for ($i = 0; $i < sizeof($l_data); $i++) {
                if ($l_data[$i] != "") {
                    $question = explode("[", $l_data[$i]);

                    //add question
                    $st_question->execute(array(':question' => $question[0]));
                    $qid = $this->db->lastInsertId();

                    $answers = explode(";", $question[1]);

                    $st_answer = $this->db->prepare('INSERT INTO answer ( questionID, answerText, isCorrect ) VALUES (:question, :answer, :correct);');

                    for ($k = 0; $k < sizeof($answers); $k++) {
                        if ($answers[$k] != "") {
                            $answer = explode("/", $answers[$k]);
                            $answ = $answer['0'];
                            $utfansw = utf8_encode($answ);
                            $checked = $answer['1'];
                            if ($checked === "true") {
                                $st_answer->execute(array(':question' => $qid,
                                    ':answer' => $utfansw,
                                    ':correct' => 1));
                            } else {
                                $st_answer->execute(array(':question' => $qid,
                                    ':answer' => $utfansw,
                                    ':correct' => 0));
                            }
                        }
                    }

                    $st_questionset = $this->db->prepare('INSERT INTO questionSet (topicID, orderNo, questionID) VALUES ( :topic1, (SELECT * FROM (SELECT coalesce(max(OrderNo), 0) + 1 FROM questionSet WHERE topicID = :topic2 ) AS _questionSet), :question)');
                    $st_questionset->execute(array(':topic1' => $topic_id,
                        ':topic2' => $topic_id,
                        ':question' => $qid));
                }
            }
            $this->db->commit();
        } else {
            $this->db->rollback();
        }
    }

}
