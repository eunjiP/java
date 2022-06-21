<?php
    namespace application\controllers;
    //같은 namespace면 상속시에 use를 넣지 않아도 사용가능(아래도 똑같은 이유)
    use application\models\BoardModel;

    //php는 자식에 생성자가 있으면 자식을 객체화하면 자식 생성자 호출
    //부모클래스에 생성자가 있고 자식을 객체화해도 부모 생성자가 호출됨(java랑 다른점)
    //파일명, 클래스명 대소문자 구별 안한다.
    class BoardController extends Controller {
        public function list() {
            $model = new BoardModel();
            $this->addAttribute("title", "리스트");
            $this->addAttribute("list", $model->selBoardList()); 
            //위와 동일한 내용
            // $this->list = $model->selBoardList();
            $this->addAttribute("js", ["board/list"]);  //head에서 .js를 붙여줌

            return "board/list.php"; //view 파일명 입력!(views 이후의 경로만 입력하면 됨)
        }

        public function detail() {
            $i_board = $_GET['i_board'];
            // print "i_board : {$i_board}<br>";
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute("detail", $model->selBoard($param)); 
            $this->addAttribute("js", ["board/detail"]);
            return "board/detail.php";
        }

        public function del() {
            $i_board = $_GET['i_board'];
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute("del", $model->delBoard($param)); 
            return "redirect:/board/list";
        }

        public function mod() {
            $i_board = $_GET['i_board'];
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute("detail", $model->selBoard($param)); 
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }
    }
?>