<?php


    // require(APPPATH . 'template/one.php');
    
    // $templates1 = ["one", "two", "three"];
    // $templates2 = ["four", "five", "six"];
    // $data[] = "binta";
    // $data[] = "083113131313";
    // $data[] = "bogor";

    // for ($_____count = 0; $_____count < count($template); $_____count++) { 
    //     require_once "./template/". $template[$_____count] . ".php";
    // }

    // foreach( $templates1 as $template ) {
    //     require_once "./template/". $template . ".php";
    // }

// abstract class DatabaseObject {
//   private $table;
//   private $fields;

//   protected function __construct($table, $fields) {
//     $this->table = $table;
//     $this->fields = $fields;
//   }

//   public function find_all() {
//     return [$this->table, $this->fields];
//   }
// }

// class Topics extends DatabaseObject {
//   private static $instance;

//   public static function get_instance() {
//     if (!isset(self::$instance)) {
//       self::$instance = new Topics('makan ikan', 'makan ayam');
//     }

//     return self::$instance;
//   }
// }

// var_dump(Topics::get_instance()->find_all());

// define("APP_PATTERN", "dimana");

// class Autoload extends PHPoop {


//     public function set() {
//         return $this;
//     }

//     public function view($data) {
//         $this->something = $data;
//         return $this;
//     }

// }

// $data = new Autoload;




// var_dump($data->init('Makanan'));


// var_dump($data->set()->view("Hebat Sudah Bisa Menggunakan Object")->get_object());

// $d = $data->set()->view("Berhasil membuat PHP OOP!")->get_object();

// foreach ($d as $key => $value) {
//     echo "<h2>".$key."</h2>";
//     echo "<p>".$value."</p>";
// }

// var_dump( $data instanceof Autoload );

require(__DIR__."/core/Loader.php");

$data = new PHPTemplate(APPPATH . '/example/');
$data->view('template/template', 'content/content', ['harga' => [10000, 20000, 15000]]);