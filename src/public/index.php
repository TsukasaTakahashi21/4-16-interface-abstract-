<!-- インターフェース 例）ドラえもん-->

<?php
interface DoraemonTool {
  public function use(): void;
}

class SecretPocket implements DoraemonTool {
  private string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function use(): void {
    echo "ドラえもんの秘密道具「{$this->name}」を使います。\n";
  }
}

class DoraemonPocket {
  private array $tools;

  public function __construct() {
    $this->tools = [];
  }

  public function addTool(DoraemonTool $tool): void {
    $this->tools[] = $tool;
  }

  public function useTools(): void {
    foreach ($this->tools as $tool) {
      $tool->use();
    }
  }
}

$doraemonPocket = new DoraemonPocket();
$doraemonPocket->addTool(new secretPocket("どこでもドア"));
$doraemonPocket->addTool(new secretPocket("タイムマシン"));
$doraemonPocket->useTools();

?>



<?php
// abstract: 例）電化製品 

// 抽象クラス
abstract class Electronics {
  protected string $name;
  protected bool $powerOn;

  public function __construct(string $name) {
    $this->name = $name;
   // 初期状態は電源がOFF
    $this->powerOn = false; 
  }

  // 電源をOnにするメソッド
  public function powerOn(): void {
    $this->powerOn = true;
    echo "{$this->name}の電源をONにしました。\n";
  }

  // 電源をOffにするメソッド
  public function powerOff(): void {
    $this->powerOn = false;
    echo "{$this->name}の電源をOFFにしました。\n";
  }

  // 動作する行動
  abstract public function operate(): void;
}

// 具象クラス: テレビ
class Television extends Electronics {
  public function __construct(string $name) {
    parent::__construct($name);
  }
  
  // テレビを操作するメソッド
  public function operate(): void {
    if ($this->powerOn) {
      echo "{$this->name} で番組を視聴しています。\n";
    } else {
        echo "{$this->name} は電源がOFFです。\n";
    }
  }
}

// 具象クラス：冷蔵庫
class Refrigerator extends Electronics {
  public function __construct(string $name) {
    parent:: __construct($name);
  }
  
  // 冷蔵庫を操作するメソッド
  public function operate(): void {
    if ($this->powerOn) {
      echo "{$this->name} で食材を冷やしています。\n";
    } else {
        echo "{$this->name} は電源がOFFです。\n";
    }
  }
}

// テレビのインスタンス化と操作
$television = new Television("Living Room TV");
$television->powerOn();
$television->operate();

// 冷蔵庫のインスタンス化と操作
$refrigrator = new Refrigerator("Kitchen Refrigerator");
// 電源がオフの場合
$refrigrator->operate(); 
$refrigrator ->powerOn();
$refrigrator->operate();

?>
